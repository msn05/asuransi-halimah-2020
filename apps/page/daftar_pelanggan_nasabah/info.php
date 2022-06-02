      <link rel="stylesheet" type="text/css" href="<?=uri();?>/assets/libs/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
      <link rel="stylesheet" type="text/css" href="<?=uri();?>/assets/libs/ckeditor/samples/css/samples.css">
      <script src="<?=uri();?>/assets/libs/ckeditor/ckeditor.js"></script>
      <script src=" <?=uri();?>/assets/libs/ckeditor/samples/js/sample.js"></script>
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
    <div class="col s8">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title">Form Pengecekan Asuransi</h5>
                <div class="divider m-t-10"></div>
                <form class="h-form ">
                    <div class="form-body">
                        <textarea id="editor" height="200px;" ></textarea>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="price" type="text">
                                <label for="password">Masukkan Max Pembiayaan</label>
                            </div>
                        </div>
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
    <div class="col s4">
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
                <h6 class="m-t-30">Tipe Kendaraan</h6>
                <span id="type"></span>
                <h6 class="m-t-30">Plat Kendaraan</h6>
                <span id="plate"></span>
                <br/>
            </div>
        </div>

    </div>
</div>
</div>
<script>
   initSample();
   $(document).ready(function() {
    let AddNasabah  = {
        id_nasabah              : <?=$_GET['id'];?>
    };
    $.ajax({
        type  : 'POST',
        data  : JSON.stringify(AddNasabah),
        url   : '../../../api/checkInsure/list.php',
        processData:false,
        dataType : 'json',
        success: function (respone)
        {
          $('textarea').html(respone.data['coments']);
          $('#price').val(respone.data['max_price']);
        }
    });

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
            $('#type').append(respone.data['vehicle_type']);
            $('#plate').append(respone.data['vehicle_plate']);
            $('#email').append(respone.data['email']);
        }
    });

    $('#SimpanCheckInsure').on('click',function(e){
        e.preventDefault();
        var question = CKEDITOR.instances.editor.getData();

        let dataInput = {
            nasabah_customer_id  : <?=$_GET['id'];?>,
            price              : $('#price').val(),
            coments : question

        };
        $.ajax({
            type  : 'POST',
            data  : JSON.stringify(dataInput),
            url   : '../../../api/checkInsure/add.php',
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

});
</script>