<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of Paging
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class Paging {

	//private $_result;
        private $_pageSize;
        private $_page;
        private $_rs;
        private $_param;
        //private $_db;
         
        private $_numrows;
	
	public function __construct($pageSize, $param,$resultcount) 
	{
            $resultPage = 1;
            
               if (isset($_GET[$param]))
		  $resultPage = $_GET[$param];
               
               if ($resultPage == null)
                   $resultPage = 1;
                
		//$this->_db = $db;
		//$this->_result = $this->_db->execQuery($query);
                
		$this->_pageSize = $pageSize;
		$this->_param = $param;
                $this->_numrows = $resultcount;
		
                if ((int)$resultPage <= 0) {
			$resultPage = 1;
		}
		if ($resultPage > $this->getNumPages()) {
			$resultPage = $this->getNumPages();
		}
                
		$this->setPageNum($resultPage);
	}
	
	private function getNumPages() 
	{
//		if (!$this->_result) {
//			return false;
//		}
		return ceil($this->_numrows/(float)$this->_pageSize);
	}
	
	private function setPageNum($pageNum) 
	{
		if ($pageNum > $this->getNumPages() || $pageNum <= 0) {
			return false;
		}
		$this->_page = $pageNum;
		$this->_rs = 0;
                
		//$this->_db->dataSeek($this->_result,($pageNum-1) * $this->_pageSize);
	}
	
	private function getPageNum()
	{
		return $this->_page;
	}
	
	private function isLastPage() 
	{
		return $this->_page >= $this->getNumPages();
	}	
	
	private function isFirstPage() 
	{
		return $this->_page <= 1;
	}
  
//	public function fetchObject() 
//	{
//		if ($this->_rs >= $this->_pageSize || !$this->_result) {
//			return false;
//		}
//		$this->_rs++;
//		return $this->_db->fetchObject($this->_result);
//	}
//
//	public function fetchArray() 
//	{
//		if ($this->_rs >= $this->_pageSize || !$this->_result) {
//			return false;
//		}
//		$this->_rs++;
//		return $this->_db->fetchArray($this->_result);
//	}
	
	public function getLinks($params = '') 
	{

		$str = '';
		$params = !empty($params) ? "&$params" : '';
		if (!$this->isFirstPage()) {
			$str .= "<span  class='unselected'><a class='pagelink' href=\"?" . $this->_param . "=" . ($this->getPageNum()-1) . '' . $params . '">Back</a></span> ';
		}
		if ($this->getNumPages() > 1) {
			for ($i = 1; $i <= $this->getNumPages(); $i++) {
		 		if ($i==$this->_page) {
					$str .= "<span class='selected'>$i</span>";
		        } else {
		        	$str .= "<span class='unselected'><a class='pagelink' href=\"?" . $this->_param . "={$i}".$params."\">{$i}</a></span> ";
				}
			}
	    if (!$this->isLastPage()) {
				$str .= "<span class='unselected'><a class='pagelink' href=\"?" . $this->_param . "=" . ($this->getPageNum()+1).''.$params.'">Next</a></span>';
			}
		}
		return $str;
	}
	
	public function getNumResult() {
		return $this->_numrows;
	}
}


?>
