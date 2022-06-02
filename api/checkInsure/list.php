<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'checkin_service_insurance';
$primaryKey = 'id_checkin_insurance';
$selected 	= '';


post();

$results = null;

if(request('id_nasabah')){
	$results = $show_by_id($table,'nasabah_customer_id',request('id_nasabah'),$selected);
}else{

}

if(!empty($results)){
	reponse_ok('',$results);
	exit();
}