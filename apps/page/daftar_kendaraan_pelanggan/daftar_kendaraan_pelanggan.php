 <style>
 .table.dataTable >td  {
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-size: 6 px;
}
</style>
<div class="container-fluid">
   <div class="row">
      <div class="col s12">
         <div class="card">
            <div class="d-flex align-items-center">
               <div class="p-5 green darken-1">
                  <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
              </div>
              <div class="p-10">
                  <h6 class="black-text m-b-0">Halaman ini digunakan untuk melakukan pengecekan awal oleh Pihak Ansuransi. Apabila bila sudah sesuai silakan masukkan informasi pengecekan pada form berikut ini.</h6>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col s9">
     <div class="card">
        <div class="card-content">
           <h5 class="card-title">Form Kendaraan</h5>
           <div class="divider m-t-10"></div>
           <form class="h-form">
              <div class="form-body">
                 <div class="row">
                    <div class="col s4">
                       <div class="input-field col s12">
                          <input id="kodeClaim" type="text">
                      </div>
                  </div>
                  <div class="col s4">
                   <div class="input-field col s12">
                      <input id="merk" type="text" placeholder="Ex :Suzuki">
                      <input id="nasabah" type="hidden">
                      <input id="keterangan" value="add" type="hidden">
                      <label for="password">Merk Kendaraan</label>
                  </div>
              </div>
              <div class="col s4">
               <div class="input-field col s12">
                  <input id="type" type="text" placeholder="Ex :Pajero">
                  <label for="password">Jenis Kendaraan</label>
              </div>
          </div>
          <div class="col s3">
           <div class="input-field col s12">
              <input id="plat" type="text" placeholder="Ex :BG 0000 XX">
              <label for="password">Plat</label>
          </div>
      </div>
      <div class="col s3">
       <div class="input-field col s12">
          <input id="color" type="text" placeholder="Ex :Pink">
          <label for="password">Warna</label>
      </div>
  </div>
  <div class="col s2">
   <div class="input-field col s12">
      <input id="year" type="text" placeholder="Ex :2021">
      <label for="password">Tahun</label>
  </div>
</div>
<div class="col s4">
   <div class="input-field col s12">
      <input id="price" type="text">
      <label for="password">Masukkan Max Pembiayaan</label>
  </div>
</div>
</div>

<!-- <textarea id="editor" height="200px;" ></textarea> -->
</div>
<div class="modal-footer m-t-10">
 <button class="btn green waves-effect waves-light"  id="SimpanCheckInsure">Simpan
 </button>
 <a href="?page=daftar_pelanggan_nasabah" class="btn blue waves-effect waves-light"  >Kembali
 </a>
</div>
</form>
</div>
</div>
</div>
<div class="col s3">
 <div class="card">
    <div class="card-content">
       <h5 class="card-title">Informasi Pelanggan</h5>
       <div class="divider"></div>
       <h6 class="p-t-20">Nama Pelanggan</h6>
       <span id="namaPelanggan"></span>
       <h6 class="m-t-30">Nomor Telphone</h6>
       <span id="telphone"></span>
       <h6 class="m-t-30">Emails</h6>
       <span id="email"></span>
       <h6 class="m-t-30">Alamat</h6>
       <span id="jalan"></span>
       <br/>
   </div>
</div>

</div>
</div>

<div class="row">
  <div class="col s12">
     <div class="card">
        <div class="card-content">
           <!-- <h5 class="card-title">Add Row</h5> -->
           <table id="tabelKendaraan" class="table responsive-table display " style="width:100%">
           </table>
       </div>
   </div>
</div>

</div>

</div>

