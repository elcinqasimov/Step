<?php
////////////////////////////////////////
//                                    //
// Kriminalistik Tədqiqatlar İdarəsi  //
//        baş mühəndis-proqramçı      //
//          Elçin Qasımov             //
//                                    //
////////////////////////////////////////  

#region Error Reporting
///////////////////////////////////////
//        Error Reporting            //
///////////////////////////////////////
//error_reporting(0);
///////////////////////////////////////
#endregion 

#region HEADERS
///////////////////////////////////////
//             HEADERS               //
///////////////////////////////////////
header('Content-Type: text/html; charset=utf-8');
///////////////////////////////////////
#endregion
ob_start();


#region Language folder
//////////////////////////////////////
//        Language folder           //
//////////////////////////////////////
$langdir    = './Lang/'; 
$langfiles  = array_diff(scandir($langdir), array('.', '..')); 
$langs      = str_replace('.php','',$langfiles);
$allLangs   = $langs;
//////////////////////////////////////
#endregion 

#region Session start
///////////////////////////////////////
//        Session start              //
///////////////////////////////////////
if(!isset($_SESSION)){ session_start();}  //---->Session start function
///////////////////////////////////////
#endregion 

#region Time ZONE 
///////////////////////////////////////
//        Time ZONE                  //
///////////////////////////////////////
date_default_timezone_set("Asia/Baku");
///////////////////////////////////////
#endregion 

#region Security PHP files
///////////////////////////////////////
define('SECURITY', "EDNA");     		 //---->Security PHP files
///////////////////////////////////////
#endregion 

#region Includes
///////////////////////////////////////
//            Includes               //
///////////////////////////////////////
include 'Classes/Database.php';
include 'Classes/functions.php';
/*
include 'includes/Users.php';
include 'includes/Siyahilar.php';
include 'includes/Jobs.php';
include 'includes/Test.php';
include 'includes/Objects.php';
include 'includes/Samples.php';

include 'includes/WriteTag.php';
include 'includes/settings.php';
include 'includes/Log.php';
include 'includes/Sifrele.php';
include 'includes/Language.php';
include 'includes/Persons.php';
include 'includes/Profile.php';
include 'includes/export.php';
*/
///////////////////////////////////////
#endregion 

