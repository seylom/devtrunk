<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of Membership
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class Membership
{   
    public function __construct()
    {

    }
      
    public static function createUser($user_email)
    {
        $dbc = mysqli_connect('','','','');
    }

    public static function updateUser($user,$user_info)
    {

    }

    public static function deleteUser($user)
    {

    }

    public static function getUser($email)
    {

    }    
}

?>
