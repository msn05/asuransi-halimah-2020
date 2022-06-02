
<div class="container-fluid">
 <div class="row">
  <div class="col s12">
   <div class="card">
    <div class="d-flex align-items-center">
     <div class="p-5 green darken-1">
      <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
    </div>
    <div class="p-10">
      <h6 class="black-text m-b-0">Halaman ini pembuatan surat estimasi biaya terhadap perbaikan kendaraan. Untuk Mengisi data Pada form berikut ini.!</h6>
    </div>
  </div>
</div>
</div>
</div>
<!--<div class="row">-->
<!--  <div class="col s12">-->
<!--   <div class="card">-->
<!--    <div class="d-flex align-items-center">-->
<!--     <div class="p-5 green darken-1">-->
<!--      <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>-->
<!--    </div>-->
<!--    <div class="p-10">-->
<!--      <h6 class="black-text m-b-0">Informasi Survey Perbaikan Pengajuan Asuransi.!</h6>-->
<!--    </div>-->
<!--  </div>-->

<!--     <div class="card-content">-->
<!--   <table id="tabelSurvey" class="responsive-table display " style="width:100%">-->
<!--   </table>-->
<!-- </div>-->
<!--     </div>-->
<!--</div>-->
<!--</div>-->
<div class="row">
   
  <div class="col s9">
   <div class="card">
    <div class="card-content">
     <h5 class="card-title">Form Pengecekan Asuransi</h5>
     <div class="divider m-t-10"></div>
     <ul class="tabs tabs-fixed-width tab-demo z-depth-1">
            <li class="tab" ><a class="tab active" href="#tabs-1">Daftar Hasil Survey Asuransi</a></li>
      <li class="tab" ><a class="tab " href="#tabs-2">Spare part</a></li>
      <li class="tab" ><a class="tab"  href="#tabs-3">Jasa</a></li>
      <li class="tab" ><a class="tab"  href="#tabs-4">Cek Rangka Mesin</a></li>
    </ul>
    <div id="tabs-1">
<div class="card">
  <div class="card-content">
   <table id="tabelAsuransi" class="responsive-table display " style="width:100%">
   </table>
 </div>
</div>
</div>
<div id="tabs-2"><p class="p-15 p-b-0">FORM INPUT SPARE PART</p>
      <form class="h-form" id="formsparepart">
       <div class="form-body">
        <div class="row">
         <div class="col s12 ">
          <select  
          ui-select2="{width:'resolve'}" style="width:100%; height: 50px;" class="browser-default col s12" id="sparepart_data">
                  <option value="" >Pilih Jasa</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l6">
       <div class="row">
        <div class="input-field col s12">
         <input id="qty" type="text" class="validate" placeholder="Jumlah Sparepart">
       </div>
     </div>
   </div>
   <div class="col s12 l6">
     <div class="row">
      <div class="input-field col s12">
       <input id="disc" type="number" class="validate" placeholder="Diskon Sparepart (%)">
     </div>
   </div>
 </div>
 <div class="modal-footer m-t-20" style="float: right;">
  <button class="btn green waves-effect waves-light"  id="SimpanSparepartNya">Simpan
  </button>
  <a href="?page=estimasi_perbaikan" class="btn blue waves-effect waves-light"  >Kembali
  </a>
</div>
</div>
</div>

</form>
<div class="card">

  <div class="divider"></div>
  <div class="card-content">
   <table id="tabelInputSparepart" class="responsive-table display " style="width: 100% !important">
   </table>
 </div>
</div>
</div>

<div id="tabs-3">
 <form class="h-form" id="formpekerjaan">
  <div class="form-body">
   <div class="row">
    <div class="col s12 l12">
     <div class="row">
      <div class="col s3">
       <div class="h-form-label">
        <label for="f-nameh">Nama Jasa</label>
      </div>
    </div>
    <div class="input-field col s9">
     <select  
     ui-select2="{width:'resolve'}" style="width:100%; height: 50px; padding-top: 4px; margin-top: 4px;" class="browser-default col s12" id="namaPekerjaan">
     <option value="" >Pilih Jasa</option>
   </select>
   <!-- <input id="namaPekerjaan" type="text" placeholder="Nama Pekerjaan"> -->
 </div>
