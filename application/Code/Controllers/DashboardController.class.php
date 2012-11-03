<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of DashboardController
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

$doc_root = $_SERVER['DOCUMENT_ROOT'];
include_once $doc_root . '/../application/configs/config.php';

include_once CONTROLLERS.'/ControllerBase.class.php';
include_once REPOSITORY.'/WordRepository.class.php';
include_once DAO.'/WordDao.class.php';
include_once VIEW_MODELS.'/DashboardViewModel.php';
include_once CODE_DIR.'/Helpers.php';

class DashboardController extends ControllerBase
{
    private $_db;
    private $_wordrepo;
    private $_statrepo;
    private $_userrepo;
    
    private $_user;
    
    public function __construct()
    {
        $this->_user = getCurrentUser();
        
        $this->_db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);      
        $this->_wordrepo = new WordRepository(new WordDao($this->_db), $this->_user->getId());

    }
   
    
    public function index()
    {
        $pageindex = 1;
        
        if (isset($_GET["page"]))
            $pageindex = $_GET["page"];
        
        if ($pageindex == null || $pageindex < 1)
            $pageindex = 1;
        
        $user_id = $this->_user->getId();
        
        $words = $this->_wordrepo->getWordsSubsetByUserId($user_id,1,5);
        $larger_set = $this->_wordrepo->getWordsSubsetByUserId($user_id,$pageindex,20);
        $total_count = $this->_wordrepo->getWordsCountByUserId($user_id);
        
        $stats = $this->_wordrepo->getWordsCountTimelineByUserId($user_id);
        
        $dashboardViewModel = new DashboardViewModel($this->_user,$words,$larger_set,$total_count,$stats);
        return $dashboardViewModel;
    }
}

?>
