<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';


$table      = 'service_categories';
$primaryKey = 'id_service_categori';
$selected 	= '';

post();
// $results = null;
if(request($primaryKey)){
	$results = $show_by_id($table,$primaryKey,request($primaryKey),$selected);

}elseif(request('id_nasabah')){
	// $dataTotalPart = $db->table('estimasi')->leftjoin('spare_parts','estimasi.spare_part_id','spare_parts.code_spare_parts')->sum('spare_parts.price','TotalPart')->sum('estimasi.disc','Diskon')->where('estimasi.checkin_mechanic_id',$dataCheckInMekanik->id_checkin_mechanic)->get();
	
	$results = $db->table('checkin_service_insurance')->leftjoin('service_categories','checkin_service_insurance.service_categori_id','service_categories.id_service_categori')->where('checkin_service_insurance.order_id',request('id_nasabah'))->getAll();
}else{
	$results = $show($table,$selected);
}

if(!empty($results)){
	reponse_ok("Data Tersedia.!",$results);
	exit();
}

