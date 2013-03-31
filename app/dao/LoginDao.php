<?php

/**
 * LoginDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LoginDao extends Dao {
    
    private $model;
    
    public function __construct(LoginModel $model) {
        parent::__construct();
        $this->model = $model;
    }
    
    public function login() {
        // validate login only check if username and password combination is correct
        // this is much safer than checking if the username and password doest not
        // match, this prevents attackers from bruteforcing and guessing user's passwords and usernames
        $query = 'SELECT id FROM tbl_users WHERE username = :usr AND password = :pwd';
        $bindVal = array(
            ':usr' => $this->model->getUsername(),
            ':pwd' => md5($this->model->getPassword()) // this is quite not so strong, and I want this to be salted
            );
        return  $this->db->num_rows($query, $bindVal) > 0 ? true : false;
    }
}

/* End of file LoginDao.php */