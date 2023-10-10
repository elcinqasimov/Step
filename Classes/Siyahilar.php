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

class Lists {

	public static function Department($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM departments")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM departments WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM departments WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Locks($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM locks")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM locks WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM locks WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Users($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM users")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM users WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM users WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Doc_Type($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM document_type")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM document_type WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM document_type WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Job_Type($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM job_type")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM job_type WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM job_type WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Group($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM group")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM group WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM group WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Fact($id = 0, $ids = 0){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM fact")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM fact WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM fact WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Obj_Type($id = 0, $ids = 0){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM object_type")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM object_type WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM object_type WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Sample_Type($id = 0, $ids = 0){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM sample_type")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM sample_type WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM sample_type WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Sample_Microsopic($id = 0, $ids = 0){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM sample_microsopic")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM sample_microsopic WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM sample_microsopic WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Obj_Kind($id = 0, $ids = 0){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM object_kind")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM object_kind WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM object_kind WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Procedures($id = 0, $ids = 0, $type){
			global $db;
			if($ids == 0 && $id == 0){
				$siyahi = $db->sorgu("SELECT * FROM procedures WHERE test_type ='".$type."'")->massiv_siyahi();
			}elseif($ids != 0){
				$siyahi = $db->sorgu("SELECT * FROM procedures WHERE id !='".$ids."'")->massiv_siyahi();
			}else{
				$siyahi = $db->sorgu("SELECT * FROM procedures WHERE id ='".$id."'")->massiv_siyahi();
			}
				return $siyahi;
			}
	public static function Test_Type($id = 0, $ids = 0){
		global $db;
		if($ids == 0 && $id == 0){
			$siyahi = $db->sorgu("SELECT * FROM test_type")->massiv_siyahi();
		}elseif($ids != 0){
			$siyahi = $db->sorgu("SELECT * FROM test_type WHERE id !='".$ids."'")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM test_type WHERE id ='".$id."'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function analysis_method($id = 0){
		global $db;
		if($id == 0){
			$siyahi = $db->sorgu("SELECT * FROM analysis_method")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT * FROM analysis_method WHERE test_type ='" . $id . "'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function result_group($id = 0){
		global $db;
		if($id == 0){
			$siyahi = $db->sorgu("SELECT * FROM result_group")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT * FROM result_group WHERE test_type ='" . $id . "'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function instrument_document($id = 0){
		global $db;
		if($id == 0){
			$siyahi = $db->sorgu("SELECT * FROM instrument_document")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT * FROM instrument_document WHERE test_type ='" . $id . "'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Devices($id = 0){
		global $db;
		if($id == 0){
			$siyahi = $db->sorgu("SELECT id,model as 'name' FROM device")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT id,model as 'name' FROM device WHERE test_id ='" . $id . "'")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Files($filetype = 0, $say = 0, $limits = ""){
		global $db;
		if($say == 0){
			$siyahi = $db->sorgu("SELECT id,`name`, size, format, `status` FROM filelist  WHERE `type` = '" . $filetype . "' " . $limits . "")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT count(*) as 'say' FROM filelist  WHERE `type` = '" . $filetype . "' " . $limits . "")->massiv_siyahi();
		}
			return $siyahi;
		}
	public static function Tests($type = 0, $limits = 0 ,$sql =""){
		global $db;
		if($limits == 0){
			$siyahi = $db->sorgu("SELECT * FROM tests WHERE test_type ='".$type."' AND status = 1 ORDER BY id DESC")->massiv_siyahi();
			
		}elseif($sql != ""){
			$siyahi = $db->sorgu("SELECT * FROM tests WHERE test_type ='".$type."' AND status = 1 AND test_no REGEXP '".$sql."' ORDER BY id DESC")->massiv_siyahi();
		}else{
			$siyahi = $db->sorgu("SELECT * FROM tests WHERE test_type ='".$type."' AND status = 1 ORDER BY id DESC LIMIT $limits")->massiv_siyahi();

		}
			return $siyahi;
		}
	public static function Plates($id,$key = ""){
		global $db;
		if($key != ""){
			$siyahi = $db->sorgu("SELECT * FROM plate_list WHERE `key` = '".$key."' AND test_id ='" . $id . "'")->massiv_siyahi();
		} else {
			$siyahi = $db->sorgu("SELECT * FROM plate_list WHERE test_id ='" . $id . "'")->massiv_siyahi();
		}
			return $siyahi;
		}			
}






?>