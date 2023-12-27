<?php
	$users			= $db->query("SELECT count(*) as 'say' FROM users");
	$agents			= $db->query("SELECT count(*) as 'say' FROM users WHERE `group` = '2'");
	$childs			= $db->query("SELECT count(*) as 'say' FROM children");
	$registration	= $db->query("SELECT count(*) as 'say' FROM registration");
	$camps			= $db->query("SELECT count(*) as 'say' FROM term");
?>
<main class="ttr-wrapper">
		<div class="container-fluid">
			<!-- Card -->
			<div class="row">
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg1">					 
						<div class="wc-item">
							<h4 class="wc-title">
								İstifadəçilər
							</h4>
							<span class="wc-des">
								Bütün istifadəçilər
							</span>
							<span class="wc-stats">
								<span class="counter"><?=$users[0]["say"]?></span> 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg2">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Agentlər
							</h4>
							<span class="wc-des">
								Bütün agentlər
							</span>
							<span class="wc-stats">
								<span class="counter"><?=$agents[0]["say"]?></span> 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg3">					 
						<div class="wc-item">
							<h4 class="wc-title">
								 Uşaqlar
							</h4>
							<span class="wc-des">
								Uşaqların sayı
							</span>
							<span class="wc-stats counter">
							<?=$childs[0]["say"]?> 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg4">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Qeydiyyatlar 
							</h4>
							<span class="wc-des">
								Düşərgə qeydiyyatları
							</span>
							<span class="wc-stats counter">
							<?=$registration[0]["say"]?> 
							</span>		
						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg5">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Düşərgələr
							</h4>
							<span class="wc-des">
								Bütün düşərgələr
							</span>
							<span class="wc-stats counter">
							<?=$camps[0]["say"]?> 
							</span>		

						</div>				      
					</div>
				</div>
				<div class="col-md-6 col-lg-2 col-xl-2 col-sm-6 col-12">
					<div class="widget-card widget-bg6">					 
						<div class="wc-item">
							<h4 class="wc-title">
								Valideyn turları 
							</h4>
							<span class="wc-des">
								Valideyn turları
							</span>
							<span class="wc-stats counter">
								-- 
							</span>		

						</div>				      
					</div>
				</div>
			</div>
			<!-- Card END -->
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Statistika</h4>
						</div>
						<div class="widget-inner">
							<canvas id="chart" width="100" height="15"></canvas>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Yeni istifadəçilər</h4>
						</div>
						<div class="widget-inner">
							<div class="new-user-list">
								<ul>
									<?php 
										$user = $db->query("SELECT * FROM users");
										for($a = 0;$a<count($user);$a++){ 
									?>
									<li>
										<span class="new-users-text">
											<a href="?do=user_info&id=<?=$user[$a]["id"]?>" class="new-users-name">ID : <?=$user[$a]["id"]?> | <?=$user[$a]["fullname"]?></a> Telefon : <?=$user[$a]["phone"]?> | E-Mail : <?=$user[$a]["mail"]?>
										</span>
										<!--
										<span class="new-users-btn">
											<a href="?do=user_info&id=<?=$user[$a]["id"]?>" class="btn button-sm outline">Bax</a>
										</span>
										-->
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Son qeydiyyatlar</h4>
						</div>
						<div class="widget-inner">
							<div class="orders-list">
								<ul>
									<?php 
										$sql = "
                                    SELECT
										registration.id as 'id',
										registration.regdate as 'regdate',
										registration.verify as 'verify',
										children.fullname as 'c_fullname',
										users.fullname as 'u_fullname',
                                        term.id as 'term_id',
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
                                        registration
										INNER JOIN term ON registration.term = term.id
										INNER JOIN children ON registration.childid = children.id
										INNER JOIN users ON registration.parentid = users.id
                                        INNER JOIN camps ON term.camp_id = camps.id
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id";
										$regsiyahi = $db->query($sql);
										for($a = 0;$a<count($regsiyahi);$a++){ 
									?>
									<li>
										<span class="orders-title">
											<a href="?do=camp_info&id=<?=$regsiyahi[$a]["id"]?>" class="orders-title-name">Uşağın adı : <?=$regsiyahi[$a]["c_fullname"]?> | Valideyn : <?=$regsiyahi[$a]["u_fullname"]?> </a>
											<span class="orders-info">Qeydiyyat : #<?=$regsiyahi[$a]["id"]?> | Tarix : <?=tarix($regsiyahi[$a]["regdate"])?> | Düşərgə : <?=$regsiyahi[$a]["term"]?></span>
										</span>
										<span class="orders-btn">
											<?php if($regsiyahi[$a]["verify"] == 0){ ?>
												<a href="?do=camp_info&id=<?=$regsiyahi[$a]["id"]?>" class="btn button-sm red">Təsdiqlənməyib</a>
											<?php }else{ ?>
												<a href="?do=camp_info&id=<?=$regsiyahi[$a]["id"]?>" class="btn button-sm green">Təsdiqlənib</a>
											<?php } ?>
										</span>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>