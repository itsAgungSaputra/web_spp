<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Universe;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa_laki_laki = DB::table('siswa')->where('jenis_kelamin', 'Laki-laki')->count();
        $siswa_perempuan = DB::table('siswa')->where('jenis_kelamin', 'Perempuan')->count();
        $siswa_all = Siswa::all(['id']);
        $tahun = '2020';
        $bulan = 'Januari';
        $bulans = Universe::bulanAll()
                    ->map(fn($bulan)=>$bulan['nama_bulan'])
                    ->map(function($bulan) use ($siswa_all, $tahun) {
                        return $siswa_all
                        ->map(fn($siswa)=>Universe::statusPembayaran($siswa->id, $tahun, $bulan))
                        ->filter(fn($status)=>$status=='DIBAYAR')
                        ->count();
                    });
        // dd($bulans);

    	return view('admin.dashboard', [
    		'total_siswa' => DB::table('siswa')->count(),
    		'total_kelas' => DB::table('kelas')->count(),
    		'total_admin' => DB::table('model_has_roles')->where('role_id', 1)->count(),
    		'total_petugas' => DB::table('petugas')->count(),
            'siswa_laki_laki' => $siswa_laki_laki,
            'siswa_perempuan' => $siswa_perempuan,
            'lunas' => $bulans,
            'tahun' => $tahun
    	]);
    }
}
