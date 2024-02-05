<?php
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "camps"){
		unset($_POST["submit"]);
		$say = $db-> query("SELECT count(*) FROM camps WHERE `name` = '".$_POST["name"]."'");
		if($say[0]["count(*)"] < 1){
        	$db->insert("camps",$_POST);
			$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Düşərgə qrup adı əlavə olundu</div>";
		}else{
			$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Düşərgə qrup adı bazada var</div>";
		}
	}
	if(isset($_GET["mod"]) && $_GET["mod"] == "del"){
		$db->query("DELETE FROM camps WHERE id = '$id'");
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Düşərgə qrup adı silindi</div>";
	}


?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Düşərgə qrupları</h4>
			</div>	
			<?=$text?>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">

							<div class="mail-list-container">
								<div class="mail-toolbar">
									<div class="mail-search-bar">
										<form method="POST" action="">
										<input type="text" name="name" class="form-control" style="width:200px;float:left;margin-right:20px;" placeholder="Düşərgə qrup adı"/> &nbsp; 
										<select name="country_id" class="form-control" style="width:300px;float:left;margin-right:20px;">
											<?php 
												$country = $db->query("SELECT * FROM countries");
												for($b=0;$b<count($country);$b++){
											?>
											<option value="<?=$country[$b]["id"]?>"><?=$country[$b]["country_az"]?> (<?=$country[$b]["country_en"]?>)</option>
											<?php } ?>
												</select>
												<select name="city_id" class="form-control" style="width:200px;float:left;margin-right:20px;">
											<?php 
												$city = $db->query("SELECT * FROM city");
												for($b=0;$b<count($city);$b++){
											?>
											<option value="<?=$city[$b]["id"]?>"><?=$city[$b]["name_az"]?> (<?=$city[$b]["name_en"]?>)</option>
											<?php } ?>
												</select>
										<button type="submit" name="submit" value="camps" class="btn default">Əlavə et</button>
										</form>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
									$sql = "
										SELECT 
										countries.country_az as 'country_az',
										city.name_az as 'name_az',
										camps.name as 'name',
										camps.id as 'id'
										FROM camps
										INNER JOIN countries ON camps.country_id = countries.id
										INNER JOIN city ON camps.city_id = city.id
										ORDER BY camps.id DESC
									";
										$camp_group = $db->query("$sql LIMIT $offset, $total_records_per_page");
										$c_camp_group = $db-> query("SELECT count(*) FROM camps");
										for($a = 0;$a<count($camp_group);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><?=$camp_group[$a]["name"]?> (<?=$camp_group[$a]["country_az"]?> - <?=$camp_group[$a]["name_az"]?>)</p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=camp_group&mod=del&id=<?=$camp_group[$a]["id"]?>"><i class="fa fa-trash-o"></i></a></li>
										</ul>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div> 
					
				</div>
				<!-- Your Profile Views Chart END-->
				<?php pagination($c_camp_group[0]["count(*)"]); ?>
			</div>
		</div>
	</main>
	