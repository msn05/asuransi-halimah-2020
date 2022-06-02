<?php
require __DIR__.'/../../config/api_load.php';
include __DIR__.'/../../helpers/print.php';
include __DIR__.'/../../helpers/rupiah.php';
$foto = __DIR__.'../../apps/logo-cv.png';
include __DIR__.'/../downloads/header_laporan.php';

$id   			= request('tagihan');

$selected   		= '';
post();

$dataCheckInMekanik = $show_by_id('checkin_mechanic','id_checkin_mechanic', $id,$selected);
$dataDatanganPelangganNya = $show_by_id('request_services','id_request_service', $dataCheckInMekanik->request_service_id,$selected);

$dataPermintaan = $show_by_id('checkin_service_insurance','id_checkin_insurance', $dataDatanganPelangganNya->check_service_insurance_id,$selected);

$dataNasabahPelanggan = $show_by_id('nasabah_customer','id_nasabah', $dataPermintaan->nasabah_customer_id,$selected);
$dataNasabah = $show_by_id('customers','id_customer', $dataNasabahPelanggan->customers_id,$selected);
$where_data = [
	'checkin_mechanic_id'	=> $dataCheckInMekanik->id_checkin_mechanic
];



include __DIR__.'/../downloads/keterangan.php';
$html = 
'<html>
'.$head.'
<main>
'.$data.'
</main>
</html>';

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream('Tagihan.pdf',array("Attachment"=>false));
