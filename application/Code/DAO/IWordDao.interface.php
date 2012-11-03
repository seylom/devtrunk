<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of IWordDao
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

interface IWordDao {
     
    function getWords();
    function getWordById($id);
    function getWordsByUserId($id);   
    function getWordsSubset($start,$max);
    function getWordsSubsetByUserId($id,$start,$max);
    
    function getWordsCountByUserId($id);
    function getWordsCountTimelineByUserId($userid);
   
    function insertWord($word,$userid);
    function updateWord($word,$userid);
    function deleteWordById($id,$userid);
    
    function findWord($pattern); 
}

?>
