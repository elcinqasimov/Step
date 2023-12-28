<?php

    if($_POST["submit"] == "register"){
        unset($_POST["submit"]);
        unset($_POST["password2"]);
        $_POST["password"] = hash('sha256', $_POST["password"]);
        $_POST["regdate"] = $vaxt;
        $_POST["online"] = $vaxt;
        $_POST["referans"] = $referans;
        $_POST["ip"] = $_SERVER['REMOTE_ADDR'];
        $db->insert("users",$_POST);
        $regid = $db->id();
        $_SESSION["userid"] = $regid;
        if($_POST["referans"] != ""){
            header('Location: ?do=camps&referans='.$_POST["referans"]);
        }else{
            header('Location: ?do=camps');
        }
    }    

    ?>