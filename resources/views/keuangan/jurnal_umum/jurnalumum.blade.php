@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
                <h1 class="h3 mb-2 text-black-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
                <h2 class="h5 mb-2 text-black-800" align="center">JURNAL UMUM</h2>
                <br>
                <br />
      @include('layouts.messages')
      <br>
                <!-- DataTales Example -->
  <div class="card shadow mb-4" id="jurnal1" style="background-color: #b3d1ff; width: 100%;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                <thead style="background-color: #FF6347;">
                    <tr>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Tanggal</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">No Bukti</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 15%;">Keterangan</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Nama Akun</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 5%;">Akun</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Nama Akun Bantu</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 5%;">Akun Bantu</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Debet</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kredit</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 15%;">Action</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                
                <tbody>
                    @foreach ($data as $ij)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->tanggal }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->no_bukti }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->keterangan }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->nama_akun }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->kode_akun }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->nama_akun_bantu }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->kode_akun_bantu }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->debit_jurnal }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->kredit_jurnal }}</td>
                        <td style="text-align: center;">
                            <div class="container mb-0">
                                <button data-toggle="modal" data-target="#editModal{{ $ij->id_jurnal_umum }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" style="font-size: 1.3rem; color:white; width: 10.3rem" role="button"></button>&nbsp;&nbsp;
                                <button data-toggle="modal" data-target="#my-modal{{ $ij->id_jurnal_umum }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>&nbsp;&nbsp;
                                <a href="/keuangan/jurnalumum/preview/{{ $ij->id_jurnal_umum }}">
                                <button class="bi bi-eye-fill detailbtn btn btn-info col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#myModal" style="font-size: 1.3rem; color:white;" role="button"></button></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br>
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

@foreach ($data as $ij)
<div id="my-modal{{ $ij->id_jurnal_umum }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">   
      <div class="modal-body p-0">
        <div class="card border-0 p-sm-3 p-2 justify-content-center">
          <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
          <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
          <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/keuangan/jurnalumum/{{ $ij->id_jurnal_umum }}" role="button">Delete</a></div><div class="col-auto"></div></div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($data as $ij)
<div class="modal fade" id="editModal{{ $ij->id_jurnal_umum }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); color:white;">
      <div class="modal-header text-white">
        <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
        <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-white">
        <form action="{{ url('/keuangan/jurnalumum/update',  $ij->id_jurnal_umum) }}" method="POST" id="editform">
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Tanggal Transaksi</label>
            <input class="form-control" name="tanggal" id="input" value="{{ $ij->tanggal }}" />
          </div>
          <div class="form-group">
            <label>No Bukti</label>
            <input type="text" name="no_bukti" class="form-control" required="required" value="{{ $ij->no_bukti }}">
          </div>
          <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" required="required">{{ $ij->keterangan }}</textarea>
          </div>

          <div class="form-group">
                    <label>Nama Akun</label>
                    <select name="kode_akun" class="form-select">
                        @foreach ($kodeakuns as $ka)
                        <option value="{{ $ka->kode_akun }}" {{ old('kode_akun', $ij->kode_akun) == $ka->kode_akun ? 'selected' : null}}>{{ $ka->nama_akun }}</option>
                        @endforeach
                    </select>
                </div>

        <div class="form-group">
                    <label>Nama Akun Bantu</label>
                    <select name="kode_akun_bantu" class="form-select">
                        @foreach ($akunbantus as $kb)
                        <option value="{{ $kb->kode_akun_bantu }}" {{ old('kode_akun_bantu', $ij->kode_akun_bantu) == $kb->kode_akun_bantu ? 'selected' : null}}>{{ $kb->nama_akun_bantu }}</option>
                        @endforeach
                    </select>
                </div>

            <div class="form-group">
            <label>Debit</label>
            <input type="number" name="debit_jurnal" class="form-control" required="required" value="{{ $ij->debit_jurnal }}">
          </div>

          <div class="form-group">
            <label>Kredit</label>
            <input type="number" name="kredit_jurnal" class="form-control" required="required" value="{{ $ij->kredit_jurnal }}">
          </div>
          
          <input type="number" name="saldo_jurnal" class="form-control" value="" hidden>
            
          <div class="form-group">
                    <label>Karyawan</label>
                    <select name="id_karyawan1" class="form-select">
                        @foreach ($karyawans as $kr)
                        <option value="{{ $kr->id_karyawan }}" {{ old('id_karyawan', $ij->id_karyawan1) == $kr->id_karyawan ? 'selected' : null}}>{{ $kr->nama_karyawan }}</option>
                        @endforeach
                    </select>
                </div>
                
          <br />
          <div class="modal-footer">
            <center><button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button></center>
            <center><button type="submit" class="btn btn-primary">Simpan</button></center>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</div>
@endforeach


@endsection