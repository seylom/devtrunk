<?php

    if(!isset($_SESSION))
    {
        session_start();
    }  

    ob_Start();
    
    include_once  $_SERVER['DOCUMENT_ROOT'].'/../application/configs/config.php';
    
    include_once CODE_DIR.'/LoggedInRedirect.class.php';
    
    $loggedInRedirect = new LoggedInRedirect();
    if (!$loggedInRedirect->isLoggedIn())
    {
        header('location: login.php');
    }
    
    //load dashboard 
?>
