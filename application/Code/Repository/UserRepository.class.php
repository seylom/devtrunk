<?php

/* * *************************************************************
 * Description of UserRepository
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

require_once 'IUserRepository.interface.php';

class UserRepository implements IUserRepository {
    //put your code here
    
    private $_dao;
    
    public function __construct(IUserDao $userdao)
    {
          $this->_dao = $userdao;
    }
    
    public function findByEmail($email) {
       return $this->_dao->getUserByEmail($email);
    }
    public function findById($id) {
       return $this->_dao->getUserById($id);
    }
    
    public function insertUser($email)
    {
        return $this->_dao->insertUser($email);
    }
}

?>
