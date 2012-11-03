<?php

session_start();

// if the user is already authenticated, redirect
if(isset($_SESSION['usr']))
{
    header('location: dashboard.php');
}

require_once '../application/configs/config.php';
//require_once '../resources/common.php';
//require_once '../resources/library/googleopenid.php';

include CODE_DIR.'/Authentication.class.php';

Authentication::Authenticate();

header('location: dashboard.php');

?>
