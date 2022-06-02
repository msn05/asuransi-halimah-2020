   <div class="container-fluid">
   	<div class="row">
   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung data Invoice Pembayaran Pekerjaan Service </h6>
   					</div>
   				</div>
   			</div>
   			<div class="card">
   				<div class="card-content">
   					<!-- <h5 class="card-title">Add Row</h5> -->
   					<table id="tabelInvoice" class="responsive-table display " style="width:100%">
   					</table>
   				</div>
   			</div>
   		</div>
   	</div>
   </div>
   <script>
   	let Role = <?=$Role;?>;
   	$('#tabelInvoice').DataTable({
   		"fixedHeader": true,
   		"responsive": true,
   		"serverSide": true,
   		"autoWidth": false,
   		"scrollCollapse" : true,
   		"scrollY":true,
   		"scrollX":true,
   		"ajax": {
   			"type": "POST",
   			"url": "../../../api/invoice/show.php",
   		},
   		"aoColumns" : [
   		{ "data": "id_invoice", "title": "No", "name": "id_invoice","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
   		}},
   		{ "data": "id_invoice", "title": "ID Invoice", "name": "7 || Role == " },
   		{ "data": "NamaSparepart", "title": "Kode Pekerjaan", "name": "NamaSparepart" },
   		{ "data": "Tanggal", "title": "Tanggal Cetak", "name": "Tanggal" },
   		{ "data": "id_invoice", "title": "Setting", "name": "id_invoice","render": function(data, type, rows){
   			if(Role == 2 || Role == 6 || Role == 3)
   				return`
   			<a href="?page=invoice&Aksi=info&id=${rows.id_invoice}&order=${rows.id_order}" 
   			id="DeleteData" 
   			data-id = '${rows.code_spare_parts}'
   			class=" waves-effect waves-light btn blue btn-small" 
   			title="Info Invoice"><span class="material-icons">info</span> </a>
   			`;
   			else return ``;

   		}
   	}
   	]
   	// "columnDefs":DtcolumnDefs
   });

  </script>