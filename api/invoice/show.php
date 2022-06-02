<?php
require __DIR__.'/../../config/api_load.php';

$table      = "invoice";
$primaryKey = "id_invoice";
$sessionUsers = $_SESSION['id_users'];

$joinQuery = "FROM `invoice` LEFT JOIN `start_repair` ON (`invoice`.`start_repair_id`=`start_repair`.`id_start_repair`) LEFT JOIN `request_services` ON (`start_repair`.`request_service_id` = `request_services`.`id_request_service`) LEFT JOIN `order_nasabah_customers` ON (`request_services`.`order_id` = `order_nasabah_customers`.`id_order`) LEFT JOIN `nasabah_customer`  ON (`order_nasabah_customers`.`nasabah_customer_id` = `nasabah_customer`.`id_nasabah`) LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`)";

$extraWhere = "";
$groupBy = "";
$having = "";
$select = '`invoice`.`created_at` as `Tanggal`';

// $id = $_POST['id_nasabah'];

if($sessionRole == 3){
	if($extraWhere == ''){
		$extraWhere .= '`customers`.`users_id`='.$sessionUsers.'';
	}
}else{
	$extraWhere .='';
}

$columns = [
	[ 'db' => '`invoice`.`id_invoice`',      'dt' => 'id_invoice', 	'field'=>'id_invoice' ],
	[ 'db' => '`invoice`.`start_repair_id`',      'dt' => 'NamaSparepart', 	'field'=>'start_repair_id' ],
	[ 'db' => '`invoice`.`created_at`',      'dt' => 'Tanggal', 	'field'=>'Tanggal','as'=>'Tanggal' ],
	[ 'db' => '`order_nasabah_customers`.`id_order`',      'dt' => 'id_order', 	'field'=>'id_order']
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

