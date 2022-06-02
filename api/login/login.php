<?php
require __DIR__.'/../../config/api_load.php';

$table = 'users';
$selected = '';
$setData = [
    'user_code' => request('username'),
    'password' => request('password')
];


$setRules = [
    'user_code' => 'required',
    'password' => 'required|min:8'
];

$setAliases = [
    'user_code' => 'Kode Pengguna',
    'password' => 'Password'
];

post();

require __DIR__.'/../../config/validator.php';

$user_code = request('username');
$password = trim(request('password'));

$users = $show_by_id($table,'user_code',$user_code, $selected);
if (empty($users)) {
    response_failed("Kode Login/Password Yg Dimasukkan Salah!");
    exit();
}

if($users->status_users === 'Active'){

    $isValidLogin = !empty($users) && password_verify($password, $users->password);
    // if(true){
    if($isValidLogin){
        if(!isset($_SESSION)) { session_start(); }
        reponse_ok("Berhasil.",[
            $_SESSION['username']    = $users->username,
            $_SESSION['id_users']     = $users->id_users,
            $_SESSION['access_id'] 	  = $users->access_id,
            $_SESSION['SuccessLogin'] = true
        ]);
        exit();
    }
    response_failed("Kode Login/Password Yg Dimasukkan Salah!");
    exit();
}
response_failed("Maaf Status Akun Dinonaktifkan.!");
exit();


