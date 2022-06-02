<div class="container-fluid">
 <div class="row">
  <div class="col s12">
   <div class="card">
    <div class="d-flex align-items-center">
     <div class="p-5 green darken-1">
      <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
     </div>
     <div class="p-10">
      <h6 class="black-text m-b-0">Halaman ini menampung data NASABAH perusahaan CV TIARA PERSADA</h6>
     </div>
     <div class="ml-auto">
      <a class="btn-floating modal-trigger waves-effect waves-light btn-large teal" title="Tambah Sparepart" type="button"  data-target="modal1" ><i class="material-icons">add</i></a>
     </div>
    </div>
   </div>
   <div class="card">
    <div class="card-content">
     <div class="table-responsive">
      <!-- <h5 class="card-title">Add Row</h5> -->
      <table id="tabelNasabah" class="responsive-table display " style="width:100%">
      </table>
     </div>
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
            <label for="f-nameh">Kode Login</label>
           </div>
          </div>
          <div class="input-field col s9">
           <input id="id_login" value="" type="text" placeholder="">
          </div>
         </div>
        </div>
        <div class="col s12 l6">
         <div class="row">
          <div class="col s3">
           <div class="h-form-label">
            <label for="f-nameh">Nama Nasabah</label>
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
            <label for="f-nameh">Nomor Telphone</label>
           </div>
          </div>
          <div class="input-field col s9">
           <input id="telp" type="number" placeholder=" Nomor Telphone">
          </div>
         </div>
        </div>
        <div class="col s12 l6">
         <div class="row">
          <div class="col s3 ml-auto" >
           <div class="h-form-label">
            <label for="f-nameh">Email</label>
           </div>
          </div>
          <div class="input-field col s9">
           <input id="username" type="text" placeholder="Email Nasabah">
          </div>
         </div>
        </div>
        <div class="col s12 ">
         <div class="row">
          <div class="col ml-auto ">
           <div class="h-form-label">
            <label for="f-nameh">Alamat</label>
           </div>
          </div>
          <div class="input-field col s10">
           <textarea id="alamat" rows="4" placeholder="Alamat Nasahab"></textarea>
          </div>
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

 <div id="modalAktif" class="modal ">
  <div class="modal-dialog modal-sm">
   <div class="modal-content" id="form">
    <h4>Form Pembaharun  </h4>
    <div class="divider"></div>
    <form class="h-form">
     <div class="form-body">
      <div class="divider"></div>
      <div class="card-content">
       <div class="row">
        <div class="input-field col s12">
         <input id="id_sparepart" type="hidden" placeholder="Nomor Telephone">
         <input class="center" id="nama" type="text" placeholder="Nomor Telephone">
        </div>
       </div>
       <div class="row">
        <div class="col s12 l6">
         <div class="row">
          <div class="col s3">
           <div class="h-form-label">
            <label for="l-nameh">Nomor Telpone</label>
           </div>
          </div>
          <div class="input-field col s9">
           <input id="telpon" type="text" placeholder="Nomor Telephone">
          </div>
         </div>
        </div>
        <div class="col s12 l6">
         <div class="row">
          <div class="col s3">
           <div class="h-form-label">
            <label for="l-nameh">Alamat</label>
           </div>
          </div>
          <div class="input-field col s9">
           <input id="jalan" type="text" placeholder="Nomor Telephone">
          </div>
         </div>
        </div>
       </div>
      </div>
      <div class="modal-footer">
       <button class="btn green waves-effect waves-light"  id="ActivasiData">Simpan
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
 $.ajax({
  type  : 'POST',
  url   : '../../../api/users/nasabah/list_code.php',
  processData:false,
  dataType : 'json',
  success: function (respone)
  { 
   $('#id_login').val(respone.data['kode']).attr('readonly',true);
  }
 });

 DtcolumnDefs = [
 { width: "15px", targets: 0, className : 'dt-body-center' },
 { width: "100px",targets: 3, className : 'dt-body-center' },
 { width: "150px",targets: 4, className : 'dt-body-left' },
 ];
 $('#tabelNasabah').DataTable({
  "fixedHeader": true,
  "responsive": true,
  "serverSide": true,
  "autoWidth": true,
  "bLengthChange":true,
  "scrollCollapse" : true,
  "scrollY":true,
  "scrollX":true,
  "ajax": {
   "type": "POST",
   "url": "../../../api/users/nasabah/show.php",
  },
  "aoColumns" : [
  { "data": "id_customer", "title": "No", "name": "id_customer","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
  }},
  { "data": "name_company", "title": "Nama Nasabah", "name": "name_company" },
  { "data": "address", "title": "Alamat", "name": "address" },
  { "data": "phone_number", "title": "Nomor Telp ", "name": "phone_number"},
  { "data": "username", "title": "Email", "name": "username"},
  { "data": "code", "title": "Kode Login", "name": "code"},
  { "data": "id_customer", "title": "Setting", "name": "id_customer","render": function(data, type, rows){
   return`<a href="#" 
   id="Pembahuran" 
   data-nama = '${rows.name_company}'
   data-id = '${rows.id_customer}'
   data-alamat = '${rows.address}'
   data-telpon = '${rows.phone_number}'
   class=" waves-effect waves-light btn green btn-small" 
   data-toggle="modal" 
   title="Perbaharui Nasabah"><span class="material-icons">edit</span> Perbaharui</a>
   `;

  }
 }
 ],
 "columnDefs":DtcolumnDefs
});



 $(document).on('click',"#SimpanNasabah",function(e) {
  e.preventDefault();
  let AddNasabah  = {
   id_login     : $('#id_login').val(),
   name_company     : $('#name').val(),
   phone_number      : $('#telp').val(),
   address                : $('#alamat').val(),
   username                : $('#username').val()
  };
  $.ajax({
   type  : 'POST',
   data  : JSON.stringify(AddNasabah),
   url   : '../../../api/users/nasabah/add.php',
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

 $(document).on('click','#Pembahuran',(function(e) {
  e.preventDefault();
  let a = $(this).data('alamat');
  console.log(a);
  var elem = document.querySelector('#modalAktif');
  var instance = M.Modal.init(elem);
  $('#id_sparepart').val($(this).data('id')); 
  $('#nama').val($(this).data('nama')).attr('readonly',true); 
  $('#telpon').val($(this).data('telpon')); 
  $('#jalan').val($(this).data('alamat')); 
  instance.open();
 }));

 $(document).on('click','#ActivasiData', (function(e){
  e.preventDefault();
  let dataEdit  = {
   id_customer        : $('#id_sparepart').val(),
   phone_number       : $('#telpon').val(),
   address       : $('#jalan').val()
  };
  $.ajax({
   type  : 'POST',
   data  : JSON.stringify(dataEdit),
   url   : '../../../api/users/nasabah/update.php',
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

 }));


 $(document).on('click','#DeleteData',(function(){
  let dataHapus = {
   id             : $(this).data('id'),
   keterangan     : 'delete'
  }; 
  Swal.fire({
   title: 'Anda Yakit?',
   text: 'Data Tidak Bisa Dikembalikan.!',
   icon: 'question',
   showCancelButton: true,
   confirmButtonText: 'Lanjutkan',
   cancelButtonText: 'Batalkan'
  }).then((result) => {
   if (result.isConfirmed) {

    $.ajax({
     type : 'POST',
     data : JSON.stringify(dataHapus),
     url  : '../../../api/sparepart/update.php',
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
