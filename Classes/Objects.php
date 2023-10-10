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

class Objects {

	public static function Siyahi($nov,$limit = "",$say = "",$sql = ""){
		global $db;
		global $sort;
		global $by;
		global $admin;
		global $orqan;
    	global $userid;
      if(!$sort){
        $sort = "DESC";
      }
      if(!$by){
        $byobject = "object_list.id";
      }else{
        $byobject = $by;
      }
      $sorgu = "
      SELECT
        object_list.id as 'id', 
        object_list.person_id as 'person_id', 
        object_list.userid as 'userid', 
        object_list.dep_id as 'dep_id', 
        object_list.object_type as 'object_type_id', 
        object_list.object_kind as 'object_kind_id', 
        object_list.note as 'note', 
        object_type.`name` as 'object_type', 
        object_kind.`name` as 'object_kind', 
        departments.`name` as 'departments', 
        users.fullname as 'fullname', 
        object_list.object_no as 'object_no', 
        object_list.reg_date as 'reg_date'
      FROM
      object_list
        INNER JOIN users ON object_list.userid = users.id 
        INNER JOIN jobs ON object_list.job_id = jobs.id 
        LEFT JOIN object_type ON object_list.object_type = object_type.id
        INNER JOIN departments ON object_list.dep_id = departments.id
        LEFT JOIN object_kind ON object_list.object_kind = object_kind.id ";
      $orderby = "ORDER BY $byobject $sort $limit ";


		if($nov == "hamisi"){
      $query = "$sorgu $orderby ";
    }elseif($sql != ""){
      $query = "$sorgu $sql $orderby ";
    }
    if($say)
    {
      $siyahi = $db->sorgu($query)->say();
    }else{
      $siyahi = $db->sorgu($query)->massiv_siyahi();
    }
			return $siyahi;
		}
	public function Info($id,$massiv){
		global $db;
		global $admin;
		global $orqan;
			$siyahi = $db->sorgu("SELECT * FROM object_list WHERE id = '".$id."'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
	}
}
?>
