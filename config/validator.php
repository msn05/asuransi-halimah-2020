<?php

if (!isset($setData)) {
    response_failed("Form Input (data) Belum Disetup");
    exit();
}

if (!isset($setRules)) {
    response_failed("Rule Belum Disetup");
    exit();
}

if (!isset($setAliases)) {
    response_failed("Alias Belum Disetup");
    exit();
}

$validation = $validator->validate($setData, $setRules);


$validation->setAliases($setAliases);

$validation->validate();

$validData = $validation->getValidData();

if($validation->fails()){
    $message = $validation->errors()->all();
    response_failed($message);
    exit();
}

