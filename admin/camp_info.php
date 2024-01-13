<script src="assets/js/jquery.min.js"></script>
<?php 
$error = "";
$text = "";
if(isset($_POST["submit"]) && $_POST["submit"]  == "submit"){

	unset($_POST["submit"]);
	$where = "id = ".$id;
	$db->update("registration",$_POST,$where);
	$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px 5px 5px 15px;margin-bottom:20px;\">Qeydiyyat yadda saxlanıldı.</div>";
}
if(isset($_POST["submit"]) && $_POST["submit"]  == "verify"){

	if(isset($_POST["payment"]) && $_POST["payment"] < 1){
		$error .= "Ödəniş olunmayıb. ";
	}
	if(isset($_POST["psixoloji"]) && $_POST["psixoloji"] < 1){
		$error .= "Psixoloji konsultasiyadan keçməyib. ";
	}
	if(isset($_POST["documents"]) && $_POST["documents"] < 1){
		$error .= "Sənədlər toplusu yoxdur. ";
	}
	if($error != ""){
		$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">$error</div>";
	}else{
		$verify["verify"] = 1;
		$where = "id = ".$id;
		$db->update("registration",$verify,$where);
		$query = "UPDATE `term` SET `count` = count-1 WHERE `id` = $id";
		$db->query($query);
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Qeydiyyat təsdiqləndi.</div>";
	}
}
										$sql = "
                                    SELECT
										registration.id as 'id',
										registration.regdate as 'regdate',
										registration.verify as 'verify',
										registration.visa as 'visa',
										registration.tools as 'tools',
										registration.payment as 'payment',
										registration.document as 'document',
										registration.psixoloji as 'psixoloji',
										children.fullname as 'c_fullname',
										children.language as 'language',
										children.birthday as 'birthday',
										children.sex as 'sex',
										users.fullname as 'u_fullname',
                                        term.id as 'term_id',
                                        term.`name` as 'term', 
                                        term.startdate as 'startdate', 
                                        term.enddate as 'enddate', 
                                        term.count as 'count',  
                                        term.price as 'price', 
                                        countries.country_az as 'country_az', 
                                        countries.country_en as 'country_en', 
                                        city.name_az as 'city_az', 
                                        city.name_en as 'city_en', 
                                        term.description_az as 'description_az', 
                                        term.description_en as 'description_en', 
                                        term.camp_id as 'camp_id',
                                        camps.`name` as 'camp_name',
                                        camps.`country_id` as 'country_id'
                                    FROM
                                        registration
										INNER JOIN term ON registration.term = term.id
										INNER JOIN children ON registration.childid = children.id
										INNER JOIN users ON registration.parentid = users.id
                                        INNER JOIN camps ON term.camp_id = camps.id
                                        INNER JOIN city ON camps.city_id = city.id
                                        INNER JOIN countries ON camps.country_id = countries.id WHERE registration.id = '$id'";
										$regsiyahi = $db->query($sql);
										if($regsiyahi[0]["verify"] == 1){
											$disabled = "disabled";
										}else{
											$disabled = "";
										}
?>
<script type="text/javascript">
	window.onload = function(event) {
        document.getElementById("visa").options.selectedIndex = <?=$regsiyahi[0]["visa"]?>;
        document.getElementById("tools").options.selectedIndex = <?=$regsiyahi[0]["tools"]?>;
        document.getElementById("payment").options.selectedIndex = <?=$regsiyahi[0]["payment"]?>;
        document.getElementById("psixoloji").options.selectedIndex = <?=$regsiyahi[0]["psixoloji"]?>;
        document.getElementById("document").options.selectedIndex = <?=$regsiyahi[0]["document"]?>;
    };
