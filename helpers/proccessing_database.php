<?php
// $db->transaction();
$show = function ($table,$selected) use (&$db){

	try {
		if(!empty($selected)){
			$data = $db->table($table)->select($selected)->getAll();;
		}else{
			$data = $db->table($table)->getAll();;
		}

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$filter_data = function ($table, $where_data) use (&$db){

	try {

		$data = $db->table($table)->where($where_data)->get();

	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$show_by_id = function ($table, $where_field, $id, $selected ) use (&$db){
	try {
		if(!empty($selected)){
			$data = $db->table($table)->select($selected)->where($where_field, $id)->get();
		}else{
			$data = $db->table($table)->where($where_field, $id)->get();

		}


	} catch (PDOException $e) {

		// return $e->getMessage();
		return null;

	}

	return $data;
};


$insert = function ($table, $data) use (&$db){

	try {
		$db->transaction($db->table($table)->insert($data));
		$id = $db->insertId();
		// var_dump($id);die();

		$db->commit();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}
	return (object)[
		'id'   => $id,
		'data' => $data
	];
};

$update = function ($table, $where_field, $id, $data) use (&$db){
	try {
		$result = $db->table($table)->where($where_field, $id)->get();

		if (empty($result)) {
			return null;
		}

		$db->transaction($db->table($table)->where($where_field, $id)->update($data));

		$db->commit();

		$result = $db->table($table)->where($where_field, $id)->get();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}

	return (object)[
		'id'   => $id,
		'data' => $result,
	];
};


$delete = function ($table, $where_field, $id) use (&$db){
	try {

		$result = $db->table($table)->where($where_field, $id)->get();

		if (empty($result)) {
			return null;
		}

		$db->table($table)->where($where_field, $id)->delete();

		$db->commit();

	} catch (PDOException $e) {

		$db->rollBack();
		// return $e->getMessage();
		return null;

	}

	return (object)[
		'id'   => $id,
		'data' => null,
	];
};