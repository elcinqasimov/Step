 <footer class="footer-white">
        <div class="footer-top bt0">
			<div class="container">
				<!--
				<div class="subscribe-box">
					<div class="subscribe-title"><h4>Subscribe to recieve weekly news via email.</h4></div>
					<div class="subscribe-form m-b20">
						<form class="subscription-form" action="http://educhamp.themetrades.com/html/demo/assets/script/mailchamp.php" method="post">
							<div class="ajax-message"></div>
							<div class="input-group">
								<input name="email" required="required"  class="form-control" placeholder="Your Email Address" type="email">
								<span class="input-group-btn">
									<button name="submit" value="Submit" type="submit" class="btn radius-xl">Subscribe</button>
								</span> 
							</div>
						</form>
					</div>
				</div>
						-->
                <div class="row">
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
							<div class="col-4 col-lg-4 col-md-4 col-sm-4">
								<div class="widget footer_widget">
									<h5 class="footer-title"><?=$lang["services"]?></h5>
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
					<div class="col-12 col-lg-3 col-md-5 col-sm-6 footer-col-4">
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
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center"> © 2023 <span class="text-primary">INTCDC</span>  <?=$lang["copyright"]?></div>
                </div>
            </div>
        </div>
    </footer>