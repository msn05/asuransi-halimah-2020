<?php

require __DIR__.'/../../config/api_load.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'request_services';
$primaryKey = 'id_request_service';
$selected 	= '';
$setData 	= [
	'id_request_service'    	=> request('id_request_service'),
	'actions'	=> 'apporved',
];
$setRules = [
	'id_request_service'     	=> 'required'
];
$setAliases = [
	'id_request_service'     	=> 'Pilih Pengajuan Untuk Dilakukan Perbaikan TIARA PERSADA.!'
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request('id_request_service'),$selected);

if($check_data->actions === 'pending apporved')
{
	
	$results = $update('request_services','id_request_service',request($primaryKey),$setData);
	if(!empty($results)){
		$dataPerbaikan = [
			'id_start_repair'	=> $uniqueCode('start_repair','id_start_repair'),
			'request_service_id'	=> request('id_request_service'),
			'actions_repair'	=> 'open'
		];

		$insertLagi = $insert('start_repair',$dataPerbaikan);
		reponse_ok("Berhasil Ditambahkan.!");
		exit(); 
	}
}
response_failed("Terjadi Kesalahan.!");
exit();
