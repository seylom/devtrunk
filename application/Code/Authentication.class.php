<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Provide a mean for authentication the user
 * Currently Rusty and I chose to only support the OpenID protocol
 * 
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

include_once $_SERVER['DOCUMENT_ROOT'].'/../application/Configs/config.php' ;
include_once $_SERVER['REPOSITORY'].'/UserRepository.class.php' ;

include_once 'Helpers.php' ;

class Authentication 
{ 
    public static function Authenticate() {
        
        include_once 'GoogleOpenID.php';
        
        $user_id;// user id int the database
        $user_email;//user email address

        $googleLogin = GoogleOpenID::getResponse();
        if ($googleLogin->success()) {
            $user_id = $googleLogin->identity();
            $user_email = $googleLogin->email();

            //store session info for the current user
            $_SESSION['usr'] = get_autogen_id();
            $_SESSION['usr_auth'] = 1;
            $_SESSION['usr_email'] = $user_email;

            $user = getUser($user_email);

            if ($user->getId() == null) {
                
                DAO.'/UserDao.class.php' ;
                CODE_DIR.'/Database.php' ;
                
                $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
                $repo = new UserRepository(new UserDao($db));
                
                $result = $repo->insertUser($user_email);
                
                return result;
            }
            
        } else {
            return false;
        }
    }

//    private static function get_user($email) {
//
//        if (!$email) {
//            return false;
//        }
//        
//        require 'Database.class.php' ;
//        require 'Repository/UserRepository.class.php'  ;
//        require 'Dao/UserDao.class.php' ;
//        require 'Membership/User.class.php';
//        
//        $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
//        
//        $userdao = new UserDao($db);
//        $user = new User(new UserRepository($userdao),$email);
//        
//        
//        return $user;
//
////        $dbc = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_DATABASE);
////
////        if (!$dbc) {
////            exit('Connection Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
////        }
////
////        mysqli_set_charset($dbc, 'utf-8');
////
////        $userquery = "SELECT * FROM dt_users WHERE user_email='" . $email . "'";
////
////        $users = mysqli_query($dbc, $userquery);
////
////        if (mysqli_num_rows($users) < 1) {
////
////            //add user to database
////            $addqry = 'INSERT INTO dt_users(user_email,active,last_activity) VALUES(' . $email . ',1,CURDATE())';
////
////            $result = mysli_query($dbc, $addqry);
////
////            if (!mysqli_insert_id()) {
////                return false;
////            }
////        }
////
////        $row = mysqli_fetch_row($users);
////
////        mysqli_free_result($users);
//    }
}


?>
