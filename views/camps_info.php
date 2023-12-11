<?php
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
 WHERE term.id = $id";
 $term = $db->query($termsql);
?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/4.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["camp_info"]?></h1>
				 </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1 gallery-bx">
                <div class="container">
					 <div class="row d-flex flex-row-reverse">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="course-detail-bx">
								<div class="course-price">
									<h4 class="price"><?=$term[0]["price"]?> &#8364;</h4>
								</div>	
								<div class="course-buy-now text-center">
									<?php
									if($referans != ""){
										$r_link = "&referans=".$referans;
									}else{
										$r_link = "";
									}
									if($userid == ""){
										$reg_link = "login.php";
									}else{
										$reg_link = "?do=register_camp".$r_link."&id=".$term[0]["id"];
									}
									?>
									<a href="<?=$reg_link?>" class="btn radius-xl text-uppercase"><?=$lang["camp_reg"]?></a>
								</div>
								<div class="course-info-list scroll-page">
									<ul class="navbar">
										<li><a class="nav-link" href="#"><i class="ti-calendar"></i><?=tarix($term[0]["startdate"])?> - <?=tarix($term[0]["enddate"])?></a></li>
										<li><a class="nav-link" href="#"><i class="ti-user"></i><?=$lang["camp_person"]?> : <?=$term[0]["count"]?></a></li>
									</ul>
								</div>
							</div>
						</div>
					
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="courses-post">
							<div class="widget widget_gallery gallery-grid-4">
									<ul class="magnific-image">
							<?php $gallery = $db->query("SELECT * FROM gallery where term_id = ".$id);
									for($a=0;$a<count($gallery);$a++){ ?>
											
												<li><a href="<?=$gallery[$a]["path"]?>" class="magnific-anchor"><img src="<?=$gallery[$a]["path"]?>" alt=""></a></li>
							<?php } ?>
						</ul>
						</div>
								<div class="ttr-post-info">
									<div class="ttr-post-title ">
										<h2 class="post-title"><?=$term[0]["term"]?></h2>
									</div>
									<div class="ttr-post-text">
										<p><?=$term[0]["description_".$l]?></p>
									</div>
									
						</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->