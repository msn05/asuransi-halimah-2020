<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected 	= '';

delete();

$results = $delete($table,$primaryKey,request('id'));
if(!empty($results)){
	reponse_ok("Berhasil Dihapus.!");
	exit();
}

