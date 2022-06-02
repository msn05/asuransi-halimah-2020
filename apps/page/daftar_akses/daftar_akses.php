   <div class="container-fluid">
    <div class="row">
     <div class="col s6">
      <div class="card blue">
       <div class="card-content">
        <div class="d-flex no-block align-items-center">
         <div>
          <h6 class="white-text m-b-0">Akses ini digunakan oleh pengguna untuk memasukki Aplikasi Asuransi Kendaraan</h6>
         </div>
        </div>
       </div>
      </div>
      <div class="card">
       <div class="card-content">
        <!-- <h5 class="card-title">Add Row</h5> -->
        <table id="tabelaccess" class="responsive-table display " style="width:100%">
        </table>
       </div>
      </div>
     </div>
    </div>
   </div>

   <script>
    $('#tabelaccess').DataTable({
     // "processing": true,
      "fixedHeader": true,
     "responsive": true,
     "serverSide": true,
     "autoWidth": false,
     "scrollCollapse" : true,
      "scrollY": 400,
     "ajax": {
      "type": "POST",
      "url": "../../../api/access/show.php",
     },
     "aoColumns" : [
     { "data": "id_access", "title": "No", "name": "id_access","render": function ( data, type, row, meta ) {return meta.row+meta.settings._iDisplayStart+1;
     }},
     { "data": "access_name", "title": "Nama Akses", "name": "access_name" },
     { "data": "access_status", "title": "Status Akses", "name": "access_status"}

     ],

    });

   </script>
