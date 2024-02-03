@extends('layouts.home.app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container">
    <div class="row">
      <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 100%;">
        <h1 class="h3 mb-2" align="center" style="color: white;">PT CROP INSPIRASI DIGITAL</h1>
        <br>
        <center>
        	<table class="table-bordered no-margin" style="background-color: #FF6347; width: 500px;">
                <thead>
                    <tr>
        				<th width="20%" style="text-align: center;"><label style="color: white;">Tahun</label></th>
        				<td width="20%">
                        <select class="form-select" aria-label="Default select example" style="background-color: #FF6347; text-align: center; color: white;">
                          <option selected hidden>-- Tahun --</option>
                          <option value="1">2018</option>
                          <option value="2">2019</option>
                          <option value="3">2020</option>
                          <option value="4">2021</option>
                          <option value="5">2022</option>
                          <option value="6">2023</option>
                          <option value="7">2024</option>
                          <option value="8">2025</option>
                        </select>
        				</td>
        			</tr>
        		</thead>
        	</table>
        </center>
        <br>

        <div class="badan1" style="float: left; width: 40%;">
        <table class="table table-bordered border-primary">
            <thead>
            <tr>
              <th class="text-black" scope="col" width="40%" style="text-align: center; border-style: solid;"><h1 class="h5 mb-2 font-weight-bold">LEMBAR KERJA</h1></th>
            </tr>
          </thead>
        </table>
        <p style="line-height: 16%;"></p>
        <table class="table table-bordered" style="border-collapse: separate; border-spacing: 10px;">
            <thead>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/kodeakun"><h1 class="h5 mb-2 text-black">KODE AKUN</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/kodebantu"><h1 class="h5 mb-2 text-black">KODE BANTU</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/jurnalumum"><h1 class="h5 mb-2 text-black">JURNAL UMUM</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/bukubesar"><h1 class="h5 mb-2 text-black">BUKU BESAR</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/bukupembantu"><h1 class="h5 mb-2 text-black">BUKU PEMBANTU</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/neracalajur"><h1 class="h5 mb-2 text-black">NERACA LAJUR</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/labarugi"><h1 class="h5 mb-2 text-black">LABA RUGI</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><a href="/keuangan/neraca"><h1 class="h5 mb-2 text-black">NERACA</h1></a></td>
            </tr>
            <tr>
              <td scope="col" width="40%" style="text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black"><a href="/keuangan/perubahanmodal"><h1 class="h5 mb-2 text-black">PERUBAHAN MODAL</h1></a></h1></td>
            </tr>
            </thead>
        </table>

        </div>

        <div class="badan2" style="float: left; width: 10%">
            <p>&nbsp;</p>
        </div>
        @foreach ($labarugi as $lb)
        <?php 

                $totalq_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 1999])->sum('debit_jurnal') ;
                  $totalq_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [1000, 1999])->sum('kredit_jurnal') ;
                  $tosq_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 1999])->sum('debit');
                  $tosq_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [1000, 1999])->sum('kredit');
                  $labq_deb = $tosq_debit + $totalq_debit - $totalq_kredit;
                  $labq_kre = $tosq_kredit - $totalq_debit + $totalq_kredit;

                  $totalo_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 4999])->sum('debit_jurnal') ;
                  $totalo_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [4000, 4999])->sum('kredit_jurnal') ;
                  $toso_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 4999])->sum('debit');
                  $toso_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [4000, 4999])->sum('kredit');
                  $labo_deb = $toso_debit + $totalo_debit - $totalo_kredit;
                  $labo_kre = $toso_kredit - $totalo_debit + $totalo_kredit;

                  $totaly_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [5000, 5999])->sum('debit_jurnal') ;
                  $totaly_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [5000, 5999])->sum('kredit_jurnal') ;
                  $tosy_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [5000, 5999])->sum('debit');
                  $tosy_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [5000, 5999])->sum('kredit');
                  $laby_deb = $tosy_debit + $totaly_debit - $totaly_kredit;
                  $laby_kre = $tosy_kredit - $totaly_debit + $totaly_kredit;

                  $totalg_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [6000, 6999])->sum('debit_jurnal') ;
                  $totalg_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [6000, 6999])->sum('kredit_jurnal') ;
                  $tosg_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [6000, 6999])->sum('debit');
                  $tosg_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [6000, 6999])->sum('kredit');
                  $labg_deb = $tosg_debit + $totalg_debit - $totalg_kredit;
                  $labg_kre = $tosg_kredit - $totalg_debit + $totalg_kredit;

                  $totala_debit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [7000, 9999])->sum('debit_jurnal') ;
                  $totala_kredit = DB::table('t_jurnal_umum')->whereBetween('kode_akun', [7000, 9999])->sum('kredit_jurnal') ;
                  $tosa_debit = DB::table('m_kode_akun')->whereBetween('kode_akun', [7000, 9999])->sum('debit');
                  $tosa_kredit = DB::table('m_kode_akun')->whereBetween('kode_akun', [7000, 9999])->sum('kredit');
                  $laba_deb = $tosa_debit + $totala_debit - $totala_kredit;
                  $laba_kre = $tosa_kredit - $totala_debit + $totala_kredit;

                  $laba_kotor = $labo_kre - $laby_kre;

                  $laba_rugi = $laba_kotor + $labg_kre - $laba_kre;

                    $nilai_total = $laba_rugi - ($lb->pajak_pph / 100 * $laba_rugi);
                    $total_biayar = $laby_kre + $laba_kre;
                    $total_pendapatanr = $labo_kre + $labg_kre;
        ?>
        @endforeach

        <div class="badan3" style="float: left; width: 50%">
            <table class="table table-bordered border-primary">
                    <thead>
                        <tr>
                            <th class="text-black" scope="col" width="40%" style="text-align: center; border-style: solid;"><h1 class="h5 mb-2 font-weight-bold">RINGKASAN</h1></th>
                        </tr>
                    </thead>
                </table>
            <div style="float: left; width: 50%;">
                <table class="table" style="border-collapse: separate; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">TOTAL PENDAPATAN</h1></th>
                        </tr>

                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">TOTAL BIAYA</h1></th>
                        </tr>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">LABA</h1></th>
                        </tr>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">KAS SETARA</h1></th>
                        </tr>
                    </thead>
                </table>    
            </div>

            <div style="float: left; width: 10%;">
              <p>&nbsp;</p>  
            </div>

            <div style="float: left; width: 40%;">
                <table class="table" style="border-collapse: separate; border-spacing: 10px;">
                    <thead>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">Rp. {{ $total_pendapatanr }}</h1></th>
                        </tr>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">Rp. {{ $total_biayar }}</h1></th>
                        </tr>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">Rp. {{ $nilai_total }}</h1></th>
                        </tr>
                        <tr>
                            <th scope="col" width="40%" style="border: 1px; color: white; text-align: center; border-style: solid;"><h1 class="h5 mb-2 text-black">Rp. {{ $labq_deb }}</h1></th>
                        </tr>
                    </thead>
                </table>
            </div>
            
        </div>
      </div>

    </div>
    
    <br />
    @include('layouts.messages')
  </div> <!-- end container Heading -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- End of Main Content -->


@endsection			