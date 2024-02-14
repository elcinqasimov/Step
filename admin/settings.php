<link href="assets/css/suneditor.css" rel="stylesheet" type="text/css">
<script src="assets/js/suneditor.js"></script>
<?php 
$error = "";
$text = "";

if(isset($_POST["submit"]) && $_POST["submit"]  == "save"){
if($_POST["title_az"] == ""){
	$error .= "Saytın başlığı AZ yazılmayıb.<br/>";
}
if($_POST["title_en"] == ""){
	$error .= "Saytın başlığı EN yazılmayıb.<br/>";
}
if($_POST["term_az"] == ""){
	$error .= "Şərtləri və Qaydaları AZ yazılmayıb.<br/>";
}
if($_POST["term_en"] == ""){
	$error .= "Şərtləri və Qaydaları EN yazılmayıb.<br/>";
}
	if($error == ""){
		$error = "Dəyişikliklər yadda saxlanıldı.";
		unset($_POST["submit"]);
		unset($_POST["undefined"]);
		unset($_POST["files"]);
		$wheres =" id = 1";
		$db->update("settings",$_POST,$wheres);

		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">$error</div>";
	}else{
		$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">$error</div>";
	}
}



$regsiyahi = $db->query("SELECT * FROM settings WHERE id = '1'");
$term_az	=	$regsiyahi[0]["term_az"];
$term_en		=	$regsiyahi[0]["term_en"];
$title_az		=	$regsiyahi[0]["title_az"];
$title_en		=	$regsiyahi[0]["title_en"];



?>

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
						<div class="wc-title">
							<h4>Saytın düzəlişi</h4>
						</div>
						<div class="widget-inner">
							<form class="mail-compose"  enctype="multipart/form-data" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Saytın başlığı AZ</label>
										<div>
											<input class="form-control" name="title_az" type="text" value="<?=$title_az?>" >
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Saytın başlığı EN</label>
										<div>
											<input class="form-control" name="title_en" type="text" value="<?=$title_en?>" >
										</div>
									</div>


									
									<div class="row">
									<hr style="width:100%;"/>
										</div>
										<div class="row">
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Şərtləri və Qaydaları</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Şərtləri və Qaydaları (AZ)</label>
										<div>
											<textarea id="term_az" name="term_az" ><?=$term_az?></textarea>	
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Şərtləri və Qaydaları (EN)</label>
										<div>
											<textarea id="term_en" name="term_en" ><?=$term_en?></textarea>	
										</div>
									</div>

									<div class="col-12">

										<button type="submit" name="submit" value="save" class="btn blue">Yadda saxla</button>

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
