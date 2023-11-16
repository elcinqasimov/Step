<?php
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "camps"){
		unset($_POST["submit"]);
		$say = $db-> query("SELECT count(*) FROM camps WHERE name = '".$_POST["name"]."'");
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
				<h4 class="breadcrumb-title">Düşərgə siyahıları</h4>
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
										<a href="?do=camp_add&mod=add" class="btn default">Düşərgə əlavə et</a>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
									$sql = "
										SELECT 
										term.name as 'name',
										term.count as 'count',
										term.startdate as 'startdate',
										term.enddate as 'enddate',
										term.price as 'price',
										countries.country_az as 'country_az',
										city.name_az as 'name_az',
										camps.name as 'camp_name',
										camps.id as 'id'
										FROM term
										INNER JOIN camps ON term.camp_id = camps.id
										INNER JOIN countries ON camps.country_id = countries.id
										INNER JOIN city ON camps.city_id = city.id
									";
										$term = $db->query("$sql LIMIT $offset, $total_records_per_page");
										$c_term = $db-> query("SELECT count(*) FROM term");
										for($a = 0;$a<count($term);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><b><?=$term[$a]["name"]?></b> (<?=$term[$a]["country_az"]?> - <?=$term[$a]["name_az"]?>) | Başlama : <?=tarix($term[$a]["startdate"])?> | Bitmə : <?=tarix($term[$a]["enddate"])?> | Qiymət : <?=$term[$a]["price"]?> | Nəfər : <?=$term[$a]["count"]?></p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=camps&mod=del&id=<?=$term[$a]["id"]?>"><i class="fa fa-trash-o"></i></a></li>
											<li data-toggle="tooltip" title="Delete"><a href="?do=camp_add&mod=edit&id=<?=$term[$a]["id"]?>"><i class="fa fa-pencil"></i></a></li>
											<li data-toggle="tooltip" title="Delete"><a href="?do=camps&mod=del&id=<?=$term[$a]["id"]?>"><i class="fa fa-flag-checkered"></i></a></li>
										</ul>
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
	