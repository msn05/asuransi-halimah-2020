<?php 
$pengguna = @$_SESSION['access_id'];
if($pengguna === 1){
	echo  '
	<li class="small-cap"><span class="hide-menu">Management Users</span></li>
// 	<li>
// 	<a href="?page=daftar_akses" class="collapsible-header"><i class="material-icons">accessibility_new</i><span class="hide-menu"> Daftar Akses</span></a>
// 	</li>
	<li>
	<a href="?page=daftar_mekanik" class="collapsible-header"><i class="material-icons">local_laundry_service</i><span class="hide-menu"> Daftar Mekanik</span></a>
	</li>
	<li>
	<a href="?page=daftar_sparepart" class="collapsible-header"><i class="material-icons">videogame_asset</i><span class="hide-menu"> Daftar Spare Part</span></a>
	</li>
	<li>
	<a class="collapsible-header has-arrow"><i class="material-icons">person_pin</i><span class="hide-menu"> Customer Services</span></a>
	<div class="collapsible-body">
	<ul class="collapsible" data-collapsible="accordion">
	<li>
	<a href="?page=estimasi_perbaikan">
	<span class="hide-menu">Pengecekan Biaya</span>
	</a>
	</li>
	<li>
	<a href="?page=daftar_pengajuan_service">
	<span class="hide-menu">Pengajuan Service</span>
	</a>
	</li>

	</ul>
	</div>
	</li>
	';
}
if($pengguna === 3){
	echo  '
	<li>
	<a class="collapsible-header has-arrow"><i class="material-icons">supervised_user_circle</i><span class="hide-menu"> Nasabah</span></a>
	<div class="collapsible-body">
	<ul class="collapsible" data-collapsible="accordion">
	<li>
	<a href="?page=daftar_nasabah">
	<span class="hide-menu">Nasabah</span>
	</a>
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
	</ul>
	</div>
	</li>';

}
if($pengguna === 6){
	echo  '
	<li>
	<a class="collapsible-header has-arrow"><i class="material-icons">person_pin</i><span class="hide-menu"> Kasir</span></a>
	<div class="collapsible-body">
	<ul class="collapsible" data-collapsible="accordion">
	<li>
	<a href="?page=daftar_penagihan">
	<span class="hide-menu">Penagihan</span>
	</a>
	</li>
	</ul>
	</div>
	</li>
	';

}
if($pengguna === 7){
	echo '

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
	'
}