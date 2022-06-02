<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';
require __DIR__.'/../../../helpers/prefix_code.php';

$table      = 'customers';
$primaryKey = 'id_customer';
$selected 	= '';


$kode_login = $uniqueCode('users','user_code');

post();

// $checkKode  = $show_by_id('users','user_code',$kode_login,$selected);
// if(!empty($checkKode)){
// 	$prefixList = 'SR-VA';
// 	$last_number = ((int)substr($checkKode->user_code,5,3)) + 2;
// 	$kode = $prefixList . sprintf("%03s", $last_number);
// }
reponse_ok('kode oke',['kode'=>$kode_login]);
exit();
?>