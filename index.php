<?php


include 'core.php';


//include_once 'head.php';
if($do != '' && file_exists('views/'.$do.'.php')){
  include 'views/header.php';
  include 'views/'.$do.'.php';
  include 'views/footer.php';
}else{
  include 'main.php';
}


//include_once 'footer.php';


//Encryption:



//echo elcrypt('$id = 1; if($id == 1){echo "true";}else{ echo "false"; }');
//echo elcrypt("RTFmUTN5QVprcU5EWjA2TFRWdnpaUT09","d");


/*
$insert["username"] = 'user';
$insert["password"] = 'pass';
$db->insert("users",$insert);

*/
/*
$array = $db->select("pages","id > 0");
eval(elcrypt($array[0]["file"],"d"));
*/
?>