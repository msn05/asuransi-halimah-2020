   <div class="container-fluid">
   	<div class="row">
   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung data Persutujuan untuk pekerjaan perbaikan kendaraan NASABAH perusahaan CV TIARA PERSADA</h6>
   					</div>
   				</div>
   			</div>
   			<div class="card">
   				<div class="card-content">
   					<!-- <h5 class="card-title">Add Row</h5> -->
   					<table id="tabelPersetujuan" class="responsive-table display " style="width:100%">
   					</table>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>

   <script>
   	let Role = <?=$_SESSION['access_id'];?>;
   	DtcolumnDefs = [
   	{ width: "15px", targets: 0, className : 'dt-body-center' },
   	{ width: "100px",targets: 3, className : 'dt-body-center' },
   	{ width: "150px",targets: 4, render: $.fn.dataTable.render.number( ',','.', 0, 'Rp. ')}
   	];
   	$('#tabelPersetujuan').DataTable({
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
   		{ "data": "MasukPengajuan", "title": "Tanggal Masuk", "name": "MasukPengajuan"},
   		{ "data": "namaPLnasabah", "title": "Nama Nasabah", "name": "namaPLnasabah"},
   		{ "data": "PelangganDatang", "title": "Pelanggan Datang", "name": "PelangganDatang"},
   		{ "data": "maxPrice", "title": "Estimasi Perusahaan", "name": "maxPrice"},
   		{ "data": "Status", "title": "Status", "name": "Status"},
   		{ "data": "id_request_service", "title": "Setting", "name": "id_request_service","render": function(data, type, rows){
   			if(rows.FileData != null || rows.INC != null )
   				return `
   			<a target='_blank' href="../../file/${rows.FileData}" 
   			class=" waves-effect waves-light btn info btn-small" 
   			title="Lihat Pengajuan Biaya"><span class="material-icons">info</span>  </a>
            <a href="#" 
            id="Approved" 
            data-id = "${rows.id_request_service}"
            class=" waves-effect waves-light btn green btn-small" 
            title="Setujui"><span class="material-icons">touch_app</span> </a>
           
            `;

            else if (rows.INC == null)
             return ``;
     }
 }
 ],
 "columnDefs":DtcolumnDefs
});


   	$(document).on('click','#Approved',(function(){
   		let dataHapus = {
   			id_request_service             : $(this).data('id'),
   		}; 
   		Swal.fire({
   			title: 'Anda Yakin ?',
   			text: 'Perbaikan Akan Dimulai Mekanik.! ',
   			icon: 'question',
   			showCancelButton: true,
   			confirmButtonText: 'Lanjutkan',
   			cancelButtonText: 'Batalkan'
   		}).then((result) => {
   			if (result.isConfirmed) {

   				$.ajax({
   					type : 'POST',
   					data : JSON.stringify(dataHapus),
   					url  : '../../../api/request_service/update_estimasi.php',
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
