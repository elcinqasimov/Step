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
	<meta name="twitter:url" content="index.php">
	<meta name="twitter:creator" content="@intcdc">
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
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-3.css">
	
	<!-- REVOLUTION SLIDER CSS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/layers.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/settings.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/revolution/css/navigation.css">
	<!-- REVOLUTION SLIDER END -->	
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-icon-bx"></div>
	<!-- Header Top ==== -->
    <?php include_once 'design/header.php'; ?>
    <!-- Header Top END ==== -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- Main Slider -->
        <?php include_once 'design/slider.php'; ?>
        <!-- Main Slider -->
		<div class="content-block">
			<!-- Popular CAMPS -->
			<div class="section-area section-sp2 popular-courses-bx" style="background-image:url(assets/images/background/bg4.jpg); background-size:cover;">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-center">
							<h2 class="title-head"><?=$lang["our_services"]?></h2>
						</div>
					</div>
					<div class="row m-b50">
					<?php 
						$services = $db->select("pages","`show` = 1");
						$i =1;
						for($a = 0; $a < count($services); $a++){ 
							?>
						<div class="col-lg-4 col-md-6">
							<div class="services-bx text-left m-b30">
								<div class="feature-lg text-white m-b30">
									<span class="icon-cell"><img width="100px" src="<?=$services[$a]["icon"]?>"/> </span> 
								</div>
								<div class="icon-content">
									<h5 class="ttr-tilte"><?=$services[$a]["name_".$l]?></h5>
									
									<a href="?do=<?=$services[$a]["url"]?>" class="readmore"><?=$lang["learn_more"]?><i class="la la-arrow-right"></i></a>
								</div>
								<div class="service-no">0<?=$i?></div>
							</div>
						</div>
						<?php
					$i++;
					 } ?>
						
					</div>
				</div>
				<div class="container-fluid">	
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-center">
							<h2 class="title-head"><?=$lang["last_camps"]?></h2>
						</div>
					</div>
					<div class="row">
					<div class="courses-carousel-2 owl-carousel owl-btn-1 col-12 p-lr0 owl-none">
					<?php 
                                if(!isset($_GET["country"]) OR $_GET["country"] == "all"){
                                    $where = "";
                                }else{
                                    $country =  $_GET["country"];
                                    $where = "WHERE country_id = $country";
                                }
                                $termsql = "
                                    SELECT
                                        term.id as 'id',
                                        term.`name` as 'term', 
                                        term.startdate as 'startdate', 
                                        term.enddate as 'enddate', 
                                        term.count as 'count',  
                                        term.price as 'price', 
                                        countries.country_az as 'country_az', 
                                        countries.country_en as 'country_en', 
                                        city.name_az as 'city_az', 
                                        city.name_en as 'city_en', 
                                        term.description_az as 'description_az', 
                                        term.description_en as 'description_en', 
                                        term.camp_id as 'camp_id',
                                        camps.`name` as 'camp_name',
                                        camps.`country_id` as 'country_id'
                                    FROM
                                        term
                                        INNER JOIN camps ON term.camp_id = camps.id
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id 
                                    $where LIMIT 5";
                                    $terms = $db->query($termsql);
                                
                                for($b = 0;$b < count($terms);$b++){ ?>
						<div class="item">
							<div class="cours-bx style1">
								<div class="action-box">
									<img src="assets/images/camp.jpg" alt="">
									<a href="?do=camps_info&id=<?=$terms[$b]["id"]?>" class="btn"><?=$lang["read_more"]?></a>
								</div>
								<div class="info-bx text-center">
									<h5><a href="?do=camps_info&id=<?=$terms[$b]["id"]?>"><?=$terms[$b]["term"]?></a></h5>
									<span><?=$terms[$b]["country_en"]?> (<?=$terms[$b]["city_en"]?>)</span>
								</div>
								<div class="cours-more-info">
											<div class="review">
											
											<?=tarix($terms[$b]["startdate"])?>
                                            <?=tarix($terms[$b]["enddate"])?>
											</div>
											<div class="price">	<span><?=$terms[$b]["count"]?> <?=$lang["person"]?></span>
												<h5><?=$terms[$b]["price"]?> &#8364;</h5>
											</div>
										</div>
							</div>
						</div>
						<?php } ?>
						
						
					</div>
					</div>
				</div>
			</div>
			<!-- Popular CAMPS END -->
			<?php if($userid == ""){ ?>
			<!-- Form -->
			<div class="section-area section-sp3 ovpr-dark bg-fix appointment-box" style="background-image:url(assets/images/background/bg1.jpg);">
				<div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-white text-center">
							<h2 class="title-head"><?=$lang["register_now"]?></h2>
						</div>
					</div>
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
							<div class="col-lg-12">
								<button name="submit" type="submit" value="register" class="btn button-md"><?=$lang["register_button"]?></button>
							</div>
						</div>
					</form>
				</div>
				<img src="assets/images/background/appointment-bg.png" class="appoint-bg" alt=""/>
			</div>
			<?php } ?>
			<!-- Form END -->
			<div class="section-area section-sp2" style="background-image:url(assets/images/background/bg4.jpg); background-size:cover;">
				<div class="container">
					<div class="row">
						<div class="col-md-12 style1 text-center heading-bx">
							<h2 class="title-head m-b0"><?=$lang["psychologists"]?></h2>
							
						</div>
					</div>
					<div class="row">
						<?php 
							$consultant = $db->select("consultant");
							for($a = 0; $a < count($consultant); $a++){
								?>
						<div class="col-md-12">
							<div class="event-bx style1">
								<div class="action-box">
									<img src="<?=$consultant[$a]["image"]?>" alt="">
								</div>
								<div class="info-bx d-flex" style="width:100%;">
									<div class="event-info">
										<h4 class="event-title"><a href="events-details.html"><?=$consultant[$a]["fullname_".$l]?></a></h4>
										<ul class="media-post">						
											<li><a href="?do=psiychology&mod=consultant&id=<?=$consultant[$a]["id"]?>"><i class="fa fa-info"></i><?=$consultant[$a]["status_".$l]?></a></li>
										</ul>
										<p>&nbsp;</p>
									</div>
								</div>
								<div class="event-time">
									<div class="event-date">&nbsp;&nbsp;&nbsp;<i class="fa fa-info"></i>&nbsp;&nbsp;&nbsp;</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="text-center">
						<a href="event.html" class="btn"><?=$lang["view_all"]?></a>
					</div>
				</div>
			</div>
			<!-- Our Story ==== -->
			<div class="section-area bg-gradient section-sp1 our-story popp">
				<div class="container">
					<div class="row align-items-center d-flex">
						<div class="col-lg-5 col-md-12 heading-bx text-white style1 ">
							<h2 class="title-head"><?=$lang["about"]?></h2>
							<p><?=$lang["about_label"]?></p>
						</div>
						<div class="col-lg-7 col-md-12 heading-bx p-lr">
							<div class="video-bx">
								<img src="assets/images/video.jpg"/>
								<a href="https://www.youtube.com/watch?v=r_yjdS5-x7s" class="popup-youtube video"><i class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Our Story END -->
			<!-- Testimonials -->
			<div class="section-area section-sp2" style="background-image:url(assets/images/background/bg7.jpg); background-size:cover;">
                <div class="container">
					<div class="row">
						<div class="col-md-12 heading-bx style1 text-center">
							<h2 class="title-head"><?=$lang["partners"]?></h2>
						</div>
					</div>
					<div class="testimonial-carousel-2 owl-carousel owl-btn-1 col-12 p-lr0 owl-none">
						<div class="item">
							<div class="testimonial-bx style1">
								<div style="float:right;width:70px;"><img width="50px" src="assets/images/tempo.png" alt=""></div>
								<div class="testimonial-info">
									<h5 class="name">Tempo Trips</h5>
								</div>
							</div>
						</div>

						<div class="item">
							<div class="testimonial-bx style1">
							<div style="float:right;width:70px;"><img width="50px" src="assets/images/inner.jpg" alt=""></div>
								<div class="testimonial-info">
									<h5 class="name">İnner Light</h5>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-bx style1">
								<div style="float:right;width:70px;"><img width="50px" src="" alt=""></div>
								<div class="testimonial-info">
									<h5 class="name">ELSE Group LTD</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Testimonials END -->
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
	<!-- Footer ==== -->
   <?php include_once 'design/footer.php'; ?>
    <!-- Footer END ==== -->

</div>

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>
<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>

<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>


<!-- Revolution JavaScripts Files -->
<script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>

<script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>

<script>
jQuery(document).ready(function() {
	'use strict';
	var ttrevapi;
	var tpj =jQuery;
	if(tpj("#rev_slider_14_1").revolution == undefined){
		revslider_showDoubleJqueryError("#rev_slider_14_1");
	}else{
		ttrevapi = tpj("#rev_slider_14_1").show().revolution({
			sliderType:"hero",
			jsFileLocation:"revolution/js/",
			sliderLayout:"fullscreen",
			dottedOverlay:"none",
			delay:1,
			particles: {startSlide: "first", endSlide: "last", zIndex: "6",
				particles: {
					number: {value: 100}, color: {value: "#ffffff"},
					shape: {
						type: "circle", stroke: {width: 0, color: "#ffffff", opacity: 1},
						image: {src: ""}
					},
					opacity: {value: 1, random: true, min: 0.25, anim: {enable: false, speed: 1, opacity_min: 0, sync: false}},
					size: {value: 3, random: true, min: 0.5, anim: {enable: false, speed: 1, size_min: 1, sync: false}},
					line_linked: {enable: false, distance: 150, color: "#ffffff", opacity: 0.4, width: 1},
					move: {enable: true, speed: 1, direction: "top", random: true, min_speed: 1, straight: false, out_mode: "out"}},
				interactivity: {
					events: {onhover: {enable: true, mode: "bubble"}, onclick: {enable: false, mode: "repulse"}},
					modes: {grab: {distance: 400, line_linked: {opacity: 0.5}}, bubble: {distance: 400, size: 0, opacity: 0.01}, repulse: {distance: 200}}
				}
			},
			navigation: {
			},
			responsiveLevels:[1240,1024,778,480],
			visibilityLevels:[1240,1024,778,480],
			gridwidth:[1240,1024,778,480],
			gridheight:[768,768,960,720],
			lazyType:"none",
			parallax: {
				type:"mouse",
				origo:"slidercenter",
				speed:1,
				levels:[1,2,3,4,5,10],
			},
			shadow:0,
			spinner:"off",
			autoHeight:"on",
			fullScreenAutoWidth:"off",
			fullScreenAlignForce:"off",
			fullScreenOffsetContainer: "",
			fullScreenOffset: "",
			disableProgressBar:"on",
			hideThumbsOnMobile:"off",
			hideSliderAtLimit:0,
			hideCaptionAtLimit:0,
			hideAllCaptionAtLilmit:0,
			debugMode:false,
			fallbacks: {
				simplifyAll:"off",
				disableFocusListener:false,
			}
		});
	}
	
	
});	
</script>
</body>
</html>
