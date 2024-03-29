<?php 
$error = "";
$text = "";
$disabled = "";
if(isset($_POST["submit"]) && $_POST["submit"]  == "add"){
if($_POST["startdate"] == ""){
	$error .= "Başlanma tarixi yazılmayıb.<br/>";
}
if($_POST["enddate"] == ""){
	$error .= "Bitmə tarixi yazılmayıb.<br/>";
}
if(isset($_POST["link"]) && $_POST["link"] == ""){
	$error .= "Link yazılmayıb.";
}
	if($error == ""){
		unset($_POST["submit"]);
		$_POST["startdate"] = ekstarix($_POST["startdate"]);
		$_POST["enddate"] = ekstarix($_POST["enddate"]);
		$_POST["regdate"] = $vaxt;
		$child = $db->query("SELECT * FROM children WHERE id = ".$_POST["child_id"]);
		$_POST["user_id"] = $child[0]["parentid"];
		$_POST["type"] = $type;
		$db->insert("consultation_list",$_POST);
		$lastid_term = $db->id();
	echo '<script>location.href = "?do=consultation&type='.$type .';</script>';
	}else{
		$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">$error</div>";
	}
}
if(isset($_POST["submit"]) && $_POST["submit"] == "add"){
	$term_id	=	$_POST["term_id"];
	$note		=	$_POST["note"];
	$link		=	$_POST["link"];
	$price		=	$_POST["price"];
}else{
	$note		=	"";
	$link		=	"";
	$startdate		=	"";
	$enddate		=	"";
}
?>
<?php if(isset($_POST["submit"]) && $_POST["submit"] == "add"){?>
	<script type="text/javascript">
	window.onload = function(event) {
		$("#child_id").val(<?=$_POST["child_id"]?>).change();
		$("#consultant_id").val(<?=$_POST["consultant_id"]?>).change();
		$("#term_id").val(<?=$_POST["term_id"]?>).change();
    };
</script>
<?php } ?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
		<?=$text?>
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Konsultasiya əlavə etmək </h4>
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
							<form class="mail-compose"  enctype="multipart/form-data" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Uşaq</label>
										<div>
										<select name="child_id" class="form-control" id="child_id" <?=$disabled?>>
											<?php 
												$camp = $db->query("SELECT * FROM children");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["id"]?>"><?=$camp[$b]["fullname"]?></option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə</label>
										<div>
										<select name="term_id" class="form-control" id="term_id" <?=$disabled?>>
											<?php 
												$camp = $db->query("SELECT * FROM term");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["id"]?>"><?=$camp[$b]["name"]?> - (<?=tarix($camp[$b]["startdate"])?>-<?=tarix($camp[$b]["enddate"])?>)</option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Konsultant</label>
										<div>
										<select name="consultant_id" class="form-control" id="consultant_id" <?=$disabled?>>
											<?php 
												$camp = $db->query("SELECT * FROM consultant WHERE `type` = $type");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["userid"]?>"><?=$camp[$b]["fullname_az"]?></option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Link</label>
										<div>
											<input class="form-control" type="text" name="link" value="<?=$link?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Qiymət</label>
										<div>
										<select name="result" class="form-control" id="result" <?=$disabled?>>

										<?php if($type == 0){ ?>
											<option value="0">Kafi</option>
											<option value="1">Yaxşı</option>
											<option value="2">Əla</option>
											<?php }else{ ?>
											<option value="0">Razıyam</option>
											<option value="1">Razı deyiləm</option>
											<?php } ?>
										</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">İştirak</label>
										<div>
										<select name="no_attend" class="form-control" id="no_attend" <?=$disabled?>>
											<option value="0">İştirak edib</option>
											<option value="1">İştirak etməyib</option>
										</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Başlama tarixi</label>
										<div>
											<input class="form-control" type="datetime-local" name="startdate" value="<?=$startdate?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Bitmə tarixi</label>
										<div>
											<input class="form-control" type="datetime-local" name="enddate" value="<?=$enddate?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-12">
										<label class="col-form-label">Qeyd</label>
										<div>
											<input class="form-control" type="text" name="note" value="<?=$note?>" <?=$disabled?>>
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
										<button type="submit" name="submit" value="finish" class="btn green">Təsdiqlə</button>
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

