@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
        <h1 class="h3 mb-2 text-black-800" style="padding-top: 15px;" align="center">KODE AKUN</h1>
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
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kode Akun</th>
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 25%;">Nama Akun</th>
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Tabel Bantuan</th>
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Pos Saldo</th>
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Pos Laporan</th>
                <th colspan="2" style="vertical-align: middle; color: white; text-align: center; width: 20%;">Saldo Awal</th>
                <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 15%;">Aksi</th>
                
              </tr>
              <tr>  
               <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Debit</th> 
               <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kredit</th> 
             </tr>
           </thead>
           <tfoot>
           </tfoot>
           
           <tbody>
             @foreach ($kodeakuns as $ka)
             <tr>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->kode_akun }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->nama_akun }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->tabel_bantuan }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->pos_saldo }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->pos_laporan }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->debit }}</td>
               <td style="vertical-align: middle; text-align: center;">{{ $ka->kredit }}</td>
               <td style="text-align: center;">
                <div class="container mb-0">
                  <button data-toggle="modal" data-target="#editModal{{ $ka->kode_akun }}" class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-6 mb-2" style="font-size: 1.3rem; color:white; width: 10.3rem;"  role="button"></button>&nbsp;&nbsp;
                  <button data-toggle="modal" data-target="#my-modal{{ $ka->kode_akun }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-6 mb-2" style="font-size: 1.3rem; color:white;" role="button"></button>
                </div>
              </td>
            </tr>
            @endforeach

            <?php 
                  $total_debits = DB::table('m_kode_akun')->sum('debit') ;
                  $total_kredits = DB::table('m_kode_akun')->sum('kredit') ;

                ?>
            <tr>
              <td colspan="5" style="vertical-align: middle; text-align: center;"><b>Jumlah</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_debits }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_kredits }}</b></td>
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

@foreach ($kodeakuns as $ka)
<div id="my-modal{{ $ka->kode_akun }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-0">   
      <div class="modal-body p-0">
        <div class="card border-0 p-sm-3 p-2 justify-content-center">
          <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
          <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
          <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/keuangan/kodeakun/{{ $ka->kode_akun }}" role="button">Delete</a></div><div class="col-auto"></div></div>
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
        <form action="{{ route('kodeakun.storedataakun') }}" method="POST" id="editform">
          @csrf
          <div class="form-group">
            <label>Kode Akun</label>
            <input type="text" name="kode_akun" class="form-control" placeholder="Kode Akun">
          </div>
          <div class="form-group">
            <label>Nama Akun</label>
            <input type="text" name="nama_akun" class="form-control" placeholder="Nama Akun">
          </div>
          <div class="form-group">
            <label>Tabel Bantuan</label>
            <input type="text" name="tabel_bantuan" class="form-control" placeholder="Tabel Bantuan">
          </div>

          <div class="form-group">
            <label>Kategori</label>
          <select name="kategori" class="form-select">
            <option value="" hidden>Kategori</option>
            <option value="Aset" >Aset/Harta</option>
            <option value="Liabilitas">Liabilitas/Hutang</option>
            <option value="Ekuitas">Ekuitas/Modal</option>
            <option value="Pendapatan">Pendapatan</option>
            <option value="Biaya">Biaya</option>
            <option value="Pendapatan Lain-Lain">Pendapatan Lain-Lain</option>
            <option value="Biaya Lain-Lain">Biaya Lain-Lain</option>
          </select>
</div>

          <div class="form-group">
          <label>Pos Saldo</label>
          <select name="pos_saldo" class="form-select">
            <option value="" hidden>Pos Saldo</option>
            <option value="Debit" >Debit</option>
            <option value="Kredit" >Kredit</option>
          </select>
            </div>

            <div class="form-group">
            <label>Pos Laporan</label>
          <select name="pos_laporan" class="form-select">
            <option value="" hidden>Pos Laporan</option>
            <option value="Neraca" >Neraca</option>
            <option value="Laba Rugi">Laba Rugi</option>
          </select>
</div>


          <div class="form-group">
            <label>Saldo Awal</label>
          </div>
          <div class="card shadow mb-4" style="background-color: orange; width: 100%;">
            <div class="card-body">
              <center>
                <div class="row text-center control-group afteraddmore">
                  <div class="col-xl-6">
                    <!-- Name input -->
                    <div class="form-outline">
                      <label class="form-label" for="form8Example3">Debit</label>
                      <input type="number" name="debit" value="{{old('debit')}}" class="form-control" />
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <!-- Name input -->
                    <div class="form-outline">
                      <label class="form-label" for="form8Example4">Kredit</label>
                      <input type="number" name="kredit" value="{{old('kredit')}}" class="form-control" />
                    </div>
                  </div>
                  
                </div>
              </center>

            </div>
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

@foreach ($kodeakuns as $ka)
<div class="modal fade" id="editModal{{ $ka->kode_akun }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); color:white;">
      <div class="modal-header text-white">
        <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
        <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body text-white">
        <form action="{{ url('/keuangan/kodeakun/update',  $ka->kode_akun) }}" method="POST" id="editform">
          {!! csrf_field() !!}
          <div class="form-group">
            <label>Kode akun</label>
            <input type="text" name="kode_akun" class="form-control" required="required" value="{{ $ka->kode_akun }}">
          </div>
          <div class="form-group">
            <label>Nama Akun</label>
            <input type="text" name="nama_akun" class="form-control" required="required" value="{{ $ka->nama_akun }}">
          </div>
          <div class="form-group">
            <label>Tabel Bantuan</label>
            <input type="text" name="tabel_bantuan" class="form-control" required="required" value="{{ $ka->tabel_bantuan }}">
          </div>

          <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select" required>
                        <option value="{{ $ka->kategori}}" hidden>{{ $ka->kategori}}</option>
            <option value="Aset" >Aset/Harta</option>
            <option value="Liabilitas">Liabilitas/Hutang</option>
            <option value="Ekuitas">Ekuitas/Modal</option>
            <option value="Pendapatan">Pendapatan</option>
            <option value="Biaya">Biaya</option>
                    </select>
                </div>

          <div class="form-group">
                    <label>Pos Saldo</label>
                    <select name="pos_saldo" class="form-select" required>
                        <option value="{{ $ka->pos_saldo}}" hidden>{{ $ka->pos_saldo}}</option>
                        <option value="Debit" >Debit</option>
                        <option value="Kredit" >Kredit</option>
                    </select>
                </div>

        <div class="form-group">
                    <label>Pos Laporan</label>
                    <select name="pos_laporan" class="form-select" required>
                        <option value="{{ $ka->pos_laporan}}" hidden>{{ $ka->pos_laporan}}</option>
                        <option value="Neraca" >Neraca</option>
                        <option value="Laba Rugi">Laba Rugi</option>
                    </select>
                </div>
            
          <div class="form-group">
            <label>Saldo Awal</label>
          </div>
          <div class="card shadow mb-4" style="background-color: orange; width: 100%;">
            <div class="card-body">
              <center>
                <div class="afteraddmore">
                  <div class="row text-center control-group">
                    <div class="col-xl-6">
                      <!-- Name input -->
                      <div class="form-outline">
                        <label class="form-label" for="form8Example3">Item</label>
                        <input type="number" name="debit" value="{{ $ka->debit }}" class="form-control" />
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <!-- Name input -->
                      <div class="form-outline">
                        <label class="form-label" for="form8Example4">Harga</label>
                        <input type="number" name="kredit" value="{{ $ka->kredit }}" class="form-control" />
                      </div>
                    </div>
                    
                  </div>
                </div>
                
              </center>
              <br><br>
              
              <br>

            </div>
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