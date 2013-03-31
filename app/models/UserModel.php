<?php

/**
 * UserModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */
class UserModel {

    private $username;
    private $unit_assigment;

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUnitAssignment($unit_assign) {
        $this->unit_assigment = $unit_assign;
    }

    public function getUnitAssignment() {
        return $this->unit_assigment;
    }

}

/* End of file UserModel.php */