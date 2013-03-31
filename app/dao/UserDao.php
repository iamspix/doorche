<?php

/**
 * UserDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class UserDao extends Dao {

    private $model;

    public function __construct(UserModel $model) {
        parent::__construct();
        $this->model = $model;
    }

    public function getUserAssignment() {
        $query = "SELECT tbl_apartments.apartment_key FROM tbl_apartments
                 JOIN tbl_users ON tbl_apartments.building_manager = tbl_users.id
                 WHERE tbl_users.username = :user";
        $bind = array(':user' => $this->model->getUsername());

        return $this->db->fetch($query, $bind);
    }
    //put your code here
}

/* End of file UserDao.php */