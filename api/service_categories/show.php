<?php
require __DIR__.'/../../config/api_load.php';

$table      = "service_categories";
$primaryKey = "id_service_categori";

$joinQuery = "";
$extraWhere = "";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => 'id_service_categori',      'dt' => 'id_service_categori', 	'field'=>'id_service_categori'],
	[ 'db' => 'group_name', 	'dt' => 'group', 	'field'=>'group_name' ],
	[ 'db' => 'name_service', 	'dt' => 'name_service', 	'field'=>'name_service' ],
	[ 'db' => 'created_at', 	'dt' => 'created_at', 	'field'=>'created_at','formatter'=>function($d){
		return date('d-M-Y',strtotime($d));
	}]
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

