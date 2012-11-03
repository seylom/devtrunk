<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of Database
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

include_once 'DBHelper.class.php';

class Database  
{
    private $_name;
    private $_username;
    private $_password;
    private $_server;
    
    private $_connection = null;
    
    
    private $_lastError;
    
    
    public function __construct($host,$username,$password,$databasename)
    {
        $this->_server = $host;
        $this->_username = $username;
        $this->_password = $password;
        $this->_name = $databasename;
        
        $this->setup();
    }
    
    private function setup()
    {
       $this->_connection = mysqli_connect($this->_server,$this->_username,$this->_password,$this->_name);
    }
    
    public function getHandle()
    {
        return $this->_connection;
    }
    
    public function execute($query)
    {
        DBHelper::query($this->_connection, $query);
        
        $result =  mysqli_affected_rows($this->_connection) > 0;
        
        if (!$result)
        {
            $this->_lastError = mysqli_error($this->_connection);
        }
        
        return $result;
    }
    
    public function fetchCount($query)
    {
        return DBHelper::fetchCount($this->_connection, $query);
    }
       
    public function fetchRow($query)
    {
        return DBHelper::fetchRow($this->_connection,$query);
    }
    
    public function fetchRows($query)
    {
        $result = DBHelper::fetchRows($this->_connection,$query);
         
        if (!$result)
        {
            $this->_lastError = mysqli_error($this->_connection);
        }
        
        return $result;
    }
   
    public function getError()
    {
        return $this->_lastError;
    }
    
}

?>
