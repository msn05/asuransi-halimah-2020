<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'checkin_service_insurance';
$primaryKey = 'id_checkin_insurance';
$selected 	= '';
$usersSession = $_SESSION['id_users'];
$users = $show_by_id('users','id_users',$usersSession,$selected);

$setData 	= [
	'nasabah_customer_id'    	=> request('nasabah_customer_id'),
	'coments'      	=> request('coments'),
	'max_price'		=> request('price')
	
];
$setRules = [
	'coments'     => 'required',
	'max_price'     => 'required|numeric'
	
];

$setAliases = [
	'coments'     => 'Hasil Pengecekan',
	'max_price'     => 'Pembiayaan'
];

post();

require __DIR__.'/../../config/validator.php';

if(empty($users)){
	response_failed("Maaf Akses Anda Tidak Ada. Silakan Ulangi Kembali!");
	exit();
}

$CheckInput = $show_by_id($table,'nasabah_customer_id',request('nasabah_customer_id'),$selected);

if(!empty($CheckInput)){
	$CheckPengajuan = $show_by_id('request_services','check_service_insurance_id',$CheckInput->id_checkin_insurance,$selected);
	if($CheckPengajuan === 'apporved'){
		response_failed("Maaf Sudah Dilakukan Pekerjaan.!");
		exit();
	}
	$update = $update($table,$primaryKey,$CheckInput->id_checkin_insurance,$setData);
	if(!empty($update)){
		reponse_ok('Berhasil Dilakukan Perubahan',$update);
		exit();
	}
	response_failed("Terjadi Kesalahan.!");
	exit();
}

$results = $insert($table,$setData);
if(!empty($results)){
	$dataAsuransiCheck = [
		'check_service_insurance_id'=>	$results->id,
		'actions'					=> 'pending'
	];
	$insertPengajuan = $insert('request_services',$dataAsuransiCheck);
	reponse_ok("Berhasil Ditambahkan!");
	exit();
}

