  <?php 
  $Tanggal = $_POST['tanggal'];
  $TanggalTwo = $_POST['tanggaltwo'];
  // var_dump($Tanggal);
  $Jenis   = $_POST['jenis'];
  ?>
  <div class="container-fluid">
  	<div class="row">
  		<div class="col s12">
  			<div class="card">
             <div class=" d-flex align-items-center justify-content-center" >
                <div class="p-10 " >
                 <div class="left ">
                  <img src="<?=uri('apps/');?>logo-cv.png" width="160px" height="80px">
               </div>
            </div>
            <p class="uppercase p-10"> BENGKEL MOBIL 
              <br>    TIARA PERSADA AUTOMOTIVE
              <br> <span style="font-size:14px;">Jalan Bambang Utoyo No.35 Palembang  telp : 0711-8840-800</span>
           </p>
        </div>
        <div  class="divider " tabindex="2"></div>
        <div class=" d-flex align-items-center justify-content-center" >
         <div class="p-10" >
          <h6 class=" black-text m-b-2 ">Halaman ini informasi laporan <?=$Jenis. ' Dari Tanggal '.$Tanggal. ' Sampai Tanggal '.$TanggalTwo ;?> </h6>
       </div>
    </div>
    <div class="card-content">
     <!-- <h5 class="card-title">Add Row</h5> -->
     <table id="tabelInvoice" class="responsive-table display " style="width:100%">
     </table>
  </div>
</div>
</div>
</div>
</div>
<script>
   let Tanggal = "<?=$Tanggal;?>";
   let TanggalTwo = "<?=$TanggalTwo;?>";
   let Jenis = "<?=$Jenis;?>";
   let DataLaporan = {
    Tanggal : Tanggal,
    TanggalTwo: TanggalTwo
 };
    // $.fn.dataTable.ext.errMode = 'throw';

    if(Jenis == 'Pembayaran'){
      var Columns = [
      { "data": "id_invoice", "title": "No", "name": "id_invoice","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
      }},
      { "data": "id_invoice", "title": "ID Invoice", "name": "id_invoice" },
      { "data": "NamaSparepart", "title": "Kode Pekerjaan", "name": "NamaSparepart" },
      { "data": "NamaPS", "title": "Nama Asuransi", "name": "NamaPS" },
      { "data": "NamaPelanggannya", "title": "Nama Pelanggan", "name": "NamaPelanggannya" },
      { "data": "Plat", "title": "Plat", "name": "Plat" },
      { "data": "Tanggal", "title": "Tanggal Pembayaran", "name": "Tanggal" }        
      ];
   }else{
     var Columns = [
     { "data": "id", "title": "No", "name": "id","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "namaAsuransi", "title": "Nama Asuransi", "name": "namaAsuransi" },
     { "data": "NamaPelanggan", "title": "Nama PelangganNya", "name": "NamaPelanggan" },
     { "data": "TanggalOrder", "title": "Tanggal Daftar Order", "name": "TanggalOrder" },
     { "data": "Telpone", "title": "No Telephone", "name": "Telpone" }     
     ];
  }

  $('#tabelInvoice').DataTable({
     "paging":   false,
     "ordering": false,
     "info":     false,
     "searching":false,
     "fixedHeader": true,
     "responsive": true,
     "serverSide": true,
     "autoWidth": true,
     "scrollCollapse" : true,
     "scrollY":true,
     "scrollX":true,
     "ajax": {
      "data" : DataLaporan,
      "type": "POST",
      "url": (Jenis === 'Pembayaran') ? "../../../api/laporan/show_pembayaran.php":"../../../api/laporan/show_pelanggan.php",
   },
   "aoColumns" : Columns
   	// "columnDefs":DtcolumnDefs
   });
</script>