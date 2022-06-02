<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'checkin_service_insurance';
$primaryKey = 'id_checkin_insurance';
$selected 	= '';

$setData 	= [
	'order_id'    				=> request('kodeClaim'),
	'service_categori_id'      	=> request('jasa'),
	'damage'      				=> request('kerusakan'),
	'repair'      				=> request('repair'),
	'perbaikan'      				=> request('rk')
];
// echo json_encode($setData);
$setRules = [
	'service_categori_id'     	=> 'required',
	'damage'     				=> 'required',
	'repair'     				=> 'required',
	'perbaikan'     				=> 'required'
	
];

$setAliases = [
	'service_categori_id'     	=> 'Jasa',
	'damage'     				=> 'Kerusakan',
	'repair'     				=> 'Repair',
	'perbaikan'     				=> 'Replace'
];

post();

require __DIR__.'/../../config/validator.php';

$CheckInput = $show_by_id('order_nasabah_customers','id_order',request('kodeClaim'),$selected);
$where_data	=[
	'order_id'=>request('kodeClaim'),
	'service_categori_id'	=> request('jasa')
];
$CheckOldData = $filter_data($table,$where_data);

if(empty($CheckInput)){
	response_failed("Maaf Silakan Ulangi Kembali.!");
	exit();

}
if(!empty($CheckOldData)){
	response_failed("Maaf Jasa Sudah Ditambahkan.!");
	exit();
}

try {
	$results = $insert($table,$setData);
	reponse_ok("Berhasil Ditambahkan!",$results);
	exit();
} catch (Exception $e) {
	echo json_encode($e->getMessage());
}

