    <?php

    if(isset($_POST["search"]) && $_POST["search"] != ""){
        $search = " AND term.`name` REGEXP '".$_POST["search"]."'"; 
    }else{
        $search = "";
    }

    ?>
    
    <script>
        $("#search").keyup(function(event) {
    if (event.keyCode == 13) {
        $("#search_key").trigger('click');
    }
})
</script>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/3.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["last_camps"]?></h1>
				 </div>
            </div>
        </div>
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1">
                <div class="container">
					 <div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="widget courses-search-bx placeani">
                            <form method="POST" action="">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["search_camp"]?></label>
                                        <form method="POST" action="">
                                            <input name="search" id="search" type="text" required class="form-control">
                                            <button type="button" style="display:none;" onclick="searchresult()" id="search_key">Search</button>
                                        </form>
									</div>
								</div>
                                </form>
							</div>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1"><?=$lang["countries"]?></h5>
                                <ul>


                                <?php
                                
                                    $country = $db->query("SELECT * from countries");
                                    
                                    ?>
                                    <li class="active"><a href="?do=camps&country=all"><?=$lang["all"]?></a></li>
                                    <?php 
                                    for($a = 0;$a < count($country);$a++){ ?>
                                    <li><a href="?do=camps&country=<?=$country[$a]["id"]?>"><?=$country[$a]["country_".$l]?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
							<div class="widget">
								<!--REKLAM-->
							</div>
							
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="row">
                                <?php 
                                if(!isset($_GET["country"]) OR $_GET["country"] == "all"){
                                    $where = "";
                                }else{
                                    $country =  $_GET["country"];
                                    $where = "AND camps.country_id = $country";
                                }
                                $countsql = "
                                    SELECT count(*) FROM
                                        term
                                        INNER JOIN camps ON term.camp_id = camps.id
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id 
                                        WHERE term.id 
                                    $where $search";
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
                                    $where $search order by term.id DESC LIMIT $offset, $total_records_per_page";
                                    $terms = $db->query($termsql);
                                    $counts = $db->query($countsql);
                                
                                for($b = 0;$b < count($terms);$b++){ ?>
								<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="assets/images/camp.jpg" alt="">
											<a href="?do=camps_info&id=<?=$terms[$b]["id"]?>" class="btn"><?=$lang["read_more"]?></a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="?do=camps_info&id=<?=$terms[$b]["id"]?>"><?=$terms[$b]["term"]?></a></h5>
											<span><?=$terms[$b]["country_".$l]?> (<?=$terms[$b]["city_".$l]?>)</span>
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
                                <?php } 
                                    pagination($counts[0]["count(*)"]);
                                ?>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->
	