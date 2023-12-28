  <!-- Footer ==== -->
    <footer>
        <div class="footer-top">
			<div class="pt-exebar">
				<div class="container">
					<div class="d-flex align-items-stretch">
						<div class="pt-logo mr-auto">
							<a href="index-2.html"><img width="200px" src="assets/images/logo-white-3.png" alt=""/></a>
						</div>
						<div class="pt-social-link">
							<ul class="list-inline m-a0">
								<li><a href="https://www.facebook.com/intcdc" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.linkedin.com/in/intcdc" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/intcdc" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/@intcdc" class="btn-link"><i class="fa fa-youtube"></i></a></li>
							</ul>
						</div>
						<?php if($userid == ""){ ?>
						<div class="pt-btn-join">
							<a href="?do=register" class="btn "><?=$lang["register_now"]?></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="row">
					<!--
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
                        <div class="widget">
                            <h5 class="footer-title">Sign Up For A Newsletter</h5>
							<p class="text-capitalize m-b20">Weekly Breaking news analysis and cutting edge advices on job searching.</p>
                            <div class="subscribe-form m-b20">
								<form class="subscription-form" action="http://educhamp.themetrades.com/html/demo/assets/script/mailchamp.php" method="post">
									<div class="ajax-message"></div>
									<div class="input-group">
										<input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
										<span class="input-group-btn">
											<button name="submit" value="Submit" type="submit" class="btn"><i class="fa fa-arrow-right"></i></button>
										</span> 
									</div>
								</form>
							</div>
                        </div>
                    </div>
								-->
								
					<div class="col-12 col-lg-5 col-md-7 col-sm-12">
						<div class="row">
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title"><?=$lang["menu"]?></h5>
									<ul>
										<?php 
										$sehife = $db->select("pages","isnull(subid) AND id != 5");
										for($a = 0;$a< count($sehife);$a++){
										?>

										<li><a href="?do=<?=$sehife[$a]["url"]?>"><?=$sehife[$a]["name_".$l]?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-6 col-lg-6 col-md-6 col-sm-6">
								<div class="widget footer_widget">
									<h5 class="footer-title">Services</h5>
									<ul>
									<?php 
										$sehife = $db->select("pages","subid = 5");
										for($a = 0;$a< count($sehife);$a++){
										?>

										<li><a href="?do=<?=$sehife[$a]["url"]?>"><?=$sehife[$a]["name_".$l]?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								
							</div>
						</div>
                    </div>
					<div class="col-lg-4 col-md-12 col-sm-12 footer-col-4">
								</div>
					<div class="col-12 col-lg-3 col-md-5 col-sm-12 footer-col-4">
                        <div class="widget widget_gallery gallery-grid-4">
                            <h5 class="footer-title"><?=$lang["our_gallery"]?></h5>
                            <ul class="magnific-image">
								<li><a href="assets/images/gallery/1.jpg" class="magnific-anchor"><img src="assets/images/gallery/1.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/2.jpg" class="magnific-anchor"><img src="assets/images/gallery/2.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/3.jpg" class="magnific-anchor"><img src="assets/images/gallery/3.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/4.jpg" class="magnific-anchor"><img src="assets/images/gallery/4.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/5.jpg" class="magnific-anchor"><img src="assets/images/gallery/5.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/6.jpg" class="magnific-anchor"><img src="assets/images/gallery/6.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/7.jpg" class="magnific-anchor"><img src="assets/images/gallery/7.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/8.jpg" class="magnific-anchor"><img src="assets/images/gallery/8.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/9.jpg" class="magnific-anchor"><img src="assets/images/gallery/9.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/10.jpg" class="magnific-anchor"><img src="assets/images/gallery/10.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/11.jpg" class="magnific-anchor"><img src="assets/images/gallery/11.jpg" alt=""></a></li>
								<li><a href="assets/images/gallery/12.jpg" class="magnific-anchor"><img src="assets/images/gallery/12.jpg" alt=""></a></li>
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> © 2023 <span class="text-white">INTCDC</span>  <?=$lang["copyright"]?></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END ==== -->
    <!-- scroll top button -->

</div>
<!-- External JavaScripts -->

<script src="assets/js/jquery.min.js"></script>
<script src="assets/vendors/bootstrap/js/popper.min.js"></script>
<script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendors/bootstrap-select/bootstrap-select.min.js"></script>

<script src="assets/vendors/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
<script src="assets/vendors/magnific-popup/magnific-popup.js"></script>
<script src="assets/vendors/imagesloaded/imagesloaded.js"></script>
<script src="assets/vendors/masonry/masonry.js"></script>
<script src="assets/vendors/owl-carousel/owl.carousel.js"></script>
<script src="assets/js/functions.js"></script>

</body>

</html>
