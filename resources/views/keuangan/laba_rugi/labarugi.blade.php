@extends('layouts.home.app')
@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
        <h1 class="h3 mb-2 text-gray-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
        <h2 class="h3 mb-2 text-black-800" align="center">LABA RUGI</h2>
        <h3 class="h5 mb-1 text-black-400" align="center">Untuk Tahun 2022</h3>
      </div>

    </div>
    
    <br />
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
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Pendapatan</b></td>
             </tr>
             @foreach ($pendapatan as $pd)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $pd->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $pd->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $pd->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $pd->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $pd->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $pd->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totalo_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 4999])->sum('debit_jurnal') ;
                  $totalo_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 4999])->sum('kredit_jurnal') ;
                  $toso_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 4999])->sum('debit');
                  $toso_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 4999])->sum('kredit');
                  $labo_deb = $toso_debit + $totalo_debit - $totalo_kredit;
                  $labo_kre = $toso_kredit - $totalo_debit + $totalo_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Pendapatan</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labo_kre }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Biaya</b></td>
             </tr>
             @foreach ($biaya as $by)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $by->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $by->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $by->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $by->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $by->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $by->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totaly_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [5000, 5999])->sum('debit_jurnal') ;
                  $totaly_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [5000, 5999])->sum('kredit_jurnal') ;
                  $tosy_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [5000, 5999])->sum('debit');
                  $tosy_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [5000, 5999])->sum('kredit');
                  $laby_deb = $tosy_debit + $totaly_debit - $totaly_kredit;
                  $laby_kre = $tosy_kredit - $totaly_debit + $totaly_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Biaya</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $laby_kre }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <?php 

                  $laba_kotor = $labo_kre - $laby_kre;
             ?>
             <tr>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Laba Kotor</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $laba_kotor }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Pendapatan Lain-Lain</b></td>
             </tr>
             @foreach ($pendll as $pd)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $pd->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $pd->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $pd->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $pd->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $pd->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $pd->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totalg_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [6000, 6999])->sum('debit_jurnal') ;
                  $totalg_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [6000, 6999])->sum('kredit_jurnal') ;
                  $tosg_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [6000, 6999])->sum('debit');
                  $tosg_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [6000, 6999])->sum('kredit');
                  $labg_deb = $tosg_debit + $totalg_debit - $totalg_kredit;
                  $labg_kre = $tosg_kredit - $totalg_debit + $totalg_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Pendapatan Lain-Lain</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $labg_kre }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: left;"><b>&nbsp;&nbsp;&nbsp;Biaya Lain-Lain</b></td>
             </tr>
             @foreach ($biayall as $bl)
              <tr>
                <td style="vertical-align: middle; text-align: center;">{{ $bl->kode_akun }}</td>
                <td style="vertical-align: middle; text-align: center;">{{ $bl->nama_akun }}</td>
                <?php 
                  $saldo_debits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $bl->kode_akun)->sum('debit_jurnal') ;
                  $saldo_kredits = DB::table('t_jurnal_umum')->where('kode_akun', '=', $bl->kode_akun)->sum('kredit_jurnal') ;

                  $saldo_neraca_debits = $bl->debit + $saldo_debits - $saldo_kredits;
                  $saldo_neraca_kredits = $bl->debit - $saldo_debits + $saldo_kredits;

                ?>
                <td style="vertical-align: middle; text-align: center;">Rp. {{ $saldo_neraca_kredits }}</td>
              </tr>
             @endforeach
             <tr>
              <?php 
                $totala_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [7000, 9999])->sum('debit_jurnal') ;
                  $totala_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [7000, 9999])->sum('kredit_jurnal') ;
                  $tosa_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [7000, 9999])->sum('debit');
                  $tosa_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [7000, 9999])->sum('kredit');
                  $laba_deb = $tosa_debit + $totala_debit - $totala_kredit;
                  $laba_kre = $tosa_kredit - $totala_debit + $totala_kredit;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: left;">&nbsp;&nbsp;&nbsp;<b>Total Biaya Lain-Lain</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $laba_kre }}</b></td>
             </tr>
             <tr>
               <td colspan="3">&nbsp;</td>
             </tr>
             <tr>
              <?php
                $laba_rugi = $laba_kotor + $labg_kre - $laba_kre;
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: center;">&nbsp;&nbsp;&nbsp;<b>Laba (Rugi) Sebelum Pajak</b></td>
               <td style="vertical-align: middle; text-align: center;"><b id="laba_rugi">Rp. {{ $laba_rugi }}</b></td>
             </tr>
             @foreach ($labarugi as $lb)
             <form action="{{ url('/keuangan/laba_rugi/update',  $lb->id) }}" method="POST" id="editform">
            {!! csrf_field() !!}
             <tr>
               <td colspan="2" style="vertical-align: middle; text-align: center;">&nbsp;&nbsp;&nbsp;<b>Pajak PPH Badan</b></td>
               <td style="vertical-align: middle; text-align: center;"><b><input type="number" name="pajak_pph" style="text-align: center;" value="{{ $lb->pajak_pph }}"> %</b></td>
             </tr>
             <tr>
               <td colspan="3" style="vertical-align: middle; text-align: right;">
                <div class="row">
                  <div class="blank1" style="float: right; width: 90%">
                    <button type="submit" class="btn-primary">Hitung</button>
                  </div>
                  <div class="blank2" style="float: right; width: 10%;">&nbsp;</div>
                </div>
              </td>
             </tr>
             </form>
             
             <tr>
              <?php
                $nilai_total = $laba_rugi - ($lb->pajak_pph / 100 * $laba_rugi);
              ?>
               <td colspan="2" style="vertical-align: middle; text-align: center;">&nbsp;&nbsp;&nbsp;<b>Laba (Rugi) Setelah Pajak</b></td>
               <td style="vertical-align: middle; text-align: center;"><b>Rp. {{ $nilai_total }}</b></td>
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



@endsection