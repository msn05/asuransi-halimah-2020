<?php

require __DIR__.'/../../config/api_load.php';

$table      = 'request_services';
$primaryKey = 'id_request_service';
$selected 	= '';
$setData 	= [
	'id'    	=> request('id'),
];
$setRules = [
	'id'     	=> 'required',
];
$setAliases = [
	'id'     	=> 'Pilih Pengajuan Untuk Dilakukan Pembayaran.!',
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request('id'),$selected);
// echo json_encode($check_data);

if($check_data->actions == 'apporved')
{
	$MechanicCheck = [
		'actions'	=> 'done'
	];
	
	$insertLagi = $update($table,$primaryKey,request('id'),$MechanicCheck);
	reponse_ok("Berhasil Diselesaikan.!");
	exit(); 
}
response_failed("Terjadi Kesalahan.!");
exit();
