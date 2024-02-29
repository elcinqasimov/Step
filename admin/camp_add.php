<link href="assets/css/suneditor.css" rel="stylesheet" type="text/css">
<script src="assets/js/suneditor.js"></script>
<?php 
$error = "";
$text = "";

if(isset($_POST["submit"]) && $_POST["submit"]  == "add"){
if($_POST["name"] == ""){
	$error .= "Düşərgə adı yazılmayıb.<br/>";
}
if($_POST["count"] == ""){
	$error .= "Düşərgədə nəfər sayı yazılmayıb.<br/>";
}
if($_POST["camp_id"] == ""){
	$error .= "Düşərgə qrupu seçilməyib.<br/>";
}
if($_POST["price"] == ""){
	$error .= "Düşərgə qiyməti yazılmayıb.<br/>";
}
if($_POST["startdate"] == ""){
	$error .= "Başlanma tarixi yazılmayıb.<br/>";
}
if($_POST["enddate"] == ""){
	$error .= "Bitmə tarixi yazılmayıb.";
}
if($_POST["description_az"] == ""){
	$error .= "Düşərgənin təsviri (AZ) yazılmayıb.<br/>";
}
if($_POST["description_en"] == ""){
	$error .= "Düşərgənin təsviri (EN) yazılmayıb.<br/>";
}
$allowed =  array('php','PHP');
$upload_id = array();
$upload_id_programs = array();
$countfile  = count(array_filter($_FILES["file"]["name"]));
$countfile_programs  = count(array_filter($_FILES["file_programs"]["name"]));
if($countfile > 0){
	for ($i=0; $i < $countfile; $i++) {
		$filename2 = $_FILES['file']['name'][$i];
		$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
		if(!in_array($ext2,$allowed) ) {
			for ($i=0; $i < $countfile; $i++) {
				$file_parts = pathinfo($_FILES["file"]["name"][$i]);
				$explode = explode('.',$_FILES["file"]["name"][$i]);
				$olcu = filesize($_FILES["file"]["tmp_name"][$i]);
				$olcu = Olcu($olcu);
				$tezead = sifrele($explode[0].time().strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999))).".".end($explode);
				$sened["name"] = $_POST["name"];
				$sened["path"] = "assets/images/gallery/".$tezead;
				$sened["path2"] = "../assets/images/gallery/".$tezead;
				move_uploaded_file($_FILES["file"]["tmp_name"][$i], $sened["path2"]);
				unset($sened["path2"]);
				$db->insert("gallery",$sened);
				$upload_id[] = $db->id();
			}
		}else{
			$error.= "<div style=\"border:1px solid #128540;border-radius:3px;padding:5px 5px 5px 15px;background-color:#5cb85c;color:#fff;margin-bottom:10px;\">Fayl formatı düzgün deyil. İcazə verilməyən format : 'php'</div>";
		}
	}
}
if($countfile_programs > 0){
	for ($i=0; $i < $countfile_programs; $i++) {
		$filename2_programs = $_FILES['file_programs']['name'][$i];
		$ext2_programs = pathinfo($filename2_programs, PATHINFO_EXTENSION);
		if(!in_array($ext2_programs,$allowed) ) {
			for ($i=0; $i < $countfile_programs; $i++) {
				$file_parts_programs = pathinfo($_FILES["file_programs"]["name"][$i]);
				$explode_programs = explode('.',$_FILES["file_programs"]["name"][$i]);
				$olcu_programs = filesize($_FILES["file_programs"]["tmp_name"][$i]);
				$olcu_programs = Olcu($olcu_programs);
				$tezead_programs = sifrele($explode_programs[0].time().strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999))).".".end($explode_programs);
				$sened_programs["name"] = $_POST["name"];
				$sened_programs["path"] = "assets/images/gallery/".$tezead_programs;
				$sened_programs["path2"] = "../assets/images/gallery/".$tezead;
				move_uploaded_file($_FILES["file_programs"]["tmp_name"][$i], $sened_programs["path2"]);
				unset($sened_programs["path2"]);
				$db->insert("gallery_programs",$sened_programs);
				$upload_id_programs[] = $db->id();
			}
		}else{
			$error.= "<div style=\"border:1px solid #128540;border-radius:3px;padding:5px 5px 5px 15px;background-color:#5cb85c;color:#fff;margin-bottom:10px;\">Fayl formatı düzgün deyil. İcazə verilməyən format : 'php'</div>";
		}
	}
}
	if($error == ""){
		unset($_POST["submit"]);
		unset($_POST["undefined"]);
		unset($_POST["files"]);
		$_POST["startdate"] = ekstarix($_POST["startdate"]);
		$_POST["enddate"] = ekstarix($_POST["enddate"]);
		$db->insert("term",$_POST);
		$lastid_term = $db->id();
		for($f=0;$f<count($upload_id);$f++){
			$wheref = "id = ".$upload_id[$f];
			$finishf["term_id"] = $lastid_term;
			$db->update("gallery",$finishf,$wheref);
		}
		for($f=0;$f<count($upload_id_programs);$f++){
			$wheref_programs = "id = ".$upload_id_programs[$f];
			$finishf_programs["term_id"] = $lastid_term;
			$db->update("gallery_programs",$finishf_programs,$wheref_programs);
		}
	echo '<script>location.href = "?do=camps";</script>';
	}else{
		$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">$error</div>";
	}
}
if(isset($_POST["submit"]) && $_POST["submit"]  == "finish"){
	$where = "id = ".$id;
	$finish["finish"] = 1;
	$db->update("term",$finish,$where);
	$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">Qeydiyyat bitirildi.</div>";
	$disabled = "disabled";
}
if(isset($_POST["submit"]) && $_POST["submit"]  == "edit"){
$allowed =  array('php','PHP');
$upload_id = array();
$upload_id_programs = array();
$countfile  = count(array_filter($_FILES["file"]["name"]));
$countfile_programs  = count(array_filter($_FILES["file_programs"]["name"]));
if($countfile > 0){
	for ($i=0; $i < $countfile; $i++) {
		$filename2 = $_FILES['file']['name'][$i];
		$ext2 = pathinfo($filename2, PATHINFO_EXTENSION);
		if(!in_array($ext2,$allowed) ) {
			$db->query("DELETE FROM gallery WHERE term_id = $id");
			for ($i=0; $i < $countfile; $i++) {
				$file_parts = pathinfo($_FILES["file"]["name"][$i]);
				$explode = explode('.',$_FILES["file"]["name"][$i]);
				$olcu = filesize($_FILES["file"]["tmp_name"][$i]);
				$olcu = Olcu($olcu);
				$tezead = sifrele($explode[0].time().strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999))).".".end($explode);
				$sened["name"] = $_POST["name"];
				$sened["path"] = "assets/images/gallery/".$tezead;
				$sened["path2"] = "../assets/images/gallery/".$tezead;
				move_uploaded_file($_FILES["file"]["tmp_name"][$i], $sened["path2"]);
				unset($sened["path2"]);
				$sened["term_id"] = $id;
				$db->insert("gallery",$sened);
			}
		}else{
			$error.= "<div style=\"border:1px solid #128540;border-radius:3px;padding:5px 5px 5px 15px;background-color:#5cb85c;color:#fff;margin-bottom:10px;\">Fayl formatı düzgün deyil. İcazə verilməyən format : 'php'</div>";
		}
	}
}
if($countfile_programs > 0){
	for ($i=0; $i < $countfile_programs; $i++) {
		$filename2_programs = $_FILES['file_programs']['name'][$i];
		$ext2_programs = pathinfo($filename2_programs, PATHINFO_EXTENSION);
		if(!in_array($ext2_programs,$allowed) ) {
			$db->query("DELETE FROM gallery_programs WHERE term_id = $id");
			for ($i=0; $i < $countfile_programs; $i++) {
				$file_parts_programs = pathinfo($_FILES["file_programs"]["name"][$i]);
				$explode_programs = explode('.',$_FILES["file_programs"]["name"][$i]);
				$olcu_programs = filesize($_FILES["file_programs"]["tmp_name"][$i]);
				$olcu_programs = Olcu($olcu_programs);
				$tezead_programs = sifrele($explode_programs[0].time().strtoupper(chr(rand(65, 90)) . chr(rand(65, 90)) . rand(100, 999))).".".end($explode_programs);
				$sened_programs["name"] = $_POST["name"];
				$sened_programs["path"] = "assets/images/gallery/".$tezead_programs;
				$sened_programs["path2"] = "../assets/images/gallery/".$tezead_programs;
				echo $_FILES["file_programs"]["tmp_name"][$i];
				move_uploaded_file($_FILES["file_programs"]["tmp_name"][$i], $sened_programs["path2"]);
				unset($sened_programs["path2"]);
				$sened_programs["term_id"] = $id;
				$db->insert("gallery_programs",$sened_programs);
			}
		}else{
			$error.= "<div style=\"border:1px solid #128540;border-radius:3px;padding:5px 5px 5px 15px;background-color:#5cb85c;color:#fff;margin-bottom:10px;\">Fayl formatı düzgün deyil. İcazə verilməyən format : 'php'</div>";
		}
	}
}
	if(!isset($_POST["name"]) && $_POST["name"] == ""){
		$error .= "Düşərgə adı yazılmayıb.";
	}
	if(!isset($_POST["count"]) && $_POST["count"] == ""){
		$error .= "Düşərgədə nəfər sayı yazılmayıb.";
	}
	if(!isset($_POST["camp_id"]) && $_POST["camp_id"] == ""){
		$error .= "Düşərgə qrupu seçilməyib.";
	}
	if(!isset($_POST["price"]) && $_POST["price"] == ""){
		$error .= "Düşərgə qiyməti yazılmayıb.";
	}
	if(!isset($_POST["startdate"]) && $_POST["startdate"] == ""){
		$error .= "Başlanma tarixi yazılmayıb.";
	}
	if(!isset($_POST["enddate"]) && $_POST["enddate"] == ""){
		$error .= "Bitmə tarixi yazılmayıb.";
	}
	if(!isset($_POST["description_az"]) && $_POST["description_az"] == ""){
		$error .= "Düşərgənin təsviri (AZ) yazılmayıb.";
	}
	if(!isset($_POST["description_en"]) && $_POST["description_en"] == ""){
		$error .= "Düşərgənin təsviri (EN) yazılmayıb.";
	}
	$_POST["startdate"] = ekstarix($_POST["startdate"]);
	$_POST["enddate"] = ekstarix($_POST["enddate"]);
	$_POST["description_az"] = str_replace("'","\'",$_POST["description_az"]);
	$_POST["description_en"] = str_replace("'","\'",$_POST["description_en"]);
	unset($_POST["submit"]);
	unset($_POST["undefined"]);
	unset($_POST["files"]);
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
	exc as 'exc', 
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
	$name		=	$regsiyahi[0]["name"];
	$count		=	$regsiyahi[0]["count"];
	$exc		=	$regsiyahi[0]["exc"];
	$price		=	$regsiyahi[0]["price"];
	$startdate	=	tarix($regsiyahi[0]["startdate"]);
	$enddate	=	tarix($regsiyahi[0]["enddate"]);
	$desc_az	=	$regsiyahi[0]["description_az"];
	$desc_en	=	$regsiyahi[0]["description_en"];
}elseif(isset($_POST["submit"]) && $_POST["submit"] == "add"){
	$camp_id	=	$_POST["camp_id"];
	$name		=	$_POST["name"];
	$count		=	$_POST["count"];
	$price		=	$_POST["price"];
	$exc		=	$_POST["exc"];
	$startdate	=	tarix($_POST["startdate"]);
	$enddate	=	tarix($_POST["enddate"]);
	$desc_az	=	$_POST["description_az"];
	$desc_en	=	$_POST["description_en"];
}else{
	$name		=	"";
	$count		=	"";
	$price		=	"";
	$exc		=	"";
	$startdate	=	"";
	$enddate	=	"";
	$desc_az	=	"";
	$desc_en	=	"";
}
?>
<?php if(isset($_GET["mod"]) && $_GET["mod"] == "edit"){ ?>
<script type="text/javascript">
	window.onload = function(event) {
		$("#camp_id").val(<?=$regsiyahi[0]["camp_id"]?>).change();
		$("#exc").val("<?=$regsiyahi[0]["exc"]?>").change();
        //document.getElementById("camp_id").options.value = <?=$regsiyahi[0]["camp_id"]?>;
    };
</script>
<?php }elseif(isset($_POST["submit"]) && $_POST["submit"] == "add"){?>
	<script type="text/javascript">
	window.onload = function(event) {
		$("#camp_id").val(<?=$regsiyahi[0]["camp_id"]?>).change();
		$("#exc").val(<?=$regsiyahi[0]["exc"]?>).change();
       // document.getElementById("camp_id").options.value = <?=$_POST["camp_id"]?>;
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
							<form class="mail-compose"  enctype="multipart/form-data" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə adı</label>
										<div>
											<input class="form-control" name="name" type="text" value="<?=$name?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgədə nəfər sayı</label>
										<div>
											<input class="form-control" type="number" name="count" value="<?=$count?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-2">
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
									<div class="form-group col-2">
										<label class="col-form-label">Düşərgə qiyməti</label>
										<div>
											<input class="form-control" type="number" name="price" value="<?=$price?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-2">
										<label class="col-form-label">Məzənnə</label>
										<div>
										<select name="exc" class="form-control" id="exc" <?=$disabled?>>
											<option value="azn">AZN</option>
											<option value="euro">EURO</option>
											<option value="usd">USD</option>
											<option value="tl">TL</option>
											<option value="rubl">RUBL</option>
										</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label"> Başlanma tarixi</label>
										<div>
											<input class="form-control" type="text" name="startdate" value="<?=$startdate?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label"> Bitmə tarixi</label>
										<div>
											<input class="form-control" type="text" name="enddate" value="<?=$enddate?>" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Proqramlar</label>
										<div>
											<input class="form-control" type="file" multiple="multiple" name="file_programs[]" <?=$disabled?>>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Şəkillər</label>
										<div>
											<input class="form-control" type="file" multiple="multiple" name="file[]" <?=$disabled?>>
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
											<textarea id="desc_az" name="description_az" <?=$disabled?>><?=$desc_az?></textarea>	
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin təsviri (EN)</label>
										<div>
											<textarea id="desc_en" name="description_en" <?=$disabled?>><?=$desc_en?></textarea>	
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

