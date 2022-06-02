<?php 
$data = '';
$dataTotalPart = $db->table('estimasi')->leftjoin('spare_parts','estimasi.spare_part_id','spare_parts.code_spare_parts')->sum('spare_parts.price','TotalPart')->sum('estimasi.disc','Diskon')->where('estimasi.checkin_mechanic_id',$dataCheckInMekanik->id_checkin_mechanic)->get();
$TotalPekerjaan = $db->table('fee_service')->sum('price','Pekerjaan')->where('checkin_mechanic_id',$dataCheckInMekanik->id_checkin_mechanic)->get();
$SubGrand = ($dataTotalPart->Diskon / 100 * $dataTotalPart->TotalPart);
$SubGrandPrice = ($dataTotalPart->TotalPart - $SubGrand);
$TotalEstimasi = $TotalPekerjaan->Pekerjaan + $SubGrandPrice;
// if($keterangan === 'penawaran'){
	// $dataTabel = $db->table('entrance_services')->where('service_categori_id', $kode_pelayanan)->between('created_at', $mulai, $akhir)->getAll();
$data.= '
<h4 class="text-center surat-jenis ">'.($keterangan === 'penawaran' ? 'SURAT PENAWARAN' : 'PERINTAH KERJA').'<br>
'.($keterangan === 'perintah kerja' ? '<span>'.$Perkah->id_start_repair.'</span>':'').'
</h3>
<p class="ttd">Palembang, '.date('d-M-Y').'</p>';
if($keterangan === 'penawaran'){
	$data .='
	<table border="0" class="header">
	<tr>
	<td style="padding-top:10px; " class=" besarDepan">Dengan Hormat :
	</td>
	</tr>
	<tr>
	<td colspan="8" class="paragraf" style="margin-left:10px; padding-bottom="10px;">Sehubungan dengan perbaikan kendaraan, melalui surat ini kami mengajukan penawaran reprasi mobil sebagai berikut :
	</td>
	</tr>
	</table>';
}else{
	$data.='
	';
}
$data.='
<table border="0" class="header" style="padding-top:10px;" width="700px;">
<tr>
<td width="150px;">No Klaim</td><td width="5px;">:</td><td class="">' .$dataPermintaan->id_order.'</td>
<td width="150px;"><td width="120px;"></td><td width="5px;"></td><td></td>
</tr>
<tr>
<td width="150px;">Plat NO.</td><td width="5px;">:</td><td class="">' .$dataPermintaan->plate.'</td>
<td width="150px;"><td width="120px;"></td><td width="5px;"></td><td></td>
</tr>
<tr>
<td width="150px;">No. Telp</td><td width="5px;">:</td><td class="">' .$dataNasabahPelanggan->phone_number_nasabah.'</td>
<td width="150px;"><td width="120px;">No. Polis</td><td width="5px;">:</td><td>'.$dataCheckInMekanik->engine_no.'</td>
</tr>
<tr>
<td width="150px;">Merk</td><td width="5px;">:</td><td class="">' .$dataPermintaan->merk.' '.$dataPermintaan->type.' '.$dataPermintaan->color.' '.$dataPermintaan->year.'</td>
<td width="150px;"><td width="120px;">Tertanggung</td><td width="5px;">:</td><td>'.$dataNasabah->name_company.' <br>'.$dataNasabahPelanggan->name_nasabah.'</td>
</tr>
<tr>
<td width="150px;">DOL</td><td width="5px;">:</td><td class="">' .$dataCheckInMekanik->estime_done.'</td>
</tr>
</table>
<br>
<table class="customers" style="font-size:10px;">
<tr>
<th width="5px;" style="text-align:center">NO</th>
<th>Nama Sparepart</th>
<th width="10px;" style="text-align:center">Qty</th>
<th>Part Number</th>
<th colspan="2">Price list</th>
<th colspan="2">Gross</th>
<th width="25px;" style="text-align:center">Disc</th>
<th colspan="2" style="text-align:right">Net</th>
</tr>';
$i = 1;

