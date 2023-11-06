<!DOCTYPE html>
<html lang="en">
<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="canonical" href="index.html" />
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

    <!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="#"><i class="fa fa-phone"></i>+99455 769 63 23</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>info@intcdc.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<li>
								<div class="header-lang-bx">
                                <?php if($l == "az"){ ?>
									<a href="<?=$_SERVER["REQUEST_URI"]?>&lang=en" >&nbsp;&nbsp;<img width="30px" src="assets/images/en.png"/></a>
								<?php }else{ ?>
									<a href="<?=$_SERVER["REQUEST_URI"]?>&lang=az" >&nbsp;&nbsp;<img width="30px" src="assets/images/az.png"/></a>
								<?php } ?>
                                </div>
							</li>
							<?php if($userid == ""){ ?>
							<li><a href="?do=login">Login</a></li>
							<li><a href="?do=register">Register</a></li>
							<?php }else{ ?>
							<li><a href="?do=users&profile=<?=$userid?>"><?=$fullname?></a></li>
							<li><a href="logout.php"><?=$lang["logout"]?></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="index.php"><img src="assets/images/logo-3.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="https://www.facebook.com/intcdc" class="btn-link"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/intcdc" class="btn-link"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/@intcdc" class="btn-link"><i class="fa fa-youtube"></i></a></li>
								<li><a href="https://www.linkedin.com/in/intcdc" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index-2.html"><img src="assets/images/logo.png" alt=""></a>
						</div>
						<ul class="nav navbar-nav">	
						<li><a href="index.php"><?=$lang["home_page"]?></a></li>

<?php
$sehife = $db->select("pages","isnull(subid)");
	$count = count($sehife);
	for($i = 0;$i<$count;$i++){
		$active = ($do == $sehife[$i]['id']) ? 'class="active"' : ''; 
		$subsehife = $db->select("pages","subid = ".$sehife[$i]['id']);
		$counts = count($subsehife);
		if($counts > 0){
			$drop = '<i class="fa fa-chevron-down"></i>';
			$href = 'javascript:;';
		}else{
			$drop = '';
			$href = '?do='.$sehife[$i]['url'];
		}
?>
<li <?=$active?>><a href="<?=$href?>"><?=$sehife[$i]['name_'.$l.'']?> <?=$drop?></a>
	<?php if($counts > 0){ ?>
		<ul class="sub-menu">

			<?php for($a=0;$a<$counts;$a++){?>
				<li><a href="?do=<?=$subsehife[$a]['url']?>"><?=$subsehife[$a]['name_'.$l.'']?></a></li>
			<?php } ?>
		</ul>
	<?php } ?>
</li>
<?php } ?>

</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- header END ==== -->