</div>
</div>
<div class="col s12 l12">
 <div class="row">
  <div class="col s3">
   <div class="h-form-label">
    <label for="l-nameh">Biaya</label>
  </div>
</div>
<div class="input-field col s9">
 <input id="biaya" type="text" placeholder="Biaya">
</div>
</div>
</div>
<!--</div>-->
<div class="modal-footer m-t-20">
 <button class="btn green waves-effect waves-light" style="float: right;" id="SimpanPekerjaan">Simpan
 </button>
</div>
</div>
</div>

</form>
<div class="card">
    <div class="divider"></div>
  <div class="card-content">
   <table id="tabelInputPekerjaan" class="responsive-table display " style="width:100%">
   </table>
 </div>
</div>
</div>
<div id="tabs-4">
 <form class="h-form">
  <div class="form-body">
   <div class="row">
    <div class="col s12 l6">
     <div class="row">
      <div class="col s3">
       <div class="h-form-label">
        <label for="f-nameh">Nomor Mesin</label>
      </div>
    </div>
    <div class="input-field col s9">
     <input id="nosin" type="text" placeholder="Nomor Mesin">
   </div>
 </div>
</div>
<div class="col s12 l6">
 <div class="row">
  <div class="col s3">
   <div class="h-form-label">
    <label for="l-nameh">Nomor Chasis</label>
  </div>
</div>
<div class="input-field col s9">
 <input id="casis" type="text" placeholder="Nomor Chasis">
</div>
</div>
</div>
<div class="col s12 l6">
 <div class="row">
  <div class="col s3">
   <div class="h-form-label">
    <label for="l-nameh">Tanggal Selesai</label>
  </div>
</div>
<div class="input-field col s9">
 <input id="dateDone" type="date" placeholder="Nomor Chasis">
</div>
</div>
</div>
<div class="col s12 l6">
 <div class="row">
  <div class="col s3">
   <div class="h-form-label">
    <label for="l-nameh">Pilih Mekanik</label>
  </div>
</div>
<div class="input-field col s9">
     <select  
     ui-select2="{width:'resolve'}" style="width:100%; height: 50px; padding-top: 4px; margin-top: 4px;" class="browser-default col s12" id="mekanik">
     <option value="" >Pilih Mekanik</option>
   </select>
 <!--<input id="dateDone" type="date" placeholder="Nomor Chasis">-->
</div>
</div>

</div>
</div>
</div>
<div class="modal-footer m-t-20">
 <button class="btn green waves-effect waves-light"  id="SimpanPengajuanSelsai">Selesaikan
 </button>
</div>

</form>
</div>
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
    <h6 class="">Tipe / Merk Kendaraan</h6>
    <span id="type"></span>
    <h6 class="">Plat Kendaraan</h6>
    <span id="plate"></span>
    <h6 class="">Tahun / Warna Kendaraan</h6>
    <span id="year"></span>
    <div class="divider"></div>
    <h6 class="p-t-20">Estimasi Selesai</h6>
    <span id="selesaiDono"></span>
    <h6 class="p-t-20">Nomor Chasis</h6>
    <span id="casisini"></span>
    <h6 class="p-t-20">Nomor Mesin</h6>
    <span id="nosinini"></span> 
    <h6 class="p-t-20">Nama Mekanik</h6>
    <span id="mekaniks"></span>
    <br/>
    <?php if($Role == 2 || $Role == 1){?>
    <table>
      <button type="button" id="Genered" class="m-t-20 btn waves-effect waves-light teal">Cetak PDF</button>
    </table>
    <?php }?>
  </div>
</div>

