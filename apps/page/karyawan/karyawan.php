   <div class="container-fluid">
   	<div class="row">
   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3></div>
   						<div class="p-10">
   							<h6 class="black-text m-b-0">Halaman ini menampung data karyawan perusahaan CV TIARA PERSADA</h6>
   						</div>
   					</div>
   				</div>
   				<div class="card">
   					<div class="card-content">
   						<!-- <h5 class="card-title">Add Row</h5> -->
   						<table id="tabelkaryawan" class="responsive-table display " style="width:100%">
   						</table>
   					</div>
   				</div>
   			</div>
   		</div>
   	</div>

   	<script>
   		$('#tabelkaryawan').DataTable({
   			"fixedHeader": true,
   			"responsive": true,
   			"serverSide": true,
   			"autoWidth": false,
   			"scrollCollapse" : true,
   			"scrollY": 400,
   			"ajax": {
   				"type": "POST",
   				"url": "../../../api/users/show.php",
   			},
   			"aoColumns" : [
   			{ "data": "id_access", "title": "No", "name": "id_access","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   			}},
   			{ "data": "access_name", "title": "Nama Akses", "name": "access_name" },
   			{ "data": "access_status", "title": "Status Akses", "name": "access_status"}

   			],

   		});

   	</script>
