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
   					<div class="ml-auto">
   						<!--<a class="btn-floating modal-trigger waves-effect waves-light btn-large teal" title="Tambah Sparepart" type="button"  data-target="modal1" ><i class="material-icons">add</i></a>-->
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
   			"url": "../../../api/estimasi/show.php",
   		},
   		"aoColumns" : [
   		{ "data": "id_checkin_mechanic", "title": "No", "name": "id_checkin_mechanic","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   		}},
   		{ "data": "NamaInsurance", "title": "Pihak Asuransi", "name": "NamaInsurance"},
   		{ "data": "namaPLnasabah", "title": "Plat Kendaraan", "name": "namaPLnasabah"},
   		{ "data": "PlateKendaraan", "title": "Plat Kendaraan", "name": "PlateKendaraan"},
   		{ "data": "MasukPengajuan", "title": "Tanggal Masuk", "name": "MasukPengajuan"},
   		{ "data": "actions_checkin", "title": "Status", "name": "actions_checkin"},
   		{ "data": "id_checkin_mechanic", "title": "Setting", "name": "id_checkin_mechanic","render": function(data, type, rows){
            if(rows.actions_checkin == 'done')
              return `<a href="?page=estimasi_perbaikan&Aksi=info&id=${rows.id_checkin_mechanic}&nasabah=${rows.claim}&keterangan=lihat" 
           class=" waves-effect waves-light btn blue btn-small" 
           title="Lihat Data"><span class="material-icons">info</span> Lihat </a> 

           <a target="_blank" href="../../file/${rows.FileNya}"
           class=" waves-effect waves-light btn success btn-small" 
           title="Cetak PDF"><span class="material-icons">file_download</span> Downloads</a>`;
           else
              return `<a href="?page=estimasi_perbaikan&Aksi=info&id=${rows.id_checkin_mechanic}&nasabah=${rows.claim}" 
           class=" waves-effect waves-light btn info btn-small" 
           title="Proses Pengecekan Estimasi Biaya"><span class="material-icons">search</span>  </a>`;
        }
     }
     ],
     "columnDefs":DtcolumnDefs
  });

    
   
   $(document).on('click','#ProcessingMechanic',(function(){
    let dataHapus = {
      id             : $(this).data('id'),
   }; 
   // console.log(dataHapus);
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
