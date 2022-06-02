<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected 	= '';

$keterangan = request('keterangan');

$setData 	= [
	'group_name'      		=> request('jenis'),
	'name_service'      		=> request('name'),
];

$setRules = [
	'name_service'     		=> 'required',
	'group_name'     		=> 'required'
];

$setAliases = [
	'name_service'     		=> 'Nama Jasa',
	'group_name'     		=> 'Jenis'
];

post();

require __DIR__.'/../../config/validator.php';


$JasaName = $show_by_id($table,'name_service',request('name'),$selected);
if($keterangan === 'add'){
	if(!empty($JasaName)){
		response_failed("Maaf Jasa Tersebut Sudah Ada .!");
		exit();
	}
	try {
		$results = $insert($table,$setData);
		reponse_ok("Berhasil Ditambahkan!",$results);
		exit();
	} catch (Exception $e) {
		echo json_encode($e->getMessage());
	}

}elseif($keterangan === 'ubah'){

	$Jasa = $show_by_id($table,'id_service_categori',request('id'),$selected);
	if(request('name') == $Jasa->name_service){
		response_failed("Maaf Tidak Ada Perubahan .!");
		exit();
	}else{
		if(!empty($JasaName)){
			response_failed("Maaf Jasa Tersebut Sudah Ada .!");
			exit();
		}
		$results = $update($table,$primaryKey,request('id'),$setData);
		reponse_ok("Berhasil Diubah.!",$results);
		exit();
	}
	
}

