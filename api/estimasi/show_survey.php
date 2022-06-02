<?php
require __DIR__.'/../../config/api_load.php';

$table      = "checkin_service_insurance";
$primaryKey = "id_checkin_insurance";



$joinQuery = "FROM `checkin_service_insurance` LEFT JOIN `service_categories` ON (`checkin_service_insurance`.`service_categori_id` = `service_categories`.`id_service_categori`)";

$id_nasabah = $_POST['id_nasabah'];

$extraWhere = "`checkin_service_insurance`.`order_id`='".$id_nasabah."'";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`checkin_service_insurance`.`id_checkin_insurance`',      'dt' => 'id', 	'field'=>'id_checkin_insurance' ],
	[ 'db' => '`service_categories`.`name_service`',      'dt' => 'name_service', 	'field'=>'name_service' ]

];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

