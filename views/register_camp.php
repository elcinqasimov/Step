<?php 
$text = "";
	if($userid == ""){
		header('Location: login.php');
		exit;
	}
?>
<!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/5.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["register_camp_h"]?></h1>
				 </div>
            </div>
        </div>

		<?php 
			if(isset($_POST["submit"]) && $_POST["submit"] == "register_camp"){

				$child["birthday"] = ekstarix($_POST["birthday"]);
				$child["parentid"] = $userid;
				$child["fullname"] = $_POST["fullname"];
				$child["language"] = $_POST["language"];
				$child["sex"] = $_POST["sex"];
				$db->insert("children",$child);
				$childid = $db->id();
				$reg["parentid"] = $userid;
				$reg["childid"] = $childid;
				$reg["term"] = $id;
				$reg["regdate"] = $vaxt;
				$db->insert("registration",$reg);
				$text = "Düşərgəyə qeydiyyat uğurla tamamlandı.";
			}
		?>

       <!-- inner page banner -->
        <div class="page-banner contact-page section-sp2">
            <div class="container">
                <div class="row">
					<div class="col-lg-5 col-md-5 m-b30">
						<div class="bg-primary text-white contact-info-bx">
							<h2 class="m-b10 title-head">Contact <span>Information</span></h2>
							<div class="widget widget_getintuch">	
								<ul>
									<!--<li><i class="ti-location-pin"></i>75k Newcastle St. Ponte Vedra Beach, FL 309382 New York</li>-->
									<li><i class="ti-mobile"></i>+99455 769 63 23 (24/7 Support Line)</li>
									<li><i class="ti-email"></i>info@intcdc.com</li>
								</ul>
							</div>
							<h5 class="m-t0 m-b20">Follow Us</h5>
							<ul class="list-inline contact-social-bx">
								<li><a href="https://www.facebook.com/intcdc" class="btn outline radius-xl"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.instagram.com/intcdc" class="btn outline radius-xl"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.linkedin.com/in/intcdc" class="btn outline radius-xl"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.youtube.com/@intcdc" class="btn outline radius-xl"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-7 col-md-7">
						<?php if($text != ""){ ?>
					<div style="background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding-left:10px;"><?=$text?></div>
					<?php } ?>
						<?php if(!isset($_POST["submit"])){ ?>
						<form class="contact-bx ajax-form" action="" method="POST">
						<div class="ajax-message"></div>
							<div class="heading-bx left">
								<h2 class="title-head"><?=$lang["register_camp"]?></h2>
								<p>* olan xanaları mütləq doldurun.</p>
							</div>
							<div class="row placeani">
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
											<label>Övladınızın tam adı</label>
											<input oninvalid="this.setCustomValidity('Tam adı yazın')" name="fullname" type="text" required class="form-control valid-character">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group"> 
											<label>Təvəllüdü</label>
											<input oninvalid="this.setCustomValidity('Təvəllüdü yazın')" name="birthday" type="calendar" class="form-control" required >
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label style="margin-left:15px;">Cinsi</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select style="float:right;" name="sex" required >
                                                        <option value="M">Kişi</option>
                                                        <option value="F">Qadın</option>
                                                    </select>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="input-group">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label style="margin-left:15px;">İstifadə etdiyi dil</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <select oninvalid="this.setCustomValidity('İstifadə edilən dili seçin.')" style="float:right;" name="language" required >
                                                        <option value="0">Azərbaycan</option>
                                                        <option value="1">Rus</option>
                                                        <option value="2">Türk</option>
                                                        <option value="3">İngilis</option>
                                                    </select>
                                                </div>
                                            </div>
										</div>
									</div>
								</div>
								<div class="col-lg-12">
									<button name="submit" type="submit" value="register_camp" class="btn button-md">Qeydiyyatı tamamla</button>
								</div>
							</div>
						</form>
						<?php } ?>
					</div>
				</div>
            </div>
		</div>
        <!-- inner page banner END -->
    </div>
    <!-- Content END-->
