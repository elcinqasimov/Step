<?php
include_once 'core.php';
$text = "";
if(isset($_POST["submit"]) && $_POST["submit"] == "login"){
	$pass = $_POST["password"] = hash('sha256', $_POST["password"]);
	$login = $_POST["mail"];
	$query = "SELECT * from users WHERE mail = '$login' AND `password` = '$pass'";
	$login = $db->query($query);
	
	if(count($login) > 0){
		$_SESSION["userid"] 	= $login[0]["id"];
		$_SESSION["mail"] 		= $login[0]["mail"];
		$_SESSION["fullname"] 	= $login[0]["fullname"];
		header('Location: index.php?do=camps');
	}else{
		$text = "E-Mail və ya şifrə səhvdir.";
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
		<div class="account-head" style="background-image:url(assets/images/gallery/1.jpg);">
			<a href="index-2.html"><img src="assets/images/logo-white-3.png" alt=""></a>
		</div>
		<div class="account-form-inner">
			<div class="account-container">
				<div class="heading-bx left">
					<h2 class="title-head"><?=$lang["login_header"]?></h2>
					<p><?=$lang["login_label"]?></p>
				</div>	
				<?php if($text != ""){ ?>
				<div style="background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding-left:10px;margin-bottom:20px;"><?=$text?></div>
				<?php } ?>
				<form class="contact-bx" action="" method="POST">
					<div class="row placeani">
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group">
									<label><?=$lang["mail"]?></label>
									<input name="mail" type="text" required="" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group">
								<div class="input-group"> 
									<label><?=$lang["password"]?></label>
									<input name="password" type="password" class="form-control" required="">
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group form-forget">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
									<label class="custom-control-label" for="customControlAutosizing"><?=$lang["remember_me"]?></label>
								</div>
								<?=$lang["forget_password"]?>
							</div>
						</div>
						<div class="col-lg-12 m-b30">
							<button name="submit" type="submit" value="login" class="btn button-md"><?=$lang["login_enter"]?></button>
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
