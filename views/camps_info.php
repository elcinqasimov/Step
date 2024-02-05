<?php
 $termsql = "
 SELECT
	 term.id as 'term_id',
	 camps.id as 'id',
	 camps.`name` as 'name', 
	 term.`name` as 'term', 
	 term.startdate as 'startdate', 
	 term.enddate as 'enddate', 
	 term.count as 'count',  
	 term.price as 'price', 
	 term.exc as 'exc', 
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
	 camps
	 INNER JOIN term ON camps.id = term.camp_id
	 INNER JOIN city ON camps.city_id = city.id
	 INNER JOIN countries ON camps.country_id = countries.id 
 WHERE camps.id = $id";
 $term = $db->query($termsql);

 if(count($term)> 0){
if($term[0]["exc"] == "euro"){
	$exc = "€";
}elseif($term[0]["exc"] == "usd"){
	$exc = " &dollar;";
}elseif($term[0]["exc"] == "tl"){
	$exc = "&#8378;";
}elseif($term[0]["exc"] == "azn"){
	$exc = "&#8380;";
}elseif($term[0]["exc"] == "rubl"){
	$exc = "&#8381;";
}
 }
?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="page-banner ovbl-dark" style="background-image:url(assets/images/gallery/4.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white"><?=$lang["camp_info"]?></h1>
				 </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<div class="content-block">
            <!-- About Us -->
			<div class="section-area section-sp1 gallery-bx">
                <div class="container">
				<?php if(count($term)< 1) { echo "<h4><center>Hal hazırda düşərgə qeydiyyatı yoxdur.</center></h4>"; }else{ ?>
					 <div class="row d-flex flex-row-reverse">

			
					
						<div class="col-lg-12 col-md-8 col-sm-12">
							<div class="courses-post">

								<div class="ttr-post-info">
									<div class="ttr-post-title ">
										<h2 class="post-title"><?=$term[0]["name"]?></h2>
									</div>
									</div>

<style>
	.nav {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    padding-left: 0;
    margin-bottom: 0;
    list-style: none;
}
.nav-pills .nav-link.active, .nav-pills .show>.nav-link {
    color: #fff;
    background-color: #007bff;
}
.nav-pills .nav-link {
    background: 0 0;
    border: 0;
    border-radius: 0.25rem;
}
[type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled), button:not(:disabled) {
    cursor: pointer;
}
.nav-link {
    display: block;
    padding: 0.5rem 1rem;
}
[type=button], [type=reset], [type=submit], button {
    -webkit-appearance: button;
}
button, select {
    text-transform: none;
}
button, input {
    overflow: visible;
}
button, input, optgroup, select, textarea {
    margin: 0;
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
}
button {
    border-radius: 0;
}
*, ::after, ::before {
    box-sizing: border-box;
}
thead{
	background:#f7b205;
}
td{
	border-bottom:1px solid #ccc;
}
tbody>tr:nth-of-type(odd) {
    background-color: #9abbf1;
}
</style>
<hr/>
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-toggle="pill" data-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Haqqında</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Qiymət və cədvəllər</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-toggle="pill" data-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Qalereya</button>
  </li>
</ul>
<hr/>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

										<p><?=$term[0]["description_".$l]?></p>
									</div>

  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
<table>
	<thead>
	<tr>
		<td>№</td>
		<td>Düşərgə adı</td>
		<td>Düşərgə tarix aralığı</td>
		<td>Uşaq sayı</td>
		<td>Qiymət</td>
		<td>---</td>
	</tr>
	</thead>
<tbody>

<?php 
for($a=0;$a<count($term);$a++){ $b = $a+1; ?>
									<?php
									if($referans != ""){
										$r_link = "&referans=".$referans;
									}else{
										$r_link = "";
									}
									if($userid == ""){
										$reg_link = "login.php";
									}else{
										$reg_link = "?do=register_camp".$r_link."&id=".$term[$a]["term_id"];
									}
									?>
	<tr>
		<td><?=$b?></td>
		<td><?=$term[$a]["term"]?></td>
		<td><?=tarix($term[$a]["startdate"])?> - <?=tarix($term[$a]["enddate"])?></td>
		<td><?=$term[$a]["count"]?></td>
		<td><?=$term[$a]["price"]?> <?=$exc?></td>
		<td><a href="<?=$reg_link?>" class="btn radius-xl text-uppercase"><?=$lang["camp_reg"]?></a></td>
	</tr>
<?php } ?>
</tbody>
</table>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
  <div class="widget widget_gallery gallery-grid-4">
									<ul class="magnific-image">
							<?php $gallery = $db->query("SELECT * FROM gallery where term_id = ".$term[0]["term_id"]." AND group_id = 0");
									for($a=0;$a<count($gallery);$a++){ ?>
											
												<li><a href="<?=$gallery[$a]["path"]?>" class="magnific-anchor"><img src="<?=$gallery[$a]["path"]?>" alt=""></a></li>
							<?php } ?>
						</ul>
						</div>
  </div>
</div>
<hr/>
<?php } ?>
									
									
						</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
            </div>
        </div>
		<!-- contact area END -->
		
    </div>
    <!-- Content END-->