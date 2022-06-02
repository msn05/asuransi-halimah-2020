<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'spare_parts';
$primaryKey = 'code_spare_parts';
$selected 	= '';

post();
// $results = null;
if(request($primaryKey)){
	$results = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

}else{
	$results = $db->table($table)->where('stock_spare_part', '>', 1)->getAll();
}

if(!empty($results)){
	reponse_ok("Data Tersedia.!",$results);
	exit();
}

