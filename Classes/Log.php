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

class Log {

	function Insert($nov = "",$movzu = "",$login = 0, $logout = 0, $step = "",$page = ""){
		global $db;
		global $userid;
		global $vaxt;
		global $ipaddress;
		global $orqan;
		global $useragent;
    $loq = array();
    if($nov == "" && $movzu == ""){
      $loq["url"]        = $_SERVER["REQUEST_URI"];
      $loq["userid"]     = $userid;
      $loq["ip"]         = $ipaddress;
      $loq["time"]       = $vaxt;
      $loq["login"]      = $login;
      $loq["logout"]     = $logout;
      $loq["step"]       = $step;
      $loq["page"]       = $page;
      $loq["agent"]      = $useragent;
      $db->insert("login_log",$loq);
    }else{
      $loq["userid"]     = $userid;
      $loq["nov"]        = $nov;
      $loq["ipaddress"]  = $ipaddress;
      $loq["vaxt"]       = $vaxt;
      $loq["movzu"]      = $movzu;
      $loq["orqan"]      = $orqan;
      $loq["useragent"]      = $useragent;
      $db->insert("log",$loq);
		}
}

    public static function Siyahi($nov, $limit = "", $say = "", $sql = ""){
        global $db;
        global $sort;
        global $by;
        global $admin;
        global $userid;
        global $orqan;
        if(!$sort){
            $sort = "DESC";
        }
        if(!$by){
            $by = "id";
        }
        if($admin < 1){
            if($nov == "hamisi"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' ORDER BY $by $sort $limit";
            }elseif($nov == "qeydiyyat"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' AND log.nov = 'qeydiyyat' ORDER BY $by $sort $limit";
             }elseif($nov == "edit"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' AND log.nov = 'qeydiyyat_edit' ORDER BY $by $sort $limit";
            }elseif($nov == "sehvler"){
				$sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' AND log.nov = 'login_sehv' ORDER BY $by $sort $limit";
            }elseif($nov == "giris"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' AND log.nov = 'login' OR log.nov = 'logout' ORDER BY $by $sort $limit";
            }elseif($nov == "silinen"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' AND log.nov = 'qeydiyyat_sil' ORDER BY $by $sort $limit";
            }else{
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.userid = '{$userid}' ORDER BY $by $sort $limit";
            }
        }elseif($admin < 1 AND $nov == "filter"){
			$sorgu = $sql." AND log.userid = '{$userid}' ORDER BY $by $sort $limit";
		}elseif($admin > 1){
            if($nov == "hamisi"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id  ORDER BY $by $sort $limit";
            }elseif($nov == "qeydiyyat"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.nov = 'qeydiyyat' ORDER BY $by $sort $limit";
             }elseif($nov == "edit"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.nov = 'qeydiyyat_edit' ORDER BY $by $sort $limit";
            }elseif($nov == "sehvler"){
				$sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.nov = 'login_sehv' ORDER BY $by $sort $limit";
            }elseif($nov == "giris"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.nov = 'login' OR log.nov = 'logout' ORDER BY $by $sort $limit";
            }elseif($nov == "silinen"){
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id WHERE log.nov = 'qeydiyyat_sil' ORDER BY $by $sort $limit";
            }else{
                $sorgu = "SELECT log.id as 'id', log.nov as 'nov', user.fullname as 'ad', orqan.ad as 'orqan', log.ipaddress as 'ip', log.movzu as 'movzu', log.vaxt as 'vaxt', log.useragent as 'agent' FROM log INNER join users user on log.userid = user.id INNER join orqanlar orqan on log.orqan = orqan.id  ORDER BY $by $sort $limit";
            }
        }elseif($admin > 1 AND $nov == "filter"){
			$sorgu = $sql." ORDER BY $by $sort $limit";
		}
        if($say)
        {
            $siyahi = $db->sorgu($sorgu)->say();
        }else{
            $siyahi = $db->sorgu($sorgu)->massiv_siyahi();
        }

        return $siyahi;
    }


}


?>
