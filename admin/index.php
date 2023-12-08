<?php 
include_once '../core.php';
	if($group < 1){
		header('Location: ../index.php');
	 }
	 ?>
<!DOCTYPE html>
<html lang="en">

<head>

	<!-- META ============================================= -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	
	<!-- DESCRIPTION -->
	<meta name="description" content="INTCDC - International Child Development Center" />
	
	<!-- OG -->
	<meta property="og:title" content="INTCDC - International Child Development Center" />
	<meta property="og:description" content="EduChamp : Education HTML Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	
	<!-- FAVICONS ICON ============================================= -->
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
	<link rel="stylesheet" type="text/css" href="assets/vendors/calendar/fullcalendar.css">
	
	<!-- TYPOGRAPHY ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/typography.css">
	
	<!-- SHORTCODES ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/shortcodes/shortcodes.css">
	
	<!-- STYLESHEETS ============================================= -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link class="skin" rel="stylesheet" type="text/css" href="assets/css/color/color-1.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/summernote/summernote.css">
	<link rel="stylesheet" type="text/css" href="assets/vendors/file-upload/imageuploadify.min.css">
	
</head>
<body class="ttr-opened-sidebar ttr-pinned-sidebar">
	
	<!-- header start -->
	<header class="ttr-header">
		<div class="ttr-header-wrapper">
			<!--sidebar menu toggler start -->
			<div class="ttr-toggle-sidebar ttr-material-button">
				<i class="ti-close ttr-open-icon"></i>
				<i class="ti-menu ttr-close-icon"></i>
			</div>
			<!--sidebar menu toggler end -->
			<!--logo start -->
			<div class="ttr-logo-box">
				<div>
					<a href="index.php" class="ttr-logo">
						<img class="ttr-logo-mobile" alt="" src="../assets/images/logo-white-3.png" width="180" height="30">
						<img class="ttr-logo-desktop" alt="" src="../assets/images/logo-white-3.png" width="160" height="27">
					</a>
				</div>
			</div>
			<!--logo end -->
			<div class="ttr-header-menu">
				<!-- header left menu start -->
				<ul class="ttr-header-navigation">
					<li>
						<a href="javascript:;" class="ttr-material-button ttr-submenu-toggle"><?=$fullname?></a>
					</li>
				</ul>
				<!-- header left menu end -->
			</div>
			<div class="ttr-header-right ttr-with-seperator">
				<!-- header right menu start -->
				<ul class="ttr-header-navigation">
					
					<li>
						<a href="#" class="ttr-material-button ttr-submenu-toggle"><span class="ttr-user-avatar"><img alt="" src="assets/images/testimonials/pic3.jpg" width="32" height="32"></span></a>
						<div class="ttr-header-submenu">
							<ul>
								<li><a href="?do=profile">My profile</a></li>
								<li><a href="../logout.php">Logout</a></li>
							</ul>
						</div>
					</li>
					
				</ul>
				<!-- header right menu end -->
			</div>
			<!--header search panel start -->
			<div class="ttr-search-bar">
				<form class="ttr-search-form">
					<div class="ttr-search-input-wrapper">
						<input type="text" name="qq" placeholder="search something..." class="ttr-search-input">
						<button type="submit" name="search" class="ttr-search-submit"><i class="ti-arrow-right"></i></button>
					</div>
					<span class="ttr-search-close ttr-search-toggle">
						<i class="ti-close"></i>
					</span>
				</form>
			</div>
			<!--header search panel end -->
		</div>
	</header>
	<!-- header end -->
	<!-- Left sidebar menu start -->
	<div class="ttr-sidebar">
		<div class="ttr-sidebar-wrapper content-scroll">

			<!-- side menu logo end -->
			<!-- sidebar menu start -->
			<nav class="ttr-sidebar-navi">
				<ul>
					<li>
						<a href="index.php" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-home"></i></span>
		                	<span class="ttr-label">Dashborad</span>
		                </a>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-user"></i></span>
		                	<span class="ttr-label">İstifadəçilər</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="?do=users" class="ttr-material-button"><span class="ttr-label">İstifadəçilər</span></a>
		                	</li>
							<li>
		                		<a href="?do=groups" class="ttr-material-button"><span class="ttr-label">İstifadəçi qrupları</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-image"></i></span>
		                	<span class="ttr-label">Albom</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="?do=albom_groups" class="ttr-material-button"><span class="ttr-label">Albom qrupları</span></a>
		                	</li>
							<li>
		                		<a href="?do=alboms" class="ttr-material-button"><span class="ttr-label">Albom siyahıları</span></a>
		                	</li>
		                </ul>
		            </li>
					<li>
						<a href="#" class="ttr-material-button">
							<span class="ttr-icon"><i class="ti-calendar"></i></span>
		                	<span class="ttr-label">Düşərgə</span>
		                	<span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
		                </a>
		                <ul>
		                	<li>
		                		<a href="?do=camps" class="ttr-material-button"><span class="ttr-label">Düşərgə siyahıları</span></a>
		                	</li>
		                	<li>
		                		<a href="?do=camp_registers" class="ttr-material-button"><span class="ttr-label">Düşərgə qeydiyyatları</span></a>
		                	</li>
							<li>
		                		<a href="?do=camp_group" class="ttr-material-button"><span class="ttr-label">Düşərgə qrupları</span></a>
		                	</li>
							<li>
		                		<a href="?do=countries" class="ttr-material-button"><span class="ttr-label">Ölkələr</span></a>
		                	</li>
							<li>
		                		<a href="?do=cities" class="ttr-material-button"><span class="ttr-label">Şəhərlər</span></a>
		                	</li>
		                </ul>
		            </li>
					
		            </li>
		            <li class="ttr-seperate"></li>
				</ul>
				<!-- sidebar menu end -->
			</nav>
			<!-- sidebar menu end -->
		</div>
	</div>
	<!-- Left sidebar menu end -->

	<!--Main container start -->
	<?php
		if($do != '' && file_exists(''.$do.'.php')){
			include ''.$do.'.php';
		}else{
			include 'main.php';
		}
	?>
	<div class="ttr-overlay"></div>

