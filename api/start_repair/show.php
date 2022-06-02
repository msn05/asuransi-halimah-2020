<?php
require __DIR__.'/../../config/api_load.php';

$table      = "start_repair";
$primaryKey = "id_start_repair";



$joinQuery = "FROM `start_repair` LEFT JOIN `request_services` ON (`start_repair`.`request_service_id` = `request_services`.`id_request_service`) LEFT JOIN `checkin_mechanic` ON (`request_services`.`id_request_service`=`checkin_mechanic`.`request_service_id`) LEFT JOIN `order_nasabah_customers` ON (`request_services`.`order_id` = `order_nasabah_customers`.`id_order`) LEFT JOIN `nasabah_customer`  ON (`order_nasabah_customers`.`nasabah_customer_id` = `nasabah_customer`.`id_nasabah`) LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`) ";

$extraWhere = "";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`start_repair`.`id_start_repair`',      'dt' => 'id_start_repair', 	'field'=>'id_start_repair' ],
	[ 'db' => '`request_services`.`id_request_service`',      'dt' => 'id_request_service', 	'field'=>'id_request_service' ],
	[ 'db' => '`request_services`.`file_genered`',      'dt' => 'FileData', 	'field'=>'file_genered' ],
	[ 'db' => '`start_repair`.`id_start_repair`',      'dt' => 'id_start_repair', 	'field'=>'id_start_repair' ],
	[ 'db' => '`checkin_mechanic`.`id_checkin_mechanic`',      'dt' => 'id_checkin_mechanic', 	'field'=>'id_checkin_mechanic' ],
	[ 'db' => '`start_repair`.`actions_repair`',      'dt' => 'StatusPerbaikan', 	'field'=>'actions_repair' ],
	[ 'db' => '`request_services`.`created_at`',      'dt' => 'MasukPengajuan', 	'field'=>'created_at' ],
	[ 'db' => '`request_services`.`actions`',      'dt' => 'Status', 	'field'=>'actions' ],
	[ 'db' => '`request_services`.`customer_checkin`',      'dt' => 'INC', 	'field'=>'customer_checkin' ],
	[ 'db' => '`order_nasabah_customers`.`price`',      'dt' => 'maxPrice', 	'field'=>'max_price' ],
	[ 'db' => '`order_nasabah_customers`.`id_order`',      'dt' => 'claim', 	'field'=>'id_order' ],
	[ 'db' => '`request_services`.`customer_checkin`',      'dt' => 'PelangganDatang', 	'field'=>'customer_checkin','formatter' => function($val,$row){
		return $val != null ? "<h6 class='red-text font-medium m-b-0'>Sudah Datang</h6>" : "<h6 class='success-text font-medium m-b-0'>Belum Datang</h6>";
	} ],
	[ 'db' => '`order_nasabah_customers`.`coments`',      'dt' => 'PengecekanAsuransi', 	'field'=>'coments',
	'formatter' => function($val, $row){
		return htmlspecialchars_decode(htmlspecialchars_decode($val));
	} ],

	[ 'db' => '`nasabah_customer`.`name_nasabah`', 	'dt' => 'namaPLnasabah', 	'field'=>'name_nasabah' ],
	[ 'db' => '`customers`.`name_company`', 	'dt' => 'NamaInsurance', 	'field'=>'name_company'],
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

