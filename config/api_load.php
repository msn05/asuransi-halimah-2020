<?php
require __DIR__.'/../helpers/ssp_class.php';

include __DIR__.'/database.php';
session_start();

require __DIR__.'/../helpers/respone.php';
require __DIR__.'/../helpers/request.php';
require __DIR__.'/../helpers/proccessing_database.php';
require __DIR__.'/../helpers/method_type.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


