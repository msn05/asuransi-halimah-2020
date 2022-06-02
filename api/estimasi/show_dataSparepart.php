<?php
require __DIR__.'/../../config/api_load.php';


$keterangan = request('keterangan');

if($keterangan == 'sparepart'){

	$table      = "estimasi";
	$primaryKey = "id_estimasi";


	$joinQuery = "FROM `estimasi`  LEFT JOIN `spare_parts`  ON (`estimasi`.`spare_part_id` = `spare_parts`.`code_spare_parts`) LEFT JOIN `checkin_mechanic` ON (`estimasi`.`checkin_mechanic_id` = `checkin_mechanic`.`id_checkin_mechanic`) ";

	$extraWhere = "`estimasi`.`checkin_mechanic_id`=".$_POST['id']."";
	$groupBy = "";
	$having = "";


	$columns = [
		[ 'db' => '`estimasi`.`id_estimasi`',      'dt' => 'id_estimasi', 	'field'=>'id_estimasi' ],
		[ 'db' => '`spare_parts`.`spare_part_name`', 	'dt' => 'spare_part_name', 	'field'=>'spare_part_name' ],
		[ 'db' => '`estimasi`.`qty_sparepart`', 	'dt' => 'Jumlah', 	'field'=>'qty_sparepart' ],
		[ 'db' => '`estimasi`.`disc`', 	'dt' => 'disc', 	'field'=>'disc' ],
		[ 'db' => '`spare_parts`.`price`', 	'dt' => 'Harga', 	'field'=>'price' ]

	];

	echo json_encode(
		SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

	);

}else{
	$table      = "fee_service";
	$primaryKey = "id_fee_service";

	$joinQuery = "";

	$extraWhere = "`fee_service`.`checkin_mechanic_id`=".$_POST['id']."";
	$groupBy = "";
	$having = "";


	$columns = [
		[ 'db' => 'id_fee_service',      'dt' => 'id_estimasi', 	'field'=>'id_fee_service' ],
		[ 'db' => 'name_service', 	'dt' => 'spare_part_name', 	'field'=>'name_service' ],
		[ 'db' => 'price', 	'dt' => 'Jumlah', 	'field'=>'price' ]

	];

	echo json_encode(
		SSP::simple( $_POST, $config, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )

	);

}