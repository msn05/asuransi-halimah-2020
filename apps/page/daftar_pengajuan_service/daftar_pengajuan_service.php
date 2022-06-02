   <div class="container-fluid">
   	<div class="row">
   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung data Pengajuan Service NASABAH perusahaan CV TIARA PERSADA</h6>
   					</div>
   				</div>
   			</div>
   			<div class="card">
   				<div class="card-content">
   					<!-- <h5 class="card-title">Add Row</h5> -->
   					<table id="tabelNasabah" class="responsive-table display " style="width:100%">
   					</table>
   				</div>
   			</div>
   		</div>

   		<div id="modal1" class="modal">
   			<div class="modal-content" id="form">
   				<h4>Form </h4>
   				<div class="divider"></div>
   				<form class="h-form ">
   					<div class="form-body">
   						<div class="divider"></div>
   						<div class="card-content">
   							<div class="row">
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="f-nameh">Nama Pelanggan</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="id" type="hidden" placeholder="Nama Mekanik">
   											<input id="name" type="text" placeholder="Nama Nasabah">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="l-nameh">Nomor Telphone</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="telp" type="text" placeholder="Nomor Telephone">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="f-nameh">Nomor NIK Pelanggan </label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="number_nik" type="text" placeholder="Nomor NIK Pelanggan">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="l-nameh">Jenis Kendaraan</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="type" type="text" placeholder="Jenis Kendaraan">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="f-nameh">Nomor Plate Kendaraan </label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="plate" type="text" placeholder="Plat Kendaraan">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="l-nameh">Emails Pelanggan</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="emails" type="text" placeholder="Email Pelanggan">
   										</div>
   									</div>
   								</div>
   							</div>
   							<div class="row">
   								<div class="col l12">
   									<div class="row">
   										<div class="col ">
   											<div class="h-form-label">
   												<label for="l-nameh">Alamat Pelanggan</label>
   											</div>
   										</div>
   										<div class="input-field form-control col l9">
   											<input id="jalan" type="text" placeholder="Email Pelanggan">
   										</div>
   									</div>
   								</div>
   							</div>
   						</div>
   						<div class="modal-footer">
   							<button class="btn green waves-effect waves-light"  id="SimpanNasabah">Simpan
   							</button>
   						</div>
   					</div>
   				</form>
   			</div>
   		</div>
   	</div>
   </div>

   <script>
   	let Role = <?=$_SESSION['access_id'];?>;
   	DtcolumnDefs = [
   	{ width: "15px", targets: 0, className : 'dt-body-center' },
   	{ width: "100px",targets: 3, className : 'dt-body-center' },
   	{ width: "150px",targets: 4, className : 'dt-body-left' },
   	];
   	$('#tabelNasabah').DataTable({
   		"fixedHeader": true,
   		"responsive": true,
   		"serverSide": true,
   		"autoWidth": false,
   		"scrollCollapse" : true,
   		"scrollY":true,
   		"scrollX":true,
   		"ajax": {
   			"type": "POST",
   			"url": "../../../api/request_service/show.php",
   		},
   		"aoColumns" : [
   		{ "data": "id_request_service", "title": "No", "name": "id_request_service","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   		}},
   		{ "data": "NamaInsurance", "title": "Pihak Asuransi", "name": "NamaInsurance"},
         { "data": "namaPLnasabah", "title": "Nama Pelanggan", "name": "namaPLnasabah"},
         { "data": "PlateKendaraan", "title": "Plat Kendaraan", "name": "PlateKendaraan"},
   		{ "data": "MasukPengajuan", "title": "Tanggal Masuk", "name": "MasukPengajuan"},
   		{ "data": "PelangganDatang", "title": "Pelanggan Datang", "name": "PelangganDatang"},
   		{ "data": "Status", "title": "Status", "name": "Status"},
   		{ "data": "id_request_service", "title": "Setting", "name": "id_request_service","render": function(data, type, rows){
   			if(rows.FileData != null)
   				return `
   			<a target='_blank' href="../../file/${rows.FileData}" 
   			class=" waves-effect waves-light btn info btn-small" 
   			title="Lihat Pengajuan Biaya"><span class="material-icons">info</span> Lihat </a>`;
   			else if (rows.INC == null && Role == 1)
   				return `<a href="#" 
   			id="ProcessingMechanic" 
   			data-id = '${rows.id_request_service}'
   			class=" waves-effect waves-light btn green btn-small" 
   			title="Proses Pengajuan Data"><span class="material-icons">touch_app</span> Proses</a>`;
            else return``;
   		}
   	}
   	],
   	"columnDefs":DtcolumnDefs
   });

   
   	$(document).on('click','#ProcessingMechanic',(function(){
   		let dataHapus = {
   			id             : $(this).data('id'),
   		}; 
   		Swal.fire({
   			title: 'Anda Yakin ?',
   			text: 'Pelanggan Sudah Datang.!',
   			icon: 'question',
   			showCancelButton: true,
   			confirmButtonText: 'Lanjutkan',
   			cancelButtonText: 'Batalkan'
   		}).then((result) => {
   			if (result.isConfirmed) {

   				$.ajax({
   					type : 'POST',
   					data : JSON.stringify(dataHapus),
   					url  : '../../../api/request_service/update.php',
   					processData:false,
   					dataType: "json",
   					success: function (respone)
   					{
   						SwalOk.fire({text: respone.messages })
   						.then((respone)=>{
   							location.reload(true); 
   						});
   					},
   					error:function(jqXHR, textStatus, errorThrown){
   						let msg = JSON.parse(jqXHR.responseText);
   						SwalError.fire({text: msg.messages })
   					}

   				});
   			} else {
   				Swal.fire(
   					'Batal',
   					'Anda Telah Membatalkan :)',
   					'error'
   					);
   			}
   		});

   	}));

   </script>
