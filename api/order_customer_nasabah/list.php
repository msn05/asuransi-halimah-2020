<?php

// dari folder config
require __DIR__.'/../../config/api_load.php';
require __DIR__.'/../../helpers/prefix_code.php';
require __DIR__.'/../../helpers/rupiah.php';

$table      = 'order_nasabah_customers';
$primaryKey = 'id_order';
$selected 	= '';



post();
if(request($primaryKey)){
	$kodeClaim = $show_by_id($table,$primaryKey,request($primaryKey),$selected);
	reponse_ok('kode oke',['kendaraan'=>$kodeClaim]);
	exit();
}elseif(request('id_nasabah')){
	$Kendaraan = $show_by_id($table,$primaryKey,request('id_nasabah'),$selected);
	$Pelanggan = $show_by_id('nasabah_customer','id_nasabah',$Kendaraan->nasabah_customer_id,$selected);

	// $kodeClaim = $uniqueCode($table,$primaryKey);
	reponse_ok('kode oke',['kendaraan'=>$Kendaraan,'pelanggan'=>$Pelanggan]);
	exit();
}elseif(request('order')){
	$Kendaraan = $show_by_id($table,$primaryKey,request('order'),$selected);
	$Req = $show_by_id('request_services','order_id',$Kendaraan->id_order,$selected);
	$Checkin = $show_by_id('checkin_mechanic','request_service_id',$Req->id_request_service,$selected);
	$Pelanggan = $show_by_id('nasabah_customer','id_nasabah',$Kendaraan->nasabah_customer_id,$selected);
	$Asuransi = $show_by_id('customers','id_customer',$Pelanggan->customers_id,$selected);

	$Repair = $show_by_id('start_repair','request_service_id',$Req->id_request_service,$selected);
	$Invoice = $show_by_id('invoice','start_repair_id',$Repair->id_start_repair,$selected);
	// $Mat = $Repair->id_start_repair;
	$Mat = $Invoice->material_cost;
	$TotalPekerjaan = $db->table('fee_service')->sum('price','Pekerjaan')->where('checkin_mechanic_id',$Checkin->id_checkin_mechanic)->get();
	$dataTotalPart = $db->table('estimasi')->leftjoin('spare_parts','estimasi.spare_part_id','spare_parts.code_spare_parts')->sum('spare_parts.price','TotalPart')->sum('estimasi.disc','Diskon')->where('estimasi.checkin_mechanic_id',$Checkin->id_checkin_mechanic)->get();
	$SubGrand = ($dataTotalPart->Diskon / 100 * $dataTotalPart->TotalPart);
	$SubGrandPrice = ($dataTotalPart->TotalPart - $SubGrand);
	$TotalPart = $SubGrandPrice;
	// $Derek = $Invoice->crane_fee;
	$Derek = $Invoice->crane_fee;
	$pph = $Invoice->pph;
	$adm = $Invoice->admin_cost;
	$OSR = $Invoice->amount_or;
	$sal = $Invoice->salvage;
	$TotalJasa = $TotalPekerjaan->Pekerjaan;
	$Mat = $Invoice->material_cost;
	$Totals = ($TotalPart + $TotalJasa + $Derek + $pph + $adm + $OSR + $sal + $Mat);
	if($Totals > $Kendaraan->price ){
		$TS = $Totals-$Kendaraan->price ;
		$Terbuat = $Kendaraan->price;
		$Totals = $Terbuat;
		$Terb = terbilang($Totals);
		$Comentss = terbilang($TS);
	}else{
		$TS = $Kendaraan->price - $Totals;
		$Terb = terbilang($Totals);
		$Terbuat = $TS;
		$Comentss = "Tidak Ada Beban";
	}
	
	reponse_ok('ditemukan',['kode oke','kendaraan'=>$Kendaraan,'Terbilang'=>$Terb,'pelanggan'=>$Pelanggan,'Asuransi'=>$Asuransi,'Chas'=>$Checkin,'TotalJasa'=>$TotalJasa,'Mat'=>$Mat,'TotalPart'=>$TotalPart,'Derek'=>$Derek,'OSR'=>$OSR,'sal'=>$sal,'adm'=>$adm,'pph'=>$pph,'Terbuat'=>$Terbuat,'TSPRice'=>$Totals,'ket'=>$Comentss]);
	exit();
}
?>