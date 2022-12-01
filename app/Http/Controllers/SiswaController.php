<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Spp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DataTables;
use PDF;

class SiswaController extends Controller
{
    public function pay(Request $request){
          // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-NbrXFtBL0JztaNuMfleHeHlS';
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;
    
    $params = array(
        'transaction_details' => array(
            'order_id' => rand(),
            'gross_amount' => 250000,
        ),
        'item_details' => array([
                'id' => 'a1',
                'price' => '250000',
                'quantity' => 1,
                'name' => $request->get('bulan'),
        ]),
        'customer_details' => array(
            'first_name' => $request->get('uname'),
            'last_name' => '',
            'email' => $request->get('email'),
            'phone' => $request->get('nomor'),
        ),
    );
    
    $snapToken = \Midtrans\Snap::getSnapToken($params);
    return view('siswa.test', ['snap_token'=>$snapToken]);
    }

    public function payment_post(Request $request){
        $json = json_decode($request->get('json'));
        $order = new Order();
        $order->status = $json->transaction_status;
        $order->uname = $request->get('uname');
        $order->email = $request->get('email');
        $order->nomor = $request->get('nomor');
        $order->NISN = $request->get('NISN');
        $order->thn_bayar = $request->get('thn_bayar');
        $order->bulan = $request->get('bulan');
        $order->kelas = $request->get('kelas');
        $order->transaction_id = $json->transaction_id;
        $order->order_id = $json->order_id;
        $order->gross_amount = $json->gross_amount;
        $order->payment_type = $json->payment_type;
        $order->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $order->save() ? redirect(url('siswa/pembayaran-online'))->with('alert-success', 'order berhasil di buat') : redirect(url('url'))->with('alert-failed', 'terjadi kesalahan');
      } 

    public function pembayaranSpp()
    {
        $spp = Spp::all();

        return view('siswa.pembayaran-spp', compact('spp'));
    }

    public function pembayaranOnline()
    {
        $spp = Spp::all();

        return view('siswa.pembayaran-online', compact('spp'));
    }

    public function pembayaranSppShow(Spp $spp)
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)
            ->first();

        $pembayaran = Pembayaran::with(['petugas', 'siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $spp->tahun)
            ->oldest()
            ->get();

        return view('siswa.pembayaran-spp-show', compact('pembayaran', 'siswa', 'spp'));
    }

    public function historyPembayaran(Request $request)
    {
        if ($request->ajax()) {
            $siswa = Siswa::where('user_id', Auth::user()->id)
                ->first();
            
            $data = Pembayaran::with(['petugas', 'siswa' => function($query) {
                $query->with(['kelas']);
            }])
                ->where('siswa_id', $siswa->id)
                ->latest()
                ->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                    $btn = '<div class="row"><a href="'.route('siswa.history-pembayaran.preview', $row->id).'"class="btn btn-danger btn-sm ml-2" target="_blank">
                    <i class="fas fa-print fa-fw"></i>
                    </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    	
    	return view('siswa.history-pembayaran');
    }

    public function previewHistoryPembayaran($id)
    {
        $data['siswa'] = Siswa::where('user_id', Auth::user()->id)
            ->first();
        
        $data['pembayaran'] = Pembayaran::with(['petugas', 'siswa'])
            ->where('id', $id)
            ->where('siswa_id', $data['siswa']->id)
            ->first();
        
        $pdf = PDF::loadView('siswa.history-pembayaran-preview',$data);
        return $pdf->stream();
    }

    public function laporanPembayaran()
    {
        $spp = Spp::all();
        return view('siswa.laporan', compact('spp'));
    }

    public function printPdf(Request $request)
    {
        $siswa = Siswa::where('user_id', Auth::user()->id)
            ->first();

        $data['pembayaran'] = Pembayaran::with(['petugas', 'siswa'])
            ->where('siswa_id', $siswa->id)
            ->where('tahun_bayar', $request->tahun_bayar)
            ->get();

        $data['data_siswa'] = $siswa;

        if ($data['pembayaran']->count() > 0) {
            $pdf = PDF::loadView('siswa.laporan-preview', $data);
            return $pdf->download('pembayaran-spp-'.$siswa->nama_siswa.'-'.
                $siswa->nisn.'-'.
                $request->tahun_bayar.'-'.
                Str::random(9).'.pdf');
        }else{
            return back()->with('error', 'Data Pembayaran Spp Anda Tahun '.$request->tahun_bayar.' tidak tersedia');
        }
    }
}
