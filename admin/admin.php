<?php


include 'core.php';


//include_once 'head.php';
if($do != '' && file_exists('views/'.$do.'.php')){
  include 'header.php';
  include ''.$do.'.php';
  include 'footer.php';
}