#region  CLASS includes  
///////////////////////////////////////
//        CLASS includes             //
///////////////////////////////////////
$db 		      = new Database("step", "root", "admin", "localhost");
/*
$user 		    = new User();
$settings 	  = new Settings();
$sifrelemek   = new Sifrelemek();
$langs        = new Langs();
$list         = new Lists();
$jobs         = new Jobs();
$test         = new Test();
$object_lists = new Objects();
$sample_lists = new Samples();
$persons      = new Persons();
$profile      = new Profiles();
$export       = new Export();

////////////////////////////////////////
#endregion 

#region  define_variable  
///////////////////////////////////////
//        define_variable            //
///////////////////////////////////////
$ipaddress  = $_SERVER['REMOTE_ADDR'];
$useragent  = $_SERVER['HTTP_USER_AGENT'];
$online     = time();
if(isset($_SESSION["userid"])){
  $userid = $_SESSION["userid"];
  $where["id"] = $userid;
  $insert["online"] = $online;
  $insert["ipaddress"] = $ipaddress;
  $db->update("users",$insert,$where);
}else{
  $userid = "";
}

$vaxt         = date('Y-m-d H:i:s',time());
$year         = date('Y',time());
$group	      = $user->Info($userid,"group");
$fullname	    = $user->Info($userid,"fullname");
$username	    = $user->Info($userid,"username");
$groupname	  = $user->GroupInfo($group,"name");
$upload_dir	  = $settings->Info($userid,"upload_dir");
$sevidence_no	= $settings->Info(1,"evidence_no");
$syear	      = $settings->Info(1,"year");
require('Lang/'.$langs->currentLang.'.php');
///////////////////////////////////////
#endregion 

#region  Log Class define 
///////////////////////////////////////
//        Log Class define           //
///////////////////////////////////////
$log        = new Log();
///////////////////////////////////////
#endregion 

#region  CASE properties     
///////////////////////////////////////
//        CASE properties            //
///////////////////////////////////////
$type       =       (isset($_GET["type"])) ? $_GET["type"] : "";            //---->Case mod
$profile_type       =       (isset($_GET["profile_type"])) ? $_GET["profile_type"] : "";            //---->Case mod
$mod        =       (isset($_GET["mod"])) ? $_GET["mod"] : "";              //---->Case mod
$do         =       (isset($_GET["do"])) ? $_GET["do"] : "";                //---->Case do
$barkod     =       (isset($_GET["barkod"])) ? $_GET["barkod"] : "";        //---->Case do
$to         =       (isset($_GET["to"])) ? $_GET["to"] : "";                //---->Case to
$nov        =       (isset($_GET["nov"])) ? $_GET["nov"] : "";              //---->Case nov
$id         =       (isset($_GET["id"])) ? $_GET["id"] : "";                //---->Case id
$objectid   =       (isset($_GET["objectid"])) ? $_GET["objectid"] : "";    //---->Case objectid
$person_id  =       (isset($_GET["person_id"])) ? $_GET["person_id"] : "";  //---->Case person_id
$sort       =       (isset($_GET["sort"])) ? $_GET["sort"] : "";            //---->Case sort
$by         =       (isset($_GET["by"])) ? $_GET["by"] : "";                //---->Case by
if (isset($_GET["lang"])) {
  $lang = $_GET["lang"];
} elseif (isset($_COOKIE["lang"])) {
  $lang = $_COOKIE["lang"];
} else {
  $lang = "az";
  setcookie("lang", "az", time() + 9993600, '/');
  $_COOKIE["lang"] = "az";} //---->Case Language
///////////////////////////////////////
#endregion 

#region  URL parameter  
///////////////////////////////////////
//        URL parameter              //
///////////////////////////////////////
$urlkod = parse_url($_SERVER['REQUEST_URI']);
$query = (isset($urlkod["query"])) ? $urlkod["query"] : "";
parse_str($query,$out);
unset($out["page_no"]);
unset($out["page_no2"]);
unset($out["lang"]);
$_SERVER['REQUEST_URI'] = $urlkod["path"]."?".http_build_query($out);
///////////////////////////////////////
#endregion 

#region  NextSort
///////////////////////////////////////
//               NextSort            //
///////////////////////////////////////
if($sort == "ASC"){
  $nextsort = "DESC";
}elseif($sort == "DESC"){
  $nextsort = "ASC";
}else{
  $nextsort = "ASC";
}
///////////////////////////////////////
#endregion 

#region  Pagination   
///////////////////////////////////////
//        Pagination                 //
///////////////////////////////////////
$page_no = (isset($_GET['page_no']) && $_GET['page_no']!="") ? $_GET['page_no'] : 1;
$total_records_per_page = 10;
$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";
///////////////////////////////////////
#endregion 

#region  Pagination2   
///////////////////////////////////////
//        Pagination                 //
///////////////////////////////////////
$page_no2 = (isset($_GET['page_no2']) && $_GET['page_no2']!="") ? $_GET['page_no2'] : 1;
$total_records_per_page2 = 10;
$offset2 = ($page_no2-1) * $total_records_per_page2;
$previous_page2 = $page_no2 - 1;
$next_page2 = $page_no2 + 1;
$adjacents2 = "2";
///////////////////////////////////////
#endregion 


#region  DEFINE Security  
///////////////////////////////////////
//        DEFINE Security            //
///////////////////////////////////////
define("IPADDRESS", $ipaddress);
define("USERAGENT", $useragent);
define("ONLINE",    $online);
define("USERID",    $userid);
define("DATE",      $vaxt);
define("YEAR",      $year);
define("GROUP",     $group);
define("GROUPNAME", $groupname);
define("FULLNAME",  $fullname);
define("USERNAME",  $username);
define("UPLOAD",    $upload_dir);
define("PROFILE",    $profile);
define("SAMPLE_LISTS",    $sample_lists);
define("EXPORT_FOLDER",    "export/");
define("IMPORT_FOLDER",    "import/");
///////////////////////////////////////
#endregion 

///////////////////////////////////////
//        RESET NO IN NEW YEAR       //
///////////////////////////////////////
if($syear != YEAR){
  $i = 0;
  while ($i <= count($list->Test_type())) {
    $settinglist["test_no"] = 0;
    $swhere["id"] = $i;
    $db->update("test_type", $settinglist, $swhere);
    $i++;
  }
    $swherea["id"] = 1;
    $settinglista["year"] = YEAR;
    $settinglista["evidence_no"] = 0;
    $db->update("settings", $settinglista, $swherea);
}
///////////////////////////////////////

*/
?>
