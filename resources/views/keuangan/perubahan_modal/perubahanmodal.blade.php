@extends('layouts.home.app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background-image: linear-gradient(315deg, #f7b42c 0%, #fc575e 74%); width: 80%; float: left;">
                <h1 class="h3 mb-2 text-black-800" align="center">PT CROP INSPIRASI DIGITAL</h1>
                <h2 class="h5 mb-2 text-black-800" align="center">LAPORAN PERUBAHAN MODAL</h2>
                <h2 class="h5 mb-2 text-black-800" align="center">TAHUN 2022</h2>
                <br>
             <table class="table table-bordered border-primary">
			  <thead>
			    <tr class="table-success">
			      <th colspan="2" style="vertical-align: middle; text-align: center;" scope="col">URAIAN</th>
			      <th colspan="4" style="vertical-align: middle; text-align: center;" scope="col">Jumlah</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			    	<td colspan="2">Modal Awal</td>
			    	@foreach ($modalawal as $ma)
			    			<td style="text-align: right;">Rp. {{ $ma->kredit }}</td>
			      			<td>&nbsp;</td>
			      	@endforeach
			        
			    	@if($modalawal->count() === 0)	
			      		<td style="text-align: right;">Rp. 0</td>
			      		<td>&nbsp;</td>
			    	@endif
			    	
			      			
			    	
			      	
			    </tr>
			    <tr>
			      <td colspan="2">Laba Bersih</td>
			      @foreach ($labarugi as $lb)
			      <?php 
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
			       ?>
			      <td style="text-align: right;">Rp. {{ $nilai_total }}</td>
			      <td>&nbsp;</td>
			      @endforeach
			    </tr>
			    <tr>
			      <td colspan="2" style="vertical-align: middle;">Modal Awal + Laba Bersih</td>
			      <td>&nbsp;</td>
			      <?php
			      	$mas = DB::table('m_kode_akun')->where('nama_akun', '=', 'Modal Awal')->sum('kredit') ; 
			      	$tot_mola = $mas + $nilai_total; 

			      	//Prive
			      	$prive = DB::table('m_kode_akun')->where('nama_akun', '=', 'Prive')->sum('kredit') ;
			      	$modal_akhir = $tot_mola + $prive;
			      ?>
			      <td style="text-align: right;">Rp. {{ $tot_mola }}</td>
			    </tr>
			    <tr>
			    	<td colspan="2">Deviden/Prive</td>
			      <td>&nbsp;</td>
			      <td style="text-align: right;">Rp. {{ $prive }}</td>
			    </tr>
			    <tr>
			    	<td colspan="2">Modal Akhir</td>
			    	<td>&nbsp;</td>
			    	<td style="text-align: right;">Rp. {{ $modal_akhir }}</td>
			    </tr>
			  </tbody>
			</table>
                

			<br><br><br>
            </div>

      </div>
      
      <br />
      @include('layouts.messages')
  </div> <!-- end container Heading -->

</div>
<!-- /.container-fluid -->


<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- End of Main Content -->

@endsection