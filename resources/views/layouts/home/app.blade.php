<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Surat dan Laporan Keuangan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('images/logot.png')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Custom fonts for this template-->
    <link href="{{URL::asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- CSS DATATABLES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css?family=Rubik&display=swap');



button{
    font-size: calc(12px + (16 - 12) * ((100vw - 360px) / (1600 - 300))) !important;
}


button:focus {
    box-shadow: none !important;
    outline-width: 0;
}

.card{
    border-radius :12px;
    width: calc(500px + 10 * ((100vw - 320px) / 680)) ;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.8) ;
}

.card-header{
    border-radius :12px !important;
}

.modal-body .btn-danger{
    border-radius: 11px ;
    box-shadow:  0px 5px 5px rgba(0, 0, 0, 0.2) ;
}
 .btn-light{
     background: transparent !important;
     border:0px !important;
 }

 .btn-light:hover{
    border-color:#fff !important;
 }

 .btn-light:active{
    border-color:#fff !important;
 }

@media (max-width: 526px) {
    .card{
        width: unset;
    }
}

#judul1{
            text-align:center;
        }

        #halaman1{ /* Opera 10.5+ */
            -webkit-transform: scale(0.95); /* Saf3.1+, Chrome */
     -moz-transform: scale(0.95); /* FF3.5+ */
      -ms-transform: scale(0.95); /* IE9 */
       -o-transform: scale(0.95); 
          transform: scale(0.95);
          box-sizing:border-box;
            width: 1000px; 
            height: auto;
            margin: 0; 
            position: relative; 
            border: 1px solid; 
            padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px;
            background-image: url("/images/b.jpg");
            background-size: 997px 103%;
        }
        
        .p2{
            text-align: justify;
            font-family: Arial;
            font-size: 13pt;
        }

        .p1{
            text-align: left;
            font-family: Arial;
            font-size: 15pt;
        }

        #jurnal1{
            font-size: 8pt;
        }


    </style>

    <!-- datepicker -->

    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/rome.css')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/bootstrap.min.css')}}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ URL::asset('datepicker/css/style.css')}}">

</head>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%);" id="accordionSidebar">
            
            <!-- Sidebar - Brand -->    
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-0">
                    <img src="{{ URL::asset('images/logot.png'); }}" width="60" height="60" alt="" />
                </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ set_active('home') }}">
                <a class="nav-link" href="/home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="color: white;">Dashboard</span></a>
            </li>

            <li class="nav-item {{ set_active(['datamaster.dashboard', 'datamaster.client', 'datamaster.jabatan', 'datamaster.karyawan', 'datamaster.tipesurat', 'datamaster.tambahdatajabatan']) }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-coins"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapsePages" class="collapse {{ set_show(['datamaster.dashboard', 'datamaster.client', 'datamaster.jabatan', 'datamaster.karyawan', 'datamaster.tipesurat', 'datamaster.tambahdatajabatan']) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Data Master :</h6>
                        <a class="collapse-item {{ set_active(['datamaster.jabatan', 'datamaster.tambahdatajabatan']) }}" href="/datamaster/jabatan">Jabatan</a>
                        <a class="collapse-item {{ set_active('datamaster.karyawan') }}" href="/datamaster/karyawan">Karyawan</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ set_active(['keuangan.home', 'keuangan.kodeakun', 'keuangan.kodeakunbantu', 'keuangan.bukubesar', 'keuangan.jurnalumum', 'keuangan.inputjurnal', 'keuangan.bukupembantu', 'keuangan.perubahanmodal', 'keuangan.neracalajur', 'keuangan.neraca', 'keuangan.labarugi', 'keuangan.previewjurnalumum']) }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan Keuangan</span>
                </a>
                <div id="collapseUtilities" class="collapse {{ set_show(['keuangan.home', 'keuangan.kodeakun', 'keuangan.kodeakunbantu', 'keuangan.jurnalumum', 'keuangan.inputjurnal', 'keuangan.bukubesar', 'keuangan.bukupembantu', 'keuangan.perubahanmodal', 'keuangan.neracalajur', 'keuangan.previewjurnalumum', 'keuangan.neraca', 'keuangan.labarugi']) }}" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu Laporan Keuangan :</h6>
                        <a class="collapse-item {{ set_active('keuangan.kodeakun') }}" href="/keuangan/kodeakun">Kode Akun</a>
                        <a class="collapse-item {{ set_active('keuangan.inputjurnal') }}" href="/keuangan/inputjurnal">Input Jurnal</a>
                        <a class="collapse-item {{ set_active('keuangan.kodeakunbantu') }}" href="/keuangan/kodeakunbantu">Kode Bantu</a>
                        <a class="collapse-item {{ set_active(['keuangan.jurnalumum', 'keuangan.previewjurnalumum']) }}" href="/keuangan/jurnalumum">Jurnal Umum</a>
                        <a class="collapse-item {{ set_active('keuangan.bukubesar') }}" href="/keuangan/bukubesar">Buku Besar</a>
                        <a class="collapse-item {{ set_active('keuangan.bukupembantu') }}" href="/keuangan/bukupembantu">Buku Pembantu</a>
                        <a class="collapse-item {{ set_active('keuangan.neracalajur') }}" href="/keuangan/neracalajur">Neraca Lajur</a>
                        <a class="collapse-item {{ set_active('keuangan.labarugi') }}" href="/keuangan/labarugi">Laba Rugi</a>
                        <a class="collapse-item {{ set_active('keuangan.neraca') }}" href="/keuangan/neraca">Neraca</a>
                        <a class="collapse-item {{ set_active('keuangan.perubahanmodal') }}" href="/keuangan/perubahanmodal">Perubahan Modal</a>
                    </div>
                </div>
            </li>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" style="color: orange;">
                        <i class="fa fa-bars"></i>
                    </button>

                    <h4 class="h4 mb-0 text-gray-800">Laporan Keuangan Laba Rugi</h4>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <div class="d-flex">
              
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <b>
                <li class="nav-item dropdown no-arrow" style="color: floralwhite;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black;"> 
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('actionlogout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off"></i> &nbsp; {{ __('Logout') }}
                        </a>

                    <form id="logout-form" action="{{ route('actionlogout') }}" class="d-none">
                        @csrf
                    </form>
                    </div>
                </li>
                </b>
              </ul>
            </div>
            </div>
                </div>

                    </ul>
                    
                </nav>
    <!-- End of Topbar -->
            

    <!-- Page content-->
    @yield('content')

    </div>
                    
    <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2024 Laporan Keuangan Laba Rugi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    </div>       

    <!-- Bootstrap core JavaScript-->
    <script src="{{URL::asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{URL::asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{URL::asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{URL::asset('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{URL::asset('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{URL::asset('js/demo/chart-pie-demo.js')}}"></script>

    <script src="{{URL::asset('js/demo/datatables-demo.js')}}"></script>
    <script src="{{URL::asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- DATATABLES --> 
     <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
       <script type="text/javascript" language="javascript">
           $(document).ready(function () {
           $('#datatab').DataTable();
            });
       </script>

    <script src="{{ URL::asset('datepicker/js/popper.min.js')}}"></script>
    <script src="{{ URL::asset('datepicker/js/rome.js')}}"></script>

    <script src="{{ URL::asset('datepicker/js/main.js')}}"></script>

    @stack('scripts')
    
</body>

</html>