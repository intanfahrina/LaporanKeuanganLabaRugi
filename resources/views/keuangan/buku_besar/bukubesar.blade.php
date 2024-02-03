@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
                <h1 class="h3 mb-2 text-black-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
                <h2 class="h3 mb-2 text-black-800" align="center">BUKU BESAR</h2>
            </div>
            <div class="col-md-6" style="background-color: #FF6347; width: 100%;text-align:center">
                <select class="form-select form-select-md filter" onchange="namaAkun()" id="namaakun" aria-label="Default select example"style="background-color: #FF6347; width: 100%;text-align:center">
                        <option value="" hidden>Pilih Nama Akun</option>
                        @foreach ($kodeakuns as $ka)
                        <option value="{{ $ka->kode_akun }}">{{ $ka->nama_akun }}</option>
                        @endforeach
              </select>
          </div>
          <div class="col-6 col-md-2" style="background-color: #FF6347; width: 100%;text-align:center"><i class="bi bi-caret-left-fill"></i>Pilih Akun</div>
          <div class="col-6 col-md-2" style="background-color: #FF6347; width: 100%;text-align:center">Bulan <i class="bi bi-caret-right-fill"></i> </div>
          <div class="col-md-2" style="background-color: #FF6347; width: 100%;text-align:center">
                <select class="form-select form-select-md" onchange="namaBulan()" id="namabulan" aria-label="Default select example"style="background-color: #FF6347; width: 100%;text-align:center">
                  <option value="" hidden>Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">Februari</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
              </select>
          </div>

      </div>
      
      <br />
      @include('layouts.messages')
  </div> <!-- end container Heading -->


  <!-- DataTales Example -->
  <div class="card shadow mb-4" style="background-color: #b3d1ff; width: 100%;">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" style="background-color: white; width: 100%;">
                <thead style="background-color: #FF6347;">
                    <tr>
                        <th style="vertical-align: middle; text-align: center; width: 15%;">Tanggal</th>
                        <th style="vertical-align: middle; text-align: center; width: 10%;">No Bukti</th>
                        <th style="vertical-align: middle; text-align: center; width: 25%;">Keterangan</th>
                        <th style="vertical-align: middle; text-align: center; width: 15%;">Debet</th>
                        <th style="vertical-align: middle; text-align: center; width: 15%;">Kredit</th>
                        <th style="vertical-align: middle; text-align: center; width: 20%;">Saldo</th>
                        
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                
                <tbody>
                   @foreach ($data as $ij)
                    <tr>
                        <td style="vertical-align: middle; text-align: center;">{{ tanggal_indonesia2($ij->tanggal) }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->no_bukti }}</td>
                        <td style="vertical-align: middle; text-align: center;">{{ $ij->keterangan }}</td>
                        <td style="vertical-align: middle; text-align: center;">Rp. {{ $ij->debit_jurnal }}</td>
                        <td style="vertical-align: middle; text-align: center;">Rp. {{ $ij->kredit_jurnal }}</td>
                        <td style="vertical-align: middle; text-align: center;">Rp. {{ $ij->saldo_jurnal }}</td>
                    </tr>
                @endforeach

                <?php 
                  $total_debit = DB::table('t_jurnal_umum')->sum('debit_jurnal') ;
                  $total_kredit = DB::table('t_jurnal_umum')->sum('kredit_jurnal') ;
                  $total_saldo = DB::table('t_jurnal_umum')->sum('saldo_jurnal') ;

                ?>
            <tr>
              <td colspan="3" style="vertical-align: middle; text-align: center;"><b>Jumlah</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_debit }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_kredit }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>{{ $total_saldo }}</b></td>
            </tr>
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



<script type="text/javascript">
    function namaAkun () {
        let namakun = $("#namaakun").val()
        $("#dataTable tbody").children().remove();
        if (namakun!='' && namakun!=null) {
            $.ajax({
            url: '{{ url('') }}/keuangan/listbukubesar/'+namakun,
            success: function(res){
                    let dataTable = '';
                    $.each(res, function(index, data){
                        dataTable+=`
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">${data.tanggal}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.no_bukti}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.keterangan}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.debit_jurnal}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.kredit_jurnal}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.saldo_jurnal}</td>
                            </tr>
                        `
                    })
                    $("#dataTable tbody").append(dataTable);
            }
        });
        }
    }
</script>

<script type="text/javascript">
    function namaBulan () {
        let namabulan = $("#namabulan").val()
        $("#dataTable tbody").children().remove();
        if (namabulan!='' && namabulan!=null) {
            $.ajax({
            url: '{{ url('') }}/keuangan/bulanbukubesar/'+namabulan,
            success: function(res){
                    let dataTable = '';
                    $.each(res, function(index, data){
                        dataTable+=`
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">${data.tanggal}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.no_bukti}</td>
                                <td style="vertical-align: middle; text-align: center;">${data.keterangan}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.debit_jurnal}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.kredit_jurnal}</td>
                                <td style="vertical-align: middle; text-align: center;">Rp. ${data.saldo_jurnal}</td>
                            </tr>
                        `
                    })
                    $("#dataTable tbody").append(dataTable);
            }
        });
        }
    }
</script>



@endsection