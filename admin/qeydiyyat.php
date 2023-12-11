<?php
	$text = "";
?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Düşərgə qeydiyyatı siyahıları</h4>
			</div>	
			<?=$text?>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">

							<div class="mail-list-container">

								<div class="mail-box-list">
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
									INNER JOIN countries ON camps.country_id = countries.id WHERE registration.parentid = $userid
									";
										$regsiyahi = $db->query("$sql LIMIT $offset, $total_records_per_page");
										$c_term = $db-> query("SELECT count(*) FROM registration WHERE parentid = $userid");
										for($a = 0;$a<count($regsiyahi);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><a href="?do=qeydiyyat_info&id=<?=$regsiyahi[$a]["id"]?>" class="orders-title-name">Uşağın adı : <?=$regsiyahi[$a]["c_fullname"]?> | Valideyn : <?=$regsiyahi[$a]["u_fullname"]?> 
											| Qeydiyyat : #<?=$regsiyahi[$a]["id"]?> | Tarix : <?=tarix($regsiyahi[$a]["regdate"])?> | Düşərgə : <?=$regsiyahi[$a]["term"]?></a>
										</p>
										</div>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div> 
					
				</div>
				<!-- Your Profile Views Chart END-->
				<?php pagination($c_term[0]["count(*)"]); ?>
			</div>
		</div>
	</main>
	