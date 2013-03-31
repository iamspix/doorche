<?php

/**
 * UnitDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class UnitDao extends Dao {

    private $model;

    public function __construct(UnitModel $model = null) {
        parent::__construct();
        $this->model = $model;
    }

    public function getAllUnitDetails() {
        $query = "SELECT * FROM tbl_tenants WHERE unit_id = :unit";
        $bind = array(':unit' => $this->model->getUnitID());

        return $this->db->fetchAll($query, $bind);
    }

    public function getAllUnitsViaApartmentId() {
        $query = "SELECT * FROM tbl_units WHERE apartment_id = :unit";
        $bind = array(':unit' => $this->model->getApartmentID());

        return $this->db->fetchAll($query, $bind);
    }

    public function getAllTenants() {
        $query = "SELECT * FROM tbl_tenants
                  WHERE tbl_tenants.unit_id = :unit AND tbl_tenants.status = 2";
        $bind = array(':unit' => $this->model->getUnitID());

        return $this->db->fetchAll($query, $bind);
    }

    public function getTenantCount() {
        $query = "SELECT tenant_id FROM tbl_tenants WHERE unit_id = :unit AND tbl_tenants.status = 2";
        $bind = array(':unit' => $this->model->getUnitID());

        return $this->db->num_rows($query, $bind);
    }

    public function getRegInfo() {
        $query = "SELECT tbl_units.unit_id, tbl_apartments.apartment_key FROM tbl_units
                 JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE tbl_units.unit_id = :unit";
        $bind = array(':unit' => $this->model->getUnitID());
        return $this->db->fetch($query, $bind);
    }
}

/* End of file UnitDao.php */