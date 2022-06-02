
<aside class="left-sidebar">
   <ul id="slide-out" class="sidenav">
      <li>
         <ul class="collapsible p-t-30">
            <li class="small-cap"><span class="hide-menu">Management Menu</span></li>
            <li>
               <a href="index.php" class="collapsible-header"><i class="material-icons">dashboard</i><span class="hide-menu"> Dashboard</span></a>
            </li>
            
            <li class="small-cap"><span class="hide-menu">Management Users</span></li>
            <!--<li>-->
               <!--<a href="?page=daftar_akses" class="collapsible-header"><i class="material-icons">accessibility_new</i><span class="hide-menu"> Daftar Akses</span></a>-->
            <!--</li>-->
            <?php if($Role == 1 ){?>
               <li>
                  <a href="?page=daftar_mekanik" class="collapsible-header"><i class="material-icons">local_laundry_service</i><span class="hide-menu"> Daftar Mekanik</span></a>
               </li>
            <?php }?>
            <?php if($Role == 1 || $Role == 7){?>
               <li>
                  <a href="?page=daftar_sparepart" class="collapsible-header"><i class="material-icons">videogame_asset</i><span class="hide-menu"> Daftar Spare Part</span></a>
               </li>
               
            <?php }?>
            <?php if($Role == 1){?>
               <li>
                  <a class="collapsible-header has-arrow"><i class="material-icons">person_pin</i><span class="hide-menu"> Customer Services</span></a>
                  <div class="collapsible-body">
                     <ul class="collapsible" data-collapsible="accordion">
                        <li>
                           <a href="?page=daftar_pengajuan_service">
                              <span class="hide-menu">Pengajuan Service</span>
                           </a>
                        </li>
                        <li>
                           <a href="?page=estimasi_perbaikan">
                              <span class="hide-menu">Pengecekan Biaya</span>
                           </a>
                        </li>

                     </ul>
                  </div>
               </li>
            <?php }?>
            <?php if($Role == 3 || $Role == 5){?>
               <li>
                  <a class="collapsible-header has-arrow"><i class="material-icons">supervised_user_circle</i><span class="hide-menu"> Nasabah</span></a>
                  <div class="collapsible-body">
                     <ul class="collapsible" data-collapsible="accordion">
                         <?php if($Role == 5){?>
                        <li>
                           <a href="?page=daftar_nasabah">
                              <span class="hide-menu">Nasabah</span>
                           </a>
                        </li>
                        <?php }?>
                          <?php if($Role == 3){?>
                        <li>
                           <a href="?page=daftar_jasa" class="collapsible-header"><span class="hide-menu"> Daftar Jasa</span></a>
                        </li>
                        <li>
                           <a href="?page=daftar_pelanggan_nasabah">
                              <span class="hide-menu">Pelanggan Nasabah</span>
                           </a>
                        </li>
                        <li>
                           <a href="?page=estimasi_service">
                              <span class="hide-menu">Konfirmasi Pekerjaan</span>
                           </a>
                        </li>
                        <?php }?>
                     </ul>
                  </div>
               </li>
            <?php }?>
            <?php if($Role == 6 || $Role == 3){?>
               <li>
                  <a class="collapsible-header has-arrow"><i class="material-icons">person_pin</i><span class="hide-menu">  <?php if($Role ==  3){ echo 'Tagihan';}else{echo 'Kasir';}?></span></a>
                  <div class="collapsible-body">
                     <ul class="collapsible" data-collapsible="accordion">
                           <?php if($Role == 6 ){?>
                        <li>
                           <a href="?page=daftar_penagihan">
                              <span class="hide-menu">Penagihan</span>
                           </a>
                        </li>
                        <?php }?>
                         <?php if($Role == 6 || $Role == 3){?>
                        <li>
                           <a href="?page=invoice">
                              <span class="hide-menu">Invoice</span>
                           </a>
                        </li>
                        <?php }?>
                     </ul>
                  </div>
               </li>
            <?php }?>
            <?php if($Role == 7){?>
               <li>
                  <a class="collapsible-header has-arrow"><i class="material-icons">build</i><span class="hide-menu"> Mekanik</span></a>
                  <div class="collapsible-body">
                     <ul class="collapsible" data-collapsible="accordion">
                        <li>
                           <a href="?page=estimasi_perbaikan">
                              <span class="hide-menu">Pengecekan Biaya</span>
                           </a>
                        </li>
                        <li>
                           <a href="?page=daftar_perbaikan">
                              <span class="hide-menu">Perbaikan</span>
                           </a>
                        </li>

                     </ul>
                  </div>
               </li>
            <?php }?>
            <?php if($Role == 5){?>
               <li>
                  <a class="collapsible-header has-arrow"><i class="material-icons">attach_file</i><span class="hide-menu"> Pimpinan</span></a>
                  <div class="collapsible-body">
                     <ul class="collapsible" data-collapsible="accordion">
                        <li>
                           <a href="?page=laporan">
                              <span class="hide-menu">Laporan</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </li>
            <?php }?>
            <li  >
               <a  id="logout" class="collapsible-header"><i class="material-icons">directions</i><span class="hide-menu"> Log Out </span></a>
            </li>
         </ul>
      </li>
   </ul>
</aside>

<script>
   let data = {
      id_users : "<?=@$_SESSION['id_users']?>",
   };
   $('li#logout, #logout').on('click',(function(e){
    e.preventDefault();

    $.ajax({
      type : 'POST',
      data : JSON.stringify(data),
      url  : '../../../api/logout/logout.php',
      processData:false,
      dataType: "json",
      success: function (respone)
      {
        SwalOk.fire({text: respone.messages })
        .then((respone)=>{
          window.location='../../index.php';
       });
     },
     error:function(jqXHR, textStatus, errorThrown){
        let msg = JSON.parse(jqXHR.responseText);
        SwalError.fire({text: msg.messages })
     }
  })
 }));
</script>