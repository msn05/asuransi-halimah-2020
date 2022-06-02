<?php
require __DIR__.'/../../config/api_load.php';
include __DIR__.'/../../helpers/print.php';
$foto = __DIR__.'../../apps/logo-cv.png';
include __DIR__.'/../downloads/header_laporan.php';

$id   			= request('id_estimasiPerbaikan');
$keterangan   	= request('keterangan');

$selected   		= '';
post();

$dataDatanganPelangganNya = $show_by_id('request_services','id_request_service', $id,$selected);
$dataCheckInMekanik = $show_by_id('checkin_mechanic','request_service_id', $id,$selected);
$Perkah = $show_by_id('start_repair','request_service_id', $id,$selected);

$dataPermintaan = $show_by_id('order_nasabah_customers','id_order', $dataDatanganPelangganNya->order_id,$selected);

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
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('perintah kerja.pdf',array("Attachment"=>false));
