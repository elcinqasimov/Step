<?php
$sehife = $db->select("pages","isnull(subid)");
?>
<div class="menu-links navbar-collapse collapse justify-content-end" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.php"><img src="assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	

						<li><a href="index.php"><?=$lang["home_page"]?></a></li>
							<?php
								$count = count($sehife);
								for($i = 0;$i<$count;$i++){
									$active = ($do == $sehife[$i]['id']) ? 'class="active"' : ''; 
									$subsehife = $db->select("pages","subid = ".$sehife[$i]['id']);
									$counts = count($subsehife);
									if($counts > 0){
										$drop = '<i class="fa fa-chevron-down"></i>';
										$href = 'javascript:;';
									}else{
										$drop = '';
										$href = '?do='.$sehife[$i]['url'].$r_link;
									}
							?>
							<li <?=$active?>><a href="<?=$href?>"><?=$sehife[$i]['name_'.$l.'']?> <?=$drop?></a>
								<?php if($counts > 0){ ?>
									<ul class="sub-menu">
										<?php for($a=0;$a<$counts;$a++){?>
											<li><a href="?do=<?=$subsehife[$a]['url']?><?=$r_link?>"><?=$subsehife[$a]['name_'.$l.'']?></a></li>
										<?php } ?>
									</ul>
								<?php } ?>
							</li>
							<?php } ?>
						
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>