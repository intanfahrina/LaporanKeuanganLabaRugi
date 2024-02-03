@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
                <h1 class="h3 mb-2 text-black-800" style="padding-top: 15px;" align="center">KODE PEMBANTU PIUTANG DAN UTANG</h1>
                <br>
                <a data-toggle="modal" data-target="#addModal">
                        <button class="bi bi-plus-circle-fill btn" style="background-color:green; color:white;"> Tambah Data</button>
                    </a>
</br>
<br />
      @include('layouts.messages')
</br>
                <!-- DataTales Example -->
  <div class="card shadow mb-4" style="background-color: #b3d1ff; width: 100%;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                <thead style="background-color: #FF6347;">
                    <tr>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kode Akun</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Nama Akun</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Tabel Bantuan</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Saldo Normal</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kategori</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Saldo Awal</th>
                        <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Aksi</th>
                        
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                
                <tbody>
                @foreach ($akunbantus as $kb)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->kode_akun_bantu }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->nama_akun_bantu }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->tabel_bantuan }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->saldo_normal }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->kategori }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $kb->saldo_awal }}</td>
                        <td style="text-align: center;">
                            <div class="container mb-0">
                                <button data-toggle="modal" data-target="#editModal{{ $kb->kode_akun_bantu }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" style="font-size: 1.3rem; color:white; width: 10.3rem" role="button"></button>&nbsp;&nbsp;
                                <button data-toggle="modal" data-target="#my-modal{{ $kb->kode_akun_bantu }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                <?php 
                  $total_saldo_awal = DB::table('m_kode_bantu')->sum('saldo_awal') ;

                ?>
            <tr>
              <td colspan="5" style="vertical-align: middle; text-align: center;"><b>Jumlah</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_saldo_awal }}</b></td>
              <td style="vertical-align: middle; text-align: center;">&nbsp;</td>
            </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br><br><br><br><br><br><br><br>
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


@foreach ($akunbantus as $kb)
    <div id="my-modal{{ $kb->kode_akun_bantu }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/keuangan/kodeakunbantu/{{ $kb->kode_akun_bantu }}" role="button">Delete</a></div><div class="col-auto"></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach

<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); color:white;">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ route('kodebantu.storedataakunbantu') }}" method="POST" id="editform">
                @csrf
                <div class="form-group">
                    <label>Kode Akun Bantu </label>
                    <input type="text" name="kode_akun_bantu" class="form-control" placeholder="Kode Akun Bantu">
                </div>
                <div class="form-group">
                    <label>Nama Akun</label>
                    <input type="text" name="nama_akun_bantu" class="form-control" placeholder="Nama Akun">
                </div>
                <div class="form-group">
                    <label>Tabel Bantuan</label>
                    <input type="text" name="tabel_bantuan" class="form-control" placeholder="Tabel Bantuan">
                </div>
                <div class="form-group">
                  <label>Saldo Normal</label>
                  <select name="saldo_normal" class="form-select">
                    <option value="" hidden>Saldo Normal</option>
                    <option value="Debit" >Debit</option>
                    <option value="Kredit" >Kredit</option>
                  </select>
                </div>
                <div class="form-group">
                    <label>Saldo Awal</label>
                    <input type="text" name="saldo_awal" class="form-control" placeholder="Saldo Awal">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" placeholder="Kategori">
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

    @foreach ($akunbantus as $kb)
    <div class="modal fade" id="editModal{{ $kb->kode_akun_bantu }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); color:white;">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ url('/keuangan/kodeakunbantu/update',  $kb->kode_akun_bantu) }} " method="POST" id="editform">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Kode Akun Bantu</label>
                    <input type="text" name="kode_akun_bantu" class="form-control" required="required" value="{{ $kb->kode_akun_bantu }}">
                </div>
                <div class="form-group">
                    <label>Nama Akun</label>
                    <input type="text" name="nama_akun_bantu" class="form-control" required="required" value="{{ $kb->nama_akun_bantu }}">
                </div>
                <div class="form-group">
                    <label>Tabel Bantuan</label>
                    <input type="text" name="tabel_bantuan" class="form-control" required="required" value="{{ $kb->tabel_bantuan }}">
                </div>
                <div class="form-group">
                    <label>Saldo Normal</label>
                    <select name="saldo_normal" class="form-select" required>
                        <option value="{{ $kb->saldo_normal}}" hidden >{{ $kb->saldo_normal}}</option>
                        <option value="Debit">Debit</option>
                        <option value="Kredit">Kredit</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Saldo Awal</label>
                    <input type="text" name="saldo_awal" class="form-control" required="required" value="{{ $kb->saldo_awal }}">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" required="required" value="{{ $kb->kategori }}">
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