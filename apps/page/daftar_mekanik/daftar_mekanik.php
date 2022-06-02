   <div class="container-fluid">
   	<div class="row">

   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
                    </div>
                    <div class="p-10">
                       <h6 class="black-text m-b-0">Halaman ini menampung data mekanik perusahaan CV TIARA PERSADA</h6>
                   </div>
                   <?php if($Role == 5){?>
                   <div class="ml-auto">
                        <a  class="btn-floating modal-trigger waves-effect waves-light btn-large teal" title="Tambah Mekanik" type="button"  data-target="modal1" ><i class="material-icons">add</i></a> 

                   </div>
                   <?php }?>

               </div>
           </div>
           <div class="card">
               <div class="card-content">
                  <!-- <h5 class="card-title">Add Row</h5> -->
                  <table id="tabelMekanik" class="responsive-table display " style="width:100%">
                  </table>
              </div>
          </div>
      </div>

      <div id="modal1" class="modal">
          <div class="modal-content" id="form">
             <h4>Form </h4>
             <div class="divider"></div>

             <form class="h-form">
                <div class="form-body">
                   <div class="divider"></div>
                   <div class="card-content">
                      <div class="row">
                         <div class="col s12 l6">
                            <div class="row">
                               <div class="col s3">
                                  <div class="h-form-label">
                                     <label for="f-nameh">Nama Mekanik</label>
                                 </div>
                             </div>
                             <div class="input-field col s9">
                               <input id="id" type="hidden" placeholder="Nama Mekanik">
                               <input id="name" type="text" placeholder="Nama Mekanik">
                           </div>
                       </div>
                   </div>
                   <div class="col s12 l6">
                      <div class="row">
                         <div class="col s3">
                            <div class="h-form-label">
                               <label for="l-nameh">Nomor Telephone</label>
                           </div>
                       </div>
                       <div class="input-field col s9">
                        <input id="telphone" type="text" placeholder="Nomor Telephone">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="col s12 l6">
              <div class="row">
                 <div class="col s3">
                    <div class="h-form-label">
                       <label for="u_name1">Username</label>
                   </div>
               </div>
               <div class="input-field col s9">
                <input id="username" type="text" placeholder="Username Here">
            </div>
        </div>
    </div>
    <div class="col s12 l6">
      <div class="row">
         <div class="col s3">
            <div class="h-form-label">
               <label for="n_nameh">Password</label>
           </div>
       </div>
       <div class="input-field col s9">
        <input id="password" type="text" placeholder="Nick Name Here">
    </div>
</div>
</div>
</div>
</div>
<div class="modal-footer">
   <button class="btn green waves-effect waves-light"  id="SimpanMekanik">Simpan
   </button>
</div>
</div>
</form>
</div>
</div>


