<?php

    include_once '../application/configs/config.php';
    include_once CODE_DIR.'/GoogleOpenID.php';
    include_once CODE_DIR.'/Helpers.php';
    
   
    $returnUrl = SERVER_URL.'/finish_auth.php'; //relativeToAbsolute('finish_auth.php',getBaseUrl());
    
    $googleLogin = GoogleOpenID::createRequest($returnUrl,null,true);
    $googleLogin->redirect();
       
?>
