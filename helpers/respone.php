<?php
function reponse_json(int $code = 200, $messages = "200 OK", $data = null){
	$reponse = http_response_code($code);
	echo json_encode([
		"status"   => $code,
		"messages" => $messages,
		"data"     => $data,
	]);
	return $reponse;
}

function reponse_ok($messages = 'Berhasil', $data = null){
	return reponse_json(200, $messages, $data);
}

function reponse_not_found($messages = 'Halaman Tidak Ditemukan!', $data = null){
	return reponse_json(404, $messages, $data);
}

function Unauthorized($messages = "Tidak Meliki Akses.", $data = null){
	return reponse_json(401, $messages, $data);
}

function response_failed($messages = "Gagal.", $data = null){
	return reponse_json(400, $messages, $data);
}

