<?php 
$error = "";
$text = "";
$disabled = "disabled";
if($group == 1 || $group == 2){
$child = $db->query("SELECT * FROM consultation_list WHERE id = ".$id);
}elseif($group == 3 || $group == 4){
$child = $db->query("SELECT * FROM consultation_list WHERE consultant_id = $userid AND id = ".$id);
}else{
	$child = $db->query("SELECT * FROM consultation_list WHERE user_id = $userid AND id = ".$id);	
}


if(count($child) > 0){
	$startdate	=	$child[0]["startdate"];
	$enddate	=	$child[0]["enddate"];
	$type	=	$child[0]["type"];
	$note	=	$child[0]["note"];
	$link	=	$child[0]["link"];
	if(isset($_POST["submit"]) && $_POST["submit"]  == "finish"){
		$where = "id = ".$id;
		$finish["verify"] = 1;
		$db->update("consultation_list",$finish,$where);
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">Konsultasiya təsdiqləndi.</div>";
		$disabled = "disabled";
	}
}
?>

<script type="text/javascript">
	window.onload = function(event) {
		$("#child_id").val(<?=$child[0]["child_id"]?>).change();
		$("#consultant_id").val(<?=$child[0]["consultant_id"]?>).change();
		$("#term_id").val(<?=$child[0]["term_id"]?>).change();

    };
</script>



	<!--Main container start -->
	<main class="ttr-wrapper">
		<?php 
if(count($child) > 0){
	
	?>
		<div class="container-fluid">
		<?=$text?>
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Konsultasiya məlumatı </h4>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<?php if(isset($_GET["do"]) && $_GET["do"] == "consultation_info"){ ?>
						<div class="wc-title">
							<h4>Konsultasiya № : #<?=$id?></h4>
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
										<?php if($group == 3 || $group == 4 || $group == 1 || $group == 2){ $disabled = ""; ?>
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
										<?php } ?>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">İştirak</label>
										<div>
										<?php if($group == 3 || $group == 4 || $group == 1 || $group == 2){ $disabled = ""; ?>
										<select name="no_attend" class="form-control" id="no_attend" <?=$disabled?>>
											<option value="0">İştirak edib</option>
											<option value="1">İştirak etməyib</option>
										</select>
										<?php $disabled = "disabled"; } ?>
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
									
									
									
									<div class="col-12">
									<?php if(isset($_GET["do"]) && $_GET["do"] == "consultation_info"){ ?>
										<?php if($group == 3 || $group == 4 || $group == 1 || $group == 2){ ?>
										<button type="submit" name="submit" value="edit" class="btn blue">Yadda saxla</button>
										<?php } ?>
										<?php } ?>
										<?php if(isset($_GET["do"]) && $_GET["do"] == "consultation_info"){ ?>
											<?php if($group == 3 || $group == 4 || $group == 1 || $group == 2){ ?>
										<a href="?do=consultation_edit&id=<?=$id?>" class="btn blue">Düzəliş et</a>
										<?php } ?>
										<?php if($group == 1 || $group == 2){ ?>
										<button type="submit" name="submit" value="finish" class="btn green">Təsdiqlə</button>
										<?php } ?>
										<?php } ?>
									</div>
									
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
		<?php }else{ echo '<center><h4 class="breadcrumb-title">Məlumat tapılmadı </h4></center>'; } ?>
	</main>

