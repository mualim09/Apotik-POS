<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$info=$this->crud->toko();

?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title><?php echo $info->nmtoko; ?></title>
	<base href="<?php echo base_url(); ?>" />
	<!-- Meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- //Meta tags -->
	<link rel="stylesheet" href="plugin/login/css/style.css" type="text/css" media="all" /><!-- Style-CSS -->
	<link href="plugin/login/css/font-awesome.css" rel="stylesheet"><!-- font-awesome-icons -->
	<script src="plugin/jq.js"></script>
	<script type="text/javascript" src="plugin/sweetalert/sweetalert2.js"></script>
	<link rel="stylesheet" href="plugin/sweetalert/sweetalert2.css" type="text/css" media="" />
	<link rel="apple-touch-icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="180x180">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="32x32" type="image/png">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="plugin/gambar/<?php echo $info->logo; ?>" color="#563d7c">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>">

</head>

<body>
	<section class="w3l-form-36">
		<div class="form-36-mian section-gap">
			<div class="wrapper">
				<div class="form-inner-cont">
					<h3>LOGIN APLIKASI</h3>
					<form action="welcome/cekid/" method="post" id="masuk" class="signin-form">
						<div class="form-input">
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							 <input  autocomplete='off' type="text" name="nmlogin" id="va" placeholder="Username" required />
						</div>
						<div class="form-input">
							<span class="fa fa-key" aria-hidden="true"></span> 
							<input  autocomplete='off' type="password" name="pslogin" id="vb" placeholder="Password"
								required />
						</div>
						<div class="login-remember d-grid">
							<label class="check-remaind">
								<input type="checkbox">
								<span class="checkmark"></span>
								<p class="remember">Remember me</p>
							</label>
							<button class="btn theme-button">Login</button>
						</div>

					</form>
				</div>
 <script type="text/javascript">
	$(document).ready(function()
	{
		$("#masuk").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Incorrect username or password!',
					  'warning'
					)
				}else{
					window.location=dt
				}
			  }
			});
		});
		});
	</script>
			</div>
		</div>
</section>
</body>
</html>