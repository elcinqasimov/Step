<?php
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "country"){
		unset($_POST["submit"]);
		$say = $db-> query("SELECT count(*) FROM countries WHERE country_az = '".$_POST["country_az"]."' OR country_en = '".$_POST["country_en"]."'");
		if($say[0]["count(*)"] < 1){
        	$db->insert("countries",$_POST);
			$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Ölkə adı əlavə olundu</div>";
		}else{
			$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Ölkə adı bazada var</div>";
		}
	}
	if(isset($_GET["mod"]) && $_GET["mod"] == "del"){
		$db->query("DELETE FROM countries WHERE id = '$id'");
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Ölkə adı silindi</div>";
	}


?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Ölkələr</h4>
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
										<input type="text" name="country_az" class="form-control" style="width:200px;float:left;margin-right:20px;" placeholder="Ölkə adı (AZ)"/> &nbsp; 
										<input type="text" name="country_en" class="form-control" style="width:200px;float:left;" placeholder="Ölkə adı (EN)"/> &nbsp; 
										<button type="submit" name="submit" value="country" class="btn default">Əlavə et</button>
										</form>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
										$country = $db->query("SELECT * FROM countries LIMIT $offset, $total_records_per_page");
										$c_country = $db-> query("SELECT count(*) FROM countries");
										for($a = 0;$a<count($country);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><?=$country[$a]["country_az"]?> (<?=$country[$a]["country_en"]?>)</p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=countries&mod=del&id=<?=$country[$a]["id"]?>"><i class="fa fa-trash-o"></i></a></li>
										</ul>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div> 
					
				</div>
				<!-- Your Profile Views Chart END-->
				<?php pagination($c_country[0]["count(*)"]); ?>
			</div>
		</div>
	</main>
	