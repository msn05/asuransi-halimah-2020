<?php
require __DIR__.'/../../config/api_load.php';

$table      = "access";
$primaryKey = "id_access";


$columns = [
    [ 'db' => 'id_access',      'dt' => 'id_access', 	'field'=>'id_access' ],
    [ 'db' => 'access_name', 	'dt' => 'access_name', 	'field'=>'access_name' ],
    [ 'db' => 'access_status',	'dt' =>'access_status', 'field'=>'access_status',
    'formatter' => function($val, $row){
        return $val =="be valid" ? "<h6 class='black-text font-medium m-b-0'>Aktif</h6>" : "<h6 class='danger-text font-medium m-b-0'>Tidak Aktif</h6>";
    }
]
];

echo json_encode(
    SSP::simple( $_POST, $config, $table, $primaryKey, $columns )
);

