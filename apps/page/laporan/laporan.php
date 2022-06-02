<div class="container-fluid">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="d-flex align-items-center">
					<div class="p-5 green darken-1">
						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
					</div>
					<div class="p-10">
						<h6 class="black-text m-b-0">Halaman ini digunakan untuk melihat hasil alur proses kerja Perusahan CV TIARA PERSADA.</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<h5 class="card-title">Form Filter Laporan</h5>
					<div class="divider m-t-10"></div>
					<form class="h-form" action="?page=laporan&Aksi=info" method="POST" >
						<div class="form-body">
							<div class="row">
								<div class="col s3">
									<div class="input-field col s12">
										<input placeholder="Dari Tanggal" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" id="tanggal" name="tanggal" required/>
										
									</div>
								</div>
								<div class="col s3">
									<div class="input-field col s12">
										<input placeholder="Sampai Tanggal" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.value == '' ? this.type='text' : this.type='date')" id="tanggaltwo" name="tanggaltwo" required/>
									</div>
								</div>
								<div class="col s4">
									<div class="input-field col s12" style="padding-top: 15px;">
										<select  
										ui-select2="{width:'resolve'}" style="width:100%; height: 50px; " class="browser-default col s12" id="Tanggal" name="jenis">
										<option value="" >Pilih Jenis Laporan</option>
									</select>
								</div>
							</div>
							<button class="btn green waves-effect waves-light" style="margin-top:20px;"  id="Cari">Cari
							</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>

<script>
	let Role = <?=$Role;?>;
	$(document).ready(function() {
		let Kerusakan = [
		{id:'Pembayaran',text:'Pembayaran'},
		{id:'Pelanggan',text:'Pelanggan Asuransi'},
		// {id:'Perbaikan',text:'Perbaikan'},
		];

		$('#Tanggal').select2({
			data : Kerusakan,
			dropdownAutoWidth: true,
		});
	});

	
</script>