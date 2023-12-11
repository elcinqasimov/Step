<?php if($group == 1){ ?>
<link href="assets/css/suneditor.css" rel="stylesheet" type="text/css">
<script src="assets/js/suneditor.js"></script>
<?php 
$error = "";
$text = "";

if(isset($_POST["submit"]) && $_POST["submit"]  == "add"){
if($_POST["name"] == ""){
	$error .= "Albom adı yazılmayıb.<br/>";
}
$countfile  = count(array_filter($_FILES["file"]["name"]));
if($countfile < 1){
	$error .= "Şəkillər əlavə olunmayıb.<br/>";
}
if($_POST["group_id"] == ""){
	$error .= "Albom qrupu seçilməyib.<br/>";
}
$allowed =  array('php','PHP');
$upload_id = array();

if($error == ""){
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
				$sened["term_id"] = $_POST["term_id"];
				$sened["group_id"] = $_POST["group_id"];
				$sened["path"] = "assets/images/gallery/".$tezead;
				$sened["path2"] = "../assets/images/gallery/".$tezead;
				move_uploaded_file($_FILES["file"]["tmp_name"][$i], $sened["path2"]);
				unset($sened["path2"]);
				$db->insert("gallery",$sened);
				echo '<script>location.href = "?do=alboms";</script>';
			}
		}else{
			$error.= "<div style=\"border:1px solid #128540;border-radius:3px;padding:5px 5px 5px 15px;background-color:#5cb85c;color:#fff;margin-bottom:10px;\">Fayl formatı düzgün deyil. İcazə verilməyən format : 'php'</div>";
		}
	}
}else{
	$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">$error</div>";
}
}

if(isset($_POST["submit"]) && $_POST["submit"] == "add"){
	$term_id	=	$_POST["term_id"];
	$group_id	=	$_POST["group_id"];
	$name		=	$_POST["name"];
}else{
	$name		=	"";
}
?>
<?php if(isset($_POST["submit"]) && $_POST["submit"] == "add"){?>
	<script type="text/javascript">
	window.onload = function(event) {
		$("#term_id").val(<?=$regsiyahi[0]["term_id"]?>).change();
		$("#group_id").val(<?=$regsiyahi[0]["group_id"]?>).change();
    };
</script>
<?php } ?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
		<?=$text?>
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Albom məlumatları </h4>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="widget-inner">
							<form class="mail-compose"  enctype="multipart/form-data" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Albom adı</label>
										<div>
											<input class="form-control" name="name" type="text" value="<?=$name?>">
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Albom qrupu</label>
										<div>
										<select name="group_id" class="form-control" id="group_id">
											<?php 
												$camp = $db->query("SELECT * FROM albom_groups");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["id"]?>"><?=$camp[$b]["name_az"]?></option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Düşərgə</label>
										<div>
										<select name="term_id" class="form-control" id="term_id">
											<?php 
												$camp = $db->query("SELECT * FROM term");
												for($b=0;$b<count($camp);$b++){
											?>
											<option value="<?=$camp[$b]["id"]?>"><?=$camp[$b]["name"]?></option>
											<?php } ?>
												</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Şəkillər</label>
										<div>
										<input class="form-control" type="file" multiple="multiple" name="file[]">
										</div>
									</div>
									<div class="col-12">
										<button type="submit" name="submit" value="add" class="btn">Əlavə et</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Your Profile Views Chart END-->
			</div>
		</div>
	</main>
	<?php
	}else{
		header('Location: admin/index.php');
	}
	?>
