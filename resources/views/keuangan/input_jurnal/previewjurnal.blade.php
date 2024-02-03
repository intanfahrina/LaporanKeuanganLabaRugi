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

                <form id="selectform">
                	
				  <div class="form-group row">
				    <label for="staticEmail" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
				    <div class="col-sm-10 input-group date" id="datetimepicker1">
				      <input class="form-control" name="tanggal" id="input" value="{{ $data->tanggal }}" />
				    </div>
				  </div>

                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">No Bukti</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="no_bukti" id="inputPassword" value="{{ $data->no_bukti }}">
                    </div>
                  </div>
				  
				  <div class="form-group row">
				    <label for="inputPassword" class="col-sm-2 col-form-label">Keterangan</label>
				    <div class="col-sm-10">
				      <textarea class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="3" placeholder="Keterangan">{{ $data->keterangan }}</textarea>
				    </div>
				  </div>

				  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="background-color: #b3d1ff; width: 100%;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" style="background-color: white; width: 100%;">
                <thead style="background-color: #FF6347;">
                    <tr>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 30%;">Nama Akun</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 30%;">Nama Akun Bantu</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Debit</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Kredit</th>
                        
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                	<tr>
                   <td style="vertical-align: middle; text-align: center;">{{ $data->nama_akun }}</td>
	               <td style="vertical-align: middle; text-align: center;">{{ $data->nama_akun_bantu }}</td>
	               <td style="vertical-align: middle; text-align: center;">{{ $data->debit_jurnal }}</td>
	               <td style="vertical-align: middle; text-align: center;">{{ $data->kredit_jurnal }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

            <br>
			</form>
            </div>
      </div>
      
  </div> <!-- end container Heading -->

</div>
<!-- /.container-fluid -->
<br><br><br>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- End of Main Content -->




@endsection