   <div class="container-fluid">
   	<div class="row">
   		<div class="col s10">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung data jasa perbaikan</h6>
   					</div>
   					<?php if($Role == 3){?>
   						<div class="ml-auto">
   							<a class="btn-floating modal-trigger waves-effect waves-light btn-large teal" title="Tambah Sparepart" type="button" id="addPart" data-target="modal1" ><i class="material-icons">add</i></a>
   						</div>
   					<?php }?>
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

   		<div id="modal1" class="modal">
   			<div class="modal-content" id="form">
   				<h4>Form </h4>
   				<div class="divider"></div>
   				<form class="h-form" id="FormData">
   					<div class="form-body">
   						<div class="divider"></div>
   						<div class="card-content">
   							<div class="row">
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="f-nameh">Jenis Jasa</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="id" type="hidden" placeholder="Nama Mekanik">
   											<input id="keterangan" value="add" type="hidden" placeholder="Nama Mekanik">
   											<input id="jenis" type="text" placeholder="Jenis Jasa">
   										</div>
   									</div>
   								</div>
   								<div class="col s12 l6">
   									<div class="row">
   										<div class="col s3">
   											<div class="h-form-label">
   												<label for="f-nameh">Nama Jasa</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="name" type="text" placeholder="Nama Jasa">
   										</div>
   									</div>
   								</div>
   								<br>
   								<div class="col s12 l3">
   									<button class="btn green waves-effect waves-light "  id="SimpanSparepart">Simpan
   									</button>
   								</div>
   							</div>
   						</div>
   					</div>
   				</div>
   			</form>
   		</div>
   	</div>

   </div>
</div>

<script>
	let Role = <?=$Role;?>;
	DtcolumnDefs = [
	{ width: "15px", targets: 0, className : 'dt-body-center' },
	{ width: "100px", targets: 2, className : 'dt-body-left' },
	{ targets: 3, className : 'dt-body-center' },

	];
	$('#tabelSparepart').DataTable({
		"fixedHeader": true,

		"responsive": true,
		"serverSide": true,
		"autoWidth": true,
		"scrollCollapse" : true,
		"scrollY":true,
		"scrollX":true,
		"ajax": {
			"type": "POST",
			"url": "../../../api/service_categories/show.php",
		},
		"aoColumns" : [
		{ "data": "id_service_categori", "title": "No", "name": "id_service_categori","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
		}},
		{ "data": "group", "title": "Jenis", "name": "group" },
		{ "data": "name_service", "title": "Nama Jasa", "name": "name_service" },
		{ "data": "created_at", "title": "Tangal Dibuat", "name": "created_at" },
		{ "data": "id_service_categori", "title": "Setting", "name": "id_service_categori","render": function(data, type, rows){
			if(Role == 3 || Role == 2 || Role == 1)
				return`
			<a href="#" 
			id="UbahData" 
			data-id = ${rows.id_service_categori}
			data-jenis = '${rows.group}'
			data-name = '${rows.name_service}'
			class=" waves-effect waves-light btn orange btn-small" 
			data-toggle="modal" 
			title="Ubah Data"><span class="material-icons">edit</span> </a>
			<a href="#" 
			id="DeleteData" 
			data-id = ${rows.id_service_categori}
			class=" waves-effect waves-light btn red btn-small" 
			title="Hapus Data"><span class="material-icons">delete_forever</span> </a>
			`;
			else return ``;

		}
	}
	],
	"columnDefs":DtcolumnDefs,
	rowsGroup: [
	'data:group'
	],
});

	$(document).on('click',"#SimpanSparepart",function(e) {
		e.preventDefault();

		let AddSparepart  = {
			id     : $('#id').val(),
			keterangan     : $('#keterangan').val(),
			jenis     : $('#jenis').val(),
			name      : $('#name').val()
		};
		$.ajax({
			type  : 'POST',
			data  : JSON.stringify(AddSparepart),
			url   : '../../../api/service_categories/add.php',
			processData:false,
			dataType : 'json',
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

	});

	$(document).on('click','#UbahData',(function(e) {
		e.preventDefault();
		var elem = document.querySelector('.modal');
		var instance = M.Modal.init(elem);
		$('#id').val($(this).data('id')).attr('readonly',true);
		$('#name').val($(this).data('name'));
		$('#jenis').val($(this).data('jenis'));
		$('#keterangan').val('ubah');
		instance.open();
	}));

	$(document).on('click','#addPart',function(e){
		e.preventDefault();
		$('#FormData').trigger("reset"); 
		$('#id').val('').removeAttr('readonly',true);
		$('#keterangan').val('add');
		$('#modal1 button').prop( 'id', 'SimpanSparepart' );
	});


	$(document).on('click','#DeleteData',(function(){
		let dataHapus = {
			id             : $(this).data('id')
		}; 
		Swal.fire({
			title: 'Anda Yakin?',
			text: 'Data Tidak Bisa Dikembalikan.!',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: 'Lanjutkan',
			cancelButtonText: 'Batalkan'
		}).then((result) => {
			if (result.isConfirmed) {

				$.ajax({
					type : 'DELETE',
					data : JSON.stringify(dataHapus),
					url  : '../../../api/service_categories/delete.php',
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
