   <div class="container-fluid">
   	<div class="row">

   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung daftar perbaikan kendaraan perusahaan CV TIARA PERSADA</h6>
   					</div>
   				</div>
   			</div>
   			<div class="card">
   				<div class="card-content">
   					<!-- <h5 class="card-title">Add Row</h5> -->
   					<table id="tabelSparepart" class="responsive-table display " style="width:100%">
   					</table>
   				</div>
   			</div>
   		</div>


   	</div>
   </div>

   <script>

   	DtcolumnDefs = [
   	{ width: "15px", targets: 0, className : 'dt-body-center' },
   	{ width: "150px", targets: 1, className : 'dt-body-left' },
   	{ targets: 3, className : 'dt-body-left' },
   	];
   	$('#tabelSparepart').DataTable({
   		"fixedHeader": true,
   		"responsive": true,
   		"serverSide": true,
   		"autoWidth": false,
   		"scrollCollapse" : true,
   		"scrollY":true,
   		"scrollX":true,
   		"ajax": {
   			"type": "POST",
   			"url": "../../../api/start_repair/show.php",
   		},
   		"aoColumns" : [
   		{ "data": "id_start_repair", "title": "No", "name": "id_start_repair","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   		}},
   		{ "data": "MasukPengajuan", "title": "Tanggal Masuk", "name": "MasukPengajuan"},
   		{ "data": "namaPLnasabah", "title": "Nama Nasabah", "name": "namaPLnasabah"},
   		{ "data": "NamaInsurance", "title": "Nama Perusahaan", "name": "NamaInsurance"},
   		{ "data": "StatusPerbaikan", "title": "Status Pengerjaan", "name": "StatusPerbaikan"},
   		{ "data": "id_start_repair", "title": "Setting", "name": "id_start_repair","render": function(data, type, rows){
   			if(rows.StatusPerbaikan == 'open' )
   				return `
   			<a href="#" 
   			id="Approved" 
   			data-id = '${rows.id_start_repair}'
   			data-id_req = '${rows.id_request_service}'
   			class=" waves-effect waves-light btn green btn-small" 
   			title="Selesaikan Pekerjaa"><span class="material-icons">touch_app</span> </a>
            <a href="?page=daftar_perbaikan&Aksi=info&keterangan=lihat&id=${rows.id_checkin_mechanic}&cetak=${rows.id_request_service}&nasabah=${rows.claim}&keterangan=lihat" 
           class=" waves-effect waves-light btn blue btn-small" 
           title="Lihat Data"><span class="material-icons">info</span>  </a> 
   			`;
   			else 
   				return ``;
   			
   		}
   	}
   	],
   	"columnDefs":DtcolumnDefs
   });

   	$(document).on('click','#Approved',(function(){
   		let dataHapus = {
   			id_start_repair             				: $(this).data('id'),
   			id_request_service : $(this).data('id_req')
   		}; 
   		console.log(dataHapus);
   		Swal.fire({
   			title: 'Anda Yakin ?',
   			text: 'Data Sudah Meneyelesaikannya.?!',
   			icon: 'question',
   			showCancelButton: true,
   			confirmButtonText: 'Lanjutkan',
   			cancelButtonText: 'Batalkan'
   		}).then((result) => {
   			if (result.isConfirmed) {

   				$.ajax({
   					type : 'POST',
   					data : JSON.stringify(dataHapus),
   					url  : '../../../api/start_repair/add.php',
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
