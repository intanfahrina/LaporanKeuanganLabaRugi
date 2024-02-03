@extends('layouts.home.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="container">
			<br>
			<h2><center>Tambah Data Karyawan</center></h2>
			<br />
			
			<br />
			@include('layouts.messages')
			<br />
			<form action="{{ route('datamaster.storekaryawan') }}" method="POST">
				@csrf
				<div class="form-group">
					<label>ID Karyawan</label>
					<input type="text" name="id_karyawan" class="form-control" placeholder="ID Karyawan">
				</div>
				<div class="form-group">
					<label>ID Jabatan</label>
					<select name="id_jabatan" class="form-select" required>
	  					<option value="" hidden>ID Jabatan</option>
	  					@foreach ($jabatans as $jb)
	 					<option value="{{ $jb->id_jabatan }}">{{ $jb->nama_jabatan }}</option>
	 					@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Nama Karyawan</label>
					<input type="text" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" placeholder="Email"></input>
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" placeholder="Telepon">
				</div>
				<div class="form-group">
					<label>Tanggal Mulai Bekerja</label>
					<input id="datepicker" name="tgl_mulai_bekerja" placeholder="Tanggal Mulai Bekerja" />
				</div>
				<div class="form-group">
					<label>Tanggal Selesai Bekerja</label>
					<input id="datepicker1" name="tgl_selesai_bekerja" placeholder="Tanggal Selesai Bekerja" />
				</div>
				
				
				<br />
				<center>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a class="btn btn-danger" href="/datamaster/karyawan" role="button">Cancel</a>
				</center>
			</form>
			</div>
			<br>
		</div>
	</div>
</div>

<script>
        $('#datepicker').datepicker({
        	format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('#datepicker1').datepicker({
        	format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection