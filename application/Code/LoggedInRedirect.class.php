<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of LoginRedirectCheck
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class LoggedInRedirect
{
    public function __construct()
    {
//        if (!$this->isLoggedIn())
//        {
//            require_once(realpath(dirname(__FILE__).'../../../configs/config.php'));
//            
//            header('location: '.LOGIN_PAGE);
//        }
    }
    
    public function isLoggedIn()
    {
        if (!isset($_SESSION['usr']))
        {
            return false;
        }
        else
        {
            return true;
        }
    }
}

?>
