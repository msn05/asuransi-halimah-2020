<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';
require __DIR__.'/../../helpers/prefix_code.php';

$table      = 'order_nasabah_customers';
$primaryKey = 'id_order';
$selected 	= '';



post();
if(request($primaryKey)){
	$kodeClaim = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
}else{

	$kodeClaim = $uniqueCode($table,$primaryKey);
}
reponse_ok('kode oke',['kode'=>$kodeClaim]);
exit();
?>