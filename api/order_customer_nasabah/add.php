<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'order_nasabah_customers';
$primaryKey = 'id_order';
$selected 	= '';
// $usersSession 	= $_SESSION['id_users'];
$nasabah 		= $show_by_id('nasabah_customer','id_nasabah',request('nasabah'),$selected);

$keterangan = request('keterangan');

$setData 	= [
	'id_order'      		=> request('kodeClaim'),
	'price'      			=> request('price'),
	'merk'  				=> request('merk'),
	'nasabah_customer_id'	=> request('nasabah'),
	'plate'     			=> request('plat'),
	'color'     			=> request('color'),
	'type'      			=> request('type'),
	'year'      			=> request('year'),
	// 'coments'      			=> request('coments'),
	'actions_order'			=> 'pending',
];

$setRules = [
	'price'     		=> 'required|numeric',
	'merk'          	=> 'required',
	'plate'          	=> 'required',
	'color'          	=> 'required',
	'type'          	=> 'required',
	'year'          	=> 'required|numeric|min:4',
	// 'coments'          	=> 'required'
];

$setAliases = [
	'price'     		=> 'Max Biaya Tanggungan',
	'merk'          	=> 'Merk',
	'plate'          	=> 'Plat',
	'color'          	=> 'Warna',
	'type'          	=> 'Tipe',
	'year'          	=> 'Tahun',
	// 'coments'          	=> 'Keterangan Perbaikan Sementara'
];

post();

require __DIR__.'/../../config/validator.php';
// echo json_encode($nasabah);
if(empty($nasabah)){
	response_failed("Pelanggan Anda Belum Terdaftar.!");
	exit();
}

$whereData = [
	// 'nasabah_customer_id' 	=> request('nasabah'),
	'plate' 				=> request('plat')
];

$CustomerKendaraan = $db->table($table)->where($whereData)->in('actions_order', ['pending', 'in proccess'])->getAll();


if($keterangan === 'add'){
	if(!empty($CustomerKendaraan)){
		response_failed("Mohon Maaf belum dapat memproses kendaraan ini .!");
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
	
}

