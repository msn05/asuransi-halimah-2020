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
	'id'     	=> 'Pilih Pengajuan Untuk Dilakukan Pengecekan.!',
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,$primaryKey,request('id'),$selected);

if($check_data->actions === 'pending')
{
	$MechanicCheck = [
		'request_service_id' => request('id'),
		'actions_checkin'	=> 'pending'
	];
	$results = $insert('checkin_mechanic',$MechanicCheck);
	if(!empty($results)){
		$UpdateStatus = [
			'customer_checkin'=>date('Y-m-d H:i:s'),
			'actions'		=> 'in service'
		];
		$insertLagi = $update($table,$primaryKey,request('id'),$UpdateStatus);
		reponse_ok("Berhasil Ditambahkan.!");
		exit(); 
	}
}
response_failed("Terjadi Kesalahan.!");
exit();
