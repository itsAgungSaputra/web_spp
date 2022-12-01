@extends('layouts.backend.app')
@section('title', 'Home')
@section('content_title', 'Home')
@section('content')
<x-alert></x-alert>
<div class="row">
	<div class="col-lg text-center rounded-4">
		<div class="jumbotron rounded-4 shadow-lg " style="height:70vh;">
		@role('admin|petugas')
		  <h1 class="display-4">Hello, {{ Universe::petugas()->nama_petugas }}!</h1>
		  <p>ISI DENGAN STATISTIK</p>
		@endrole
		@role('siswa')
		  <h1 class="display-4">Hello, {{ Universe::siswa()->nama_siswa }}!</h1>
		@endrole
		  <p class="lead">Selamat datang di SIMAPES SD LAB.</p>
		  
		</div>
	</div>
</div>
@endsection