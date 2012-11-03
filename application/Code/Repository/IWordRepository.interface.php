<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of IWordRepository
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */
interface IWordRepository {
   
    function getWordById($id);
    function getWordByName();
    function getWords();
    function getWordsSubset($pageIndex,$pageSize);
    function getWordsSubsetByUserId($userid,$pageIndex,$pageSize);
    function getWordsCountByUserId($userid);
    
    public function getWordsCountTimelineByUserId($userid);
    
    function getWordsByUserId($userid);
    
    function insertWord($word);    
    function updateWord($word);
    function deleteWord($id);
    
    function findWord($substr);
}

?>
