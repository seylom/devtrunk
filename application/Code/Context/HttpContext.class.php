<?php

/**
 * Represent a request context class.
 * 
 * 
 */
class HttpContext
{
    /**
     * Request object 
     * @var type 
     */
    private $_request;
    
    /**
     * response object
     * @var type 
     * 
     */
    private $_response;
    
    /**
     *  the current context
     * @var type 
     */
    private $_current;
    
    /**
     *Iprincipal, the user 
     * @var type 
     */
    private $_user;
    
    private function __construct()
    {
        //$this->$_current =  new HttpContext();
    }
    
    
    public function getCurrentContext()
    {
        if(!isset($this->$_current))
        {
           $this->$_current = new HttpContext();
        }
        
        return $this->$_current;
    }
    
    public function getUser()
    {
        return $this->$_user;
    }
    
    public function setUser($iprincipalUser)
    {
        $this->$_user = $iprincipalUser;
    }
}
?>