<script>
         	// initSample();
          let id = <?=$_GET['id'];?>;
          let Role = <?=$Role;?>;
          $(document).ready(function() {

             $.ajax({
                type  : 'POST',
                url   : '../../../api/order_customer_nasabah/list_code.php',
                processData:false,
                dataType : 'json',
                success: function (respone)
                { 
                   $('#kodeClaim').val(respone.data['kode']).attr('readonly',true);
               }
           });


             let AddNasabah  = {
                id_nasabah              : id
            };

            $.ajax({
                type  : 'POST',
                data  : JSON.stringify(AddNasabah),
                url   : '../../../api/pelanggan_nasabah/list.php',
                processData:false,
                dataType : 'json',
                success: function (respone)
                {
                   $('#namaPelanggan').append(respone.data['name_nasabah']);
                   $('#telphone').append(respone.data['phone_number_nasabah']);
                   $('#jalan').append(respone.data['address_nasabah']);
                   $('#email').append(respone.data['email']);
                   $('#nasabah').val(respone.data['id_nasabah']);
               }
           });

            $('#SimpanCheckInsure').on('click',function(e){
                e.preventDefault();
         			// var question = CKEDITOR.instances.editor.getData();

         			let dataInput = {
      				// nasabah_customer_id  : <?=$_GET['id'];?>,
      				kodeClaim             : $('#kodeClaim').val(),
      				plat             : $('#plat').val(),
      				price             : $('#price').val(),
      				merk              : $('#merk').val(),
      				nasabah           : $('#nasabah').val(),
      				keterangan        : $('#keterangan').val(),
      				type              : $('#type').val(),
      				color             : $('#color').val(),
      				year              : $('#year').val()
      				// coments : question

      			};
      			$.ajax({
      				type  : 'POST',
      				data  : JSON.stringify(dataInput),
      				url   : '../../../api/order_customer_nasabah/add.php',
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
      		})
            DtcolumnDefs = [
            { width: "15px", targets: 0, className : 'dt-body-center' },
            { width: "100px",targets: 1, className : 'dt-body-left' },
            { width: "100px",targets: 2, className : 'dt-body-left' },
            // { width: "250px",targets: 3, className : 'dt-body-left' },
            // { width: "100px",targets: 4, className : 'dt-body-left' },
            // { width: "100px",targets: 5, className : 'dt-body-left' },
            // { width: "150px",targets: 6, className : 'dt-body-center' },
            ];
            $('#tabelKendaraan').DataTable({
                "responsive": true,
                "serverSide": true,
                "autoWidth": true,
                "scrollCollapse" : true,
                "scrollY":true,
                "scrollX":true,
                "ajax": {
                   "data": AddNasabah,
                   "type": "POST",
                   "url": "../../../api/order_customer_nasabah/show.php",
               },
               "aoColumns" : [
               { "data": "id_order", "title": "No", "name": "id_order","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
               }},
               { "data": "id_order", "title": "Kode Kendaraan", "name": "id_order" },
               { "data": "Total", "title": "Total ", "name": "Total" },

               { "data": "type", "title": "Jenis", "name": "type"},
               { "data": "merk", "title": "Merk", "name": "merk"},
               { "data": "plate", "title": "Plat", "name": "plate"},
               { "data": "color", "title": "Warna", "name": "color"},
               { "data": "year", "title": "Tahun", "name": "year"},
             
               { "data": "StatusOrder", "title": "Status", "name": "Status"},
               { "data": "created_at", "title": "Tanggal Klaim", "name": "created_at"},
               
               { "data": "id_order", "title": "Setting", "name": "id_order","render": function(data, type, rows){
                   if(Role == 3  && rows.StatusOrder === 'pending' && rows.Total == null)
                      return`<a href="#" 
                  id="Delete" 
                  data-id = '${rows.id_order}'
                  class=" waves-effect waves-light btn red btn-xs" 
                  title="Hapus Data"><span class="material-icons">remove_circle_outline</span> </a>
                  
                  <a href=?page=daftar_survey&ket=Add&&id=${id}&kode=${rows.id_order}
                  class=" waves-effect waves-light btn green  btn-xs" 
                  title="Pengecekan"><span class="material-icons">list</span> </a>

                  `;
                  else if(Role == 3  && rows.StatusOrder == 'pending' && rows.Total != null)
                    return `
                <a href="#" 
                id="Ajukan" 
                data-id = '${rows.id_order}'
                class=" waves-effect waves-light btn blue    btn-xs" 
                title="Ajukan Perbaikan"><span class="material-icons">check</span> </a>
                <a href=?page=daftar_survey&ket=Info&id=${id}&kode=${rows.id_order}
                  class=" waves-effect waves-light btn dark  btn-xs" 
                  title="Pengecekan"><span class="material-icons">info</span> </a>
                `;
                else if(Role == 3 || Role == 2 && rows.StatusOrder === 'done' || rows.StatusOrder === 'in proccess')
                  return `<a href=?page=daftar_survey&ket=Info&&id=${id}&kode=${rows.id_order}
                  class=" waves-effect waves-light btn dark  btn-xs" 
                  title="Pengecekan"><span class="material-icons">info</span> </a>`;
              else return `  <a href=?page=daftar_survey&ket=Info&&id=${id}&kode=${rows.id_order}
                  class=" waves-effect waves-light btn dark  btn-xs" 
                  title="Pengecekan"><span class="material-icons">info</span> </a>`;
          }
      }
      ],
      "columnDefs":DtcolumnDefs
  });

            $(document).on('click','#Info',(function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let dataEdit = {
                   id_order : id
               };
               $.ajax({
                   data : JSON.stringify(dataEdit),
                   type : 'POST',
                   url  : '../../../api/order_customer_nasabah/list_code.php',
                   dataType:'json',
                   processData:false,
                   success : function(respone){
                      console.log(respone);
                      $('#coments').val(respone.data.kode['coments']);
                  }
              })
           }));
            $(document).on('click','#Delete',(function(){
                let dataHapus = {
                   id             : $(this).data('id'),
               }; 
               console.log(dataHapus);
               Swal.fire({
                   title: 'Anda Yakin ?',
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
                         url  : '../../../api/order_customer_nasabah/delete.php',
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

            $(document).on('click','#Ajukan',(function(){
                let dataHapus = {
                   id             : $(this).data('id'),
               }; 
               console.log(dataHapus);
               Swal.fire({
                   title: 'Anda Yakin?',
                   text: 'Ingin Mengajukan Perbaikan.!',
                   icon: 'question',
                   showCancelButton: true,
                   confirmButtonText: 'Lanjutkan',
                   cancelButtonText: 'Batalkan'
               }).then((result) => {
                   if (result.isConfirmed) {

                      $.ajax({
                         type : 'POST',
                         data : JSON.stringify(dataHapus),
                         url  : '../../../api/request_service/add.php',
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
        });
    </script>