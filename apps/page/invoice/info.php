   <style>
   td, th{
   	padding: 0 ;
   }
  </style>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col s12">
  			<div class="card">
  				<div class="card-content">
  					<h4><b>CV. TIARA PERSADA</b> <span class="right">invoice : </span></h4>
  					<hr>
  					<div class="row">
  						<div class="col s12">
  							<div class="left">
  								<address>
  									<p class="m-l-5">Jl.Bambang Utoyo No. 355 RT. 40/10 5 Ilir Palembang,
  										<br/> Telp :
  									</address>
  								</div>
  								<div class="right right-align">
  								</div>
  							</div>
  							<div class="col s12">
  								<div class="" style="clear: both;">
  									<table class="" border="0px;">
  										<tr>
  											<td width="150px;">Sudah Terima Dari</td><td width="5px;">:</td><td id="Asuransi"></td>
  										</tr>
  										<tr>
  											<td width="150px;">Uang Sebesar</td><td width="5px;">:</td><td id="Duit">Rp. </td>
  										</tr>	
  										<tr>
  											<td width="150px;"></td><td width="5px;"></td><td id="Terbilang"></td>
  										</tr>
  										<tr>
  											<td width="150px;">Untuk Pembayaran</td><td width="5px;"></td><td > Biaya Jasa Perbaikan Suku Cadang</td>
  										</tr>
  									</table>
  									<table class="table highlight responsive-table"  width="100%">
  										<tr>
  											<td width="100px;" style="padding-left: 155px;">Merek Mobil</td><td width="5px;"  style="margin-left:0px;">:</td><td width="200px;" id="Merk"></td>
  											<td width="100px;"  >Nomor PLA</td><td width="5px;">:</td><td id="PLD" width="150px;"></td>
  										</tr>
  										<tr>
  											<td width="100px;" style="padding-left: 155px;">Nomor Polisi</td><td width="5px;"  style="margin-left:0px;">:</td><td width="200px;" id="polis"></td>
  											<td width="100px;"  >Nomor Polis</td><td width="5px;">:</td><td id="polisNo" width="150px;"></td>
  										</tr>
  										<tr>
  											<td width="50px;" style="padding-left: 300px;" colspan="2">Biaya Netto</td><td width="150px;" style="padding-left: 230px;" colspan="2" >PPN</td><td width="200px;" style="padding-left: 200px;" colspan="2"  >Sub Total</td>
  										</tr>
  										<tr>
  											<td width="100px;" style="padding-left: 155px;">JASA</td><td width="5px;"  >:</td><td width="200px;" id="jasa">Rp. </td>
  											<td width="100px;"  >0</td><td width="5px;"></td><td id="jasaTotal" width="150px;" class="right-align">Rp. </td>
  										</tr>
  										<!--<tr>-->
  										<!--	<td width="100px;" style="padding-left: 155px;">BAHAN</td><td width="5px;"  >:</td><td width="200px;" id="bahan">Rp. </td>-->
  										<!--	<td width="100px;"  >0</td><td width="5px;"></td><td id="bahanTotal" width="150px;" class="right-align">Rp. </td>-->
  										<!--</tr>-->
  										<tr>
  											<td width="100px;" style="padding-left: 155px;">PART</td><td width="5px;"  >:</td><td width="200px;" id="part">Rp. </td>
  											<td width="100px;"  >0</td><td width="5px;"></td><td id="partTotal" width="150px;" class="right-align">Rp. </td>
  										</tr>
  											<tr>
  											<td width="100px;" style="padding-left: 155px;">TOTAL</td><td width="5px;"  >:</td><td width="200px;" id="Total">Rp. </td>
  											<td width="100px;"  >0</td><td width="5px;"></td><td id="Totals" width="150px;" class="right-align">Rp. </td>
  										</tr>
  											<tr>
  											<td width="150px;" style="padding-left: 125px;">Palembang, <?=date('d-M-Y');?></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Biaya Derek</td><td colspan="3" id="Derek" class="right-align">Rp. </td>
  										</tr>
  										<!--	<tr>-->
  										<!--	<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >O.R</td><td colspan="3" id="osr" class="right-align">Rp. </td>-->
  										<!--</tr>-->
  										<!--<tr>-->
  										<!--	<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Salvage</td><td colspan="3" id="sal" class="right-align">Rp. </td>-->
  										<!--</tr>-->
  											<tr>
  											<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Total Klaim</td><td colspan="3" id="klaim" class="right-align">Rp. </td>
  										</tr>
  												<tr>
  											<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Pph 23</td><td colspan="3" id="pph" class="right-align">Rp. </td>
  										</tr>
  												<tr>
  											<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Biaya Administrasi</td><td colspan="3" id="adm" class="right-align">Rp. </td>
  										</tr>
  										<tr>
  											<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Grand Total + Pph 23</td><td colspan="3" id="grand" class="right-align">Rp. </td>
  										</tr>
  										<tr>
  											<td width="150px;" style="padding-left: 125px;"></td><td witdh="280px;" colspan="2" style="padding-left:100px;"  >Keterangan Beban </td><td colspan="3" id="ket" class="right-align"></td>
  										</tr>
                                        <tr>
                                            <td width="150px;" style="padding-left: 150px; margin-top: 20px;"  class="left">NPWP</td><td witdh="5px;" >:</td><td  id="" class="left">02.418.195.0-301.000</td>
                                        </tr>
                                        <tr>
                                            <td style="padding-left: 150px;" colspan="2"  class="left">Pembayaran Ditujukkan Kepada</td>
                                        </tr>
                                        <tr>
                                            <td width="150px;" style="padding-left: 150px;"  class="left">NO.REK</td><td witdh="5px;" >:</td><td  id="" class="left">115-040-318</td>
                                        </tr>
                                           <tr>
                                            <td width="150px;" style="padding-left: 150px;"  class="left">BANK</td><td witdh="5px;" >:</td><td  id="" class="left">BCA a.n HASAN BASRI</td>
                                        </tr>
  									</table>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<script>
  		let id = "<?=$_GET['id'];?>";
  		let kode = "<?=$_GET['order'];?>";
  		function rubah(angka){
  			var reverse = angka.toString().split('').reverse().join(''),
  			ribuan = reverse.match(/\d{1,3}/g);
  			ribuan = ribuan.join('.').split('').reverse().join('');
  			return ribuan;
  		}
   		// console.log(id);
   		$('span.right').append(id);
   		let dataOrder = {
   			order : kode
   		};
   		$.ajax({
   			data : JSON.stringify(dataOrder),
   			type : 'POST',
   			url  : '../../../api/order_customer_nasabah/list.php',
   			dataType : 'json',
   			processData : false,
   			success : function(respone){
   	// 		let a = respone.data.TSPRice;
   				let Totalss = parseFloat(respone.data.TotalPart) + parseFloat(respone.data.TotalJasa) ;
   				let Grand = parseFloat(respone.data.TotalPart) + parseFloat(respone.data.TotalJasa) + parseFloat(respone.data.Derek)  ;
   				$('#Asuransi').append(respone.data.Asuransi['name_company']);
   				$('#Duit').append(rubah(respone.data.TSPRice));
   				$('#Terbilang').append(respone.data.Terbilang);
   				$('#polisNo').append(respone.data.Chas['engine_no']);
   				$('#polis').append(respone.data.Chas['engine_no']);
   				$('#PLD').append(respone.data.Chas['chassis_no']);
   				$('#jasaTotal').append(rubah(respone.data.TotalJasa));
   	// 			$('#bahan').append(respone.data.Mat);
   	// 			$('#bahanTotal').append(respone.data.Mat);
   				$('#part').append(rubah(respone.data.TotalPart));
   				$('#jasa').append(rubah(respone.data.TotalJasa));
   				$('#partTotal').append(rubah(respone.data.TotalPart));
   				$('#Derek').append(rubah(respone.data.Derek));
   	// 			$('#osr').append(rubah(respone.data.OSR));
   	// 			$('#sal').append(rubah(respone.data.sal));
   				$('#pph').append(rubah(respone.data.pph));
   				$('#adm').append(rubah(respone.data.adm));
   				$('#grand').append(rubah(respone.data.TSPRice));
   				$('#klaim').append(rubah(Grand));
   				$('#Total').append(rubah(Totalss));
   				$('#ket').append(respone.data.ket);
   				// $('#Totals').append(rubah(Totals));
   				$('#Merk').append(respone.data.kendaraan['merk']+ ' '+respone.data.kendaraan['type']+ ' '+respone.data.kendaraan['year']+ ' '+respone.data.kendaraan['color']);
   			} 
   		})

   	</script>