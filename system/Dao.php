<?php

/**
 * Dao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		anccss
 * @author              Joey Hipolito <me@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class Dao {
    protected $db = null;

    public function __construct() {
        $c = new Config();
        $this->db = new Database($c->dbtype.':host='.$c->dbhost.';dbname='.$c->dbname, $c->dbuser, $c->dbpass);
    }
    //put your code here
}

/* End of file Dao.php */