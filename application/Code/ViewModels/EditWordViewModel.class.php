<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of EditWordViewModel
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class EditWordViewModel {
   
    private $_word;
    
    public function __construct($word)
    {
        $this->_word = $word;
    }
    
    
    public function getWord()
    {
        return $this->_word;
    }
}

?>
