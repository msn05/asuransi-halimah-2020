   <div class="container-fluid">
   	<div class="row">
        <div class="col s12">
         <div class="card">
          <div class="d-flex align-items-center">
            <div class="p-5 green darken-1">
             <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
         </div>
         <div class="p-10">
             <h6 class="black-text m-b-0">Halaman ini menampung daftar pembayaran perbaikan kendaraan perusahaan CV TIARA PERSADA</h6>
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
            <label for="f-nameh">Kode Service</label>
        </div>
    </div>
    <div class="input-field col s9">
       <input id="kodePerbaikan" value="" type="text" placeholder="">
   </div>
</div>
</div>
<div class="col s12 l6">
 <div class="row">
  <div class="col s3">
   <div class="h-form-label">
    <label for="f-nameh">Biaya Derek</label>
</div>
</div>
<div class="input-field col s9">
   <input id="derek" value="" type="number" placeholder=" Biaya Derek dalam rupiah">
</div>
</div>
</div>
<!--   <div class="col s12 l6">-->
<!--     <div class="row">-->
<!--      <div class="col s3">-->
<!--       <div class="h-form-label">-->
<!--        <label for="f-nameh">Biaya Bahan</label>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="input-field col s9">-->
<!--   <input id="material" value="" type="number" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<div class="col s12 l6">-->
<!--     <div class="row">-->
<!--      <div class="col s3">-->
<!--       <div class="h-form-label">-->
<!--        <label for="f-nameh"> O.R</label>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="input-field col s9">-->
<!--   <input id="or" value="" type="number" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<div class="col s12 l6">
     <div class="row">
      <div class="col s3">
       <div class="h-form-label">
        <label for="f-nameh"> Pph</label>
    </div>
</div>
<div class="input-field col s9">
   <input id="pph" value="" type="number" placeholder=" Biaya Pph dalam rupiah">
</div>
</div>
</div>
<div class="col s12 l6">
     <div class="row">
      <div class="col s3">
       <div class="h-form-label">
        <label for="f-nameh"> ADM</label>
    </div>
</div>
<div class="input-field col s9">
   <input id="adm" value="" type="number" placeholder="Biaya Adm dalam rupiah">
</div>
</div>
</div>
<!--<div class="col s12 l4">-->
<!--     <div class="row">-->
<!--      <div class="col s3">-->
<!--       <div class="h-form-label">-->
<!--        <label for="f-nameh"> Salvage</label>-->
<!--    </div>-->
<!--</div>-->
<!--<div class="input-field col s9">-->
<!--   <input id="sal" value="" type="number" placeholder="">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
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
<div class="col s12">
    <div class="card">
     <div class="card-content">
        <!-- <h5 class="card-title">Add Row</h5> -->
        <table id="tabelSparepart" class="responsive-table display " style="width:100%">
        </table>
    </div>
</div>
</div>


</div>
</div>

<script>
  let Select = $('#sparepart_data').select2();
  DtcolumnDefs = [
  { width: "15px", targets: 0, className : 'dt-body-center' },
  { width: "150px", targets: 1, className : 'dt-body-left' },
  { targets: 3, className : 'dt-body-left' },
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
      "url": "../../../api/start_repair/show.php",
  },
  "aoColumns" : [
  { "data": "id_start_repair", "title": "No", "name": "id_start_repair","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
  }},
  { "data": "id_start_repair", "title": "Kode Pekerjaan", "name": "id_start_repair"},
  { "data": "namaPLnasabah", "title": "Nama Nasabah", "name": "namaPLnasabah"},
  { "data": "NamaInsurance", "title": "Nama Asuransi", "name": "NamaInsurance"},
  { "data": "StatusPerbaikan", "title": "Status Pengerjaan", "name": "StatusPerbaikan"},
  { "data": "id_start_repair", "title": "Setting", "name": "id_start_repair","render": function(data, type, rows){
      if(rows.StatusPerbaikan == 'close' )
         return `
     <a href="#" 
     id="Bayar" 
     data-id = '${rows.id_start_repair}'
     data-id_req = '${rows.id_request_service}'
     class=" waves-effect waves-light btn green btn-small"  data-toggle="modal" 
     title="Cetak Invoice"><span class="material-icons">money</span> Invoice</a>`;
     else 
         return ``;
 }
}
],
"columnDefs":DtcolumnDefs
});

  $(document).on('click','#Bayar',(function(e) {
   e.preventDefault();
   var elem = document.querySelector('.modal');
   var instance = M.Modal.init(elem);
   $('#kodePerbaikan').val($(this).data('id')).attr('readonly',true);
   instance.open();
}));

 $(document).on('click','#SimpanNasabah', (function(e){
       e.preventDefault();
       let dataEdit  = {
           kode       : $('#kodePerbaikan').val(),
           derek     : $('#derek').val(),
           material      : $('#material').val(),
           osr      : $('#or').val(),
           pph      : $('#pph').val(),
           adm      : $('#adm').val(),
           sal      : $('#sal').val()
       };
       console.log(dataEdit);
       $.ajax({
           type  : 'POST',
           data  : JSON.stringify(dataEdit),
           url   : '../../../api/invoice/add.php',
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

</script>
