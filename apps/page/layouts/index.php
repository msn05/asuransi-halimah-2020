<?php

error_reporting(0);
// Turn off all error reporting

if(!isset($_SESSION)) { session_start(); }

if(@$_SESSION['SuccessLogin'] == false){
    header("location:../../index.php");  
}

$email = @$_SESSION['username'];
$Role = @$_SESSION['access_id'];

require __DIR__.'/../../../helpers/url.php';

include __DIR__.'/header.php';
include __DIR__.'/menu.php';

$string  = $_GET['page']; 
$halaman = preg_replace("/[^a-zA-Z]/", " ", ucwords($string));

?>

<div class="page-wrapper">
   <!-- Title and breadcrumb -->
   <!-- ============================================================== -->
   <div class="page-titles">
      <div class="d-flex align-items-center">
         <h5 class="font-medium m-b-0"> <?=$halaman === '' ?  'Dashboard' : $halaman ;?></h5>
         <div class="custom-breadcrumb ml-auto">
            <a href="#!" class="breadcrumb"><?=$halaman;?></a>
        </div>
    </div>
</div>


<?php
@$content   = $_GET['page'] ?? '';
@$aksi      = $_GET['Aksi'] ?? '';
$validpage  = array("daftar_akses","karyawan","daftar_mekanik","daftar_nasabah","daftar_sparepart","daftar_nasabah","daftar_pelanggan_nasabah","daftar_pengajuan_service","estimasi_perbaikan","estimasi_service","daftar_perbaikan","daftar_penagihan","laporan","daftar_kendaraan_pelanggan","daftar_jasa","daftar_survey","invoice");
$validadmin = array("daftar_akses","karyawan","daftar_mekanik","daftar_nasabah","daftar_sparepart","daftar_nasabah","daftar_pelanggan_nasabah","daftar_pengajuan_service","estimasi_perbaikan","estimasi_service","daftar_perbaikan","daftar_penagihan","laporan","daftar_kendaraan_pelanggan","daftar_jasa","daftar_survey","invoice");
if (in_array($content, $validpage)){
  if($aksi ==""){
     include(__DIR__."/"."../".$content."/".$content.".php");
 }elseif ($aksi=="form" && in_array($content, $validadmin)) {
     include(__DIR__."/"."../".$content."/form.php");
 }elseif ($aksi=="form_update" && in_array($content, $validadmin)) {
     include(__DIR__."/"."../".$content."/form_update.php");
 }elseif ($aksi=="info" && in_array($content, $validadmin)) {
     include(__DIR__."/"."../".$content."/info.php");
 }

}else{
  include(__DIR__."/..//dashboard.php");
}


include __DIR__.'/footer.php';
?>
