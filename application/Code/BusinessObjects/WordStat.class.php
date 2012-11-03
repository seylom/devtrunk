<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of WordStat
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class WordStat {
    //put your code here
    
    
    private $_total;
    private $_date;
    
    public function __construct()
    {
        
    }
    
    public function getTotal()
    {
        return $this->_total;
    }
    
    public function setTotal($total)
    {
        $this->_total = $total;
    }
        
    public function getDate()
    {
        return $this->_date;
    }
    
    public function setDate($date)
    {
        $this->_date = $date;
    }
    
}

?>
