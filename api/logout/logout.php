<?php
session_start();
session_destroy();
require __DIR__.'/../../config/api_load.php';

$id_users 		= request('id_users'); 
post();


if (!empty($id_users)) {
	unset($id_users);
	 reponse_ok("Berhasil Keluar.");
	 exit();
}


response_failed("Terjadi Kesalahan.!");
exit();
