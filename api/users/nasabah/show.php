<?php
require __DIR__.'/../../../config/api_load.php';

$table      = "customers";
$primaryKey = "id_customer";


$joinQuery = "FROM `customers`  LEFT JOIN `users`  ON (`customers`.`users_id` = `users`.`id_users`)";

$extraWhere = "`users`.`access_id`=3";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`customers`.`id_customer`',      'dt' => 'id_customer', 	'field'=>'id_customer' ],
	[ 'db' => '`customers`.`name_company`', 	'dt' => 'name_company', 	'field'=>'name_company' ],
	[ 'db' => '`customers`.`address`', 	'dt' => 'address', 	'field'=>'address' ],
	[ 'db' => '`customers`.`phone_number`', 	'dt' => 'phone_number', 	'field'=>'phone_number' ],
	[ 'db' => '`users`.`username`', 	'dt' => 'username', 	'field'=>'username' ],
	[ 'db' => '`users`.`user_code`', 	'dt' => 'code', 	'field'=>'user_code'] ,
	[ 'db' => '`users`.`status_users`', 	'dt' => 'Aktif', 	'field'=>'status_users'] ,
	[ 'db' => '`users`.`status_users`', 	'dt' => 'status_users', 	'field'=>'status_users' ,
	'formatter' => function($val, $row){
		return $val =="Active" ? "<h6 class='black-text font-medium m-b-0'>Aktif</h6>" : "<h6 class='danger-text font-medium m-b-0'>Tidak Aktif</h6>";
	}
]

];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

