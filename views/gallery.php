    <?php 
		$_GET["group"] = (isset($_GET["group"])) ? $_GET["group"] : ""; 
		if($_GET["group"] == ""){
			$where = "WHERE group_id != 0";
		}else{
			$where = "WHERE group_id = ".$_GET["group"];
		}
	?>
	<!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/8.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["gallery"]?></h1>
				 </div>
            </div>
        </div>

        <!-- contact area -->
        <div class="content-block">
			<!-- Portfolio  -->
			<div class="section-area section-sp1 gallery-bx">
				<div class="container">
					<div class="feature-filters clearfix center m-b40">
						<ul class="">
							<?php
								$gallery_sql = "SELECT
								albom_groups.name_az AS group_az, 
								albom_groups.name_en AS group_en, 
								gallery.id AS id, 
								gallery.path AS 'path', 
								term.`name` AS term, 
								gallery.group_id AS group_id
							FROM
								gallery
								INNER JOIN
								albom_groups
								ON 
									gallery.group_id = albom_groups.id,
								term $where";
								 $total_records_per_page = 12; 
								$gallery = $db->query("$gallery_sql LIMIT $offset, $total_records_per_page");
								$say = $db->query("SELECT count(*) as 'say' from gallery $where LIMIT $offset, $total_records_per_page");
								$group = $db->query("SELECT * from albom_groups");
								?>
							<li class="btn active">
								<a href="?do=gallery"><span><?=$lang["all"]?></span></a> 
							</li>
							<?php for($a=0;$a<count($group);$a++){ ?>
								<li class="btn active">
								<a href="?do=gallery&group=<?=$group[$a]["id"]?>"><span><?=$group[$a]["name_".$l]?></span></a> 
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="clearfix">
						<ul id="masonry" class="ttr-gallery-listing magnific-image row">
						<?php for($a=0;$a<count($gallery);$a++){ ?>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="#">
											<img src="<?=$gallery[$a]["path"]?>" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="<?=$gallery[$a]["path"]?>" class="magnific-anchor" title="Title Come Here">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#">Soft skills</a></h4>
											</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
						</ul>
					</div>
					
					<?php pagination($say[0]["say"]); ?>
				</div>
			</div>
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
	<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>