<div id="modalAktif" class="modal ">
   <div class="modal-dialog modal-sm">
      <div class="modal-content" id="form">
         <h4>Form Aktivasi </h4>
         <div class="divider"></div>
         <form class="h-form">
            <div class="form-body">
               <div class="divider"></div>
               <div class="card-content">
                  <div class="row">
                    <div class="input-field col s12 m12">
                        <input type="hidden" id="id_users">
                        <select id="active" name="active" >
                            <option value="" >Silakan Pilih Status Aktivasi</option>
                            <option value="Active">Aktif</option>
                            <option value="Non Active">Tidak Aktif</option>
                        </select>
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

    DtcolumnDefs = [
    { width: "15px", targets: 0, className : 'dt-body-center' },
    { width: "150px", targets: 1, className : 'dt-body-left' },
    { width: "100px", targets: 2, className : 'dt-body-center' },
    { width: "50px", targets: 4, className : 'dt-body-center' },
    { width: "15px", targets: 5, className : 'dt-body-center' },
    ];

    $('#tabelMekanik').DataTable({
       "fixedHeader": true,
       "responsive": true,
       "serverSide": true,
       "autoWidth": false,
       "scrollCollapse" : true,
       "scrollY":true,
       "scrollX":true,
       "ajax": {
          "type": "POST",
          "url": "../../../api/users/mechanic/show.php",
      },
      "aoColumns" : [
      { "data": "id_mechanic", "title": "No", "name": "id_mechanic","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
      }},
      { "data": "mechanic_name", "title": "Nama Akses", "name": "mechanic_name" },
      { "data": "phone_mechanic", "title": "Nomor Telphone", "name": "phone_mechanic" },
      { "data": "username", "title": "Akses Sistem", "name": "username" },
      { "data": "created_at", "title": "Tanggal Bergabung", "name": "created_at" },
      { "data": "status_users", "title": "Status", "name": "status_users" },
      { "data": "code", "title": "Kode Login", "name": "code" },
 //      { "data": "id_mechanic", "title": "Setting", "name": "id_mechanic","render" : function(data, type, rows){
 //        if(rows.access_id == 7 )
 //            return ``;
 //        else
 //          if(rows.Aktif === 'Active')
 //             return `<a href="#" 
 //         id="UbahData" 
 //         data-id = '${rows.id_mechanic}'
 //         data-name = "${rows.mechanic_name}"
 //         data-username = "${rows.username}"
 //         data-ponsel = "${rows.phone_mechanic}"
 //         class=" waves-effect waves-light btn orange" 
 //         data-toggle="modal" 
 //         title="Ubah Data"><span class="material-icons">edit</span> Ubah</a>

 //         <a href="#" 
 //         id="Aktivasi" 
 //         data-id = '${rows.id_users}'
 //         data-status = "${rows.Aktif}"
 //         class=" waves-effect waves-light btn red" 
 //         data-toggle="modal" 
 //         title="Aktivasi"><span class="material-icons">lock</span> Aktivasi</a>
 //         `;
 //      // <a class="waves-effect waves-light btn"><button</a>
 //      else 
 //         return ` <a href="#" 
 //     id="DeleteData" 
 //     data-id = '${rows.id_users}'
 //     class=" waves-effect waves-light btn red" 
 //     title="Hapus Data"><span class="material-icons">delete_forever</span> Hapus</a>`;

 // }

// }
],
"columnDefs":DtcolumnDefs
});

    $(document).on('click',"#SimpanMekanik",function(e) {
       e.preventDefault();

       let data  = {
          mechanic_name : $('#name').val(),
          username      : $('#username').val(),
          password      : $('#password').val(),
          telphone      : $('#telphone').val(),
      };

      $.ajax({
          type  : 'POST',
          data  : JSON.stringify(data),
          url   : '../../../api/users/mechanic/add.php',
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
       let id_users = $(this).data('id'); 
       var elem = document.querySelector('.modal');
       var instance = M.Modal.init(elem);

       $('#id').val($(this).data('id'));
       $('#username').val($(this).data('username'));
       $('#name').val($(this).data('name'));
       $('#telphone').val($(this).data('ponsel'));
       $('#modal1 button').prop( 'id', 'UbahDataMekanik' );
       instance.open();
   }));

    $(document).on('click','#UbahDataMekanik', (function(e){
       e.preventDefault();
       let dataEdit  = {

          id_mechanic   : $('#id').val(),
          username   : $('#username').val(),
          mechanic_name      : $('#name').val(),
          telphone      : $('#telphone').val(),
          password      : $('#password').val(),
          keterangan  : 'null'
      };
      $.ajax({
          type  : 'POST',
          data  : JSON.stringify(dataEdit),
          url   : '../../../api/users/mechanic/update.php',
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
    $(document).on('click','#Aktivasi',(function(e) {
       e.preventDefault();
       let a = $(this).data('status');
       var elem = document.querySelector('#modalAktif');
       var instance = M.Modal.init(elem);
       instance.open();
       $('#id_users').val($(this).data('id')); 
       $("select#active").val(a).change();

   }));

    $(document).on('click','#ActivasiData', (function(e){
       e.preventDefault();
       let dataEdit  = {
          id_users   : $('#id_users').val(),
          status      : $('#active').val(),
          keterangan  : 'status'
      };
      $.ajax({
          type  : 'POST',
          data  : JSON.stringify(dataEdit),
          url   : '../../../api/users/mechanic/update.php',
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
          id_users       : $(this).data('id'),
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
             type : 'DELETE',
             data : JSON.stringify(dataHapus),
             url  : '../../../api/users/mechanic/update.php',
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
