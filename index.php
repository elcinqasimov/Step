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



echo elcrypt("elcin");
echo elcrypt("RTFmUTN5QVprcU5EWjA2TFRWdnpaUT09","d");




$db 		      = new Database("edna", "root", "admin", "localhost");

/*
$insert["username"] = 'user';
$insert["password"] = 'pass';
$db->insert("users",$insert);

*/

$array = $db->select("users","id > 1");

print_r($array);

?>