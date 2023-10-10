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

class Jobs {

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
        $byjob = "jobs.id";
      }else{
        $byjob = $by;
      }
      $sorgu = "
      SELECT
        jobs.id as 'id', 
        jobs.userid as 'userid', 
        jobs.dep_id as 'dep_id', 
        jobs.fact_id as 'fact_id', 
        jobs.doc_type as 'doc_type', 
        jobs.job_type as 'job_type_id', 
        jobs.note as 'note', 
        document_type.`name` as 'document_type', 
        fact.`name` as 'fact', 
        departments.`name` as 'departments', 
        users.fullname as 'fullname', 
        job_type.`name` as 'job_type', 
        jobs.evidence_no as 'evidence_no', 
        jobs.doc_no as 'doc_no', 
        jobs.doc_date as 'doc_date', 
        jobs.fabola as 'fabola', 
        jobs.doc_reg_date as 'doc_reg_date', 
        jobs.reg_date as 'reg_date'
      FROM
        jobs
        INNER JOIN users ON jobs.userid = users.id 
        LEFT JOIN job_type ON jobs.job_type = job_type.id
        LEFT JOIN fact ON jobs.fact_id = fact.id
        LEFT JOIN departments ON jobs.dep_id = departments.id
        LEFT JOIN document_type ON jobs.doc_type = document_type.id ";
      $orderby = "ORDER BY $byjob $sort $limit";


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
			$siyahi = $db->sorgu("SELECT * FROM jobs WHERE id = '".$id."'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
	}
}
?>
