@extends('layouts.home.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="container">
			<br>
			<h2><center>Edit Data Karyawan</center></h2>
			<br />
			
			<br />
			@include('layouts.messages')
			<br />
			@foreach ($karyawans as $kr)
			<form action="{{ url('/datamaster/karyawan/update',  $kr->id_karyawan) }}" method="POST">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>ID Karyawan</label>
					<input type="text" name="id_karyawan" class="form-control" required="required" value="{{ $kr->id_karyawan }}" disabled="disabled">
				</div>
				<div class="form-group">
					<label>ID Jabatan</label>
					<input type="text" name="id_jabatan" class="form-control" required="required" value="{{ $kr->id_jabatan }}">
				</div>
				<div class="form-group">
					<label>Nama Karyawan</label>
					<input type="text" name="nama_karyawan" class="form-control" required="required" value="{{ $kr->nama_karyawan }}">
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" class="form-control" required="required" value="{{ $kr->email }}"></input>
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" required="required" value="{{ $kr->telepon }}">
				</div>
				<div class="form-group">
					<label>Tanggal Mulai Bekerja</label>
					<input type="text" name="tgl_mulai_bekerja" class="form-control" required="required" value="{{ $kr->tgl_mulai_bekerja }}">
				</div>
				<div class="form-group">
					<label>Tanggal Selesai Bekerja</label>
					<input type="text" name="tgl_selesai_bekerja" class="form-control" required="required" value="{{ $kr->tgl_selesai_bekerja }}">
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

<script>
        $('#datepicker').datepicker({
        	format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>

@endsection