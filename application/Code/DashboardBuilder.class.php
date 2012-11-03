<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of DashboardBuilder
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

class DashboardBuilder {
    //put your code here
    
    /**
     * IUser interface.
     * @var type IUser
     */
    private $_user;
    
    private $_words;
    
    private $_stats;
    
    /**
     *
     * @var type DashboardViewModel
     */
    private $_view;
    
    public function __construct(IUser $user)
    {
        $this->_user = $user;
        $this->setup();
    }
    
    /**
     * Set up the dashboard with information such as the current user 
     * His saved words/stats and profile info.
     */
    private function setup()
    {
        //get user words;
        $this->_words = '';
                
        //get user stats;
        $this->_stats = '';
    }
    
    
    private function setupViewModel()
    {
        $this->_view = new DashboardViewModel();
    }
    
    
    public function getViewModel()
    {
        if ($this->view == null)
        {
            setupViewModel();
        }
        
        return $this->_view;
    }
}

?>
