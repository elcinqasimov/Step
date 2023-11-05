<?php
////////////////////////////////////////
//                                    //
// Kriminalistik Tədqiqatlar İdarəsi  //
//        baş mühəndis-proqramçı      //
//          Elçin Qasımov             //
//                                    //
////////////////////////////////////////  

#region Sifreleme
function elcrypt( $string, $action = 'e' ) {
    // you may change these values to your own
    $secret_key = 'elcin1990';
    $secret_iv = 'elcin650';
  
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );
  
    if( $action == 'e' ) {
        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
    }
    else if( $action == 'd' ){
        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
    }
  
    return $output;
  }
  function sifrele($data)
{
    static $map = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $hash = bcadd(sprintf('%u',crc32($data)) , 0x100000000);
    $str = "";
    do
    {
        $str = $map[bcmod($hash, 62) ] . $str;
        $hash = bcdiv($hash, 62);
    }
    while ($hash >= 1);
    return $str;
}
  #endregion

#region Nomre yazan
function nomre($nomre,$say){
  return str_pad($nomre, $say, '0', STR_PAD_LEFT);
}
#endregion

#region Qovluq gosterme
function listAllFiles($dir) {
    $array = array_diff(scandir($dir), array('.', '..', 'ok', 'error'));
    
  
    return $array;
  }
#endregion

function objectToArray($d)
{
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    } else {
        // Return array
        return $d;
    }
}

#region Tarix
function tarix($tarix){
    $newDate = date("d.m.Y", strtotime($tarix));
    return $newDate;
}
function tam_tarix($tarix){
    $newDate = date("d.m.Y H:m:s", strtotime($tarix));
    return $newDate;
}
function ekstarix($tarix){
    $newDate = date("Y-m-d", strtotime($tarix));
    return $newDate;
}
#endregion

function pagination($total_records){
    global $total_records_per_page;
    global $page_no;
    global $second_last;
    global $next_page;
    global $previous_page;
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
    echo '<div class="col-lg-12 m-b20"><div class="pagination-bx rounded-sm gray clearfix">';
    echo '<center><ul class="pagination">';
    if($page_no < 2){ echo '<li class="previous"><a href="javascript:;"><i class="ti-arrow-left"></i> Previous</a>'; }
	if($page_no > 1){ echo "<li class='previous'><a href=".$_SERVER['REQUEST_URI']."&page_no=$previous_page'><i class='ti-arrow-left'></i> Previous</a>"; }
	echo '</li>';
    if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=1'>1</a></li>";
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=1'>1</a></li>";
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
    echo '<li class"next">';
	if($page_no < $total_no_of_pages) { echo "<a href='".$_SERVER['REQUEST_URI']."&page_no=$next_page'>Next <i class='ti-arrow-right'></i>"; }else{
        echo "<a href='javascript:;'>Next <i class='ti-arrow-right'></i>";
    } 
	echo '</li>';
    if($page_no < $total_no_of_pages){
		echo "<li><a href='".$_SERVER['REQUEST_URI']."&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		}
    echo '</ul></center></div></div>';
}

function Olcu($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}

function Qovluq($dirName,$upload_dir, $rights=0777){
    $folder = $upload_dir.$dirName;
    is_dir($folder) || mkdir($folder, $rights, true);
    return $folder."/";
}

function qisa($text, $chars_limit)
{
    // Check if length is larger than the character limit
    if (strlen($text) > $chars_limit)
    {
        // If so, cut the string at the character limit
        $new_text = substr($text, 0, $chars_limit);
        // Trim off white space
        $new_text = trim($new_text);
        // Add at end of text ...
        return $new_text . "...";
    }
    // If not just return the text as is
    else
    {
    return $text;
    }
}

?>
