<?php
include_once 'core.php';
$error = "";

    if(isset($_POST["submit"]) && $_POST["submit"] == "register"){
        unset($_POST["submit"]);
		$usermail = $db->query("SELECT * from users WHERE mail = '".$_POST["mail"]."'");
		if($_POST["password2"] != $_POST["password"]){
			$error .= $lang["rpassword_error"];
		}
		if(isset($_POST["term"]) && $_POST["term"] == "on"){
			
		}else{
			$error .= $lang["term_error"];
		}
		if(count($usermail) > 0){
			$error .= $lang["email_error"];
		}
		if($error == ""){
			print_r($_POST);
			unset($_POST["password2"]);
			unset($_POST["term"]);
			$_POST["password"] = hash('sha256', $_POST["password"]);
			$_POST["regdate"] = $vaxt;
			$_POST["online"] = $vaxt;
			$_POST["ip"] = $_SERVER['REMOTE_ADDR'];
			$db->insert("users",$_POST);
			$regid = $db->id();
			$_SESSION["userid"] = $regid;
			header('Location: index.php?do=camps');
		}
    }    

    ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="canonical" href="index.php" />
	<!-- OG -->
	<meta name="robots" content="index, follow">
	
	<meta name="keywords" content="INTCDC - International Child Development Center" />
	<meta name="author" content="INTCDC" />
	<meta name="description" content="INTCDC - International Child Development Center" />
	
	<meta property="og:url" content="index.php" />
	<meta property="og:site_name" content="INTCDC - International Child Development Center"/>
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="en_us" />
	<meta property="og:title" content="INTCDC - International Child Development Center" />
	<meta property="og:description" content="INTCDC - International Child Development Center" />
	<meta property="og:image" content="preview.png"/>
	
	<meta name="twitter:card" content="summary">
	<meta name="twitter:url" content="index.html">
	<meta name="twitter:creator" content="@themetrades">
	<meta name="twitter:title" content="INTCDC - International Child Development Center">
	<meta name="twitter:description" content="INTCDC - International Child Development Center">
	
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
	
	<!-- PAGE TITLE HERE ============================================= -->
	<title>INTCDC - International Child Development Center</title>
	
	<!-- MOBILE SPECIFIC ============================================= -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.min.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
	
	<!-- All PLUGINS CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/assets.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	
</head>
<body id="bg">
<div class="page-wraper">
	<div id="loading-icon-bx"></div>
	<div class="account-form">
		<div class="account-head" style="background-image:url(assets/images/gallery/3.jpg);">
			<a href="index.php"><img src="assets/images/logo-white-3.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head"><?=$lang["signup_now"]?></h2>
					<p><?=$lang["login_signup"]?></p>
				</div>	
				<?php if($error != ""){ ?>
				<div style="background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding-left:10px;"><?=$error?></div>
				<?php } ?>
				<form class="contact-bx ajax-form" method="POST" action="?do=register">
						<div class="ajax-message"></div>
						<div class="row placeani">
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["fullname"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["fullname_require"]?>')" name="fullname" type="text" required class="form-control valid-character">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group"> 
										<label><?=$lang["mail"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["mail_require"]?>')" name="mail" type="email" class="form-control" required >
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["phone"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["phone_require"]?>')" name="phone" type="text" required class="form-control int-value">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["address"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["address_require"]?>')" name="address" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["password"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["password_require"]?>')" name="password" type="password" required class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["password2"]?></label>
										<input oninvalid="this.setCustomValidity('<?=$lang["password2_require"]?>')" name="password2" type="password" required class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-12" style="margin-bottom:10px;">
								<center><input type="checkbox" name="term"> <?=$lang["agree"]?></center>
							</div>
							<div class="col-lg-12">
								<button name="submit" type="submit" value="register" class="btn button-md"><?=$lang["register_button"]?></button>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>
</div>
<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/masonry/filter.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>
<script src="assets/js/contact.js"></script>
</body>
</html>
