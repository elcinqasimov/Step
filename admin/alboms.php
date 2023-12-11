<?php
if($group == 1){
	$text = "";
	if(isset($_POST["submit"]) && $_POST["submit"] == "alboms"){
		unset($_POST["submit"]);
		$say = $db-> query("SELECT count(*) FROM alboms WHERE name = '".$_POST["name"]."'");
		if($say[0]["count(*)"] < 1){
        	$db->insert("alboms",$_POST);
			$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Albom əlavə olundu</div>";
		}else{
			$text = "<div style=\"background:red;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Albom bazada var</div>";
		}
	}
	if(isset($_GET["mod"]) && $_GET["mod"] == "del"){
		$db->query("DELETE FROM alboms WHERE id = '$id'");
		$text = "<div style=\"background:green;color:#fff;width:100%;border:1px solid #ccc;border-radius:5px;padding:5px;margin-bottom:20px;\">Albom silindi</div>";
	}


?>
	<!--Main container start -->
	<main class="ttr-wrapper">
		<div class="container-fluid">
			<div class="db-breadcrumb">
				<h4 class="breadcrumb-title">Albom siyahıları</h4>
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
										<a href="?do=alboms_add&mod=add" class="btn default">Albom əlavə et</a>
									</div>
								</div>
								<div class="mail-box-list">
									<?php 
									$sql = "
										SELECT 
										gallery.id as 'id',
										gallery.name as 'name',
										term.name as 'term_name',
										albom_groups.name_az as 'group_az',
										albom_groups.name_en as 'group_en'
										FROM gallery
										INNER JOIN term ON gallery.term_id = term.id
										INNER JOIN albom_groups ON gallery.group_id = albom_groups.id
									";
										$term = $db->query("$sql LIMIT $offset, $total_records_per_page");
										$c_term = $db-> query("SELECT count(*) FROM gallery WHERE group_id != 0");
										for($a = 0;$a<count($term);$a++){
										?>
									<div class="mail-list-info">
										<div class="mail-list-title-info">
											<p><b>Ad : <?=$term[$a]["name"]?></b> Qrup: (AZ - <?=$term[$a]["group_az"]?> | EN - <?=$term[$a]["group_en"]?>) | Term : <?=$term[$a]["term_name"]?></p>
										</div>
										<ul class="mailbox-toolbar">
											<li data-toggle="tooltip" title="Delete"><a href="?do=alboms&mod=del&id=<?=$term[$a]["id"]?>"><i class="fa fa-trash-o"></i></a></li>
											<li data-toggle="tooltip" title="Delete"><a href="?do=alboms_add&mod=edit&id=<?=$term[$a]["id"]?>"><i class="fa fa-pencil"></i></a></li>
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
	<?php
	}else{
		header('Location: admin/index.php');
	}
	?>