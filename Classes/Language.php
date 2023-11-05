<?php

    header('Cache-control: private'); // IE 6 FIX
    if(isset($_GET['lang']))
    {
        $l = $_GET['lang'];
        // register the session and set the cookie
        $_SESSION['lang'] = $l;
        setcookie("lang", $l, time() + (3600 * 24 * 30));
    }
    else if(isset($_SESSION['lang']))
    {

        $l = $_SESSION['lang'];
    }
    else if(isset($_COOKIE['lang']))
    {
        $l = $_COOKIE['lang'];
    }
    else
    {
        $l = 'en';
    }
    switch ($l) {
          case 'en':
          //English
          $lang_file = 'en.php';
          break;
          case 'az':
          //Az
          $lang_file = 'az.php';
          break;
          case 'rus':
          //Russian
          $lang_file = 'rus.php';
          break;
          
          case 'tr':
          //Turkish
          $lang_file = 'hi.php';
          break;
          
        // Default English
          default:
          $lang_file = 'en.php';
    }
    include_once 'Lang/'.$lang_file;
?>