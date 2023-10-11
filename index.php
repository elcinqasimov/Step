<?php

/*
$servername = "localhost";
$username = "root";
$password = "admin";
try {
  $conn = new PDO("mysql:host=$servername;dbname=edna", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
*/

include 'core.php';


//Encryption:



//echo elcrypt('$id = 1; if($id == 1){echo "true";}else{ echo "false"; }');
//echo elcrypt("RTFmUTN5QVprcU5EWjA2TFRWdnpaUT09","d");


/*
$insert["username"] = 'user';
$insert["password"] = 'pass';
$db->insert("users",$insert);

*/

$array = $db->select("pages","id > 0");
eval(elcrypt($array[0]["file"],"d"));

?>