
<div class="container-fluid">
 <div class="row">
  <div class="col s12">
   <div class="card">
    <div class="d-flex align-items-center">
     <div class="p-5 green darken-1">
      <h3 class="white-text p-10 m-b-0"><i class="ti-info"></i></h3>
    </div>
    <div class="p-10">
      <h6 class="black-text m-b-0">Halaman ini yang menginformasikan data perbaikan kendaraan yang harus dilakukan mekanik.!</h6>
    </div>
  </div>
</div>
</div>
</div>
<div class="row">
  <div class="col s9">
   <div class="card">
    <div class="card-content">
     <h5 class="card-title">Sparepart</h5>
     <table id="tabelInputSparepart" class="responsive-table display " style="width:100%">
     </table>
   </div>
 </div>
 <div class="card">
  <div class="card-content">
    <h5 class="card-title">Jasa</h5>
    <table id="tabelInputPekerjaan" class="responsive-table display " style="width:100%">
    </table>
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
    <br/>
    <table>
      <form action="../../../api/start_repair/perintah_kerja.php" method="post" target="_blank">
        <div class="form-body">
         <div class="row">
          <div class="col s12 l12">
            <div class="input-field col s9">
              <input id="id_estimasiPerbaikan" name="id_estimasiPerbaikan" type="hidden" placeholder="Nomor Mesin">
              <input id="keterangan" name="keterangan" value="perintah kerja" type="hidden" placeholder="Nomor Mesin">
            </div>
          </div>
        </div>
      </div>
      <button type="submit"  class=" btn waves-effect waves-light teal"><span class="material-icons">local_printshop</span> Cetak Perintah Kerja</button>
    </form>
  </table>
</div>
</div>
</div>
</div>
</div>
<script>
  $(document).ready(function(){
    let tombolCetak = $('#Genered').hide();

    let keterangan = '<?=$_GET['keterangan'];?>';

    if(keterangan == 'lihat'){
      $('form').empty();
      $('#tabelInputSparepart button #Delete').hide();
      tombolCetak.show();
      $('#id_estimasiPerbaikan').val('<?=$_GET['cetak'];?>');
          }

    let DataNasabah = {
      id_nasabah : "<?=$_GET['nasabah'];?>"
    };

    $.ajax({
      type  : 'POST',
      data  : JSON.stringify(DataNasabah),
      url   : '../../../api/order_customer_nasabah/list.php',
      processData:false,
      dataType : 'json',
      success: function (respone)
      {
        console.log(respone);
        $('#namaPelanggan').append(respone.data.pelanggan['name_nasabah']);
        $('#type').append(respone.data.kendaraan['merk']+ ' ' +respone.data.kendaraan['type'] );
        $('#plate').append(respone.data.kendaraan['plate']);
        $('#year').append(respone.data.kendaraan['year']+ ' '+respone.data.kendaraan['color']);
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
     }
   });

    DtcolumnDefs = [
    { width: "10px", targets: 0, className : 'dt-body-center' },

    ];
   var TabelSparepart =  $('#tabelInputSparepart').DataTable({
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
       "data" : {id:idDataCek,keterangan:'sparepart'},
       "url": "../../../api/estimasi/show_dataSparepart.php",
     },
     "aoColumns" : [
     { "data": "id_estimasi", "title": "No", "name": "id_estimasi","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "spare_part_name", "title": "Nama Sparepart", "name": "spare_part_name" },
     { "data": "Jumlah", "title": "Qty", "name": "Jumlah" }

     ],

     "columnDefs":DtcolumnDefs
   });

    $('#tabelInputPekerjaan').DataTable({
      // "fixedHeader": true,
      "responsive": true,
      "serverSide": true,
      "info":     false,
      "paging":false,
      "LengthChange":true,
      "searching":false,
      "autoWidth": true,
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
     { "data": "spare_part_name", "title": "Nama Jasa", "name": "spare_part_name" }

     ],
     "columnDefs":DtcolumnDefs

   });

  });


</script>