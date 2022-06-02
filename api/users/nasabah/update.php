<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';

$table      = 'customers';
$primaryKey = 'id_customer';
$selected 	= '';

$setData 	= [
	'id_customer'          => request('id_customer'),
	'address'          	=> request('address'),
	'phone_number'      => request('phone_number')
];

$setRules = [
	'id_customer'     	=> 'required',
	'address'          => 'required',
	'phone_number'      => 'required|numeric|digits_between:10,16'
];

$setAliases = [
	'id_customer'     => 'Nama Mekanik',
	'address'          => 'Alamat',
	'phone_number'          => 'telphone'

];

post();

require __DIR__.'/../../../config/validator.php';

$dataNasabah = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

if(request('phone_number') === $dataNasabah->phone_number){
	$results = $update($table,$primaryKey,request($primaryKey),$setData);
	reponse_ok("Berhasil Diperharui!", $results);
	exit();
}
$dataPhoneNasabah = $show_by_id($table,'phone_number',request('phone_number'),$selected);
if(!empty($dataPhoneNasabah)){
	response_failed("Nomor ini sudah pernah Terdaftar.!");
	exit();
}
$results = $update($table,$primaryKey,request($primaryKey),$setData);
reponse_ok("Berhasil Diperharui!", $results);
exit();