<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of WordController
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

include_once $_SERVER['DOCUMENT_ROOT'] . '/../application/configs/config.php';
include_once BUSINESS_OBJECTS.'/Word.class.php';
include_once REPOSITORY.'/WordRepository.class.php';
include_once CONTROLLERS.'/ControllerBase.class.php';


class WordController extends ControllerBase {

    //put your code here

    private $_wordrepo;
    private $_user;
    private $_db;

    public function __construct() {
       parent::__construct();
       $this->setup();
    }

    private function setup() {
        
        include_once DAO.'/WordDao.class.php';
        include_once CODE_DIR.'/Helpers.php';
        include_once CODE_DIR.'/Database.class.php';
        
        //include_once $this->docroot.'/../application/configs/config.php';
        
        $this->_db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);       
        
        $email = $_SESSION['usr_email'];
        $this->_user = getUser($email);
        
        $this->_wordrepo = new WordRepository(new WordDao($this->_db),$this->_user->getId());
    }
    
    public function index($page=1,$size=20)
    {
        include_once VIEW_MODELS.'/YourWordsViewModel.class.php';
        
        $words = $this->_wordrepo->getWordsSubsetByUserId($this->_user->getId(),$page,$size);
        $yourwordsmodel = new yourwordsViewModel($words);
        
        return $yourwordsmodel;       
    }
    
    public function indexAll()
    {
        include_once VIEW_MODELS.'/YourWordsViewModel.class.php';
        
        $words = $this->_wordrepo->getWordsByUserId($this->_user->getId());
        $yourwordsmodel = new yourwordsViewModel($words);
        
        return $yourwordsmodel;       
    }


    /**
     * This method return a view model or data rich in information.
     * @return type 
     */
    public function insertWord() {
        // retrieve the word
        $result = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $wordvalue = $_POST['word'];

            if (!empty($wordvalue)) {
                $wordvalue = strtolower($wordvalue);
                
                $word = new Word();
                $word->setValue($wordvalue);
                
                $definition = '';
                
                if (isset($_POST['autodef'])&& $_POST['autodef'] = 'auto')
                {
                   $definition = $this->getWordDefinition($wordvalue);
                }
                else
                {
                   $definition = $_POST['word_def'];
                }
               
                $word->setDescription($definition);
         
                $result = $this->_wordrepo->insertWord($word);
            }
        }
        
        return $result;
    }
    
    public function deleteWord()
    {
        //retrieve wordid
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $wordid = $_POST['id'];
            $result = $this->_wordrepo->deleteWord($wordid);
            
            return $result;
        }
        
        return false;
    }
    
    public function editWord($wordid)
    {
        include_once VIEW_MODELS.'/EditWordViewModel.class.php';
        
        $word = $this->_wordrepo->getWordById($wordid);
        
        $viewmodel = new EditWordViewModel($word);
        
        return $viewmodel;
    }
    
    public function updateWord()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $wordid = $_POST['wordid'];
            $wordvalue = $_POST['word'];
            $wordvalue = strtolower($wordvalue);
            $word = new Word();
            $word->setId($wordid);
            $word->setValue($wordvalue);
            
            if (isset($_POST['autodef'])&& $_POST['autodef'] = 'auto')
            {
               $definition = $this->getWordDefinition($wordvalue);
            }
            else
            {
               $definition = $_POST['word_def'];
            }

            $word->setDescription($definition);
            
            $result = $this->_wordrepo->updateWord($word);
            
            return $result;
        }
        
        return false;
    }
    
    
    
    public function updateDefinitions()
    {

        $words = $this->_wordrepo->getWordsByUserId($this->_user->getId());

        if ($words)
        {
            foreach($words as $word)
            {
                $definition = $this->getWordDefinition($word->getValue());
                if ($definition)
                {
                    //update word description
                    $word->setDescription($definition);
                    $this->_wordrepo->updateWord($word);
                }
            }
        }
    }
    
    
    private function getWordDefinition($word)
    {
        include_once CODE_DIR.'/Wordnik.php';
        
        $wordnik = Wordnik::instance(WORDNIK_API_KEY);

        $def = $wordnik->getDefinitions($word,1);
        
        if ($def)
        {
            return  $def[0]->text;
        }
        else
        {
            echo $word.' definition not found!</br>';
        }
        return '';
    }
}

?>
