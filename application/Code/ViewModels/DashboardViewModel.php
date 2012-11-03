<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of DashboardViewModel
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class DashboardViewModel {
    //put your code here
    
    
    public $words;
    private $_words_largeset;
    private $_stats;
    private $_user;
    private $_totalwords;
    
    public function __construct($user,$words,$largeset,$total,$stats)
    {
        $this->words = $words;
        $this->_words_largeset = $largeset; 
        $this->_totalwords = $total;
        $this->_stats = $stats;
        $this->_user = $user;
             
    }
    
    public function getWords()
    {
        return $this->_words;
    }
    
    public function getWordLargeSet()
    {
        return $this->_words_largeset;
    }
    
    public function getStats()
    {
        return $this->_stats;
    }
    
    
    public function getTotalWords()
    {
        return $this->_totalwords;
    }
    
}

?>
