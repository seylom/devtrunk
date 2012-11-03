<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];
 
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
    $pathInfo = pathinfo($currentPath);
 
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];
 
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
 
    // return: http://localhost/myproject/
    return $protocol.$hostName.$pathInfo['dirname']."/";
}

function relativeToAbsolute($rel, $base)
{
    /* return if already absolute URL */
    if (parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
   
    /* queries and anchors */
    if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
   
    /* parse base URL and convert to local variables:
       $scheme, $host, $path */
    extract(parse_url($base));
 
    /* remove non-directory element from path */
    $path = preg_replace('#/[^/]*$#', '', $path);
 
    /* destroy path if relative url points to root */
    if ($rel[0] == '/') $path = '';
   
    /* dirty absolute URL */
    $abs = "$host$path/$rel";
 
    /* replace '//' or '/./' or '/foo/../' with '/' */
    $re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
    for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}
   
    /* absolute URL is ready! */
    return $scheme.'://'.$abs;
}

function get_autogen_id()
{  
    return md5(uniqid(microtime()) . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']); 
}


function sanitize_sql_vars($var,$dbHandle) 
{
    $var=trim($var); 
    $var=strip_tags($var);
    
    // STRIP SLASHES IF MAGIC QUOTES IS ON IN INI SETTINGS
    if (get_magic_quotes_gpc()) 
    {
        $var = stripslashes($var);
    } 
    
    if ($dbHandle)
    {
        $var = mysqli_real_escape_string($dbHandle,$var);  
    }
    
    return $var;
}


function getUser($email) 
{

    if (!$email) 
        return false;

    require_once 'Database.class.php' ;
    require_once 'Repository/UserRepository.class.php'  ;
    require_once 'DAO/UserDao.class.php' ;
    require_once 'Membership/User.class.php';

    $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

    $userdao = new UserDao($db);
    $user = new User(new UserRepository($userdao),$email);

    return $user;

}

function getCurrentUser()
{
    if (isset($_SESSION['usr_email']))
    {
        $email = $_SESSION['usr_email'];
        return getUser($email);
    }
    
    return null;
}

?>
