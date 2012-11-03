<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of yourwordsViewModel
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class yourwordsViewModel {
      
    private $_words;

    public function __construct($words)
    {
        $this->_words = $words;
    }
    
    public function getWords()
    {
        return $this->_words;
    } 
}

?>