<!-- External JavaScripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/counter/waypoints-min.js"></script>
<script src="assets/vendors/counter/counterup.min.js"></script>
<script src='assets/vendors/scroll/scrollbar.min.js'></script>
<script src="assets/vendors/chart/chart.min.js"></script>
<script src='assets/vendors/calendar/moment.min.js'></script>
<script>
	

/*
***
***
Name: 			admin.js
Written by: 	ThemeTrade 
Theme Version:	1.0.0
***
***
*/
(function($) {
	
	'use strict';

	var AdminBuilder = function(){
		
		var checkSelectorExistence = function(selectorName) {
		  if(jQuery(selectorName).length > 0){return true;}else{return false;}
		};
		
		var searchToggle = function() {
		  $(".ttr-search-toggle").on("click", function(e) {
			e.preventDefault();
			$(".ttr-search-bar").toggleClass("active");
		  })
		};
		
		var closeNav = function() {
		  $(".ttr-overlay, .ttr-sidebar-toggle-button").on("click", function() {
			$("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
		  })
		};
		
		var leftSidebar = function() {
			
			$(".ttr-toggle-sidebar").on("click", function() {
				if($("body").hasClass("ttr-opened-sidebar")){
				  $("body").removeClass("ttr-opened-sidebar"), $("body").removeClass("ttr-body-fixed");
				}else{
				  $(window).width() < 760 && $("body").addClass("ttr-body-fixed"), $("body").addClass("ttr-opened-sidebar");
				}
			});

			$(".ttr-sidebar-pin-button").on("click", function() {
				$("body").toggleClass("ttr-pinned-sidebar");
			});
			
			$(".ttr-sidebar-navi li.show > ul").slideDown(200);
			$(".ttr-sidebar-navi a").on("click", function(e) {
				var a = $(this);
				$(this).next().is("ul") ? (e.preventDefault(), a.parent().hasClass("show") ? (a.parent().removeClass("show"), a.next().slideUp(200)) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().toggleClass("show"), a.next().slideToggle(200))) : (a.parent().parent().find(".show ul").slideUp(200), a.parent().parent().find("li").removeClass("show"), a.parent().addClass("show"))
			});
		  
		};
		
		var waveEffect = function(e, a) {
		  var s = ".ttr-wave-effect",
				n = e.outerWidth(),
				t = a.offsetX,
				i = a.offsetY;
			e.prepend('<span class="ttr-wave-effect"></span>'), $(s).css({
				top: i,
				left: t
			}).animate({
				opacity: "0",
				width: 2 * n,
				height: 2 * n
			}, 500, function() {
				e.find(s).remove()
		  });
		};
		
		var materialButton = function() {
			$(".ttr-material-button").on("click", function(e) {
				waveEffect($(this), e)
			});
		}
		
		var headerSubMenu = function() {
			$(".ttr-header-submenu").show();
			$(".ttr-header-submenu").parent().find("a:first").on("click", function(e) {
				e.stopPropagation();
				e.preventDefault();
				$(this).parents(".ttr-header-navigation").find(".ttr-header-submenu").not($(this).parents("li").find(".ttr-header-submenu")).removeClass("active");
				$(this).parents("li").find(".ttr-header-submenu").show().toggleClass("active");
			});
			$(document).on("click", function(e) {
				var a = $(e.target);
				!0 === $(".ttr-header-submenu").hasClass("active") && !a.hasClass("ttr-submenu-toggle") && a.parents(".ttr-header-submenu").length < 1 && $(".ttr-header-submenu").removeClass("active"), a.parents(".ttr-search-bar").length < 1 && !a.hasClass("ttr-search-bar") && !a.parent().hasClass("ttr-search-toggle") && !a.hasClass("ttr-search-toggle") && $(".ttr-search-bar").removeClass("active")
			});
		}
		
		var displayGraph = function() {
			if(!checkSelectorExistence('#chart')){return;}
			Chart.defaults.global.defaultFontFamily = "rubik";
			Chart.defaults.global.defaultFontColor = '#999';
			Chart.defaults.global.defaultFontSize = '12';

			var ctx = document.getElementById('chart').getContext('2d');

			var chart = new Chart(ctx, {
				type: 'line',

				// The data for our dataset
				data: {
					labels: ["Yanvar", "Fevral", "Mart", "Aprel", "May", "İyun", "İyul", "Avqust", "Sentyabr", "Oktyabr", "Noyabr", "Dekabr"],
					// Information about the dataset
					datasets: [{
						label: "Qeydiyyat",
						backgroundColor: 'rgba(0,0,0,0.05)',
						borderColor: '#4c1864',
						borderWidth: "3",
						<?php
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 1");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 2");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 3");
						$m[]= $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 4");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 5");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 6");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 7");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 8");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 9");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 10");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 11");
						$m[] = $db->query("SELECT Count(*) FROM `registration` WHERE Month(regdate) = 12");
						?>
						data: [<?=$m[0][0][0]?>,<?=$m[1][0][0]?>,<?=$m[2][0][0]?>,<?=$m[3][0][0]?>,<?=$m[4][0][0]?>,<?=$m[5][0][0]?>,<?=$m[6][0][0]?>,<?=$m[7][0][0]?>,<?=$m[8][0][0]?>,<?=$m[9][0][0]?>,<?=$m[10][0][0]?>,<?=$m[11][0][0]?>],
						pointRadius: 4,
						pointHoverRadius:4,
						pointHitRadius: 10,
						pointBackgroundColor: "#fff",
						pointHoverBackgroundColor: "#fff",
						pointBorderWidth: "3",
					}]
				},

				// Configuration options
				options: {

					layout: {
					  padding: 0,
					},

					legend: { display: false },
					title:  { display: false },

					scales: {
						yAxes: [{
							scaleLabel: {
								display: false
							},
							gridLines: {
								 borderDash: [6, 6],
								 color: "#ebebeb",
								 lineWidth: 1,
							},
						}],
						xAxes: [{
							scaleLabel: { display: false },  
							gridLines:  { display: false },
						}],
					},

					tooltips: {
					  backgroundColor: '#333',
					  titleFontSize: 12,
					  titleFontColor: '#fff',
					  bodyFontColor: '#fff',
					  bodyFontSize: 12,
					  displayColors: false,
					  xPadding: 10,
					  yPadding: 10,
					  intersect: false
					}
				},
			});
		}
		
		/* Set Counter Up Function */
		var setCounterUp = function(){
			/* change counter to counter-up*/
			if(!checkSelectorExistence('.counter')){return;}
			 jQuery('.counter').counterUp({
				delay: 10,
				time: 1000
			});	
		}
		
		/* Stylish Scroll */
		var setStylishScroll = function(){
			/*change content-scroll to custom-scroll*/
			if(!checkSelectorExistence('.content-scroll')){return;}
			$(".content-scroll").mCustomScrollbar({
				setWidth:false,
				setHeight:false,
				axis:"y"
			});	
		}
		
		return {
			initialHelper:function(){
				searchToggle();
				closeNav();
				leftSidebar();
				materialButton();
				headerSubMenu();
				displayGraph();
				setStylishScroll();
			},
			
			afterLoadThePage:function(){
				setCounterUp();
			},
		}
			
	}(jQuery);
		
	/* jQuery ready  */	
	jQuery(document).ready(function() {AdminBuilder.initialHelper();});
	/* jQuery Window Load */
	jQuery(window).on("load", function (e) {AdminBuilder.afterLoadThePage();});
	
})(jQuery);
</script>

<script src="assets/vendors/summernote/summernote.js"></script>
	<script src="assets/vendors/file-upload/imageuploadify.min.js"></script>
	<script>
    $(document).ready(function() {
      $('#desc_az').summernote({
        height: 300,
        name: "description_az",
        tabsize: 2
	});
      $('#desc_en').summernote({
        height: 300,
        name: "description_az",
        tabsize: 2
      });

    });
</script>
</body>
</html>