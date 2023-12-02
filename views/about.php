
    <!-- Inner Content Box ==== -->
    <div class="page-content">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/8.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["about"]?></h1>
				 </div>
            </div>
        </div>
		<!-- Page Heading Box END ==== -->
		<!-- Page Content Box ==== -->
		<div class="content-block">
            <!-- About Us ==== -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<?php
							$about = $db->query("SELECT * FROM about");
							for($a = 0;$a<count($about);$a++){
						?>
						<div class="col-lg-3 col-md-6 col-sm-6 m-b30">
							<div class="feature-container">
								<div class="feature-md text-white m-b20">
									<a href="#" class="icon-cell"><img src="<?=$about[$a]["icon"]?>" alt=""/></a> 
								</div>
								<div class="icon-content">
									<h5 class="ttr-tilte"><?=$about[$a]["title_".$l]?></h5>
									<p><?=$about[$a]["desc_".$l]?></p>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
            </div>
			<!-- About Us END ==== -->
            <!-- Our Story ==== -->
			<div class="section-area bg-gray section-sp1 our-story">
				<div class="container">
					<div class="row align-items-center d-flex">
						<div class="col-lg-5 col-md-12 heading-bx">
							<h2 class="m-b10"><?=$lang["about"]?></h2>
							<?=$lang["about_label"]?>
						</div>
						<div class="col-lg-7 col-md-12 heading-bx p-lr">
							<div class="video-bx">
								<img src="assets/images/about/pic1.jpg" alt=""/>
								<a href="https://www.youtube.com/watch?v=r_yjdS5-x7s" class="popup-youtube video"><i class="fa fa-play"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Our Story END ==== -->



		</div>
		<!-- Page Content Box END ==== -->
    </div>
    <!-- Inner Content Box END ==== -->
    