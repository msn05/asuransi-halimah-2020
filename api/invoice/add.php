<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';
require __DIR__.'/../../helpers/prefix_code.php';


$table      = 'invoice';
$primaryKey = 'id_invoice';
$selected 	= '';
// $usersSession 	= $_SESSION['id_users'];
$nasabah 		= $show_by_id('start_repair','id_start_repair',request('kode'),$selected);

$setData 	= [
	'id_invoice'      		=> $uniqueCode($table,$primaryKey),
	'start_repair_id'      		=> request('kode'),
	'crane_fee'      			=> request('derek'),
// 	'material_cost'  				=> request('material'),
// 	'amount_or'	=> request('osr'),
	'pph'     			=> request('pph'),
	'admin_cost'     			=> request('adm'),
// 	'salvage'      			=> request('sal'),
	'created_at'			=> date('Y-m-d')
];

$setRules = [
	'start_repair_id'     		=> 'required',
	'crane_fee'          	=> 'required|numeric',
// 	'material_cost'          	=> 'required|numeric',
// 	'amount_or'          	=> 'required|numeric',
	'pph'          	=> 'required|numeric',
	'admin_cost'          	=> 'required|numeric',
// 	'salvage'          	=> 'required|numeric',
	// 'coments'          	=> 'required'
];

$setAliases = [
	'start_repair_id'     		=> 'Max Biaya Tanggungan',
	'crane_fee'          	=> 'Biaya Derek',
	'material_cost'          	=> 'Biaya Bahan',
// 	'amount_or'          	=> 'OR',
	'pph'          	=> 'Pph',
	'admin_cost'          	=> 'Biaya Admin',
	'salvage'          	=> 'Salvage'
];

post();

require __DIR__.'/../../config/validator.php';
// echo json_encode($nasabah);
if($nasabah->actions_repair === 'close'){
	$nasabahd 		= $show_by_id($table,'start_repair_id',request('kode'),$selected);
	if(!empty($nasabahd)){
		response_failed("Sudah dibuatkan invoice.!");
		exit();
	}
	try {
		$results = $insert($table,$setData);
		reponse_ok("Berhasil Dibuatkan Inovice. Silakan Cetak Pada Halaman invoice.!");
		exit();
	} catch (Exception $e) {
		echo json_encode($e->getMessage());
	}

	
}
response_failed("Belum bisa dibuatkan invoice.!");
exit();

