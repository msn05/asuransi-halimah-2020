<?php

// dari folder config
require __DIR__.'/../../../config/api_load.php';

$table      = 'mechanic';
$primaryKey = 'id_mechanic';
$selected 	= '';

$keterangan = request('keterangan');
if($keterangan == 'status'){
	$setData 	= [
		'id_users'    	=> request('id_users'),
		'status_users'    	=> request('status'),
	];
	$setRules = [
		'id_users'     	=> 'required',
		'status_users'  => 'required',
	];
	$setAliases = [
		'status_users'     => 'Status Users',
	];

	post();

	require __DIR__.'/../../../config/validator.php';

	$dataUsers = ['status_users' => request('status')];
	$results 	= $update('users', 'id_users', request('id_users'),$dataUsers);
	reponse_ok("Berhasil Diupdate!",$results);
	exit(); 


}elseif($keterangan =='null'){

	$setData 	= [
		'id_mechanic'    	=> request('id_mechanic'),
		'mechanic_name'    	=> request('mechanic_name'),
		'username'          => request('username'),
		'telphone'          => request('telphone'),
		'password'          => request('password')

	];

	$setRules = [
		'id_mechanic'     	=> 'required',
		'mechanic_name'     => 'required|alpha_spaces',
		'username'          => 'required|email',
		'telphone'          => 'required|numeric'
	];

	$setAliases = [
		'mechanic_name'     => 'Nama Mekanik',
		'username'          => 'Username',
		'telphone'          => 'telphone',

	];

	post();

	require __DIR__.'/../../../config/validator.php';

	$dataMekanik = $show_by_id($table,$primaryKey,request('id_mechanic'),$selected);
	$check_data = $show_by_id('users','id_users',$dataMekanik->users_id,$selected);


	if(request('password') == null){
		if($check_data->username === request('username') || $dataMekanik->phone_mechanic === request('telephone')){
			$dataUpdate = ['mechanic_name' => request('mechanic_name')];
			$results 	= $update($table, $primaryKey, request($primaryKey),$dataUpdate);
			if(!empty($results)){
				reponse_ok("Berhasil Diupdate!",$results);
				exit(); 
			}
		}
		// $dataUbahMekanik = $show_by_id($table,'phone_mechanic',request('telphone'),$selected);
		$dataUbahUsers 	 = $show_by_id('users','username',request('username'),$selected);
		if(!empty($dataUbahUsers->username)){
			response_failed("Username sudah digunakan.!");
			exit(); 
		}
		$dataUsers = ['username' => request('username')];
		$results 	= $update('users', 'id_users', $dataMekanik->users_id,$dataUsers);
		reponse_ok("Berhasil Diupdate!",$results);
		exit(); 

	}
	$dataUsers = ['password' => password_hash(request('password'), PASSWORD_DEFAULT)];

	$results 	= $update('users', 'id_users', $dataMekanik->users_id,$dataUsers);
	if(!empty($results)){
		reponse_ok("Berhasil Diupdate!",$results);
		exit(); 
	}

}else{
	$setData 	= [
		'id_users'    	=> request('id_users'),
		'status_users'    	=> 'Non Active',
	];
	$setRules = [
		'id_users'     	=> 'required',
	];
	$setAliases = [
		'id_users'     => 'Pilih Mekanik',
	];

	delete();

	require __DIR__.'/../../../config/validator.php';

	$dataMekanikID 	= $show_by_id($table, 'users_id', request('id_users'),$selected);
	$results 	= $delete('users', 'id_users', request('id_users'));
	if(!empty($results)){
		$deleteDataMekanik = $delete($table,'id_mechanic',$dataMekanikID->id_mechanic);
		reponse_ok("Berhasil Di Hapus!");
		exit(); 
	}
	response_failed("Terjadi Kesalahan.!");
	exit(); 
}
