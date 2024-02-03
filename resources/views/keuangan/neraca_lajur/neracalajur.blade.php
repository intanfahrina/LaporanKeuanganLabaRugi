@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
        <h1 class="h3 mb-2 text-black-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
        <h2 class="h3 mb-2 text-black-800" align="center">NERACA LAJUR</h2>
        <h3 class="h5 mb-1 text-black-400" align="center">TAHUN 2022</h3>
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
              <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kode Akun</th>
              <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Nama Akun</th>
              <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Pos Saldo</th>
              <th colspan="2" style="vertical-align: middle; color: white; text-align: center; width: 20%;">Neraca Saldo</th>
              <th rowspan="2" style="vertical-align: middle; color: white; text-align: center; width: 10%;">Pos Laporan</th>
              <th colspan="2" style="vertical-align: middle; color: white; text-align: center; width: 20%;">Laba Rugi</th>
              <th colspan="2" style="vertical-align: middle; color: white; text-align: center; width: 20%;">Neraca</th>
            </tr>

            <tr>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Debet</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kredit</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Debet</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kredit</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Debet</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 10%;">Kredit</th>
            </tr>
            
           
          </thead>
          
          <tbody>
            @foreach ($neraca as $dt)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->nama_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->pos_saldo }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $dt->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $dt->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $dt->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $dt->kredit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->pos_laporan }}</td>
                
                <td style="vertical-align: middle; text-align: center;">-</td>
                <td style="vertical-align: middle; text-align: center;">-</td>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
              </tr>
            @endforeach

            @foreach ($laba_rugi as $dt)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->nama_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->pos_saldo }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $dt->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $dt->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $dt->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $dt->kredit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $dt->pos_laporan }}</td>
                
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
                <td style="vertical-align: middle; text-align: center;">-</td>
                <td style="vertical-align: middle; text-align: center;">-</td>
              </tr>
            @endforeach

            <?php 
                  $total_debit = DB::table('t_jurnal_umum')->sum('debit_jurnal') ;
                  $tos_debit = DB::table('m_kode_akun')->sum('debit');
                  $tos_kredit = DB::table('m_kode_akun')->sum('kredit');
                  $total_kredit = DB::table('t_jurnal_umum')->sum('kredit_jurnal') ;

                  $jum_deb = $tos_debit + $total_debit - $total_kredit;
                  $jum_kre = $tos_kredit - $total_debit + $total_kredit;

                  $totals_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 9999])->sum('debit_jurnal') ;
                  $totals_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 9999])->sum('kredit_jurnal') ;
                  $toss_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 9999])->sum('debit');
                  $toss_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 9999])->sum('kredit');
                  $lab_deb = $toss_debit + $totals_debit - $totals_kredit;
                  $lab_kre = $toss_kredit - $totals_debit + $totals_kredit;
                  
                  $totalr_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 3999])->sum('debit_jurnal') ;
                  $totalr_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 3999])->sum('kredit_jurnal') ;
                  $tosr_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 3999])->sum('debit');
                  $tosr_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 3999])->sum('kredit');
                  $labr_deb = $tosr_debit + $totalr_debit - $totalr_kredit;
                  $labr_kre = $tosr_kredit - $totalr_debit + $totalr_kredit;

                  $total_saldo = DB::table('t_jurnal_umum')->sum('saldo_jurnal') ;

                ?>
            <tr>
              <td colspan="3" style="vertical-align: middle; text-align: center;"><b>Jumlah</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $jum_deb }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $jum_kre }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>&nbsp;</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $lab_deb }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $lab_kre }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labr_deb }}</b></td>
              <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labr_kre }}</b></td>
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








@endsection