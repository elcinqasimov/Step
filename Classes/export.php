<?php
///////////////////////////////////////
//                                   //
// Kriminalistik Tədqiqatlar İdarəsi //
//        mühəndis-proqramçı		 //
//          Elçin Qasımov		     //
//									 //
///////////////////////////////////////

///////////////////////////////////////
//        DEFINE Security            //
///////////////////////////////////////
 defined('SECURITY') or die('Error');
///////////////////////////////////////

class Export {
	public static function Siyahi($limit = "",$say = "",$sql = ""){
		global $db;
		global $sort;
		global $by;
		global $admin;
		global $orqan;
    global $userid;
    $sorgu = "SELECT * FROM filelist WHERE `type` = 'export'";
    $orderby = " $sort $limit";
    if($sql != ""){
      $query = "$sorgu $sql $orderby";
    }else{
      $query = "$sorgu $orderby";
    }
    if($say)
    {
      $siyahi = $db->sorgu($query)->say();
    }else{
      $siyahi = $db->sorgu($query)->massiv_siyahi();
    }
			return $siyahi;
		}
}
?>
