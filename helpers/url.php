<?php

// 	fungsi uri ini digunakan supaya tidak menulis ulang alamat tujuan dengan 		diinisiakan menggunkan variable

function uri($url = null) {
	$base_url = sprintf(
		// mengecek komunikasi jaringan pada browser yang digunakan
		"%s://%s%s",
		isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
		$_SERVER['SERVER_NAME'],
		in_array($_SERVER['SERVER_PORT'], [80, 443]) ? '' : ":" . $_SERVER['SERVER_PORT']
	);


	if ($url != null) {
		return $base_url."/".$url;
	} else {
		$base_url = "{$base_url}/vendors";
		return $base_url ;
	}
}

$Apps = 'Asuransi Kendaraan CV. TIARA PERSADA';
