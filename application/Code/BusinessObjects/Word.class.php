<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of Word
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class Word {
    
    private $_id;
    private $_value;
    private $_description;
    private $_user_added_date;
    
    private $user_id;
    
    public function __construct()
    {
        
    }
    
    public function getId()
    {
        return $this->_id;
    }
    
    public function setId($id)
    {
        $this->_id = $id;
    }
    
    public function getValue()
    {
        return $this->_value;
    }
    
    public function setValue($value)
    {
        $this->_value = $value;
    }
    
    public function getDescription()
    {
        return $this->_description;
    }
    
    public function setDescription($description)
    {
        $this->_description = $description;
    }  
    
    
    public function setAddedDate($date)
    {
        $this->_user_added_date = $date;
    }
    
    public function getAddedDate()
    {
        return $this->_user_added_date;
    }
}

?>
