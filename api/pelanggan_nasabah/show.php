<?php
require __DIR__.'/../../config/api_load.php';

$table      = "nasabah_customer";
$primaryKey = "id_nasabah";
$sessionUsers 	= $_SESSION['id_users'];
$sessionRole 	= $_SESSION['access_id'];



$joinQuery = "FROM `nasabah_customer`  LEFT JOIN `customers`  ON (`nasabah_customer`.`customers_id` = `customers`.`id_customer`) ";

$extraWhere = "";
$groupBy = "";
$having = "";
if($sessionRole == 3){
	if($extraWhere == ''){
		$extraWhere .= '`customers`.`users_id`='.$sessionUsers.'';
	}
}else{
	$extraWhere .='';
}

$columns = [
	[ 'db' => '`nasabah_customer`.`id_nasabah`',      'dt' => 'id_nasabah', 	'field'=>'id_nasabah' ],
	[ 'db' => '`nasabah_customer`.`name_nasabah`', 	'dt' => 'namaPLnasabah', 	'field'=>'name_nasabah' ],
	[ 'db' => '`nasabah_customer`.`phone_number_nasabah`', 	'dt' => 'PhoneNasabah', 	'field'=>'phone_number_nasabah'],
	[ 'db' => '`nasabah_customer`.`email`', 	'dt' => 'emailsPelanggan', 	'field'=>'email'],
	[ 'db' => '`nasabah_customer`.`address_nasabah`', 	'dt' => 'jalan', 	'field'=>'address_nasabah'],
	[ 'db' => '`customers`.`name_company`', 	'dt' => 'NamaInsurance', 	'field'=>'name_company']
];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

