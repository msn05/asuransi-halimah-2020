<?php
require __DIR__.'/../../config/api_load.php';

$table      = "invoice";
$primaryKey = "id_invoice";
$sessionUsers = $_SESSION['id_users'];

$joinQuery = "FROM `invoice` LEFT JOIN `start_repair` ON (`invoice`.`start_repair_id`=`start_repair`.`id_start_repair`) LEFT JOIN `request_services` ON (`start_repair`.`request_service_id` = `request_services`.`id_request_service`) LEFT JOIN `order_nasabah_customers` ON (`request_services`.`order_id` = `order_nasabah_customers`.`id_order`) LEFT JOIN `nasabah_customer`  ON (`order_nasabah_customers`.`nasabah_customer_id` = `nasabah_customer`.`id_nasabah`) LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`)";


$TanggalBayar 	= $_POST['Tanggal'];
$TanggalTwo 	= $_POST['TanggalTwo'];
$starter        = strtotime($TanggalBayar);
$Two        = strtotime($TanggalTwo);
$mulai          = date('Y-m-d H:i:s',$starter);
$end          = date('Y-m-d H:i:s',$Two);

$extraWhere = "";
$groupBy = "";
$having = "";
$select = '`invoice`.`created_at` as `Tanggal`';

if($extraWhere == ''){
	$extraWhere .= "`invoice`.`created_at` BETWEEN '".$mulai."' AND '".$end."'";
}

$columns = [
	[ 'db' => '`invoice`.`id_invoice`',      'dt' => 'id_invoice', 	'field'=>'id_invoice' ],
	[ 'db' => '`invoice`.`start_repair_id`',      'dt' => 'NamaSparepart', 	'field'=>'start_repair_id' ],
	[ 'db' => '`invoice`.`created_at`',      'dt' => 'Tanggal', 	'field'=>'Tanggal','as'=>'Tanggal' ],
	[ 'db' => '`customers`.`name_company`',      'dt' => 'NamaPS', 	'field'=>'name_company' ],
	[ 'db' => '`nasabah_customer`.`name_nasabah`',      'dt' => 'NamaPelanggannya', 	'field'=>'name_nasabah' ],
	[ 'db' => '`order_nasabah_customers`.`plate`',      'dt' => 'Plat', 	'field'=>'plate'],
	[ 'db' => '`order_nasabah_customers`.`id_order`',      'dt' => 'id_order', 	'field'=>'id_order']
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

