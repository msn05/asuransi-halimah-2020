   <div class="container-fluid">
   	<div class="row">
           <div class="col s12">
              <div class="card">
                 <div class="d-flex align-items-center">
                    <div class="p-5 green darken-1">
                       <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
                   </div>
                   <div class="p-10">
                     <h6 class="black-text m-b-0">Halaman ini menampung data spart part perusahaan CV TIARA PERSADA</h6>
                 </div>
                 <?php if($Role == 7){?>
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
                                       <label for="f-nameh">Kode Spare Part</label>
                                   </div>
                               </div>
                               <div class="input-field col s9">
                                <input id="id" type="hidden" placeholder="Nama Mekanik">
                                <input id="kode" type="text" placeholder="Kode Spart part">
                            </div>
                        </div>
                    </div>
                    <div class="col s12 l6">
                     <div class="row">
                         <div class="col s3">
                             <div class="h-form-label">
                                 <label for="l-nameh">Nama Spare Part</label>
                             </div>
                         </div>
                         <div class="input-field col s9">
                          <input id="name" type="text" placeholder="Nama Spare Part">
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
           <div class="col s12 l6">
               <div class="row">
                   <div class="col s3">
                       <div class="h-form-label">
                           <label for="u_name1">Harga</label>
                       </div>
                   </div>
                   <div class="input-field col s9">
                    <input id="harga" type="text" placeholder="Harga Spare Part ">
                </div>
            </div>
        </div>
        <div class="col s12 l6">
         <div class="row">
             <div class="col s3">
                 <div class="h-form-label">
                     <label for="n_nameh">Stok Tersedia</label>
                 </div>
             </div>
             <div class="input-field col s9">
              <input id="stock_add" type="text" placeholder="Jumlah Part">
          </div>
      </div>
  </div>
</div>
</div>
<div class="modal-footer">
   <button class="btn green waves-effect waves-light"  id="SimpanSparepart">Simpan
   </button>
</div>
</div>
</form>
</div>
</div>


<div id="modalAktif" class="modal ">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="form">
            <h4>Form Pembaharun Stok </h4>
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
                                         <label for="l-nameh">Jumlah Stok Lama</label>
                                     </div>
                                 </div>
                                 <div class="input-field col s9">
                                  <input id="stock_old" type="text" placeholder="Nomor Telephone">
                              </div>
                          </div>
                      </div>
                      <div class="col s12 l6">
                       <div class="row">
                           <div class="col s3">
                               <div class="h-form-label">
                                   <label for="l-nameh">Tambah Stok</label>
                               </div>
                           </div>
                           <div class="input-field col s9">
                            <input id="add_stock" type="text" >
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
    let Role = <?=$Role;?>;
    DtcolumnDefs = [
    { width: "15px", targets: 0, className : 'dt-body-center' },
    { width: "100px", targets: 1, className : 'dt-body-left' },
    { targets: 3, className : 'dt-body-center' },
    { targets: 4,   render: $.fn.dataTable.render.number( ',','.', 0, 'Rp. ')},
    { width: "15px", targets: 5, className : 'dt-body-center' },
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
           "url": "../../../api/sparepart/show.php",
       },
       "aoColumns" : [
       { "data": "code_spare_parts", "title": "No", "name": "code_spare_parts","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
       }},
       { "data": "code_spare_parts", "title": "Kode Sparepart", "name": "code_spare_parts" },
       { "data": "NamaSparepart", "title": "Nama Sparepart", "name": "NamaSparepart" },
       { "data": "Stok", "title": "Stok", "name": "Stok" },
       { "data": "Harga", "title": "Harga", "name": "Harga"},
       { "data": "created_at", "title": "Tanggal Update", "name": "created_at" },
       { "data": "NamaKepala", "title": "Nama Karyawan ", "name": "NamaKepala" },
       { "data": "code_spare_parts", "title": "Setting", "name": "code_spare_parts","render": function(data, type, rows){
        if(Role == 7 || Role == 2 )
           return`<a href="#" 
       id="Aktivasi" 
       data-nama = '${rows.NamaSparepart}'
       data-id = '${rows.code_spare_parts}'
       data-jumlah = '${rows.Alert}'
       class=" waves-effect waves-light btn green btn-small" 
       data-toggle="modal" 
       title="Perbaharui Jumlah Stok"><span class="material-icons">cached</span> </a>
       <a href="#" 
       id="UbahData" 
       data-id = '${rows.code_spare_parts}'
       data-name = '${rows.NamaSparepart}'
       data-price = '${rows.Harga}'
       data-stock = '${rows.Alert}'
       class=" waves-effect waves-light btn orange btn-small" 
       data-toggle="modal" 
       title="Ubah Data"><span class="material-icons">edit</span> </a>
       <a href="#" 
       id="DeleteData" 
       data-id = '${rows.code_spare_parts}'
       class=" waves-effect waves-light btn red btn-small" 
       title="Hapus Data"><span class="material-icons">delete_forever</span> </a>
       `;
       else return ``;

   }
}
],
"columnDefs":DtcolumnDefs
});



    $(document).on('click',"#SimpanSparepart",function(e) {
       e.preventDefault();
       let AddSparepart  = {
           code_spare_parts     : $('#kode').val(),
           spare_part_name      : $('#name').val(),
           price                : $('#harga').val(),
           stock_spare_part     : $('#stock_add').val()
       };
       $.ajax({
           type  : 'POST',
           data  : JSON.stringify(AddSparepart),
           url   : '../../../api/sparepart/add.php',
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
       $('#kode').val($(this).data('id')).attr('readonly',true);
       $('#name').val($(this).data('name'));
       $('#harga').val($(this).data('price'));
       $('#stock_add').val($(this).data('stock'));
       $('#modal1 button').prop( 'id', 'UbahDataMekanik' );
       instance.open();
   }));

    $(document).on('click','#addPart',function(e){
       e.preventDefault();
       $('#FormData').trigger("reset");
       $('#kode').val('').removeAttr('readonly',true);

         // $(this).find('FormData').trigger('reset');
         // $('#kode').val('');
         $('#modal1 button').prop( 'id', 'SimpanSparepart' );
     })

    $(document).on('click','#UbahDataMekanik', (function(e){
       e.preventDefault();
       let dataEdit  = {
           code_spare_parts       : $('#kode').val(),
           spare_part_name     : $('#name').val(),
           price      : $('#harga').val(),
           stock_spare_part      : $('#stock_add').val(),
           keterangan  : 'null'
       };
       $.ajax({
           type  : 'POST',
           data  : JSON.stringify(dataEdit),
           url   : '../../../api/sparepart/update.php',
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
       var elem = document.querySelector('#modalAktif');
       var instance = M.Modal.init(elem);
       $('#id_sparepart').val($(this).data('id')); 
       $('#nama').val($(this).data('nama')).attr('readonly',true); 
       $('#stock_old').val($(this).data('jumlah')).attr('readonly',true); 
       instance.open();
   }));

    $(document).on('click','#ActivasiData', (function(e){
       e.preventDefault();
       let dataEdit  = {
           id        : $('#id_sparepart').val(),
           stock_old : $('#stock_old').val(),
           add       : $('#add_stock').val(),
           keterangan  : 'update_stock'
       };
       $.ajax({
           type  : 'POST',
           data  : JSON.stringify(dataEdit),
           url   : '../../../api/sparepart/update.php',
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
           title: 'Anda Yakin?',
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
