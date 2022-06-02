<?php

/*function cek request data dari var atau input*/
function request($params){
    $request = json_decode(file_get_contents("php://input"));
    return $request?->{$params} ?? ($_POST[$params] ?? ($_GET[$params] ?? NULL));
}
