<?php
require __DIR__.'/../../config/api_load.php';

$table      = "order_nasabah_customers";
$primaryKey = "id_order";
$sessionUsers 	= $_SESSION['id_users'];
$sessionRole 	= $_SESSION['access_id'];



$joinQuery = "FROM `order_nasabah_customers` LEFT JOIN ( select `ci`.`order_id`,COUNT(`ci`.`order_id`) AS `TOTAL` FROM `checkin_service_insurance` as `ci` group by `ci`.`order_id`) AS `Hasil` ON (`order_nasabah_customers`.`id_order`=`Hasil`.`order_id`)";

$extraWhere = "";
$groupBy = "";
$having = "";
$select = '`order_nasabah_customers`.*,`Hasil`.`TOTAL` AS `Total`';

$id = $_POST['id_nasabah'];

if($sessionRole == 3){
	if($extraWhere == ''){
		$extraWhere .= '`order_nasabah_customers`.`nasabah_customer_id`='.$id.'';
	}
}else{
	$extraWhere .='';
}

$columns = [
	[ 'db' => 'id_order',      'dt' => 'id_order', 	'field'=>'id_order' ],
	[ 'db' => 'plate', 	'dt' => 'plate', 	'field'=>'plate' ],
	[ 'db' => 'type', 	'dt' => 'type', 	'field'=>'type'],
	[ 'db' => 'merk', 	'dt' => 'merk', 	'field'=>'merk'],
	[ 'db' => 'year', 	'dt' => 'year', 	'field'=>'year'],
	[ 'db' => 'color', 	'dt' => 'color', 	'field'=>'color'],
	[ 'db' => 'Total', 	'dt' => 'Total', 	'field'=>'Total'],
	[ 'db' => 'created_at', 	'dt' => 'created_at', 	'field'=>'created_at','formatter'=>function($d){
		return date('d-M-Y',strtotime($d));
	}],
	[ 'db' => 'actions_order', 	'dt' => 'StatusOrder', 	'field'=>'actions_order']
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

