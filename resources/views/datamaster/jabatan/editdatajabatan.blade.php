@extends('layouts.home.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="container">
			<br>
			<h2><center>Edit Data Jabatan</center></h2>
			<br />
			
			<br />
			@include('layouts.messages')
			<br />
			@foreach ($jabatans as $jb)
			<form action="{{ url('/datamaster/jabatan/update',  $jb->id_jabatan) }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>ID Jabatan</label>
					<input type="text" name="id_jabatan" class="form-control" required="required" value="{{ $jb->id_jabatan }}" disabled="disabled">
				</div>
				<div class="form-group">
					<label>Nama Jabatan</label>
					<input type="text" name="nama_jabatan" class="form-control" required="required" value="{{ $jb->nama_jabatan }}">
				</div>
				
				<br />
				<center><button type="submit" class="btn btn-primary">Simpan</button></center>
			</form>
			@endforeach
			</div>
			<br>
		</div>
	</div>
</div>

@endsection