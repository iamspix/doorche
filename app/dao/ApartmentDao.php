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

    public function __construct(ApartmentModel $model) {
        parent::__construct();
        $this->model = $model;
    }

    public function getAllApartments() {
        $query = "SELECT * FROM tbl_apartments";
        return $this->db->fetchAll($query);
    }

    public function getAptDetails() {
        $query = "SELECT tbl_apartments.apartment_id, tbl_apartments.apartment_key , tbl_apartments.address,
                         tbl_users.firstname, tbl_users.lastname, tbl_users.mobile_number,
                         tbl_users.email_address
                 FROM tbl_apartments
                 LEFT JOIN tbl_users ON tbl_apartments.building_manager = tbl_users.id
                 WHERE tbl_apartments.apartment_key = :apt_id";
        $bind = array(':apt_id' => $this->model->getApartmentId());
        return $this->db->fetch($query, $bind);
    }

    public function getAllUnits() {
        $query = "SELECT * FROM tbl_units
                 JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE apartment_key = :key";
        $bind = array(':key' => $this->model->getApartmentId());
        return $this->db->fetchAll($query, $bind);
    }

    public function getManager() {
        $query = "SELECT building_manager FROM tbl_apartments WHERE apartment_key = :key";
        $bind = array(':key' => $this->model->getApartmentId());
        return $this->db->fetch($query, $bind);
    }

    public function getApartmentKeyViaManager() {
        $query = "SELECT tbl_apartments.apartment_key FROM tbl_apartments
                  JOIN tbl_users ON tbl_users.username = tbl_apartments.building_manager
                  WHERE tbl_users.username = :manager";
        $bind = array(':manager' => $this->model->getBuildingManager());
        return $this->db->fetch($query, $bind);
    }

    public function getKeyViaManager() {
        $query = "SELECT tbl_apartments.apartment_key, tbl_apartments.apartment_id FROM tbl_apartments
                  JOIN tbl_users ON tbl_users.id = tbl_apartments.building_manager
                  WHERE tbl_users.username = :manager";
        $bind = array(':manager' => $this->model->getBuildingManager());
        return $this->db->fetch($query, $bind);
    }

    public function getAptIdByKey() {
        $query = "SELECT apartment_id FROM tbl_apartments WHERE apartment_key = :key";
        $bind = array(':key' => $this->model->getApartmentKey());

        return $this->db->fetch($query, $bind);
    }
}

/* End of file ApartmentDao.php */