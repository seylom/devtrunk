<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of WordRepository
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */


include_once 'IWordRepository.interface.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/../application/configs/config.php';
include_once DAO.'/IWordDao.interface.php';

class WordRepository implements IWordRepository 
{
    private $_dao;
    private $_userid;
    
    public function __construct(IWordDao $worddao,$userid)
    {
        $this->_dao = $worddao;
        $this->_userid = $userid;
    }

    public function deleteWord($id) {
        $this->_dao->deleteWordById($id,$this->_userid);
    }

    public function findWord($substr) {
        
    }

    public function getWordById($id) {
        return  $this->_dao->getWordById($id);
    }

    public function getWordByName() {
        
    }

    public function getWords() {
        return $this->_dao->getWords();
    }

    public function getWordsSubset($pageIndex, $pageSize) {
        return  $this->_dao->getWordsSubset($pageIndex, $pageSize);
    }

    public function insertWord($word) {
        return $this->_dao->insertWord($word,$this->_userid);
    }

    public function updateWord($word) {
        return $this->_dao->updateWord($word,$this->_userid);
    }

    public function getWordsSubsetByUserId($userid, $pageIndex, $pageSize) {
       return  $this->_dao->getWordsSubsetByUserId($userid, $pageIndex, $pageSize);
    }
    
    public function getWordsCountByUserId($userid)
    {
        return $this->_dao->getWordsCountByUserId($userid);
    }
    
    public function getWordsByUserId($userid)
    {
        return $this->_dao->getWordsByUserId($userid);
    }

    public function getWordsCountTimelineByUserId($userid) {
         return $this->_dao->getWordsCountTimelineByUserId($userid);
    }
    
   
}

?>
