<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'request_services';
$primaryKey = 'id_request_service';
$selected 	= '';
$usersSession 	= $_SESSION['id_users'];
$nasabah 		= $show_by_id('customers','users_id',$usersSession,$selected);

$setData 	= [
	// 'customers_id'    		=> $nasabah->id_customer,
	'order_id'      	=> request('id'),
	'actions'			=> 'pending'
];

$setRules = [
	'order_id'     => 'required'
	
];

$setAliases = [
	'order_id'     => 'Pilih Data Perbaikannya.!'
];

post();

require __DIR__.'/../../config/validator.php';

if(empty($nasabah)){
	response_failed("Maaf Anda Belum Terdaftar Pada Sistem.!");
	exit();
}

$Kendaraan 		= $show_by_id($table,'order_id',request('id'),$selected);

if(!empty($Kendaraan)){
	response_failed("Maaf Anda Sudah Mengajukan. Mohon Ditungggu.!");
	exit();
}

// $dataMulaiPerbaikan = [
// 	'request_service_id' => request($primaryKey),
// 	'actions_repair'	=> 'open'
// ];

$Proccess = [
	'actions_order' => 'in proccess'
];


$results = $insert($table,$setData);
if(!empty($results)){
	// $insert()
	$updateDataOld = $update('order_nasabah_customers','id_order',request('id'),$Proccess);
	reponse_ok("Berhasil Ditambahkan!");
	exit();
}

