<?php
require __DIR__.'/../../config/api_load.php';

$table      = "checkin_service_insurance";
$primaryKey = "id_checkin_insurance";


$kode = $_POST['kode'];

$joinQuery = "FROM `checkin_service_insurance`  LEFT JOIN  `service_categories`  ON (`checkin_service_insurance`.`service_categori_id` = `service_categories`.`id_service_categori`) ";
$extraWhere = "";
$groupBy = "";
$having = "";

if(!empty($kode)){
    $extraWhere = "`checkin_service_insurance`.`order_id`='".$kode."'";
}

$columns = [
	[ 'db' => '`checkin_service_insurance`.`id_checkin_insurance`',      'dt' => 'id_checkin_insurance', 	'field'=>'id_checkin_insurance' ],
	[ 'db' => '`checkin_service_insurance`.`repair`',      'dt' => 'Repair', 	'field'=>'repair','formatter'=>function($val){
		return $val == 1 ? 'Ya' : 'Tidak';
	}],
	[ 'db' => '`checkin_service_insurance`.`perbaikan`',      'dt' => 'Replace', 	'field'=>'perbaikan','formatter'=>function($val){
		return $val == 1 ? 'Ya' : 'Tidak';
	}],

	[ 'db' => '`checkin_service_insurance`.`damage`',      'dt' => 'Kerusakan', 	'field'=>'damage','formatter'=>function($val){
	    return $val == 's' ? 'Sedang' : ($val == 'p' ? 'Parah' : 'Berat');
	} ],

	[ 'db' => '`service_categories`.`name_service`', 	'dt' => 'namaJasa', 	'field'=>'name_service' ]

];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

