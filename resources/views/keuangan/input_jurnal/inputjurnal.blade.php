@extends('layouts.home.app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 80%; float: left;">
                <h1 class="h3 mb-2 text-black-800" style="padding-top: 15px;" align="center">JURNAL UMUM</h1>
                <br>
            </br>
@include('layouts.messages')
    </br>
                <form id="selectform" action="{{ route('keuangan.storeinputjurnal') }}" method="POST">
                	@csrf
				  <div class="form-group row">
				    <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
				    <div class="col-sm-10 input-group date" id="datetimepicker1">
				      <input class="form-control" name="tanggal" id="input" placeholder="Tanggal Transaksi" />
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword" class="col-sm-2 col-form-label">No Bukti</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" name="no_bukti" id="inputPassword" placeholder="No Bukti">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3" placeholder="Keterangan"></textarea>
				    </div>
				  </div>
				<div class="form-group row">
                    <label class="col-sm-2 col-form-label">Karyawan</label>
                    <div class="col-sm-10">
                    <select name="id_karyawan1" class="form-select">
                    	<option value="" hidden>Karyawan</option>
                        @foreach ($karyawans as $kr)
                        <option value="{{ $kr->id_karyawan }}">{{ $kr->nama_karyawan }}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                
				<input type="number" name="saldo_jurnal" value="" hidden>
                <div class="card shadow mb-4" style="background-color: orange; width: 100%;">
                <div class="card-body">
                <center>
				<div class="row text-center control-group afteraddmore">
				  <div class="col-xl-3">
				    <!-- Name input -->
				    <div class="form-outline">
				    	<label class="form-label" for="form8Example3">Nama Akun</label>
				    	<select name="kode_akun[]" class="form-select">
                        <option value="" hidden>Nama Akun</option>
                        @foreach ($kodeakuns as $ka)
                        <option value="{{ $ka->kode_akun }}">{{ $ka->nama_akun }}</option>
                        @endforeach
                    </select>
				    </div>
				  </div>
				  <div class="col-xl-3">
				    <!-- Name input -->
				    <div class="form-outline">
				    	<label class="form-label" for="form8Example4">Nama Akun Bantu</label>
				    	<select name="kode_akun_bantu[]" class="form-select">
                        <option value="" hidden>Nama Akun Bantu</option>
                        @foreach ($akunbantus as $kb)
                        <option value="{{ $kb->kode_akun_bantu }}">{{ $kb->nama_akun_bantu }}</option>
                        @endforeach
                    </select>
				    </div>
				  </div>
				  <div class="col-xl-2">
				    <!-- Name input -->
				    <div class="form-outline">
				    	<label class="form-label" for="form8Example4">Debit</label>
				      <input type="number" name="debit_jurnal[]" value="{{old('debit_jurnal')}}" class="form-control" />
				    </div>
				  </div>
				  <div class="col-xl-2">
				    <!-- Name input -->
				    <div class="form-outline">
				    	<label class="form-label" for="form8Example4">Kredit</label>
				      <input type="number" name="kredit_jurnal[]" value="{{old('kredit_jurnal')}}" class="form-control" />
				    </div>
				  </div>
				  <div class="col">
				    <!-- Email input -->
				    <div class="col" style="margin: 0; position: absolute; top: 65%; -ms-transform: translateY(-35%); transform: translateY(-35%);">
				    	<button class="btn btn-success addmore" type="button">
              				<i class="bi bi-plus-circle-fill"></i> Add
            			</button>
				    </div>
				  </div>
				</div>
				</center>

			</div>
			</div>

			<br><br>
			<div class="container" style="text-align: right;">
            	<br>
            	<div class="container mb-0">
                    <button type="submit" class="bi bi-pencil-square btn btn-success btn-lg" style="font-size: 1.3rem; color:white;">&nbsp;Simpan</button>&nbsp;
                    <button type="reset" class="bi bi-trash-fill btn btn-danger btn-lg" style="font-size: 1.2rem; color:white;" role="button">&nbsp;Reset</button>&nbsp;
                </div>
            </div>
            <br>
			</form>
            </div>

      </div>
      
  </div> <!-- end container Heading -->

</div>
<!-- /.container-fluid -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- End of Main Content -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
	$('.addmore').on('click', function(){
		addmore();
	});
	function addmore(){
		var afteraddmore = '<center><div class="copy hide"><div class="row text-center control-group"><div class="col-xl-3"><!-- Name input --><div class="form-outline"><label class="form-label" for="form8Example3">Nama Akun</label><select name="kode_akun[]" class="form-select" required><option value="" hidden>Nama Akun</option>@foreach ($kodeakuns as $ka)<option value="{{ $ka->kode_akun }}">{{ $ka->nama_akun }}</option>@endforeach</select></div></div><div class="col-xl-3"><!-- Name input --><div class="form-outline"><label class="form-label" for="form8Example4">Nama Akun Bantu</label><select name="kode_akun_bantu[]" class="form-select" required><option value="" hidden>Nama Akun Bantu</option>@foreach ($akunbantus as $kb)<option value="{{ $kb->kode_akun_bantu }}">{{ $kb->nama_akun_bantu }}</option>@endforeach</select></div></div><div class="col-xl-2"><!-- Name input --><div class="form-outline"><label class="form-label" for="form8Example4">Debit</label><input type="number" name="debit_jurnal[]" value="{{old('debit_jurnal')}}" class="form-control" /></div></div><div class="col-xl-2"><!-- Name input --><div class="form-outline"><label class="form-label" for="form8Example4">Kredit</label><input type="number" name="kredit_jurnal[]" value="{{old('kredit_jurnal')}}" class="form-control" /></div></div><div class="col-xl-2"><!-- Email input --><div class="col" style="margin: 0; position: absolute; top: 65%; -ms-transform: translateY(-35%); transform: translateY(-35%);"><button class="btn btn-danger remove" type="button"><i class="bi bi-dash-circle-fill"></i> Remove</button></div></div></div></div></center>';
		$('.afteraddmore').append(afteraddmore);
	};
	$('.remove').live('click', function(){
		$(this).parent().parent().parent().remove();
	});
</script>


@endsection