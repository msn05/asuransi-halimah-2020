<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';

$table      = 'mechanic';
$primaryKey = 'id_mechanic';
$selected 	= '';

$setData 	= [
    'mechanic_name'    	=> request('mechanic_name'),
    'username'          => request('username'),
    'password'          => request('password'),
    'telphone'          => request('telphone')
    
];

$setRules = [
    'mechanic_name'     => 'required|alpha',
    'username'          => 'required|email',
    'password'          => 'required|min:8',
    'telphone'          => 'required|numeric'
];

$setAliases = [
    'mechanic_name'     => 'Nama Mekanik',
    'username'          => 'Username',
    'telphone'          => 'telphone',
    
];

post();

require __DIR__.'/../../../config/validator.php';

$check_data = $show_by_id('users','username',request('username'),$selected);
if(!empty($check_data)){
    response_failed("Username Sudah Digunakan.!");
    exit();
}

$dataMekanik = $show_by_id('mechanic','phone_mechanic',request('telphone'),$selected);
if(!empty($dataMekanik)){
    response_failed("Nomor Telephone Sudah Digunakan.!");
    exit();
}

$dataPenggunanMekanik = [
    'username'      => request('username'),
    'password'      => password_hash(request('password'), PASSWORD_DEFAULT),
    'access_id'     => 2,
    'status_users'  => 'Non Active',
];

$results = $insert('users',$dataPenggunanMekanik);
if(!empty($results)){
    $idPenggunaMekanik = $show_by_id('users','username',request('username'), $selected);
    $dataMekanik = [
        'mechanic_name' => request('mechanic_name'),
        'phone_mechanic'=> request('telphone'),
        'users_id'      => $idPenggunaMekanik->id_users,
    ];
    $Mekanik = $insert($table,$dataMekanik);
    reponse_ok("Berhasil Ditambahkan!", $results);
    exit();
}

