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

class Persons {

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
        $byperson = "id";
      }else{
      echo $by;
        $byperson = $by;
      }
      $sorgu = "
      SELECT
        person.id as 'id', 
        person.job_id as 'job_id', 
        person.evidence_no as 'evidence_no', 
        person.object_id as 'object_id', 
        CONCAT(surname, ' ', name, ' ',fathername) as 'fullname', 
        person.surname as 'surname', 
        person.name as 'name', 
        relationship.ad as 'relationship', 
        person.fathername as 'fathername', 
        IF(person.sex = 'MALE', 'KİŞİ', 'QADIN') as 'sex',
        DATE_FORMAT(person.birthDate, '%d.%m.%Y') as 'birthDate', 
        person.placebirth as 'placebirth', 
        person.fullAddress as 'fullAddress', 
        person.bloodType as 'bloodType', 
        person.organisation as 'organisation', 
        person.photo_id as 'photo_id', 
        person.signature_id as 'signature_id', 
        person.activationDate as 'activationDate', 
        person.documentNumber as 'documentNumber', 
        person.pin as 'pin'
      FROM
        person
        LEFT JOIN relationship ON person.relationship = relationship.id ";
        
      $orderby = "ORDER BY $byperson $sort $limit";


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
			$siyahi = $db->sorgu("SELECT * FROM person WHERE id = '".$id."'")->massiv_siyahi();
		return 	$siyahi[0][$massiv];
	}
}
?>
