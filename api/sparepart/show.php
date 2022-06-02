<?php
require __DIR__.'/../../config/api_load.php';
require __DIR__.'/../../helpers/rupiah.php';
$table      = "spare_parts";
$primaryKey = "code_spare_parts";



$joinQuery = "FROM `spare_parts`  LEFT JOIN  `mechanic`  ON (`spare_parts`.`users_id` = `mechanic`.`users_id`) ";

$extraWhere = "`spare_parts`.`stock_spare_part` != 0";
$groupBy = "";
$having = "";


$columns = [
	[ 'db' => '`spare_parts`.`code_spare_parts`',      'dt' => 'code_spare_parts', 	'field'=>'code_spare_parts' ],
	[ 'db' => '`spare_parts`.`spare_part_name`', 	'dt' => 'NamaSparepart', 	'field'=>'spare_part_name' ],
	[ 'db' => '`spare_parts`.`stock_spare_part`', 	'dt' => 'Alert', 	'field'=>'stock_spare_part'],
	[ 'db' => '`spare_parts`.`stock_spare_part`', 	'dt' => 'Stok', 	'field'=>'stock_spare_part',
	'formatter' => function($val, $row){
		return $val < 8 ? "<h6 class='red-text font-medium m-b-0'>Stok Sisa ".$val."</h6>" : "<h6 class='success-text font-medium m-b-0'>".$val."</h6>";
	}
],
[ 'db' => '`spare_parts`.`price`', 	'dt' => 'Harga', 	'field'=>'price','formatter'=>function($val){
    return rupiah($val);
}],
[ 'db' => '`mechanic`.`mechanic_name`', 	'dt' => 'NamaKepala', 	'field'=>'mechanic_name' ],
[ 'db' => '`spare_parts`.`created_at`', 	'dt' => 'created_at', 	'field'=>'created_at',
'formatter' => function($d,$row){
	return date( 'd-M-Y', strtotime($d));
}
]


];

echo json_encode(
	SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

);

