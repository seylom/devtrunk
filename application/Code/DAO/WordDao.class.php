<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of WordDao
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */


require_once 'IWordDao.interface.php';


require_once  $_SERVER['DOCUMENT_ROOT'] . '/../application/configs/config.php';

require_once CODE_DIR . '/Helpers.php';
require_once CODE_DIR . '/Database.class.php';
require_once CODE_DIR . '/Query.class.php';
require_once BUSINESS_OBJECTS . '/Word.class.php';
require_once BUSINESS_OBJECTS . '/WordStat.class.php';

class WordDao  implements IWordDao
{    
    private $_db = null;
    private $_errorLog;

    public function __construct(Database $db) {
        $this->_db = $db;
    }

    public function deleteWordById($id,$userid) {
        try {
            $id = sanitize_sql_vars($id, $this->_db->getHandle());
            $userid = sanitize_sql_vars($userid, $this->_db->getHandle());
            
            $q1 = "SELECT COUNT(*) FROM dt_userwords WHERE word_id='$id' AND user_id='$userid'";
            $res = $this->_db->fetchCount($q1);
            
            if ($res>1)
            {
               $q2 = "DELETE FROM dt_userwords WHERE user_id='$userid' AND word_id='$id'";
               $this->_db->execute($q2);
            }
            else if ($res> 0)
            {
                $q2 = "DELETE FROM dt_userwords WHERE user_id='$userid' AND word_id='$id'";
                $this->_db->execute($q2);
               
                $q3 = "DELETE FROM dt_words WHERE word_id ='$id'";
                $this->_db->execute($q3);
            }      
            
        } catch (Exception $ex) {
            return null;
        }
    }

    public function findWord($pattern) {
        
    }

    public function getWordById($id) {
         try {
            $id = sanitize_sql_vars($id, $this->_db->getHandle());
            $query = "SELECT * FROM dt_words WHERE word_id='$id'";

            $row = $this->_db->fetchRow($query);
            
            if ($row)
            {
              $word = new Word();
              $word->setId($row['word_id']);
              $word->setValue($row['word_value']);
              $word->setDescription($row['description']);
             
              return $word;
            }
        } catch (Exception $ex) {
            return null;
        }
    }

    public function getWords() {

       $query = "SELECT * FROM dt_words";
       $res = $this->_db->fetchRows($query); 
       
       $resultsArray = buildWordArray($res);
       
//     $resultsArray = array();
//       if ($res)
//       {
//          while($row = mysqli_fetch_assoc($res))
//          {
//              $word = new Word();
//              $word->setId($row['word_id']);
//              $word->setValue($row['word_value']);
//              $word->setDescription($row['description']);
//              
//              array_push($resultsArray,$word);
//          }
//       }
       
       return $resultsArray;
    }

    public function getWordsSubset($start, $maxperpage) {
       
       $maxperpage = (!$maxperpage) ? 20 : $maxperpage;       
       $offset = ($start -1)*$maxPerPage;
       $query = sprintf("SELECT * FROM dt_words LIMIT %s,%s",$offset,$maxperpage);
       
       return $this->_db->fetchRows($query);
    }
    
    public function getWordsByUserId($userid) {
       
       $userid = sanitize_sql_vars($userid, $this->_db->getHandle());
       
       $query_words = "SELECT dt_words.word_id,word_value,description,dt_userwords.added_date 
              FROM dt_words INNER JOIN dt_userwords
               ON (dt_words.word_id = dt_userwords.word_id AND dt_userwords.user_id='$userid')  
               WHERE user_id ='$userid'";
         
       $resultset = $this->_db->fetchRows($query_words);
       
       if ($resultset)
       {
         $resarray = $this->buildWordArray($resultset);
         return $resarray;
       }
       
       return null;
    }

    public function getWordsSubsetByUserId($id, $start, $maxperpage) {
        
       $maxperpage = (!$maxperpage) ? 20 : $maxperpage;       
       $offset = ($start -1)*$maxperpage;
       
       $id = sanitize_sql_vars($id, $this->_db->getHandle());
       
       $query_words = "SELECT dt_words.word_id,word_value,description,dt_userwords.added_date 
              FROM dt_words INNER JOIN dt_userwords
               ON (dt_words.word_id = dt_userwords.word_id AND dt_userwords.user_id='$id')  
               WHERE user_id ='$id' LIMIT $offset,$maxperpage";  
       
       $resultset = $this->_db->fetchRows($query_words);
           
       if ($resultset)
       {
         $resarray = $this->buildWordArray($resultset);
         return $resarray;
       }
       
       return null;
    }
    
    public function getWordsCountByUserId($userId)
    {
        $userId = sanitize_sql_vars($userId, $this->_db->getHandle());
        
        $query = "SELECT COUNT(*) FROM dt_userwords WHERE user_id='$userId'";
        return $this->_db->fetchCount($query);
    }
    
