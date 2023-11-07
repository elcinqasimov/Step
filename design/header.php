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
							<li><a href="https://www.facebook.com/intcdc" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://www.linkedin.com/in/intcdc" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/intcdc" class="btn-link"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/@intcdc" class="btn-link"><i class="fa fa-youtube"></i></a></li>
								<?php if($l == "az"){ ?>
									<li><a href="<?=$_SERVER["REQUEST_URI"]?>&lang=en" >&nbsp;&nbsp;<img width="30px" src="assets/images/en.png"/></a></li>
								<?php }else{ ?>
									<li><a href="<?=$_SERVER["REQUEST_URI"]?>&lang=az" >&nbsp;&nbsp;<img width="30px" src="assets/images/az.png"/></a></li>
								<?php } ?>
									&nbsp; | &nbsp;
								<!-- Search Button ==== -->	
								<?php if($userid == ""){ ?>
							<li><a href="login.php" class="btn" style="padding:5px;">Login</a></li>
							<?php }else{ ?>
							<?php if($group == 1){ ?>
							<li><a href="admin/index.php" class="btn" style="padding:5px;background:red;color:#fff; ">Admin panel</a></li>
							<?php } ?>
							<?php if($group == 2){ ?>
							<li><a href="admin/index.php" class="btn" style="padding:5px;background:grey;color:#fff; ">Agent panel</a></li>
							<?php } ?>
							<li><a href="logout.php" class="btn" style="padding:5px;background:orange;"><?=$lang["logout"]?></a></li>
							<?php } ?>
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