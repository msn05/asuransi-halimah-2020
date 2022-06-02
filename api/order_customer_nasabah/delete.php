<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'order_nasabah_customers';
$primaryKey = 'id_order';
$selected 	= '';
// $usersSession 	= $_SESSION['id_users'];
// $nasabah 		= $show_by_id('customers','users_id',$usersSession,$selected);
// $setData 	= [
// 	'id_nasabah'      	=> request('id')
// ];

// $setRules = [
// 	'id_nasabah'     => 'required',
// ];

// $setAliases = [
// 	'id_nasabah'     => 'Pilih Pelanggan',
// ];

delete();

// require __DIR__.'/../../config/validator.php';

// if(empty($nasabah)){
// 	response_failed("Maaf Anda Belum Terdaftar Pada Sistem.!");
// 	exit();
// }

$results = $delete($table,$primaryKey,request('id'));
if(!empty($results)){
	reponse_ok("Berhasil Dihapus.!");
	exit();
}

