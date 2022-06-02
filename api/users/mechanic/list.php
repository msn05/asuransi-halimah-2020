<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';

$table      = 'mechanic';
$primaryKey = 'id_mechanic';
$selected 	= '';


post();

// require __DIR__.'/../../../config/validator.php';

// $check_data = $show_by_id('users','username',request('username'),$selected);
if(request($primaryKey)){
    // response_failed("Username Sudah Digunakan.!");
    // exit();
}else{
    $results = $show($table,$selected);
}

if(!empty($results)){
    reponse_ok("Data Tersedia.!", $results);
    exit();
}

