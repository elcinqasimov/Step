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

class Profiles {

	public static function Siyahi($nov = 0,$limitpr = "",$say = 0,$sql = ""){
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
        $byprofile = "dna_profile.id";
      }else{
        $byprofile = $by;
      }
      if($limitpr == ""){
        $limitprofile = "";
      }else{
        $limitprofile = $limitpr;
      }

      $sorgu = "
      SELECT
        dna_profile.id as 'id', 
        dna_profile.person_id as 'person_id', 
        dna_profile.sample_id as 'sample_id', 
        dna_profile.object_id as 'object_id', 
        dna_profile.job_id as 'job_id', 
        dna_profile.date as 'date', 
        dna_profile.sample_name as 'sample_name', 
        dna_profile.sample_uid as 'sample_uid', 
        dna_profile.run_name as 'run_name', 
        dna_profile.panel as 'panel', 
        sample_list.sample_no as 'sample_no', 
        users.fullname as 'fullname', 
        departments.name as 'department', 
        dna_profile.date as 'date',
        IF(dna_profile.new = '0', 'Yeni', '') as 'yeni',
        IF(dna_profile.eynilik = '0', 'Yox', 'Var') as 'eynilik'
      FROM
      dna_profile
        LEFT JOIN object_list ON dna_profile.object_id = object_list.id 
        LEFT JOIN sample_list ON dna_profile.sample_id = sample_list.id 
        LEFT JOIN person ON dna_profile.person_id = person.id 
        LEFT JOIN users ON dna_profile.userid = users.id 
        LEFT JOIN jobs ON dna_profile.job_id = jobs.id 
        LEFT JOIN departments ON jobs.dep_id = departments.id 
        ";
      $orderby = "ORDER BY $byprofile $sort $limitprofile";


		if($nov == "hamisi"){
      $query = "$sorgu $orderby";
    }elseif($sql != ""){
      $query = "$sorgu $sql $orderby";
    }
    if($say == 1)
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
			$siyahi = $db->sorgu("SELECT ".$massiv." FROM dna_profile WHERE id = '".$id."'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
	}
}
?>
