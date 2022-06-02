<?php

require __DIR__ . '/../vendor/autoload.php';

// 	waktu indonesia Jakarta 
$dateZone = date_default_timezone_set("Asia/Jakarta");


// 	koneksi pdo library dari https://github.com/izniburak/pdox
$config = [
	'host'		=> 'localhost',
	'driver'	=> 'mysql',
	'username'	=> '',
	'password'	=> '',
	'database'	=> '',
	'charset'	=> 'utf8',
	'collation'	=> 'utf8_general_ci',
	'prefix'	 => ''
];

// 	pengecekan koneksi database 
try {
	$db = new \Buki\Pdox($config);
} catch (PDOException $e) {
	echo $e->getMessage();
}



// 	validasi library dari https://github.com/rakit/validation
$validator  = new Rakit\Validation\Validator;
$validator->setMessages([
	//buat validasi
	'required'   	=> ':attribute harus diisi',
	'email'   		=> ':attribute harus diisi email valid',
	'alpha_dash'   	=> ':attribute harus diisi dengan Huruf dan Angka',
	'alpha_num'   	=> ':attribute harus diisi dengan Huruf dan Angka',
]);
