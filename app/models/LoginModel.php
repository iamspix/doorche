<?php

/**
 * LoginModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LoginModel {

/**
 * @var String username - user account identifier
 * @var String password - access key of the user, maybe hashed -> further improvement
 * @var String user_agent - the type of browser the user is using
 * @var String ip_address - user's machine ip address
 * @var String session_id - randomly generated 64-character string, unique and hashed
 */
    private $username;
    private $password;
    private $user_agent;
    private $ip_address;
    private $session_id;
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setPassword($password) {
        // hash me, encrypt me ? or no , hash me in the model
        $this->password = $password;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setUserAgent($user_agent) {
        $this->user_agent = $user_agent;
    }
    
    public function getUserAgent() {
        return $this->user_agent;
    }
    
    public function setIpAddress($ip_address) {
        $this->ip_address = $ip_address;
    }
    
    public function getIpAddress() {
        return $this->ip_address;
    }
    
    public function setSessionID($session_id) {
        $this->session_id = $session_id;
    }
    
    public function getSessionID() {
        return $this->session_id;
    }
}

/* End of file LoginModel.php */