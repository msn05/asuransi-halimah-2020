<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';

$table      = 'users';
$primaryKey = 'id_users';
$selected 	= '';

$setData 	= [
    'username'    	=> request('username'),
    'password'		=> request('password'),
    'access_id'		=> request('access_id'),
    
];

$setRules = [
    'username'     	=> 'required|email',
    'password'     	=> 'required|alpha_num|min:8',
    'access_id'		=> 'required'
];

$setAliases = [
    'username'     	=> 'Username',
    'password'     	=> 'Password',
    'access_id'  	=> 'Akses Pengguna'
    
];

post();

require __DIR__.'/../../config/validator.php';
$check_data = $show_by_id($table,'username',request('username'),$selected);
if(!empty($check_data)){
    response_failed("Username Sudah Ada.!");
    exit();
}

if($check_data->status_users === 'Active'){
	  response_failed("Username sudah ada dan Aktif.!");
    exit();
}

if($check_data->status_users === 'Non Active'){
	  response_failed("Username sudah ada dan Namun Tidak Aktif.!");
    exit();
}


$dataInsert = [
	'username'    	=> request('username'),
    'password'		=> password_hash(request('password'), PASSWORD_DEFAULT),
    'access_id'		=> request('access_id'),
    'status_users'	=> 'Active',
];

$results = $insert($table, $dataInsert);

if(!empty($results)){
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

