@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
        <h1 class="h3 mb-2 text-black-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
        <h2 class="h3 mb-2 text-black-800" align="center">PERUBAHAN POSISI KEUANGAN</h2>
        <h3 class="h5 mb-1 text-black-400" align="center">Tahun 2022</h3>
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
                <th style="vertical-align: middle; color: white; text-align: center; width: 20%;">Kode Akun</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 50%;">Nama Akun</th>
                <th style="vertical-align: middle; color: white; text-align: center; width: 30%;">Jumlah</th>
                
              </tr>
           </thead>
           <tfoot>
           </tfoot>
           
           <tbody>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Aset/Harta</b></td>
             </tr>
             @foreach ($aset as $as)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $as->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $as->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $as->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $as->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $as->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $as->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totalq_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 1999])->sum('debit_jurnal') ;
                  $totalq_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 1999])->sum('kredit_jurnal') ;
                  $tosq_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 1999])->sum('debit');
                  $tosq_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 1999])->sum('kredit');
                  $labq_deb = $tosq_debit + $totalq_debit - $totalq_kredit;
                  $labq_kre = $tosq_kredit - $totalq_debit + $totalq_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Aset</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labq_deb }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Liabilitas/Hutang</b></td>
             </tr>
             @foreach ($liabilitas as $lb)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $lb->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $lb->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $lb->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $lb->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $lb->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $lb->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totalr_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [2000, 2999])->sum('debit_jurnal') ;
                  $totalr_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [2000, 2999])->sum('kredit_jurnal') ;
                  $tosr_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [2000, 2999])->sum('debit');
                  $tosr_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [2000, 2999])->sum('kredit');
                  $labr_deb = $tosr_debit + $totalr_debit - $totalr_kredit;
                  $labr_kre = $tosr_kredit - $totalr_debit + $totalr_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Liabilitas</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labr_deb }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Ekuitas/Modal</b></td>
             </tr>
             @foreach ($ekuitas as $ek)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $ek->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $ek->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $ek->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $ek->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $ek->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $ek->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_debits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totalt_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [3000, 3999])->sum('debit_jurnal') ;
                  $totalt_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [3000, 3999])->sum('kredit_jurnal') ;
                  $tost_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [3000, 3999])->sum('debit');
                  $tost_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [3000, 3999])->sum('kredit');
                  $labt_deb = $tost_debit + $totalt_debit - $totalt_kredit;
                  $labt_kre = $tost_kredit - $totalt_debit + $totalt_kredit;

                  $tot_liatas = $labt_deb + $labr_deb;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Ekuitas/Modal</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labt_deb }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="2" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Total Liabilitas + Ekuitas/Modal</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $tot_liatas }}</b></td>
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