</script>

	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
		<?=$text?>
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Qeydiyyat məlumatları </h4>
			</div>	
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="wc-title">
							<h4>Qeydiyyat № : #<?=$regsiyahi[0]["id"]?></h4>
						</div>
						<div class="widget-inner">
							<form class="edit-profile m-b30" method="POST" action="">
								<div class="row">
									<div class="col-12">
										<div class="ml-auto">
											<h3>1. Əsas məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Valideyn adı</label>
										<div>
											<input class="form-control" type="text" value="<?=$regsiyahi[0]["u_fullname"]?>" disabled>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Uşağın adı</label>
										<div>
											<input class="form-control" type="text" value="<?=$regsiyahi[0]["c_fullname"]?>" disabled>
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label">Dil biliyi</label>
										<div>
											<?php if($regsiyahi[0]["language"] == 0){
												$language = "Azərbaycan";
											}elseif($regsiyahi[0]["language"] == 1){
												$language = "Rus";
											}elseif($regsiyahi[0]["language"] == 2){
												$language = "Türk";
											}elseif($regsiyahi[0]["language"] == 3){
												$language = "İngilis";
											}else{
												$language = "Digər";
											}
											?>
											<?php if($regsiyahi[0]["sex"] == 'M'){
												$sex = "Kişi";
											}else{
												$sex = "Qadın";
											}
											?>
											<input class="form-control" type="text" value="<?=$language?>" disabled>
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label"> Cinsi</label>
										<div>
											<input class="form-control" type="text" value="<?=$sex?>" disabled>
										</div>
									</div>
									<div class="form-group col-4">
										<label class="col-form-label"> Doğum tarixi</label>
										<div>
											<input class="form-control" type="text" value="<?=tarix($regsiyahi[0]["birthday"])?>" disabled>
										</div>
									</div>
									</div>
									<div class="row">
									<hr style="width:100%;"/>
										</div>
										<div class="row">
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>2. Düşərgə məlumatları</h3>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin adı</label>
										<div>
											<input class="form-control" type="text" value="<?=$regsiyahi[0]["term"]?>" disabled>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin tarix aralığı</label>
										<div class="row">
										<div class="col-lg-6 m-b30">
											<input class="form-control" type="text" value="<?=tarix($regsiyahi[0]["startdate"])?>" disabled>
										</div>
											<div class="col-lg-6 m-b30">
											<input class="form-control" type="text" value="<?=tarix($regsiyahi[0]["enddate"])?>" disabled>
										</div>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin qiyməti</label>
										<div>
											<input class="form-control" type="text" value="<?=$regsiyahi[0]["price"]?>" disabled>
										</div>
									</div>
									<div class="form-group col-6">
										<label class="col-form-label">Düşərgənin qeydiyyat tarixi</label>
										<div>
											<input class="form-control" type="text" value="<?=tarix($regsiyahi[0]["regdate"])?>" disabled>
										</div>
									</div>
									<div class="seperator"></div>
									</div>
									<div class="row">
									<hr style="width:100%;"/>
										</div>
										<div class="row">
									<div class="col-12 m-t20">
										<div class="ml-auto m-b5">
											<h3>3. Digər məlumatlar</h3>
										</div>
									</div>
									<div class="form-group col-2">
										<label class="col-form-label">Visa dəstəyi</label>
										<div>
											<select class="form-control" name="visa" id="visa" <?=$disabled?>>
												<option value="0">Yox</option>
												<option value="1">Var</option>
										</select>
										</div>
									</div>
									<div class="form-group col-2">
										<label class="col-form-label">Ödəniş</label>
										<div>
											<select class="form-control" name="payment" id="payment" <?=$disabled?>>
												<option value="0">Ödənməyib</option>
												<option value="1">Yarı ödəniş</option>
												<option value="2">Tam ödəniş</option>
										</select>
										</div>
									</div>
									<div class="form-group col-2">
										<label class="col-form-label">Düşərgə alətləri</label>
										<div>
											<select class="form-control" name="tools" id="tools" <?=$disabled?>>
												<option value="0">Yox</option>
												<option value="1">Var</option>
										</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Psixoloji konsultasiya</label>
										<div>
											<select class="form-control" name="psixoloji" id="psixoloji" <?=$disabled?>>
												<option value="0">Keçməyib</option>
												<option value="1">Keçib</option>
										</select>
										</div>
									</div>
									<div class="form-group col-3">
										<label class="col-form-label">Sənədlər toplusu</label>
										<div>
											<select class="form-control" name="documents" id="document" <?=$disabled?>>
												<option value="0">Yox</option>
												<option value="1">Var</option>
										</select>
										</div>
									</div>
									<?php if($disabled == ""){ ?>
									<div class="col-12">
										<button type="submit" name="submit" value="submit" class="btn">Yadda saxla</button>
										<button type="submit" name="submit" value="verify" class="btn green">Təsdiqlə</button>
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
	