</div>
</div>
</div>
<script>
  $(document).ready(function(){
      
      var tabs = $(function() {
    $("#tabs").tabs({
        activate: function(event, ui) {
            window.location.hash = ui.newPanel.attr('id');
        }
    });
});

 
    let tombolCetak = $('#Genered').hide();

    let keterangan = '<?=$_GET['keterangan'];?>';

    if(keterangan == 'lihat'){
      $('form').empty();
      $('#tabelInputSparepart button #Delete').hide();
      tombolCetak.show();
      $(document).on('click','#Genered',(function(){
        let dataGenereted = {
          id_estimasiPerbaikan  : <?=$_GET['id'];?>,
          keterangan  : 'penawaran',
        }; 

        Swal.fire({
          title: 'Anda Yakin?',
          text: 'Ingin mencetak berkas.!',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Lanjutkan',
          cancelButtonText: 'Batalkan'
        }).then((result) => {
          if (result.isConfirmed) {

            $.ajax({
              type : 'POST',
              data : JSON.stringify(dataGenereted),
              url  : "../../../api/downloads/add.php",
              processData:false,
              dataType: "json",
              success: function (respone)
              {
                SwalOk.fire({text: respone.messages })
                .then((respone)=>{
                  window.location.href='?page=estimasi_perbaikan';
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

    }
    let DataNasabah = {
      id_nasabah : "<?=$_GET['nasabah'];?>"
    };


 
    let Jasa = $('#namaPekerjaan').select2();
    let dataJasa =    $.ajax({
      data : JSON.stringify(DataNasabah),
      type : 'POST',
      url  : '../../../api/service_categories/list.php',
      success : function(result){
       dataJasa      = result.data;
       for (var key in dataJasa) {
        data_id = dataJasa[key]['name_service'];
        dataText = dataJasa[key]['name_service'];
        var option = new Option(dataText, data_id);
        Jasa.append(option).on('change');
      }
    }
  });
   let Mekanik = $('#mekanik').select2();
    let dataMekanik =    $.ajax({
    //   data : JSON.stringify(DataNasabah),
      type : 'POST',
      url  : '../../../api/users/mechanic/list.php',
      success : function(result){
       dataMekanik      = result.data;
       for (var key in dataMekanik) {
        data_id = dataMekanik[key]['users_id'];
        dataText = dataMekanik[key]['mechanic_name'];
        var option = new Option(dataText, data_id);
        Mekanik.append(option).on('change');
      }
    }
  });



    $.ajax({
      type  : 'POST',
      data  : JSON.stringify(DataNasabah),
      url   : '../../../api/order_customer_nasabah/list.php',
      processData:false,
      dataType : 'json',
      success: function (respone)
      {
        // console.log(respone);
        $('#namaPelanggan').append(respone.data.pelanggan['name_nasabah']);
        $('#type').append(respone.data.kendaraan['merk']+ ' ' +respone.data.kendaraan['type'] );
        $('#plate').append(respone.data.kendaraan['plate']);
        $('#year').append(respone.data.kendaraan['year']+ ' '+respone.data.kendaraan['color']);
        // $('#mekaniks').append();
      }
    });

    function rubah(angka){
      var reverse = angka.toString().split('').reverse().join(''),
      ribuan = reverse.match(/\d{1,3}/g);
      ribuan = ribuan.join('.').split('').reverse().join('');
      return ribuan;
    }

    let Select = $('#sparepart_data').select2();

    let dataSelect =    $.ajax({
      type : 'POST',
      url  : '../../../api/sparepart/list.php',
      success : function(result){
       dataSparepart      = result.data;
       for (var key in dataSparepart) {
        data_id = dataSparepart[key]['code_spare_parts'];
        dataText = dataSparepart[key]['spare_part_name'];
        var option = new Option(dataText, data_id);
        Select.append(option).on('change');
      }
    }
  });

    let idDataCek = "<?=$_GET['id'];?>";

    let DataMesin = {
      id_checkin_mechanic : idDataCek
    };
    $.ajax({
      type  : 'POST',
      data  : JSON.stringify(DataMesin),
      url   : '../../../api/request_service/list.php',
      processData:false,
      dataType : 'json',
      success: function (respone)
      {
       $('#nosinini').append(respone.data['engine_no']);
       $('#casisini').append(respone.data['chassis_no']);
       $('#selesaiDono').append(respone.data['estime_done']);
       $('#mekaniks').append(respone.data['mechanic_name']);
     }
   });

    DtcolumnDefs = [
    { width: "10px", targets: 0, className : 'dt-body-center' },
    { width: "15px", targets: 2, className : 'dt-body-center' },
    { width: "15px", targets: 3, className : 'dt-body-center' },
    { width: "15px", targets: 6, className : 'dt-body-center' },
    {  targets: 4, render: $.fn.dataTable.render.number( ',','.', 0, 'Rp. ')}

    ];
    var sparepart = $('#tabelInputSparepart').DataTable({
      // "fixedHeader": true,
      "responsive": true,
      "serverSide": true,
      "info":     false,
      "paging":false,
      "bLengthChange":true,
      "searching":false,
    //   "autoWidth": true,
      "scrollCollapse" : true,
      "scrollY":true,
      "scrollX":true,
      "ajax": {
       "type": "POST",
       "data" : {id:idDataCek,keterangan:'sparepart'},
       "url": "../../../api/estimasi/show_dataSparepart.php",
     },
     "aoColumns" : [
     { "data": "id_estimasi", "title": "No", "name": "id_estimasi","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "spare_part_name", "title": "Sparepart", "name": "spare_part_name" },
     { "data": "Jumlah", "title": "Qty", "name": "Jumlah" },
     { "data": "disc", "title": "Disc", "name": "disc","render":function(data,type,rows){
      return `${rows.disc} %`; 
    } },
    { "data": "Harga", "title": "Harga / Unit", "name": "Harga" },
    { "title": "Total",
    "render":function(data, type, rows){
      // parseInt(${rows.Harga});
      var disc = rows.disc;
      var Total = parseInt(rows.Harga) * parseInt(rows.Jumlah);
      var dec = (disc/100) * Total;
      var grandTotal = dec - Total
      return "Rp."+ rubah(grandTotal)+"";
    }  
  },
  { "data": "id_estimasi", "title": "Setings", "name": "id_estimasi",
  "render":function(data, type, rows){
    if(keterangan == 'lihat')
      return ``;
    else
     return `
   <a href="#" 
   id="Delete" 
   data-id = '${rows.id_estimasi}'
   class=" waves-effect waves-light btn red xs" 
   title="Hapus"><span class="material-icons">delete</span> </a>`;
 }
}

],

"columnDefs":DtcolumnDefs
});

$('#tabelAsuransi').DataTable({
      // "fixedHeader": true,
      "responsive": true,
      "serverSide": true,
      "info":     false,
      "paging":false,
      "bLengthChange":true,
      "searching":false,
      "autoWidth": true,
      "scrollCollapse" : true,
      "scrollY":true,
      "scrollX":true,
      "ajax": {
       "type": "POST",
       "data" : DataNasabah,
       "url": "../../../api/estimasi/show_survey.php",
     },
     "aoColumns" : [
     { "data": "id", "title": "No", "name": "id","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "name_service", "title": "Nama Jasa", "name": "name_service" }

],

// "columnDefs":DtcolumnDefs
});

    var pekerjaan = $('#tabelInputPekerjaan').DataTable({
      // "fixedHeader": true,
      "responsive": true,
      "serverSide": true,
      "info":     false,
      "paging":false,
       "bLengthChange":true,
    //   "LengthChange":true,
      "searching":false,
      "autoWidth": false,
      "scrollCollapse" : true,
      "scrollY":true,
      "scrollX":true,
      "ajax": {
       "type": "POST",
       "data" : {id:idDataCek,keterangan:'pekerjaan'},
       "url": "../../../api/estimasi/show_dataSparepart.php",
     },
     "aoColumns" : [
     { "data": "id_estimasi", "title": "No", "name": "id_estimasi","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "spare_part_name", "title": "Nama Jasa", "name": "spare_part_name" },
     { "data": "Jumlah", "title": "Harga", "name": "Jumlah","render" : function (data,type,rows) {
       return "Rp."+ rubah(data)+"";
     } },

     { "data": "id_estimasi", "title": "Setings", "name": "id_estimasi",
     "render":function(data, type, rows){
       if(keterangan == 'lihat')
        return ``;
      else
       return `
     <a href="#" 
     id="DeletePekerjaan" 
     data-id = '${rows.id_estimasi}'
     class=" waves-effect waves-light btn red btn-small" 
     title="Hapus"><span class="material-icons">delete</span> Hapus</a>`;
   }
 }

 ]

});
    $(document).on('click',"#SimpanSparepartNya",function(e) {
      e.preventDefault();
      let AddSparepart  = {
       checkin_mechanic_id  : idDataCek,
       spare_part_id        : $('#sparepart_data').val(),
       qty_sparepart        : $('#qty').val(),
       disc                 : $('#disc').val(),
       keterangan           : 'sparepart'
     };
     $.ajax({
       type  : 'POST',
       data  : JSON.stringify(AddSparepart),
       url   : '../../../api/estimasi/add.php',
       processData:false,
       dataType : 'json',
       success: function (respone)
       {
        SwalOk.fire({text: respone.messages })
        .then((respone)=>{
          sparepart.ajax.reload();
            $('#formsparepart').trigger("reset");
       });
      },
      error:function(jqXHR, textStatus, errorThrown){
        let msg = JSON.parse(jqXHR.responseText);
        SwalError.fire({text: msg.messages })
      }
    });

   });

    $(document).on('click',"#SimpanPengajuanSelsai",function(e) {
      e.preventDefault();
      let AddSparepart  = {
       checkin_mechanic_id : idDataCek,
       nosin       : $('#nosin').val(),
       casis       : $('#casis').val(),
       mekanik       : $('#mekanik').val(),
       done       : $('#dateDone').val(),
       keterangan          : 'selesaikan'
     };
     $.ajax({
       type  : 'POST',
       data  : JSON.stringify(AddSparepart),
       url   : '../../../api/estimasi/add.php',
       processData:false,
       dataType : 'json',
       success: function (respone)
       {
        SwalOk.fire({text: respone.messages })
        .then((respone)=>{
         window.location.href='?page=estimasi_perbaikan'
       });
      },
      error:function(jqXHR, textStatus, errorThrown){
        let msg = JSON.parse(jqXHR.responseText);
        SwalError.fire({text: msg.messages })
      }
    });

   });

   $(document).on('click',"#SimpanPekerjaan",function(e) {
      e.preventDefault();
      let AddSparepart  = {
       checkin_mechanic_id : idDataCek,
       name_service       : $('#namaPekerjaan').val(),
       price       : $('#biaya').val(),
       keterangan  : 'pekerjaan'
     };
     $.ajax({
       type  : 'POST',
       data  : JSON.stringify(AddSparepart),
       url   : '../../../api/estimasi/add.php',
       processData:false,
       dataType : 'json',
       success: function (respone)
       {
        SwalOk.fire({text: respone.messages })
        .then((respone)=>{
            pekerjaan.ajax.reload();
            $('#formpekerjaan').trigger("reset");
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
       keterangan     : 'delete'
     }; 
     console.log(dataHapus);
     Swal.fire({
       title: 'Anda Yakin ?',
       text: 'Menghapus sparepart ini dari rincian perbaikan.?',
       icon: 'question',
       showCancelButton: true,
       confirmButtonText: 'Lanjutkan',
       cancelButtonText: 'Batalkan'
     }).then((result) => {
       if (result.isConfirmed) {

        $.ajax({
         type : 'DELETE',
         data : JSON.stringify(dataHapus),
         url  : '../../../api/estimasi/update.php',
         processData:false,
         dataType: "json",
         success: function (respone)
         {
          SwalOk.fire({text: respone.messages })
          .then((respone)=>{
        //   location.reload(true); 
        sparepart.ajax.reload();
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
    $(document).on('click','#DeletePekerjaan',(function(){
      let dataHapus = {
       id             : $(this).data('id'),
       keterangan     : 'delete pekerjaan'
     }; 
     console.log(dataHapus);
     Swal.fire({
       title: 'Anda Yakin ?',
       text: 'Menghapus pekerjaan ini dari rincian perbaikan.?',
       icon: 'question',
       showCancelButton: true,
       confirmButtonText: 'Lanjutkan',
       cancelButtonText: 'Batalkan'
     }).then((result) => {
       if (result.isConfirmed) {

        $.ajax({
         type : 'DELETE',
         data : JSON.stringify(dataHapus),
         url  : '../../../api/estimasi/update.php',
         processData:false,
         dataType: "json",
         success: function (respone)
         {
          SwalOk.fire({text: respone.messages })
          .then((respone)=>{
           pekerjaan.ajax.reload();
            $('#formpekerjaan').trigger("reset");
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