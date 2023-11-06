<?php
include_once 'core.php';
        unset($_SESSION['userid']);
        unset($_SESSION['fullname']);
        unset($_SESSION['mail']);
        header('Location: index.php');
?>