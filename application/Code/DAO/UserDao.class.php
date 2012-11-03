<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/* * *************************************************************
 * Description of UserDao
 *
 * @author SeylomA
 * @copyright 2011 Devtrunk.com
 * @license free
 * @version 1.0
 * @since File available since 2011 V1.0
 * @link http://devtrunk.com
 * ************************************************************* */

require_once 'IUserDao.interface.php';

require_once $_SERVER['DOCUMENT_ROOT'] . '/../application/configs/config.php';

require_once CODE_DIR . '/Helpers.php';
require_once CODE_DIR . '/Database.class.php';
require_once CODE_DIR . '/Query.class.php';

class UserDao implements IUserDao {

    private $_db = null;

    public function __construct(Database $db) {
        $this->_db = $db;
    }

    public function getUserById($id) {
        try {
            $query = new Query();
            $query->select();
            $query->from('dt_users');
            $query->where(array('user_id' => $id));
            return $this->_db->fetchRow($query->getQuery());
        } catch (Exception $ex) {
            return null;
        }
    }

    public function getUserByEmail($email) {
        try {
            $clean_email = sanitize_sql_vars($email, $this->_db->getHandle());
            $query = "SELECT * FROM dt_users WHERE user_email='$clean_email'";

            return $this->_db->fetchRow($query);
        } catch (Exception $ex) {
            return null;
        }
    }

    public function insertUser($email) {
        
        if ($email)
        {
            $email = sanitize_sql_vars($email, $this->_db->getHandle());
            $q = "INSERT INTO dt_users (user_email,active) VALUES('$email',1)";
            
            return $this->_db->execute($q);
        }
    }

}

?>
