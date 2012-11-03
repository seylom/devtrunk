<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of User
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

$code_dir = $_SERVER['DOCUMENT_ROOT'].'/../application/Code';

require_once $code_dir.'/Repository/IUserRepository.interface.php';

class User {
    //put your code here
    
    private $_id;
    private $_email;
    private $_active;
    private $_last_activity;
    
    private $_profile;
    
    public function __construct(IUserRepository $repository,$email)
    {
        //fetch the user
        $row = $repository->findByEmail($email);
        $this->_id = $row['user_id'];
        $this->_email = $email;
        $this->_last_activity = $row['last_activity'];
        $this->_active = $row['active'];
    }
      
    public function getId()
    {
        return $this->_id;
    }
     
    public function setId($id)
    {
        $this->_id = $id;
    }
    
    public function getEmail()
    {
        return $this->_email;
    }
    
    public function setEmail($email)
    {
        $this->_email = $email;
    }
    
    public function getProfile()
    {
        return $this->_profile;
    }
    
    public function setProfile($profile)
    {
        $this->_profile = $profile;
    }
}

?>
