<?php
require __DIR__.'/../../config/api_load.php';

$table      = "nasabah_customer";
$primaryKey = "id_nasabah";
$sessionUsers 	= $_SESSION['id_users'];
$sessionRole 	= $_SESSION['access_id'];



$joinQuery = "FROM `nasabah_customer`  LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`) LEFT JOIN `order_nasabah_customers` ON (`nasabah_customer`.`id_nasabah`=`order_nasabah_customers`.`nasabah_customer_id`) ";

$extraWhere = "";
$groupBy = "";
$having = "";
$selected = '`order_nasabah_customers`.`created_at`=`TanggalOrder`';
$TanggalBayar 	= $_POST['Tanggal'];
$TanggalTwo 	= $_POST['TanggalTwo'];
$starter        = strtotime($TanggalBayar);
$Two        	= strtotime($TanggalTwo);
$mulai          = date('Y-m-d H:i:s',$starter);
$end          = date('Y-m-d H:i:s',$Two);


if($extraWhere == ''){
	$extraWhere .= "`order_nasabah_customers`.`created_at` BETWEEN '".$mulai."' AND '".$end."'";
}

$columns = [
	[ 'db' => '`nasabah_customer`.`id_nasabah`',      'dt' => 'id', 	'field'=>'id_nasabah' ],
	[ 'db' => '`nasabah_customer`.`name_nasabah`', 	'dt' => 'NamaPelanggan', 	'field'=>'name_nasabah' ],
	[ 'db' => '`nasabah_customer`.`phone_number_nasabah`', 	'dt' => 'Telpone', 	'field'=>'phone_number_nasabah'],

	[ 'db' => '`customers`.`name_company`', 	'dt' => 'namaAsuransi', 	'field'=>'name_company'],
	[ 'db' => '`order_nasabah_customers`.`created_at`', 	'dt' => 'TanggalOrder', 	'field'=>'TanggalOrder','as'=>'TanggalOrder']
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

