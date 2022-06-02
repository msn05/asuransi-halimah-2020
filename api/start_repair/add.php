<?php

require __DIR__.'/../../config/api_load.php';

$table      = 'start_repair';
$primaryKey = 'id_start_repair';
$selected 	= '';
$setData 	= [
	'id_start_repair'    	=> request('id_start_repair'),
	'id_request_service'    	=> request('id_request_service')
];
$setRules = [
	'id_start_repair'     	=> 'required'
];
$setAliases = [
	'id_start_repair'     	=> 'Pilih Perbaikan.!',
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
// echo json_encode($check_data);
if($check_data->actions_repair === 'open')
{
	$MechanicCheck = [
		'actions_repair'	=> 'close'
	];
	
	$results = $update($table,$primaryKey,request($primaryKey),$MechanicCheck);
	reponse_ok("Berhasil .!");
	exit(); 
}
response_failed("Terjadi Kesalahan.!");
exit();
