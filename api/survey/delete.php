<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'checkin_service_insurance';
$primaryKey = 'id_checkin_insurance';
$selected 	= '';

delete();

$results = $delete($table,$primaryKey,request('id'));
if(!empty($results)){
	reponse_ok("Berhasil Dihapus.!");
	exit();
}

