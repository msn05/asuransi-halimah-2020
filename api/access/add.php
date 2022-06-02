<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';

$table      = 'access';
$primaryKey = 'id_access';
$selected 	= '';

$setData 	= [
    'access_name'    	=> request('access_name'),
    'access_status'		=> 'be valid'
    
];

$setRules = [
    'access_name'     	=> 'required'
];

$setAliases = [
    'access_name'     	=> 'Nama Akses'
    
];

post();

require __DIR__.'/../../config/validator.php';

$check_data = $show_by_id($table,'access_name',request('access_name'),$selected);
if(!empty($check_data)){
    response_failed("Akses Sudah Ada.!");
    exit();
}

$results = $insert($table, $setData);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

