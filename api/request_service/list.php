<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'checkin_mechanic';
$primaryKey = 'id_checkin_mechanic';
$selected 	= '';

post();

if(request($primaryKey)){
	$results = $db->table($table)->leftjoin('mechanic','checkin_mechanic.mechanic_id','mechanic.users_id')->where('checkin_mechanic.id_checkin_mechanic',request($primaryKey))->get();

}elseif(request('request_service_id')){
	$results = $db->table($table)->leftjoin('mechanic','checkin_mechanic.mechanic_id','mechanic.users_id')->where('checkin_mechanic.request_service_id',request('request_service_id'))->get();

}

if(!empty($results)){
	reponse_ok("Data Tersedia.!",$results);
	exit();
}

