@extends('layouts.home.app')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<div class="container">
			<a href="/datamaster/jabatan">
					<button type="button" class="btn btn-secondary" style="float: right;">
  				<i class="bi bi-arrow-counterclockwise" width="20" height="20" fill="currentColor"></i>
              </button>
				</a>
			<br><br>
			<div class="container">
			<h3><center>Tambah Data Jabatan</center></h3>
			<br />
			
			<br />
			@include('layouts.messages')
			<br />
			<form action="{{ route('datamaster.storejabatan') }}" method="POST">
				@csrf
				<div class="form-group">
					<label>ID Jabatan</label>
					<input type="text" name="id_jabatan" value ="{{ 'JB-'.$kd}}" class="form-control" readonly>
				</div>
				<div class="form-group">
					<label>Nama Jabatan</label>
					<input type="text" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan">
				</div>
				
				
				<br />
				<center>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a class="btn btn-danger" href="/datamaster/jabatan" role="button">Cancel</a>
				</center>
			</form>
			</div>
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