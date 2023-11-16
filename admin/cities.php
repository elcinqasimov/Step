<?php
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "city"){
		unset($_POST["submit"]);
		$say = $db-> query("SELECT count(*) FROM city WHERE name_az = '".$_POST["name_az"]."' OR name_en = '".$_POST["name_en"]."'");
		if($say[0]["count(*)"] < 1){
        	$db->insert("city",$_POST);
			$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Şəhər adı əlavə olundu</div>";
		}else{
			$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Şəhər adı bazada var</div>";
		}
	}
	if(isset($_GET["mod"]) && $_GET["mod"] == "del"){
		$db->query("DELETE FROM city WHERE id = '$id'");
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Şəhər adı silindi</div>";
	}


?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Şəhərlər</h4>
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
										<input type="text" name="name_az" class="form-control" style="width:200px;float:left;margin-right:20px;" placeholder="Şəhər adı (AZ)"/> &nbsp; 
										<input type="text" name="name_en" class="form-control" style="width:200px;float:left;" placeholder="Şəhər adı (EN)"/> &nbsp; 
										<button type="submit" name="submit" value="city" class="btn default">Əlavə et</button>
										</form>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
										$city = $db->query("SELECT * FROM city LIMIT $offset, $total_records_per_page");
										$c_city = $db-> query("SELECT count(*) FROM city");
										for($a = 0;$a<count($city);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><?=$city[$a]["name_az"]?> (<?=$city[$a]["name_en"]?>)</p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=cities&mod=del&id=<?=$city[$a]["id"]?>"><i class="fa fa-trash-o"></i></a></li>
										</ul>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div> 
					
				</div>
				<!-- Your Profile Views Chart END-->
				<?php pagination($c_city[0]["count(*)"]); ?>
			</div>
		</div>
	</main>
	