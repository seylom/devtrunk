<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBHelper
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 */

class DBHelper
{   
    public function __construct()
    {
        
    }
    
    public static function connect($server,$username,$password,$database)
    {
        return mysqli_connect($server,$username,$password,$database);
    }
     
    public static function query($conn,$query)
    {
        return mysqli_query($conn,$query);
    }
    
    public static function fetchCount($conn,$query)
    {
        $res =  mysqli_query($conn,$query);
        
        if (!$res)
            return false;
            
        $row = mysqli_fetch_row($res);
        
        return $row[0];
    }
    
    public static function fetchRow($conn,$query)
    {
        //return single row
        $rows = mysqli_query($conn, $query);

        if (!$rows) {
           return false;   
        }

        $row = mysqli_fetch_assoc($rows);
           
        return $row;
    }  
    
    public static function fetchRows($conn,$query)
    {
        $rows = mysqli_query($conn, $query);

        
        if (!($rows)) {
           return false;   
        }
           
        return $rows;
    }  
}

?>
