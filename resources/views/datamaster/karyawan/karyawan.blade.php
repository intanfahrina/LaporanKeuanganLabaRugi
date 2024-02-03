@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="container">
                    <h2 class="h3 mb-2 text-gray-800">Karyawan</h2>
                    <br />
                @include('layouts.messages')
                <br />
                    <a data-toggle="modal" data-target="#addModal">
                        <button class="bi bi-plus-circle-fill btn" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); color:white;"> Tambah Data</button>
                    </a>
                    </div>
                    <br/>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle; text-align: center; width: 10%;">No.</th>
                                            <th style="vertical-align: middle; text-align: center; width: 35%;">Nama Karyawan</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Email</th>
                                            <th style="vertical-align: middle; text-align: center; width: 15%;">Telepon</th>
                                            <th style="vertical-align: middle; text-align: center; width: 20%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php $no=1; ?>
                                    @foreach ($karyawans as $kr)
                                        <tr>
                                            <td style="vertical-align: middle; text-align: center;">{{$no++}}.</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $kr->nama_karyawan }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $kr->email }}</td>
                                            <td style="vertical-align: middle; text-align: center;">{{ $kr->telepon }}</td>
                                            <td style="text-align: center;">
                                                <div class="container mb-0">
                                                <button class="bi bi-pencil-square editbtn btn btn-warning col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#editModal{{ $kr->id_karyawan }}" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                <button data-toggle="modal" data-target="#my-modal{{ $kr->id_karyawan }}" class="bi bi-trash-fill btn btn-danger col-xl-3 col-md-4 mb-2" style="font-size: 1.2rem; color:white;" role="button"></button>
                                                <button class="bi bi-eye-fill detailbtn btn btn-info col-xl-3 col-md-4 mb-2" data-toggle="modal" data-target="#myModal{{ $kr->id_karyawan }}" style="font-size: 1.3rem; color:white;" role="button"></button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


            <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
            <!-- End of Main Content -->
    @foreach ($karyawans as $kr)
    <div id="my-modal{{ $kr->id_karyawan }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">   
                <div class="modal-body p-0">
                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                        <div class="card-header pb-0 bg-white border-0 "><div class="row"><div class="col ml-auto"><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button></div> </div>
                        <p class="font-weight-bold mb-2"> Are you sure you wanna delete this ?</p><p class="text-muted "> These changes will be visible on your portal and the data will be deleted.</p>     </div>
                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0"> 
                            <div class="row justify-content-end no-gutters"><div class="col-auto"><button type="button" class="btn btn-light text-muted" data-dismiss="modal">Cancel</button><a class="btn btn-danger px-4" href="/datamaster/karyawan/{{ $kr->id_karyawan}}" role="button">Delete</a></div><div class="col-auto"></div></div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($data as $item)
    <!-- Modal Detail -->
    <div id="myModal{{ $item->id_karyawan }}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
            <!-- konten modal-->
            <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);">
                <!-- heading modal -->
                <div class="modal-header text-white">
                <h4>Detail Data Karyawan</h4>
                    <button type="button" style="color: white;" class="close" data-dismiss="modal">&times;</button>
                    <!-- <h4 class="modal-title">Ini adalah heading dari Modal</h4> -->
                </div>
                <!-- body modal -->
                <div class="modal-body">
                   
                <div class="row">
                    <div class="col-lg-12">
                    <table class="table table-bordered table-hover" style="background-color: white;">
                    <thead>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{ $item->nama_jabatan }}</td>
                        </tr>
                        <tr>
                        <th>Nama Karyawan</th>
                        <td>{{ $item->nama_karyawan }}</td>
                        </tr>
                        <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                        <th>Telepon</th>
                        <td>{{ $item->telepon }}</td>
                        </tr>
                        <tr>
                        <th>Tanggal Mulai Bekerja</th>
                        <td>{{ $item->tgl_mulai_bekerja }}</td>
                        </tr>
                        <tr>
                        <th>Tanggal Selesai Bekerja</th>
                        <td>{{ $item->tgl_selesai_bekerja }}</td>
                        </tr>
                    </thead>
                    </table>
                    </div>
                    </div>
                 </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($karyawans as $kr)
    <div class="modal fade" id="editModal{{ $kr->id_karyawan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
                    <button type="button" style="color: white;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ url('/datamaster/karyawan/update',  $kr->id_karyawan) }}" method="POST" id="editform">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="id_jeniskelamin" class="form-select" required>
                        @foreach ($jabatans as $jb)
                            <option value="{{ $jb->id_jabatan }}" {{ old('id_jabatan', $kr->id_jabatan) == $jb->id_jabatan ? 'selected' : null}}>{{ $jb->nama_jabatan }}</option>
                        @endforeach
                    </select>
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
                    <input class="datepicker3"  name="tgl_mulai_bekerja" required="required" value="{{ $kr->tgl_mulai_bekerja }}">
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai Bekerja</label>
                    <input class="datepicker2" name="tgl_selesai_bekerja" required="required" value="{{ $kr->tgl_selesai_bekerja }}">
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


    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);">
                <div class="modal-header text-white">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body text-white">
                <form action="{{ route('datamaster.storekaryawan') }}" method="POST" id="editform">
                @csrf
                <div class="form-group">
                    <label>ID Karyawan</label>
                    <input type="text" name="id_karyawan" value ="{{ 'KR-'.$kd}}" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="id_jabatan" class="form-select" required>
                        <option value="" hidden>Jabatan</option>
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
                <div class="modal-footer">
                <center><button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button></center>
                <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </div>
            </form>
            </div>
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
<script>
        $('.datepicker3').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>
<script>
        $('.datepicker2').datepicker({
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap4'
        });
    </script>

@endsection