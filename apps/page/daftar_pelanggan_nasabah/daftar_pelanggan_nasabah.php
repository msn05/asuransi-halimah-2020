   <div class="container-fluid">
   	<div class="row">
   		<div class="col s12">
   			<div class="card">
   				<div class="d-flex align-items-center">
   					<div class="p-5 green darken-1">
   						<h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
   					</div>
   					<div class="p-10">
   						<h6 class="black-text m-b-0">Halaman ini menampung data PELANGGAN  PELANGGAN perusahaan CV TIARA PERSADA</h6>
   					</div>
   					<div class="ml-auto">
   						<a class="btn-floating modal-trigger waves-effect waves-light btn-large teal" title="Tambah Sparepart" type="button"  data-target="modal1" ><i class="material-icons">add</i></a>
   					</div>
   				</div>
   			</div>
   			<div class="card">
   				<div class="card-content">
   					<!-- <h5 class="card-title">Add Row</h5> -->
   					<table id="tabelNasabah" class="responsive-table display " style="width:100%">
   					</table>
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
   												<label for="f-nameh">Nama Pelanggan</label>
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
   												<label for="l-nameh">Nomor Telphone</label>
   											</div>
   										</div>
   										<div class="input-field col s9">
   											<input id="telp" type="number" placeholder="Nomor Telephone">
   										</div>
   									</div>
   								</div>
           <div class="col s12 l6">
            <div class="row">
             <div class="col s3">
              <div class="h-form-label">
               <label for="f-nameh">Nomor NIK Pelanggan </label>
              </div>
             </div>
             <div class="input-field col s9">
              <input id="number_nik" type="number" placeholder="Nomor NIK Pelanggan">
              <input id="id" type="hidden" placeholder="Nomor NIK Pelanggan">
              <input id="keterangan" value="add" type="hidden" placeholder="Nomor NIK Pelanggan">
             </div>
            </div>
           </div>
           <div class="col s12 l6">
            <div class="row">
             <div class="col s3">
              <div class="h-form-label">
               <label for="l-nameh">Email</label>
              </div>
             </div>
             <div class="input-field col s9">
              <input id="emails" type="text" placeholder="Email Pelanggan">
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
              <textarea id="jalan" rows="4" placeholder="Alamat "></textarea>
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


    <!-- <div id="modalAktif" class="modal ">
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
    </div> -->

   </div>
  </div>

  <script>
   let Role = <?=$Role;?>;
   DtcolumnDefs = [
   { width: "15px", targets: 0, className : 'dt-body-center' },
   { width: "150px",targets: 1, className : 'dt-body-left' },
   { width: "150px",targets: 2, className : 'dt-body-left' },
   ];
   $('#tabelNasabah').DataTable({
    "fixedHeader": true,
    "responsive": true,
    "serverSide": true,
    "autoWidth": false,
    "scrollCollapse" : true,
    "scrollY":true,
    "scrollX":true,
    "ajax": {
     "type": "POST",
     "url": "../../../api/pelanggan_nasabah/show.php",
    },
    "aoColumns" : [
    { "data": "id_nasabah", "title": "No", "name": "id_nasabah","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
    }},
    { "data": "namaPLnasabah", "title": "Nama Pelanggan", "name": "namaPLnasabah" },
    { "data": "PhoneNasabah", "title": "Nomor Hp", "name": "PhoneNasabah" },
    { "data": "emailsPelanggan", "title": "Email", "name": "emailsPelanggan"},
    { "data": "jalan", "title": "Alamat", "name": "jalan"},
    { "data": "id_nasabah", "title": "Setting", "name": "id_nasabah","render": function(data, type, rows){
     if(Role == 3 || Role == 2)
      return`<a href="#" 
     id="Delete" 
     data-id = '${rows.id_nasabah}'
     class=" waves-effect waves-light btn red btn-small" 
     title="Hapus Data"><span class="material-icons">remove_circle_outline</span> </a>

     <a href="#" 
     id="Ubah" 
     data-id = '${rows.id_nasabah}' data-toggle="modal"
     class=" waves-effect waves-light btn orange btn-small" 
     title="Ubah Data"><span class="material-icons">edit</span> </a>

     <a href=?page=daftar_kendaraan_pelanggan&id=${rows.id_nasabah}
     class=" waves-effect waves-light btn blue btn-small" 
     title="Info Kendaraan"><span class="material-icons">info_outline</span> </a>
     `;
     else 
      return ``;
    }
   }
   ],
   			// <a href=?page=daftar_pelanggan_nasabah&Aksi=info&id=${rows.id_nasabah}
   			// class=" waves-effect waves-light btn info btn-small" 
   			// title="Lanjutkan Pengecekan"><span class="material-icons">check</span> Proses</a>
      "columnDefs":DtcolumnDefs
     });

   $(document).on('click','#Ubah',(function(e) {
    e.preventDefault();
    let id = $(this).data('id');
    let dataEdit = {
     id_nasabah : id
    };

    $.ajax({
     data : JSON.stringify(dataEdit),
     type : 'POST',
     url  : '../../../api/pelanggan_nasabah/list.php',
     dataType:'json',
     processData:false,
     success : function(respone){
      var elem = document.querySelector('.modal');
      var instance = M.Modal.init(elem);
      instance.open();
      $('#id').val(respone.data['id_nasabah']);
      $('#name').val(respone.data['name_nasabah']);
      $('#telp').val(respone.data['phone_number_nasabah']);
      $('#jalan').val(respone.data['address_nasabah']);
      $('#emails').val(respone.data['email']);
      $('#number_nik').val(respone.data['number_nik']);
      $('#keterangan').val('ubah');
      $('#modal1 button').html('Ubah Data');
     }
    })
   }));

   $(document).on('click',"#SimpanNasabah",function(e) {
    e.preventDefault();
    let AddNasabah  = {
     id     										: $('#id').val(),
     keterangan               : $('#keterangan').val(),
     name_nasabah               : $('#name').val(),
     phone_number_nasabah      	: $('#telp').val(),
     address_nasabah            : $('#jalan').val(),
     number_nik             				: $('#number_nik').val(),
     email                      : $('#emails').val()
    };
    $.ajax({
     type  : 'POST',
     data  : JSON.stringify(AddNasabah),
     url   : '../../../api/pelanggan_nasabah/add.php',
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
   $(document).on('click','#Delete',(function(){
    let dataHapus = {
     id             : $(this).data('id'),
    }; 
    console.log(dataHapus);
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
       url  : '../../../api/pelanggan_nasabah/delete.php',
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