    public function insertWord($word,$userid) {
        if ($word == null)
            return;
        
        $userid = sanitize_sql_vars($userid, $this->_db->getHandle());
        
        $wordval = $word->getValue();
          
        $qf = "SELECT word_id FROM dt_words WHERE word_value='$wordval'";
        $res =  $this->_db->fetchRow($qf);
        
        if ($res) //the word was already added by a user.
        {
            
            $success = false;
            $wordid = $res['word_id'];
            // make sure the current user also has a link to the word.
            $quser = "SELECT user_id FROM dt_userwords WHERE word_id='$wordid'";
            $res = $this->_db->fetchRow($quser);
            
            if ($res['user_id'] != $userid)
            {       
                $qjunc = "INSERT INTO dt_userwords (user_id,word_id) VALUES('$userid','$wordid')";
                $success = $this->_db->execute($qjunc);
            }
            
            $newval = $word->getValue();
            $description = $word->getDescription();
            $newval = sanitize_sql_vars($newval, $this->_db->getHandle());
            $qup = "UPDATE dt_words SET word_value='$newval', description='$description' WHERE word_id='$wordid'";

            $success = $this->_db->execute($qup);

            return $success;
        }
        else
        {
            //add word
            $desc = $word->getDescription();
            
            $desc = ($desc == null)? $wordval:$desc;
            
            //sanitize values
            $desc = sanitize_sql_vars($desc, $this->_db->getHandle());
            $wordval = sanitize_sql_vars($wordval, $this->_db->getHandle());
            $word_id = NULL;
            
            $query = "INSERT INTO dt_words (word_value,description) VALUES('$wordval','$desc')";
            
            $success = $this->_db->execute($query);

            if($success)
            {
               $newid = mysqli_insert_id($this->_db->getHandle());
               $junc = "INSERT INTO dt_userwords (user_id,word_id) VALUES('$userid','$newid')";
                    
               $success = $this->_db->execute($junc);
            }
            else
            {
                $this->_errorLog = $this->_db->getError();
                
                //echo $this->_errorLog;
            }
            
            if (!$success)
            {
                $this->_errorLog = $this->_db->getError();
                
                
                //echo $this->_errorLog;
            }
            
            return $success;
        }
    }

    public function updateWord($word,$userid) {
        
        $userid = sanitize_sql_vars($userid, $this->_db->getHandle());
        
        if ($this->linkCountByWordId($userid,$word->getId()))
        {         
           //does anybody else has a link to the word?
           // if so just create a new word
           $wordid = $word->getId();
           $q = "SELECT COUNT(*) FROM dt_userwords WHERE user_id<>'$userid' AND word_id='$wordid'";
           $num =  $this->_db->fetchCount($q);
           
           if ($num > 0)
           {
               //Create a new word
               return $this->insertWord($word, $userid);
           }
           else
           {
               $newval = $word->getValue();
               $description = $word->getDescription();
               $newval = sanitize_sql_vars($newval, $this->_db->getHandle());
               $description = sanitize_sql_vars($description, $this->_db->getHandle());
               
               $qup = "UPDATE dt_words SET word_value='$newval', description='$description' WHERE word_id='$wordid'";
               return $this->_db->execute($qup);
           }
        }
        
        return false;
    }
       
    private function linkCountByWordId($userId,$wordId)
    {
        $query = "SELECT COUNT(*) FROM dt_userwords WHERE user_id='$userId' AND word_id='$wordId'";
        return $this->_db->fetchCount($query);
    }
    
    
    private function buildWordArray($sqlresultset)
    {
       $resultsArray = array();
       if ($sqlresultset)
       {
          while($row = mysqli_fetch_assoc($sqlresultset))
          {
              $word = new Word();
              $word->setId($row['word_id']);
              $word->setValue($row['word_value']);
              $word->setDescription($row['description']);
              $word->setAddedDate($row['added_date']);
              
              array_push($resultsArray,$word);
          }
          
          return $resultsArray;
       }
       
       return null;
    }
    
    private function buildWordCountArray($sqlresultset)
    {
       $resultsArray = array();
       if ($sqlresultset)
       {
          while($row = mysqli_fetch_assoc($sqlresultset))
          {
              $word = new Word();
              $word->setId($row['word_id']);
              $word->setValue($row['word_value']);
              $word->setDescription($row['description']);
              $word->setAddedDate($row['added_date']);
              
              array_push($resultsArray,$word);
          }
          
          return $resultsArray;
       }
       
       return null;
    }
    
    
    public function getWordsCountTimelineByUserId($userid)
    {
        $userid = sanitize_sql_vars($userid, $this->_db->getHandle());
        
        $q = "SELECT DATE(added_date) AS cdate,COUNT(*) as num FROM dt_userwords WHERE user_id= '$userid' GROUP BY cdate";
        $result = $this->_db->fetchRows($q);
        
        $arrayRes = array();
        if ($result)
        {
            while($row = mysqli_fetch_assoc($result))
            {
               $stat = new WordStat();
               $stat->setDate($row['cdate']);
               $stat->setTotal($row['num']);
               array_push($arrayRes,$stat);
            }
           
            return $arrayRes;
        }
        
        return false;
    }

    
    public function getError()
    {
        return $this->_errorLog;
    }

}

?>
