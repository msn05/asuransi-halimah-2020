<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'nasabah_customer';
$primaryKey = 'id_nasabah';
$selected 	= '';
$usersSession 	= $_SESSION['id_users'];
$nasabah 		= $show_by_id('customers','users_id',$usersSession,$selected);

$keterangan = request('keterangan');

$setData 	= [
	'customers_id'    		=> $nasabah->id_customer,
	'name_nasabah'      	=> request('name_nasabah'),
	'phone_number_nasabah'  => request('phone_number_nasabah'),
	'address_nasabah'      	=> request('address_nasabah'),
	'number_nik'     		=> request('number_nik'),
	'email'      			=> request('email'),
];

$setRules = [
	'name_nasabah'     => 'required',
	'phone_number_nasabah'          => 'required|numeric|digits_between:10,16',
	'address_nasabah'          	=> 'required',
	'number_nik'          => 'required|numeric|min:16',
	'email'          => 'required|email'
];

$setAliases = [
	'name_nasabah'     => 'Nama Pelanggan',
	'phone_number_nasabah'          => 'Nomor Telphone',
	'address_nasabah'          => 'Alamat',
	'number_nik'          => 'Nomor NIK',
	'email'          => 'Email'
];

post();

require __DIR__.'/../../config/validator.php';

if(empty($nasabah)){
	response_failed("Maaf Anda Belum Terdaftar Pada Sistem.!");
	exit();
}

$Customer = $show_by_id($table,'number_nik',request('number_nik'),$selected);
if($keterangan === 'add'){
	if(!empty($Customer)){
		response_failed("Maaf Nomor NIK Sudah Digunakan.!");
		exit();
	}
	try {
		$results = $insert($table,$setData);
		reponse_ok("Berhasil Ditambahkan!");
		exit();
	} catch (Exception $e) {
		echo json_encode($e->getMessage());
	}

}elseif($keterangan === 'ubah'){
	$CustomerData = $show_by_id($table,$primaryKey,request('id'),$selected);
	if(request('number_nik') == $CustomerData->number_nik  && request('phone_number_nasabah') == $CustomerData->phone_number_nasabah && request('email') == $CustomerData->email){
		$dataUpdate = [
			'address_nasabah'	=> request('address_nasabah'),
			'name_nasabah'	=> request('name_nasabah')
		];
		try {
			$results = $update($table,$primaryKey,request('id'),$dataUpdate);
			reponse_ok("Berhasil Diubah.!");
			exit();
		} catch (Exception $e) {
			echo json_encode($e->getMessage());
		}
	}else{
		$whereData = [
			'number_nik' =>request('number_nik'),
			'phone_number_nasabah' => request('phone_number_nasabah'),
			'email'	=> request('email')
		];
		$CustomerNewData = $filter_data($table,$whereData);
		if(!empty($CustomerNewData)){
			response_failed("NIK, Email, Nomor HP sudah Digunakan.!");
			exit();
		}
		$results = $update($table,$primaryKey,request('id'),$setData);
		reponse_ok("Berhasil Diubah.!");
		exit();
	}
}

