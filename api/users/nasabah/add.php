<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'customers';
$primaryKey = 'id_customer';
$selected 	= '';


$setData 	= [
	'name_company'    	=> request('name_company'),
	'username'          => request('username'),
	'address'          	=> request('address'),
	'phone_number'      => request('phone_number')
];

$setRules = [
	'name_company'     	=> 'required',
	'username'          => 'required|email',
	'address'          	=> 'required',
	'phone_number'      => 'required|numeric|digits_between:12,16'
];

$setAliases = [
	'name_company'     => 'Nama Mekanik',
	'username'          => 'Email',
	'address'          => 'Alamat',
	'phone_number'          => 'telphone'

];

post();

require __DIR__.'/../../../config/validator.php';

$username = $show_by_id($table,'username',request('username'),$selected);
if(!empty($username)){
	response_failed("Email sudah pernah Terdaftar.!");
	exit();
}

$dataNasabah = $show_by_id($table,'name_company',request('name_company'),$selected);
if(!empty($dataNasabah)){
	response_failed("Nasabah Ini sudah pernah Terdaftar.!");
	exit();
}

$dataPenggunanNasabah = [
	'user_code'      => request('id_login'),
	'username'      => request('username'),
	'password'      => password_hash('12345678', PASSWORD_DEFAULT),
	'access_id'     => 3,
	'status_users'  => 'Active',
];

$results = $insert('users',$dataPenggunanNasabah);
if(!empty($results)){
	$dataNasabahNya 	= [
		'name_company'    	=> request('name_company'),
		'address'          	=> request('address'),
		'phone_number'      => request('phone_number'),
		'users_id'			=> $results->id
	];
	$Nasabah = $insert($table,$dataNasabahNya);
	reponse_ok("Berhasil Ditambahkan!", $results);
	exit();
}
response_failed("Terjadi Kesalahan.!");
exit();
