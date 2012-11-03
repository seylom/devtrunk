<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of ControllerBase
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class ControllerBase {
     
    public $docroot;
    
    public function __construct()
    {
        $this->docroot = $_SERVER['DOCUMENT_ROOT'];
    }
}

?>
