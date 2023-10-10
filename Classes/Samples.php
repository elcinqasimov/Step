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

class Samples {

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
        $bysample = "sample_list.id";
      }else{
        $bysample = $by;
      }

      $sorgu = "
      SELECT
        sample_list.id as 'id', 
        sample_list.person_id as 'person_id', 
        sample_list.job_id as 'job_id', 
        sample_list.object_id as 'object_id', 
        sample_list.userid as 'userid', 
        sample_list.dep_id as 'dep_id', 
        sample_list.sample_type as 'sample_type_id', 
        sample_list.note as 'note', 
        sample_list.hem_direct as 'hem_direct', 
        sample_list.p30_psa as 'p30_psa', 
        sample_list.amulaz as 'amulaz', 
        sample_type.`name` as 'sample_type', 
        departments.`name` as 'departments', 
        users.fullname as 'fullname', 
        sample_list.sample_no as 'sample_no', 
        sample_list.reg_date as 'reg_date'
      FROM
      sample_list
        INNER JOIN users ON sample_list.userid = users.id 
        INNER JOIN object_list ON sample_list.object_id = object_list.id 
        INNER JOIN jobs ON object_list.job_id = jobs.id 
        INNER JOIN sample_type ON sample_list.sample_type = sample_type.id
        INNER JOIN departments ON sample_list.dep_id = departments.id";
      $orderby = "ORDER BY $bysample $sort $limit";


		if($nov == "hamisi"){
      $query = "$sorgu $orderby";
    }elseif($sql != ""){
      $query = "$sorgu $sql $orderby";
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
