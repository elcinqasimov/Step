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
$textpreg = '/select|FROM|SELECT|UNION|union|update|UPDATE|delete|DELETE|from|WHERE|where|INNER|inner|OR|\'|>|<|join/';
$hackmessage = '
  <style>
  @font-face {
    font-family: Clip;
    src: url("assets/fonts/Clip.ttf");
  }
  
  body {
    background-color: #141114;
    background-image: linear-gradient(335deg, black 23px, transparent 23px),
      linear-gradient(155deg, black 23px, transparent 23px),
      linear-gradient(335deg, black 23px, transparent 23px),
      linear-gradient(155deg, black 23px, transparent 23px);
    background-size: 58px 58px;
    background-position: 0px 2px, 4px 35px, 29px 31px, 34px 6px;
  }
  
  .sign {
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50%;
    height: 50%;
    background-image: radial-gradient(
      ellipse 50% 35% at 50% 50%,
      #6b1839,
      transparent
    );
    transform: translate(-50%, -50%);
    letter-spacing: 2;
    left: 50%;
    top: 50%;
    font-family: "Clip";
    text-transform: uppercase;
    font-size: 6em;
    color: #ffe6ff;
    text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
      -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
      0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
    animation: shine 2s forwards, flicker 3s infinite;
  }
  
  @keyframes blink {
    0%,
    22%,
    36%,
    75% {
      color: #ffe6ff;
      text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
        -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
        0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
    }
    28%,
    33% {
      color: #ff65bd;
      text-shadow: none;
    }
    82%,
    97% {
      color: #ff2483;
      text-shadow: none;
    }
  }
  
  .flicker {
    animation: shine 2s forwards, blink 3s 2s infinite;
  }
  
  .fast-flicker {
    animation: shine 2s forwards, blink 10s 1s infinite;
  }
  
  @keyframes shine {
    0% {
      color: #6b1839;
      text-shadow: none;
    }
    100% {
      color: #ffe6ff;
      text-shadow: 0 0 0.6rem #ffe6ff, 0 0 1.5rem #ff65bd,
        -0.2rem 0.1rem 1rem #ff65bd, 0.2rem 0.1rem 1rem #ff65bd,
        0 -0.5rem 2rem #ff2483, 0 0.5rem 3rem #ff2483;
    }
  }
  
  @keyframes flicker {
    from {
      opacity: 1;
    }
  
    4% {
      opacity: 0.9;
    }
  
    6% {
      opacity: 0.85;
    }
  
    8% {
      opacity: 0.95;
    }
  
    10% {
      opacity: 0.9;
    }
  
    11% {
      opacity: 0.922;
    }
  
    12% {
      opacity: 0.9;
    }
  
    14% {
      opacity: 0.95;
    }
  
    16% {
      opacity: 0.98;
    }
  
    17% {
      opacity: 0.9;
    }
  
    19% {
      opacity: 0.93;
    }
  
    20% {
      opacity: 0.99;
    }
  
    24% {
      opacity: 1;
    }
  
    26% {
      opacity: 0.94;
    }
  
    28% {
      opacity: 0.98;
    }
  
    37% {
      opacity: 0.93;
    }
  
    38% {
      opacity: 0.5;
    }
  
    39% {
      opacity: 0.96;
    }
  
    42% {
      opacity: 1;
    }
  
    44% {
      opacity: 0.97;
    }
  
    46% {
      opacity: 0.94;
    }
  
    56% {
      opacity: 0.9;
    }
  
    58% {
      opacity: 0.9;
    }
  
    60% {
      opacity: 0.99;
    }
  
    68% {
      opacity: 1;
    }
  
    70% {
      opacity: 0.9;
    }
  
    72% {
      opacity: 0.95;
    }
  
    93% {
      opacity: 0.93;
    }
  
    95% {
      opacity: 0.95;
    }
  
    97% {
      opacity: 0.93;
    }
  
    to {
      opacity: 1;
    }
  }
  </style>
  <body>
  <div class="sign">
    <span class="fast-flicker">Qa</span>sim<span class="flicker">ov</span>&nbsp;&nbsp;STUDIO
  </div>
</body>
';


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
include 'includes/Database.php';
include 'includes/Users.php';
include 'includes/Siyahilar.php';
include 'includes/Jobs.php';
include 'includes/Test.php';
include 'includes/Objects.php';
include 'includes/Samples.php';
include 'includes/functions.php';
include 'includes/WriteTag.php';
include 'includes/settings.php';
include 'includes/Log.php';
include 'includes/Sifrele.php';
include 'includes/Language.php';
include 'includes/Persons.php';
include 'includes/Profile.php';
include 'includes/export.php';
///////////////////////////////////////
#endregion 

#region  CLASS includes  
///////////////////////////////////////
//        CLASS includes             //
///////////////////////////////////////
$db 		      = new Database("edna", "root", "admin", "localhost");
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


?>
