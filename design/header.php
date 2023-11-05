<header class="header rs-nav header-transparent">
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo logo-change">
						<a href="index.php"><img src="assets/images/logo-3.png" class="logo1" alt=""><img src="assets/images/logo-white-3.png" class="logo2" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
					
                    <div class="secondary-menu">
						
                        <div class="secondary-inner">
                            <ul>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<?php if($l == "az"){ ?>
									<li><a href="<?=$_SERVER["REQUEST_URI"]?>&lang=en" >&nbsp;&nbsp;<img width="30px" src="assets/images/en.png"/></a></li>
								<?php }else{ ?>
									<li><a href="<?=$_SERVER["REQUEST_URI"]?>&lang=az" >&nbsp;&nbsp;<img width="30px" src="assets/images/az.png"/></a></li>
								<?php } ?>

								<!-- Search Button ==== -->
				
							</ul>
							
						</div>
                    </div>
					
					<!-- Navigation Menu ==== -->
                    <?php include_once 'design/menu.php'; ?>
					
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>