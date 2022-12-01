@extends('layouts.backend.app')
@section('title', 'Pembayaran')
@section('content_title', 'Pembayaran Online')
@section('content')
        <link rel="stylesheet" type="text/css" href="{{ url('style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">Isi Data siswa</div>
			<div class="card-body">
				<form action="test" method="GET">
                    <div class="formcontainer">
                    <hr/>
                    <div class="container">
                      <label for="uname"><strong>Nama Siswa</strong></label>
                      <input type="text" placeholder="Masukan nama" name="uname" required>
                      <label for="email"><strong>Email</strong></label>
                      <input type="text" placeholder="Masukan email" name="email" required>
                      <label for="nomor"><strong>Nomor Hp</strong></label>
                      <input type="text" placeholder="Masukan Nomor Hp" name="nomor" required>
                      <label for="email"><strong>NISN</strong></label>
                      <input type="text" placeholder="Masukan NISN" name="NISN" required>
                      <label for="thn_byr"><strong>Tahun Bayar</strong></label>
                      <input type="text" placeholder="Masukan Tahun Bayar" name="thn_bayar" required>
                      <label for="bulan"><strong>Untuk Bulan</strong></label>
                      <input type="text" placeholder="Masukan bulan" name="bulan" required>
                      <label for="kelas"><strong>Kelas</strong></label>
                      <input type="text" placeholder="Masukan Kelas" name="kelas" required>
                    </div>
                    <button type="submit">Lanjut</button>
                    @if(session('alert-success'))
                    <script>alert("{{ session('alert-success') }}")</script>
                    @elseif(session('alert-failed'))
                    <script>alert("{{ session('alert-failed') }}")</script>
                    @endif
                  </form>
			</div>
		</div>
	</div>
</div>
@endsection