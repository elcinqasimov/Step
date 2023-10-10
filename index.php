<?php
namespace AZCMS;
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

//include 'Classes/Database.php';


//Encryption:
function elcrypt( $string, $action = 'e' ) {
  // you may change these values to your own
  $secret_key = 'elcin1990';
  $secret_iv = 'elcin650';

  $output = false;
  $encrypt_method = "AES-256-CBC";
  $key = hash( 'sha256', $secret_key );
  $iv = substr( hash( 'sha256', $secret_iv ), 0, 16 );

  if( $action == 'e' ) {
      $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
  }
  else if( $action == 'd' ){
      $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
  }

  return $output;
}


echo elcrypt("elcin");
echo elcrypt("RTFmUTN5QVprcU5EWjA2TFRWdnpaUT09","d");


$db 		      = new Database("edna", "root", "admin", "localhost");


$insert["username"] = 'user';
$insert["password"] = 'pass';
$db->insert("users",$insert);

?>