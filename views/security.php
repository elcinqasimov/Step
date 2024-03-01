
    <!-- Inner Content Box ==== -->
    <div class="page-content">
        <!-- Page Heading Box ==== -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/8.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["sec"]?></h1>
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
							$about = $db->query("SELECT * FROM settings");
						?>
						<div class="col-lg-12">

									<center><h4 class="ttr-tilte"><?=$lang["sec"]?></h4></center>
									<p><?=$about[0]["sec_".$l]?></p>

						</div>
					</div>
				</div>
            </div>
			<!-- About Us END ==== -->




		</div>
		<!-- Page Content Box END ==== -->
    </div>
    <!-- Inner Content Box END ==== -->
    