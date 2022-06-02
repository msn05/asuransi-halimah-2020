<?php
require __DIR__.'/../../config/api_load.php';

$table      = "checkin_mechanic";
$primaryKey = "id_checkin_mechanic";



$joinQuery = "FROM `checkin_mechanic` LEFT JOIN `request_services` ON (`checkin_mechanic`.`request_service_id` = `request_services`.`id_request_service`) LEFT JOIN `order_nasabah_customers` ON (`request_services`.`order_id` = `order_nasabah_customers`.`id_order`) LEFT JOIN `nasabah_customer`  ON (`order_nasabah_customers`.`nasabah_customer_id` = `nasabah_customer`.`id_nasabah`) LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`)";

$extraWhere = "";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`checkin_mechanic`.`id_checkin_mechanic`',      'dt' => 'id_checkin_mechanic', 	'field'=>'id_checkin_mechanic' ],
	[ 'db' => '`checkin_mechanic`.`actions_checkin`',      'dt' => 'actions_checkin', 	'field'=>'actions_checkin' ],
	[ 'db' => '`request_services`.`created_at`',      'dt' => 'MasukPengajuan', 	'field'=>'created_at' ],
	[ 'db' => '`request_services`.`file_genered`',      'dt' => 'FileNya', 	'field'=>'file_genered' ],
	[ 'db' => '`checkin_mechanic`.`actions_checkin`',      'dt' => 'Status', 	'field'=>'actions' ],
	
	[ 'db' => '`order_nasabah_customers`.`plate`',      'dt' => 'PlateKendaraan', 	'field'=>'plate'],
	[ 'db' => '`order_nasabah_customers`.`id_order`',      'dt' => 'claim', 	'field'=>'id_order'],
	[ 'db' => '`order_nasabah_customers`.`coments`',      'dt' => 'PengecekanAsuransi', 	'field'=>'coments',
	'formatter' => function($val, $row){
		return htmlspecialchars_decode(htmlspecialchars_decode($val));
	} ],

	[ 'db' => '`nasabah_customer`.`name_nasabah`', 	'dt' => 'namaPLnasabah', 	'field'=>'name_nasabah' ],
	[ 'db' => '`nasabah_customer`.`id_nasabah`', 	'dt' => 'id_nasabah', 	'field'=>'id_nasabah' ],
	[ 'db' => '`customers`.`name_company`', 	'dt' => 'NamaInsurance', 	'field'=>'name_company'],
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

