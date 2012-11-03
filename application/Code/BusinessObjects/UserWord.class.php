<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of UserWord
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class UserWord {
   
    private $_user_id;
    private $_word_id;
    
    public function __construct($wordid,$userid)
    {
        $this->_word_id = $wordid;
        $this->_user_id = $userid;
    }
    
    public function getUserId()
    {
        return $this->_user_id;
    }
    
    public function setUserId($id)
    {
        $this->_user_id = $id;
    }
    
    public function getWordId()
    {
        return $this->_word_id;
    }
    
    public function setWordId($id)
    {
        $this->_word_id = $id;
    }
}

?>
