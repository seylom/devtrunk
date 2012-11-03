<?php

include_once 'inc/dash.inc.php';
include_once CONTROLLERS.'/WordController.class.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $controller = new WordController();
    $ins_result = $controller->deleteWord();
    
    header('location: dashboard.php');
    
//    if ($ins_result)
//    {
//        header('location: dashboard.php');
//    }
//    else
//    {
//       
//    }
}
?>