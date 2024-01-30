<?php
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "camps"){
		unset($_POST["submit"]);
        	$db->insert("consultation_list",$_POST);
			$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Konsultasiya əlavə olundu</div>";
	}
	if(isset($_GET["mod"]) && $_GET["mod"] == "del"){
		$db->query("DELETE FROM consultation_list WHERE id = '$id'");
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Konsultasiya silindi</div>";
	}
if($group == 0){
	$where  = " AND userid = $userid ";
}elseif($group == 1){
	$where = "";
}else{
	$where = " AND consultant_id = $userid ";
}

?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Konsultasiya siyahıları</h4>
			</div>	
			<?=$text?>
			<div class="row">
				<!-- Your Profile Views Chart -->
				<div class="col-lg-12 m-b30">
					<div class="widget-box">
						<div class="email-wrapper">

							<div class="mail-list-container">
								<div class="mail-toolbar">
									<div class="mail-search-bar">
										<?php if($group == 1 || $group == 2){ ?>
										<a href="?do=consultation_add&mod=add&type=1" class="btn default">Konsultasiya əlavə et</a>
										<?php } ?>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
									$sql = "
										SELECT 
										term.name as 'name',
										children.fullname as 'fullname',
										consultation_list.startdate as 'startdate',
										consultation_list.enddate as 'enddate',
										consultation_list.id as 'id'
										FROM consultation_list
										INNER JOIN term ON consultation_list.term_id = term.id
										INNER JOIN children ON consultation_list.child_id = children.id
										WHERE `type` = $type $where
									";
										$term = $db->query("$sql LIMIT $offset, $total_records_per_page");
										$c_term = $db-> query("SELECT count(*) FROM consultation_list WHERE `type` = $type $where");
										for($a = 0;$a<count($term);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><b><?=$term[$a]["fullname"]?></b> | (<?=$term[$a]["name"]?>) | Başlama : <?=tarix($term[$a]["startdate"])?> | Bitmə : <?=tarix($term[$a]["enddate"])?></p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=consultation&mod=del&id=<?=$term[$a]["id"]?>"><i class="fa fa-flag-checkered"></i></a></li>
										</ul>
									</div>
									<?php } ?>
								</div>

							</div>
						</div>

					</div> 
					
				</div>
				<!-- Your Profile Views Chart END-->
				<?php pagination($c_term[0]["count(*)"]); ?>
			</div>
		</div>
	</main>
	