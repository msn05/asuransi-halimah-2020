<?php $Ket = $_GET['ket'];?>
<div class="container-fluid">
   <div class="row">
      <div class="col s12">
         <div class="card">
            <div class="d-flex align-items-center">
               <div class="p-5 green darken-1">
                  <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
              </div>
              <div class="p-10">
                  <h6 class="black-text m-b-0">Halaman ini digunakan untuk melakukan pengisian survey kendaraan pelanggan.</h6>
              </div>
          </div>
      </div>
  </div>
</div>
<div class="row">
    <?php if($Ket === 'Add'){?>
  <div class="col s9">
     <div class="card">
        <div class="card-content">
           <h5 class="card-title">Form Pengecekan Asuransi</h5>
           <div class="divider m-t-10"></div>
           <form class="h-form">
              <div class="form-body">
                 <div class="row">
                    <div class="col s4">
                       <div class="input-field col s12">
                         <select  
                         ui-select2="{width:'resolve'}" style="width:100%; height: 50px;" class="browser-default col s12" id="jasa">
                         <option value="" >Pilih Jasa</option>
                     </select>
                 </div>
             </div>
             <div class="col s4">
               <div class="input-field col s12">
                <select  
                ui-select2="{width:'resolve'}" style="width:100%; height: 50px;" class="browser-default col s12" id="kerusakan">
                <option value="" >Pilih Kerusakan</option>
            </select>
        </div>
    </div>
    <div class="col s2">
       <div class="input-field col s12">
        <select  
        ui-select2="{width:'resolve'}" style="width:100%; height: 50px;" class="browser-default col s12" id="repair">
              <option value="" >Pilih Repair</option>
        </select>
    </div>
</div>
<div class="col s2">
   <div class="input-field col s12">
    <select  
    ui-select2="{width:'resolve'}" style="width:100%; height: 50px;" class="browser-default col s12" id="replace">
          <option value="" >Pilih Replace</option>
    </select>
</div>
</div>
</div>

</div>
<div class="modal-footer m-t-10">
 <button class="btn green waves-effect waves-light"  id="SimpanCheckInsure">Simpan
 </button>
 <a href="?page=daftar_kendaraan_pelanggan&id=<?=$_GET['id'];?>" class="btn blue waves-effect waves-light"  >Kembali
 </a>
</div>
</form>
</div>
</div>
</div>
<?php }?>
<div class="col s3">
 <div class="card">
    <div class="card-content">
       <h5 class="card-title">Informasi Pelanggan</h5>
       <div class="divider"></div>
       <h6 class="p-t-20">Nama Pelanggan</h6>
       <span id="namaPelanggan"></span>
       <h6 class="m-t-30">Nomor Telphone</h6>
       <span id="telphone"></span>
       <h6 class="m-t-30">Plat</h6>
       <span id="pal"></span>
       <br/>
   </div>
</div>

</div>
<?php if($Ket === 'Add'){?>
</div>

<div class="row">
    <?php }?>
  <div class="<?=$Ket == 'Add' ? "col s12" : "col s9";?>">
     <div class="card">
        <div class="card-content">
           <!-- <h5 class="card-title">Add Row</h5> -->
           <table id="tabelKendaraan" class="responsive-table display " style="width:100%">
           </table>
       </div>
   </div>
</div>

</div>

</div>

<script>
         	// initSample();
         	let kode = "<?=$_GET['kode'];?>";
            let Role = <?=$Role;?>;
             let Note = "<?=$Ket;?>";
         	$(document).ready(function() {
                let Kerusakan = [
                {id:'s',text:'sedang'},
                {id:'p',text:'parah'},
                {id:'b',text:'berat'},
                ];
                let coments = [
                {id:'1',text:'ya'},
                {id:'0',text:'tidak'},
                ];
                let Jasa = $('#jasa').select2();
                $('#kerusakan').select2({
                    data : Kerusakan,
                    // width: 'auto',
                    dropdownAutoWidth: true,
                });
                 $('#repair').select2({
                    data : coments,
                    // width: 'auto',
                    dropdownAutoWidth: true,
                });
                 $('#replace').select2({
                    data : coments,
                    // width: 'auto',
                    dropdownAutoWidth: true,
                });

                let dataSelect =    $.ajax({
                  type : 'POST',
                  url  : '../../../api/service_categories/list.php',
                  success : function(result){
                     dataJasa      = result.data;
                     for (var key in dataJasa) {
                        data_id = dataJasa[key]['id_service_categori'];
                        dataText = dataJasa[key]['name_service'];
                        var option = new Option(dataText, data_id);
                        Jasa.append(option).on('change');
                    }
                }
            });


                let AddNasabah  = {
                    id_nasabah              : <?=$_GET['id'];?>
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

                let Plat  = {
                    id_order              : kode
                };

                $.ajax({
                    type  : 'POST',
                    data  : JSON.stringify(Plat),
                    url   : '../../../api/order_customer_nasabah/list.php',
                    processData:false,
                    dataType : 'json',
                    success: function (respone,kendaraan)
                    {
                        // let a = respone.data.kendaraan['plate'];
                        // console.log(a);
                       $('#pal').append(respone.data.kendaraan['plate']);
                   }
               });

                $('#SimpanCheckInsure').on('click',function(e){
                    e.preventDefault();

         			let dataInput = {
      				kodeClaim        : kode,
      				jasa             : $('#jasa').val(),
      				kerusakan        : $('#kerusakan').val(),
      				repair           : $('#repair').val(),
      				rk          : $('#replace').val()
      			};
      			$.ajax({
      				type  : 'POST',
      				data  : JSON.stringify(dataInput),
      				url   : '../../../api/survey/add.php',
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
                { width: "100px",targets: 2, className : 'dt-body-center' },
                { width: "80px",targets: 3, className : 'dt-body-center' },
                { width: "80px",targets: 4, className : 'dt-body-center' },
                ];
                $('#tabelKendaraan').DataTable({
                    "responsive": true,
                    "serverSide": true,
                    "autoWidth": false,
                    "scrollCollapse" : true,
                    "scrollY":true,
                    "scrollX":true,
                    "ajax": {
                       "data": {kode:kode},
                       "type": "POST",
                       "url": "../../../api/survey/show.php",
                   },
                   "aoColumns" : [
                   { "data": "id_checkin_insurance", "title": "No", "name": "id_checkin_insurance","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
                   }},
                   { "data": "namaJasa", "title": "Nama Jasa", "name": "namaJasa" },

                   { "data": "Kerusakan", "title": "Kerusakan", "name": "Kerusakan"},
                   { "data": "Repair", "title": "Repair", "name": "Repair"},
                   { "data": "Replace", "title": "Replace", "name": "Replace"},
         			{ "data": "id_checkin_insurance", "title": "Setting", "name": "id_checkin_insurance","render": function(data, type, rows){
         				if(Role == 3 && Note == 'Add' )
         					return`<a href="#" 
         				id="Delete" 
         				data-id = '${rows.id_checkin_insurance}'
         				class=" waves-effect waves-light btn red btn-small" 
         				title="Hapus Data"><span class="material-icons">remove_circle_outline</span> </a>
         				`;
         				else return ``;
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
                             url  : '../../../api/survey/delete.php',
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