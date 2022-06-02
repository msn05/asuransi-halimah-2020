<?php

require __DIR__.'/../../config/api_load.php';

$table      = 'estimasi';
$primaryKey = 'id_estimasi';
$selected 	= '';

$keterangan = request('keterangan');
if($keterangan == 'sparepart'){

	$setData 	= [
		'checkin_mechanic_id'   => request('checkin_mechanic_id'),
		'spare_part_id'  		=> request('spare_part_id'),
		'qty_sparepart'  		=> request('qty_sparepart'),
		'disc'  		=> request('disc')
	];

	$setRules = [
		'spare_part_id'     	=> 'required',
		'qty_sparepart'         => 'required|numeric',
		'disc'         => 'required|numeric'
	];

	$setAliases = [
		'spare_part_id'     	=> 'Nama Sparepart',
		'qty_sparepart'         => 'Jumlah',
		'disc'         => 'Diskon'
	];

	post();

	require __DIR__.'/../../config/validator.php';
	$where_data = [
		'spare_part_id' => request('name_service'),
		'checkin_mechanic_id' => request('checkin_mechanic_id')
	];
	$Sparepart 		= $filter_data($table,$where_data);

	if(!empty($Sparepart)){
		response_failed("Maaf Sparepart Sudah Ada..!");
		exit();
	}

	$results = $insert($table,$setData);
	if(!empty($results)){
		reponse_ok("Berhasil Ditambahkan!");
		exit();
	}

}else if($keterangan == 'pekerjaan'){

	$setData 	= [
		'checkin_mechanic_id'   => request('checkin_mechanic_id'),
		'name_service'  		=> request('name_service'),
		'price'  		=> request('price')
	];

	$setRules = [
		'name_service'     	=> 'required',
		'price'         => 'required|numeric'
	];

	$setAliases = [
		'name_service'     	=> 'Nama Pekerjaan',
		'price'         => 'Biaya'
	];

	post();

	require __DIR__.'/../../config/validator.php';
	$where_data = [
		'name_service' => request('name_service'),
		'checkin_mechanic_id' => request('checkin_mechanic_id')
	];
	$CekPekerjaan 		= $filter_data('fee_service',$where_data);

	if(!empty($CekPekerjaan)){
		response_failed("Maaf PekerjaanNya Sudah Ada dalam perbaikan ini.!");
		exit();
	}

	$results = $insert('fee_service',$setData);
	if(!empty($results)){
		reponse_ok("Berhasil Ditambahkan!");
		exit();
	}

}else if ($keterangan == 'selesaikan'){
	$sessionUsers = $_SESSION['id_users'];
	$users = $show_by_id('users','id_users',$sessionUsers,$selected);

	$setData 	= [
		// 'checkin_mechanic_id'   => request('checkin_mechanic_id'),
		'chassis_no'  		=> request('casis'),
		'engine_no'  		=> request('nosin'),
		'estime_done'  		=> request('done'),
		'actions_checkin'	=> 'done',
		'mechanic_id'		=> request('mekanik')
	];

	$setRules = [
		'chassis_no'     	=> 'required',
		'engine_no'         => 'required',
		'mechanic_id'         => 'required',
		'estime_done'         => 'required'
	];

	$setAliases = [
		'chassis_no'     	=> 'Nomor Chasis',
		'engine_no'         => 'Nomor Mesin',
		'estime_done'         => 'Tanggal Selesai',
		'mechanic_id'         => 'Mekanik'
	];

	post();

	require __DIR__.'/../../config/validator.php';


	$results = $update('checkin_mechanic','id_checkin_mechanic',request('checkin_mechanic_id'),$setData);
	if(!empty($results)){
		reponse_ok("Berhasil Diselesaikan.!");
		exit();
	}
}
