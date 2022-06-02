<?php
require __DIR__.'/../../../config/api_load.php';

$table      = "mechanic";
$primaryKey = "id_mechanic";



$joinQuery = "FROM `mechanic`  LEFT JOIN `users`  ON (`mechanic`.`users_id` = `users`.`id_users`)";

$extraWhere = "`users`.`access_id`=2 OR `users`.`access_id`=7";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`mechanic`.`id_mechanic`',      'dt' => 'id_mechanic', 	'field'=>'id_mechanic' ],
	[ 'db' => '`mechanic`.`mechanic_name`', 	'dt' => 'mechanic_name', 	'field'=>'mechanic_name' ],
	[ 'db' => '`mechanic`.`phone_mechanic`', 	'dt' => 'phone_mechanic', 	'field'=>'phone_mechanic' ],
	[ 'db' => '`users`.`id_users`', 	'dt' => 'id_users', 	'field'=>'id_users' ],
	[ 'db' => '`users`.`access_id`', 	'dt' => 'access_id', 	'field'=>'access_id' ],
	[ 'db' => '`users`.`user_code`', 	'dt' => 'code', 	'field'=>'user_code' ],
	[ 'db' => '`users`.`username`', 	'dt' => 'username', 	'field'=>'username' ],
	[ 'db' => '`users`.`created_at`', 	'dt' => 'created_at', 	'field'=>'created_at',
	'formatter' => function($d,$row){
		return date( 'd-M-Y', strtotime($d));
	}
],
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

