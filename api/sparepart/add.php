<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'spare_parts';
$primaryKey = 'code_spare_part';
$selected 	= '';
$usersSession = $_SESSION['id_users'];
$setData 	= [
	'code_spare_parts'    	=> request('code_spare_parts'),
	'spare_part_name'      	=> request('spare_part_name'),
	'price'          		=> request('price'),
	'stock_spare_part'      => request('stock_spare_part'),
	'users_id'          	=> $usersSession
	 // $usersSession
];

$setRules = [
	'code_spare_parts'     => 'required',
	'spare_part_name'          => 'required',
	'price'          	=> 'required|numeric',
	'stock_spare_part'          => 'required|numeric',
	'users_id'          => 'required'
];

$setAliases = [
	'code_spare_parts'     => 'Kode Sparepert',
	'spare_part_name'          => 'Nama Sparepart',
	'price'          => 'Harga',
	'stock_spare_part'          => 'Stok'
];

post();

require __DIR__.'/../../config/validator.php';

$users = $show_by_id('users','id_users',$usersSession,$selected);
if(empty($users)){
	response_failed("Maaf Akses Anda Tidak Ada. Silakan Ulangi Kembali!");
	exit();
}
$check_data = $show_by_id($table,'spare_part_name',request('name'),$selected);
// echo json_encode($check_data);

if(!empty($check_data->spare_part_name)){
	response_failed("Nama Sparepart Sudah Ada Sudah Digunakan.!");
	exit();
}
$dataLog = [
	'code_spare_part' => request('code_spare_parts'),
	'stock_create' 	=> request('stock_spare_part'),
	'stock_update' 	=> request('stock_spare_part'),
	'users_id'		=> $usersSession,
	'coments'		=> "Baru Ditambahkan Sparepart Baru Oleh ".$users->username.""
];
$results = $insert($table,$setData);
if(!empty($results)){
	$InsertLog = $insert('log_spare_parts',$dataLog);
	reponse_ok("Berhasil Ditambahkan!");
	exit();
}

