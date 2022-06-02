<?php

require __DIR__.'/../../config/api_load.php';

$table      = 'estimasi';
$primaryKey = 'id_estimasi';
$selected 	= '';

$keterangan = request('keterangan');
if($keterangan == 'delete'){
	$setData 	= [
		'id'    	=> request('id'),
	];
	$setRules = [
		'id'     	=> 'required',
	];
	$setAliases = [
		'id'     	=> 'Pilih SpareParts',
	];

	delete();

	require __DIR__.'/../../config/validator.php';
	
	$Delete = $delete($table,$primaryKey,request('id'));
	reponse_ok("Berhasil Dihapus.!",$results);
	exit(); 

}else if($keterangan == 'delete pekerjaan'){
	$setData 	= [
		'id'    	=> request('id'),
	];
	$setRules = [
		'id'     	=> 'required',
	];
	$setAliases = [
		'id'     	=> 'Pilih Pekerjaan',
	];

	delete();

	require __DIR__.'/../../config/validator.php';
	
	$Delete = $delete('fee_service','id_fee_service',request('id'));
	reponse_ok("Berhasil Dihapus.!",$results);
	exit(); 
}