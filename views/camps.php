    <?php

    if(isset($_GET["search"]) && $_GET["search"] != ""){
        $search_value = $_GET["search"];
        $search = " AND term.`name` REGEXP '".$_GET["search"]."'"; 
    }else{
        $search = "";
        $search_value = "";
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
                    
                                <?php if($type == ""){ 
                                    $types = $db->query("SELECT * from camp_type");
                                    for($a = 0;$a < count($types);$a++){ 
                                    ?>
                                    <div class="col-md-6 col-lg-4 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="assets/images/camp.jpg" alt="">
											<a href="?do=camps<?=$r_link?>&type=<?=$types[$a]["id"]?>" class="btn"><?=$lang["view"]?></a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="?do=camps<?=$r_link?>&type=<?=$types[$a]["id"]?>"><?=$types[$a]["name_$l"]?></a></h5>
											<span><?=$types[$a]["about_$l"]?></span>
										</div>

									</div>
								    </div>
                                <?php
                            } } ?>
						<div class="col-lg-3 col-md-4 col-sm-12 m-b30">
							<div class="widget courses-search-bx placeani">
                            <?php if($type != ""){ ?>
                            <form method="GET" action="?do=camps">
								<div class="form-group">
									<div class="input-group">
										<label><?=$lang["search_camp"]?></label>
                                        <form method="GET" action="">
                                        <input name="do" value="camps" id="search" type="hidden" required class="form-control">
                                            <input name="search" id="search" value="<?=$search_value?>" type="text" class="form-control">
                                            <button type="button" style="display:none;" onclick="searchresult()" id="search_key">Search</button>
                                        </form>
									</div>
								</div>
                                </form>
                                <?php } ?>
							</div>
                            <?php if($type != ""){ ?>
							<div class="widget widget_archive">
                                <h5 class="widget-title style-1"><?=$lang["countries"]?></h5>
                                <ul>


                                <?php
                                
                                    $country = $db->query("SELECT * from countries");
                                    
                                    ?>
                                    <li class="active"><a href="?do=camps&country=all"><?=$lang["all"]?></a></li>
                                    <?php 
                                    for($a = 0;$a < count($country);$a++){ ?>
                                    <li><a href="?do=camps&type=<?=$type?>&country=<?=$country[$a]["id"]?>"><?=$country[$a]["country_".$l]?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>
							<div class="widget">
								<!--REKLAM-->
							</div>
							
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="row">
                            <?php if($type != ""){ ?>
                                <?php 
                                if(!isset($_GET["country"]) OR $_GET["country"] == "all"){
                                    $where = "";
                                }else{
                                    $country =  $_GET["country"];
                                    $where = "AND country_id = $country";
                                }
                                $countsql = "
                                    SELECT count(*) FROM
                                        camps
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id 
                                        WHERE camps.type = $type
                                    $where $search";
                                    $termsql = "
                                    SELECT camps.id as 'id',camps.country_id as 'country_id',camps.name,city.name_$l as 'city',countries.country_$l as'country' FROM
                                        camps
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id  
                                        WHERE camps.type = $type $where $search order by name ASC LIMIT $offset, $total_records_per_page";
                                        
                                    $terms = $db->query($termsql);

                                    $counts = $db->query($countsql);
                                if($referans != ""){
                                    $r_link = "&referans=".$referans;
                                }else{
                                    $r_link = "";
                                }
                                for($b = 0;$b < count($terms);$b++){

                                    ?>
								<div class="col-md-6 col-lg-4 col-sm-6 m-b30">
									<div class="cours-bx">
										<div class="action-box">
											<img src="assets/images/camp.jpg" alt="">
											<a href="?do=camps_info<?=$r_link?>&id=<?=$terms[$b]["id"]?>" class="btn"><?=$lang["read_more"]?></a>
										</div>
										<div class="info-bx text-center">
											<h5><a href="?do=camps_info<?=$r_link?>&id=<?=$terms[$b]["id"]?>"><?=$terms[$b]["name"]?></a></h5>
											<span><?=$terms[$b]["country"]?> (<?=$terms[$b]["city"]?>)</span>
										</div>

									</div>
								</div>
                                <?php } 
                                    pagination($counts[0]["count(*)"]);
                                ?>
                                <?php } ?>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->
	