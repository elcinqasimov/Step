<?php
////////////////////////////////////////
//                                    //
// Kriminalistik Tədqiqatlar İdarəsi  //
//        mühəndis-proqramçı		      //
//          Elçin Qasımov		          //
//									                  //
////////////////////////////////////////

///////////////////////////////////////
//        DEFINE Security            //
///////////////////////////////////////
 defined('SECURITY') or die('Error');
///////////////////////////////////////

class Test {

	public static function Siyahi($nov,$limit = "",$say = "",$sql = ""){
		global $db;
		global $sort;
		global $by;
		global $admin;
		global $orqan;
    	global $userid;
      if(!$sort){
        $sort = "DESC ";
      }
      if(!$by){
        $by = "tests.id";
      }
      $sorgu = "
      SELECT
        tests.id as 'id', 
        tests.test_no as 'test_no', 
        tests.export as 'export', 
        tests.device_id as 'device_id', 
        device.model as 'device_name', 
        device.template as 'device_template', 
        device.app_instance as 'device_app_instance', 
        tests.openuserid as 'openuserid', 
        tests.test_type as 'test_type', 
        tests.closeuserid as 'closeuserid', 
        openuser.fullname as 'openuserfull', 
        analysis_method.name as 'analysis_method', 
        result_group.name as 'result_group', 
        instrument_document.name as 'instrument_document', 
        closeuser.fullname as 'closeuserfull', 
        tests.procedureid as 'procedureid', 
        tests.job_type as 'job_type', 
        job_type.name as 'job_type_name', 
        job_type.code as 'job_type_code', 
        tests.simplecount as 'simplecount', 
        DATE_FORMAT(tests.opendate, '%d.%m.%Y - %H:%i:%s') as 'opendate', 
        DATE_FORMAT(tests.closedate, '%d.%m.%Y - %H:%i:%s') as 'closedate', 
        tests.status as 'status', 
        procedures.`name` as 'procedurename' 
      FROM
        tests
        LEFT JOIN users closeuser ON tests.closeuserid = closeuser.id 
        LEFT JOIN device ON tests.device_id = device.id 
        LEFT JOIN analysis_method ON tests.analysis_method = analysis_method.id 
        LEFT JOIN result_group ON tests.result_group = result_group.id 
        LEFT JOIN instrument_document ON tests.instrument_document = instrument_document.id 
        INNER JOIN users openuser ON tests.openuserid = openuser.id 
        INNER JOIN job_type ON tests.job_type = job_type.id 
        INNER JOIN procedures ON tests.procedureid = procedures.id ";
      $orderby = "ORDER BY $by $sort $limit";


		if($nov == "all"){
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
			$siyahi = $db->sorgu("SELECT * FROM tests WHERE id = '".$id."'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
	}
}
?>
