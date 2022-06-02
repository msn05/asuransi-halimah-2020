<?php

$uniqueCode = function ($table, $prefix_params, $prefix_code = null) use (&$db) {
	$prefixList = (object) [
		'users'       			=> 'SR-VA',
		'order_nasabah_customers' 	=> 'CA-TP',
		'start_repair'				=> 'SPK-K',
		'invoice'				=> 'INV-P'
	];

	if (is_null($prefix_code)) {
		$prefix_code = property_exists($prefixList, $table) ? $prefixList->$table : null;
		// If Still Null
		if (is_null($prefix_code)) {
			return null;
		}
	}

	$last_prefix = $db->table($table)->max($prefix_params,'name')->get();
	$last_number = ((int)substr($last_prefix->name,5,5)) + 1;

	return $prefix_code . sprintf("%03s", $last_number);
};