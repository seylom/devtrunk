<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of SiteSettings
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

  class SiteSettings
  {
      
      private $_baseUrl; // base url of the website 
      private $_imagesCDN;  // CDN base url for all sites images
        
      public function __construct($settingsFile)
      {
          $this->_load_settings($settingsFile);
      }
      
      private function _load_settings($settingsFile)
      {
          
      }
      
      public function getUrl()
      {
          return $this->_baseUrl;
      }
      
      public function setUrl($url)
      {
          $this->_baseUrl = $url;
      }
      
      public function getImagesCDN()
      {
          return $this->imagesCDN;
      }
      
      public function setImagesCDN($imagesCDN)
      {
          $this->_imagesCDN = $imagesCDN;
      }
     
  }

?>
