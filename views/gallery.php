    <?php 
		$_GET["group"] = (isset($_GET["group"])) ? $_GET["group"] : ""; 
		if($_GET["group"] == ""){
			$where = "WHERE gallery.group_id != 0";
		}else{
			$where = "WHERE gallery.group_id = ".$_GET["group"];
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
									gallery.group_id = albom_groups.id
									INNER JOIN term ON gallery.term_id = term.id
									 $where";
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
						<?php for($b=0;$b<count($gallery);$b++){ ?>
							<li class="action-card col-lg-3 col-md-4 col-sm-6 book">
								<div class="ttr-box portfolio-bx">
									<div class="ttr-media media-ov2 media-effect">
										<a href="#">
											<img src="<?=$gallery[$b]["path"]?>" alt=""> 
										</a>
										<div class="ov-box">
											<div class="overlay-icon align-m"> 
												<a href="<?=$gallery[$b]["path"]?>" class="magnific-anchor" title="<?=$gallery[$b]["term"]?>">
													<i class="ti-search"></i>
												</a>
											</div>
											<div class="portfolio-info-bx bg-primary">
												<h4><a href="#"><?=$gallery[$b]["term"]?></a></h4>
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