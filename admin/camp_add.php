<link href="assets/css/suneditor.css" rel="stylesheet" type="text/css">
<script src="assets/js/suneditor.js"></script>
<?php 
$error = "";
$text = "";
if(isset($_POST["submit"]) && $_POST["submit"]  == "add"){
print_r($_POST);
}
if(isset($_POST["submit"]) && $_POST["submit"]  == "finish"){
	$where = "id = ".$id;
	$finish["finish"] = 1;
	$db->update("term",$finish,$where);
	$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">Qeydiyyat bitirildi.</div>";
	$disabled = "disabled";
}
if(isset($_POST["submit"]) && $_POST["submit"]  == "edit"){
	print_r($_POST);
	unset($_POST["submit"]);
	$where = "id = ".$id;
	$db->update("term",$_POST,$where);
	$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">Qeydiyyat yadda saxlanıldı.</div>";
}

										$sql = "
										SELECT
											id as 'id',
											`name` as 'name', 
											startdate as 'startdate', 
											enddate as 'enddate', 
											count as 'count',  
											price as 'price', 
											camp_id as 'camp_id', 
											finish as 'finish', 
											description_az as 'description_az', 
											description_en as 'description_en' 
                                    	FROM
                                        term  WHERE id = '$id'";
										$regsiyahi = $db->query($sql);
										if(isset($regsiyahi[0]["finish"]) && $regsiyahi[0]["finish"] == 1){
											$disabled = "disabled";
										}else{
											$disabled = "";
										}

if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){
	$camp_id	=	$regsiyahi[0]["camp_id"];
	$id			=	$regsiyahi[0]["camp_id"];
	$name		=	$regsiyahi[0]["name"];
	$count		=	$regsiyahi[0]["count"];
	$price		=	$regsiyahi[0]["price"];
	$startdate	=	tarix($regsiyahi[0]["startdate"]);
	$enddate	=	tarix($regsiyahi[0]["enddate"]);
	$desc_az	=	$regsiyahi[0]["description_az"];
	$desc_en	=	$regsiyahi[0]["description_en"];
}elseif(isset($_POST["submit"]) && ($_POST["submit"] == "add" || $_POST["submit"] == "edit")){
	$camp_id	=	$_POST["camp_id"];
	$name		=	$_POST["name"];
	$count		=	$_POST["count"];
	$price		=	$_POST["price"];
	$startdate	=	tarix($_POST["startdate"]);
	$enddate	=	tarix($_POST["enddate"]);
	$desc_az	=	$_POST["description_az"];
	$desc_en	=	$_POST["description_en"];
}else{
	$name		=	"";
	$count		=	"";
	$price		=	"";
	$startdate	=	"";
	$enddate	=	"";
	$desc_az	=	"";
	$desc_en	=	"";
}
?>
<?php if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){ ?>
<script type="text/javascript">
	window.onload = function(event) {
        document.getElementById("camp_id").options.selectedIndex = <?=$regsiyahi[0]["camp_id"]?>;
    };
</script>
<?php }elseif(isset($_POST["submit"]) && ($_POST["submit"] == "add" || $_POST["submit"] == "edit")){?>
	<script type="text/javascript">
	window.onload = function(event) {
        document.getElementById("camp_id").options.selectedIndex = <?=$_POST["camp_id"]?>;
    };
</script>
<?php } ?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
		<?=$text?>
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Düşərgə məlumatları </h4>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<?php if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){ ?>
						<div class="wc-title">
							<h4>Düşərgə № : #<?=$id?></h4>
						</div>
						<?php } ?>
						<div class="widget-inner">
							<form class="mail-compose" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə adı</label>
										<div>
											<input class="form-control" type="text" value="<?=$name?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgədə nəfər sayı</label>
										<div>
											<input class="form-control" type="number" value="<?=$count?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə qrupu</label>
										<div>
										<select name="camp_id" class="form-control" id="camp_id" <?=$disabled?>>
											<?php 
												$camp = $db->query("SELECT * FROM camps");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["id"]?>"><?=$camp[$b]["name"]?></option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə qiyməti</label>
										<div>
											<input class="form-control" type="text" value="<?=$price?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label"> Başlanma tarixi</label>
										<div>
											<input class="form-control" type="text" value="<?=$startdate?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label"> Bitmə tarixi</label>
										<div>
											<input class="form-control" type="text" value="<?=$enddate?>" <?=$disabled?>>
										</div>
									</div>
									</div>
									<div class="row">
									<hr style="width:100%;"/>
										</div>
										<div class="row">
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Düşərgə təsviri</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin təsviri (AZ)</label>
										<div>
											<textarea id="desc_az" name="desc_az" <?=$disabled?>><?=$desc_az?></textarea>	
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin təsviri (EN)</label>
										<div>
											<textarea id="desc_en" name="desc_en" <?=$disabled?>><?=$desc_en?></textarea>	
										</div>
									</div>
									<?php if($disabled == ""){ ?>
									<div class="col-12">
									<?php if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){ ?>
										<button type="submit" name="submit" value="edit" class="btn blue">Yadda saxla</button>
										<?php } ?>
										<?php if(isset($_GET["mod"]) && $_GET["mod"] == "add"){ ?>
										<button type="submit" name="submit" value="add" class="btn">Əlavə et</button>
										<?php } ?>
										<?php if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){ ?>
										<button type="submit" name="submit" value="finish" class="btn green">Bitir</button>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>

