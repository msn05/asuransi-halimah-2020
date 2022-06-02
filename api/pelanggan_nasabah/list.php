<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'nasabah_customer';
$primaryKey = 'id_nasabah';
$selected 	= '';

post();

if(request($primaryKey)){
	$results = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
}else{

}

if(!empty($results)){
	reponse_ok("Data Tersedia.!",$results);
	exit();
}

