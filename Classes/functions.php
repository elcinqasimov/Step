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
