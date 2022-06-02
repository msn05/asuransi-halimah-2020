<?php 
session_start();

if(@$_SESSION['SuccessLogin'] == true){
	header("location:page/layouts/index.php");	
}
else{

	include __DIR__.'/../helpers/url.php';?>

	<!DOCTYPE html>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" sizes="16x16" href="<?=uri();?>/assets/images/favicon.png">
		<title><?=$Apps;?></title>
		<link href="<?=uri();?>/dist/css/style.css" rel="stylesheet">
		<!-- This page CSS -->
		<link href="<?=uri();?>/dist/css/pages/authentication.css" rel="stylesheet">

	</head>

	<body>
		<div class="main-wrapper">
			<!-- ============================================================== -->
			<!-- Preloader - style you can find in spinners.css -->
			<!-- ============================================================== -->
			<div class="preloader">
				<div class="loader">
					<div class="loader__figure"></div>
					<p class="loader__label"><?=$Apps;?></p>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- Preloader - style you can find in spinners.css -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Login box.scss -->
			<!-- ============================================================== -->
			<div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(<?=uri();?>/assets/images/big/auth-bg2.jpg) no-repeat left center;">
				<div class="container">
					<div class="row">
						<div class="col s12 l8 m6 demo-text">
							<span class="db"><img height="120px;" src="<?=uri();?>/../apps/logo-cv.png" alt="logo" / ></span>
							<h1 class="font-light m-t-40">Welcome to the <span class="font-medium black-text">Asuransi Kendaraan CV TIARA PERSADA</span></h1>
							<!-- <p>This is just a demo text which you can change as per your requeirment, so change once you get chance. this is default text.</p> -->
							<!-- <a class="btn btn-round red m-t-5">Know more</a> -->
						</div>
					</div>
					<div class="auth-box auth-sidebar">
						<div id="loginform">
							<div class="p-l-10">
								<h5 class="font-medium m-b-0 m-t-40">Sign In </h5>
								<small>Masukkan data Login Anda.</small>
							</div>
							<!-- Form -->
							<div class="row">
								<form class="col s12" action="index.html">
									<!-- email -->
									<div class="row">
										<div class="input-field col s12">
											<input id="email" type="text" class="validate" required>
											<label for="email">Kode Login</label>
										</div>
									</div>
									<!-- pwd -->
									<div class="row">
										<div class="input-field col s12">
											<input id="password" type="password" class="validate" required>
											<label for="password">Password</label>
										</div>
									</div>
									<div class="row m-t-40 ">
										<div class="col s4">
											<button id="login" class="btn-large w100 blue accent-4 " type="submit">Login</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script src="<?=uri();?>/assets/libs/jquery/dist/jquery.min.js"></script>
			<script src="<?=uri();?>/dist/js/materialize.min.js"></script>
			<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			<script src="../helpers/swall.js"></script>
			<script>
				$('.tooltipped').tooltip();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
    	$("#loginform").slideUp();
    	$("#recoverform").fadeIn();
    });
    $(function() {
    	$(".preloader").fadeOut();
    });

    $('#login').on('click',function(e){
    	e.preventDefault();

    	let DataLogin = {
    		username : $('#email').val(),
    		password : $('#password').val()
    	}

    	$.ajax({
    		data : JSON.stringify(DataLogin),
    		type  : 'POST',
    		url   : '../api/login/login.php',
    		processData : false,
    		dataType : 'json',
    		success : function(e)
    		{
    			SwalOk.fire({text: e.messages })
    			.then((respone)=>{
    				window.location='page/layouts/index.php';
    			});
    		},
    		error:function(jqXHR, textStatus, errorThrown){
    			let msg = JSON.parse(jqXHR.responseText);
    			SwalError.fire({text: msg.messages })
    		}

    	})
    })



</script>
</body>

</html>
<?php }?>