$dataSparepart = $db->table('estimasi')->where('checkin_mechanic_id',$dataCheckInMekanik->id_checkin_mechanic)->getAll();
foreach ($dataSparepart as $value) {
	$check_data = $show_by_id('spare_parts','code_spare_parts', $value->spare_part_id,$selected);
	$sub  	= ($value->disc/100 *$check_data->price);
	$subNet = $check_data->price - $sub;  
	$data.= '
	<tr>
	<td style="text-align:center">'.$i++.'</td>
	<td>'.$check_data->spare_part_name.'</td>
	<td>'.$value->qty_sparepart.'</td>
	<td>'.$check_data->code_spare_parts.'</td>
	<td style="border-right:none" width="5px;"> Rp</td>
	<td style="text-align:right; border-left:none" width="50px;">'.number_format($check_data->price,2,',','.').'</td>
	<td style="border-right:none" width="5px;">Rp</td>
	<td style="text-align:right; border-left:none" width="50px;">'.number_format($check_data->price,2,',','.').'</td>
	<td style="text-align:center">'.$value->disc.' %</td>
	<td style="border-right:none" width="5px;">Rp</td>
	<td style="text-align:right; border-left:none">'.number_format($subNet,2,',','.').'</td>
	</tr>';
}

$data.='
<tr>
<th colspan="4" style="text-align:right; border:0 0 1 0;">Total</th>
<th style="border-right:none;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;" width="50px;">'.number_format($dataTotalPart->TotalPart,2,',','.').'</th>
<th style="border-right:none;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;" width="50px;">'.number_format($dataTotalPart->TotalPart,2,',','.').'</th>
<th style="text-align:center;">'.$dataTotalPart->Diskon.' %</th>
<th style="border-right:none;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">'.number_format($SubGrandPrice,2,',','.').'</th>
</tr>
<tr>
<th colspan="4" style="text-align:right; border:0 0 1 0;">PPN</th>
<th style="border-bottom:1px;" colspan="5"></th>
<th style="border-right:none; border-left:none; " width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">0</th>
</tr>
<tr>
<th colspan="4" style="text-align:right; border:0 0 1 0;">Total Sparepart</th>
<th style="border-bottom:1px;" colspan="5"></th>
<th style="border-right:none; border-left:none; " width="5px;">Rp.</th>
<th style="border-left:none; border-top:1px; text-align:right;">'.number_format($SubGrandPrice,2,',','.').'</th>
</tr>

</table>
<br>
<table class="customers">
<tr>
<th width="5px;">NO</th>
<th colspan="4">Nama Jasa</th>
<th></th>
<th colspan="2">Price List</th>
<th>Discount</th>
<th colspan="2" style="text-align:right">Net</th>
</tr>';
$o = 1;

$dataJasa = $db->table('fee_service')->where('checkin_mechanic_id',$dataCheckInMekanik->id_checkin_mechanic)->getAll();
foreach ($dataJasa as $value) {
	$data.= '
	<tr>
	<td>'.$o++.'</td>
	<td colspan="4" width="280px;">'.$value->name_service.'</td>
	<td width="10px;">IR</td>
	<td style="border-right:none;" width="5px;">Rp. </td>
	<td style="border-left:none; text-align:right;">'.number_format($value->price,2,',','.').'</td>
	<td width="170px;"> 0.00% </td>
	<td style="border-right:none;" width="5px;">Rp.</td>
	<td style="border-left:none; text-align:right;">'.number_format($value->price,2,',','.').'</td>
	</tr>';
}
$data .='
<tr>
<th colspan="6" style="text-align:right; border:0 1 1 1">PPN</th>
<th colspan="3" width="20%"></th>
<th style="border-right:none; text-align:right;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">'.number_format($TotalPekerjaan->Pekerjaan,2,',','.').'</th>
</tr>
<tr>
<th colspan="6" style="text-align:right; border:0 1 1 1">DPP</th>
<th colspan="3" width="20%"></th>
<th style="border-right:none; text-align:right;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">'.number_format($TotalPekerjaan->Pekerjaan,2,',','.').'</th>
</tr>
<tr>
<th colspan="6" style="text-align:right; border:0 1 1 1">PPN</th>
<th colspan="3" width="20%"></th>
<th style="border-right:none; text-align:right;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">0</th>
</tr>
<tr>
<th colspan="6" style="text-align:right; border:0 1 1 1">Sparepart + Jasa</th>
<th colspan="3" width="20%"></th>
<th style="border-right:none; text-align:right;" width="5px;">Rp.</th>
<th style="border-left:none; text-align:right;">'.number_format($TotalEstimasi,2,',','.').'</th>
</tr>

</table>


<br>

<p class="ttd"> Palembang,'.$date.'<br>
<img class="ttd" src="../../apps/logo-cv.png" width="33%" height=50px">
<br>
<br>
<br>
<p class="ttd padding2cm">Jalan Bambang Utoyo Palembang</p>
';

return $data;
