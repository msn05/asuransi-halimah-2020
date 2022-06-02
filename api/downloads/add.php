<?php
require __DIR__.'/../../config/api_load.php';
include __DIR__.'/../../helpers/print.php';
$foto = __DIR__.'../../apps/logo-cv.png';
include __DIR__.'/header_laporan.php';

$id   			= request('id_estimasiPerbaikan');
$keterangan   	= request('keterangan');

$selected   		= '';
post();

$dataCheckInMekanik = $show_by_id('checkin_mechanic','id_checkin_mechanic', $id,$selected);
$dataDatanganPelangganNya = $show_by_id('request_services','id_request_service', $dataCheckInMekanik->request_service_id,$selected);

$dataPermintaan = $show_by_id('order_nasabah_customers','id_order', $dataDatanganPelangganNya->order_id,$selected);

$dataNasabahPelanggan = $show_by_id('nasabah_customer','id_nasabah', $dataPermintaan->nasabah_customer_id,$selected);
$dataNasabah = $show_by_id('customers','id_customer', $dataNasabahPelanggan->customers_id,$selected);
$where_data = [
	'checkin_mechanic_id'	=> $dataCheckInMekanik->id_checkin_mechanic
];


include __DIR__.'/keterangan.php';
$html = 
'<html>
'.$head.'
<main>
'.$data.'
</main>
</html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$output = $dompdf->output();
$Created = file_put_contents('../../apps/file/'.$dataNasabah->name_company.'-'.$dataNasabahPelanggan->name_nasabah.'.pdf',$output);

$dataFile = [
	'file_genered'       => $dataNasabah->name_company.'-'.$dataNasabahPelanggan->name_nasabah.'.pdf',
	'actions'	=> 'pending apporved'
];

if($dataDatanganPelangganNya->file_genered != null){
	response_failed("Mohon maaf data sudah digenered.!");
	exit();
}
// $a = $dataDatanganPelangganNya->id_request_service;

$results = $update('request_services','id_request_service',$dataDatanganPelangganNya->id_request_service,$dataFile);
reponse_ok("Berhasil Dibuat Surat Estimasi.!");
exit();

