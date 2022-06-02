<?php

require __DIR__.'/../../config/api_load.php';

$table      = 'spare_parts';
$primaryKey = 'code_spare_parts';
$selected 	= '';
$sessionUsers = $_SESSION['id_users'];
$users = $show_by_id('users','id_users',$sessionUsers,$selected);

$keterangan = request('keterangan');
if($keterangan == 'update_stock'){
	$setData 	= [
		'id'    	=> request('id'),
		'stock'    	=> request('stock_old'),
		'add'    	=> request('add')
	];
	$setRules = [
		'id'     	=> 'required',
		'add'  		=> 'required',
	];
	$setAliases = [
		'id'     	=> 'Pilih Kode SpareParts',
		'add'     	=> 'Masukkan Jumlah Spare Partnya',
	];

	post();

	require __DIR__.'/../../config/validator.php';
	
	$stokOld = request('stock_old');
	$StokAdd = request('add');
	$UpdateStok = $stokOld + $StokAdd;

	$dataUpdateStok = [
		'stock_spare_part' 	=> $UpdateStok,
		'users_id' 			=> $sessionUsers
	];
	$results 	= $update($table, $primaryKey, request('id'),$dataUpdateStok);
	if($results ==true) {
		$dataLog = [
			'code_spare_part' => request('id'),
			'stock_create' 	=> $StokAdd,
			'stock_update' 	=> $UpdateStok,
			'users_id'		=> $sessionUsers,
			'coments'		=> "Telah Dilakukan Pembaharuan Sparepart Baru Oleh ".$users->username.""
		];
		$insertDataLog = $insert('log_spare_parts',$dataLog);
		reponse_ok("Berhasil Diupdate!",$results);
		exit(); 
	}
	response_failed("Terjadi Kesalahan.!");
	exit(); 

}elseif($keterangan == 'delete'){
	$setData 	= [
		'id'    	=> request('id')
	];
	$setRules = [
		'id'     	=> 'required'
	];
	$setAliases = [
		'id'     	=> 'Pilih Kode SpareParts'
	];

	post();

	require __DIR__.'/../../config/validator.php';
	

	$SpareNULL = $show_by_id($table,'code_spare_parts',request('id'),$selected);
	$dataLog = [
		'code_spare_part' => $SpareNULL->code_spare_parts,
		'stock_create' 	=> $SpareNULL->stock_spare_part,
		'stock_update' 	=> 0,
		'users_id'		=> $sessionUsers,
		'coments'		=> "Telah Dilakukan Pengahupusan Stok Menjadi 0 Baru Oleh ".$users->username.""
	];

	$dataSet = [
		'stock_spare_part' => 0
	];

	$results	= $update($table,$primaryKey, $SpareNULL->code_spare_parts,$dataSet);
	if(!empty($results)){
		$insertDataLog = $insert('log_spare_parts',$dataLog);
		reponse_ok("Berhasil Mengahapus.!");
		exit(); 
	}

	response_failed("Terjadi Kesalahan.!");
	exit(); 

}elseif($keterangan =='null'){

	$setData 	= [
		'spare_part_name'      	=> request('spare_part_name'),
		'price'          		=> request('price'),
		'stock_spare_part'      => request('stock_spare_part'),
		'users_id'          	=> $sessionUsers,
	];

	$setRules = [
		'spare_part_name'          => 'required',
		'price'          	=> 'required|numeric',
		'stock_spare_part'          => 'required|numeric'
	];

	$setAliases = [
		'code_spare_parts'     => 'Kode Sparepert',
		'spare_part_name'          => 'Nama Sparepart',
		'price'          => 'Harga',
		'stock_spare_part'          => 'Stok'
	];

	post();

	require __DIR__.'/../../config/validator.php';

	$users = $show_by_id('users','id_users',$sessionUsers
		,$selected);
	if(empty($users)){
		response_failed("Maaf Akses Anda Tidak Ada. Silakan Ulangi Kembali!");
		exit();
	}
	$check_data = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

	if($check_data->code_spare_parts === request('code_spare_parts'))
	{
		$sucess 	= $update($table, $primaryKey, $check_data->code_spare_parts,$setData);
		reponse_ok("Berhasil Diupdate!",$sucess);
		exit(); 

	}

	response_failed("Terjadi Kesalahan.!");
	exit();

}else{

}