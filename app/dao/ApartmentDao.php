<?php

/**
 * ApartmentDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class ApartmentDao extends Dao {

    private $model;

    public function __construct(ApartmentModel $model = null) {
        parent::__construct();
        $this->model = $model;
    }

    public function getAllApartments() {
        $query = "SELECT * FROM tbl_apartments";
        return $this->db->fetchAll($query);
    }

    public function getAptInfoByKey($apt_key) {
        $query = "SELECT tbl_apartments.apartment_id, tbl_apartments.apartment_key , tbl_apartments.address,
                         tbl_users.firstname, tbl_users.lastname, tbl_users.mobile_number,
                         tbl_users.email_address
                 FROM tbl_apartments
                 LEFT JOIN tbl_users ON tbl_apartments.building_manager = tbl_users.id
                 WHERE tbl_apartments.apartment_key = :apt_key";
        $bind = array(':apt_key' => $apt_key);
        return $this->db->fetch($query, $bind);
    }

    public function getAptUnitsByKey($apt_key) {
        $query = "SELECT * FROM tbl_units
                 JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE apartment_key = :key";
        $bind = array(':key' => $apt_key);
        return $this->db->fetchAll($query, $bind);
    }

    public function getAptMgrByKey($apt_key) {
        $query = "SELECT building_manager FROM tbl_apartments WHERE apartment_key = :key";
        $bind = array(':key' => $apt_key);
        $result = $this->db->fethc($query, $bind);
        return $result['building_manager'];
    }

    public function getAptKeyByManager($mgr_username) {
        $query = "SELECT tbl_apartments.apartment_key
                  FROM tbl_apartments
                  JOIN tbl_users ON tbl_apartments.building_manager = tbl_users.id
                  WHERE tbl_users.username = :user";
        $params = array(':user' => $mgr_username);
        $result = $this->db->fetch($query, $params);
        return $result['apartment_key'];
    }

    public function getIDbyKey($key) {
        $query = "SELECT apartment_id FROM tbl_apartments WHERE apartment_key = :key";
        $bind = array(':key' => $key);

        $result = $this->db->fetch($query, $bind);
        return $result['apartment_id'];
    }
}

/* End of file ApartmentDao.php */