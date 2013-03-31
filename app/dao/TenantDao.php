<?php

/**
 * TenantDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TenantDao extends Dao {

    private $model;

    public function __construct(TenantModel $model = null) {
        parent::__construct();
        $this->model = $model;
    }

    public function getAllTenants() {
        $query = 'SELECT tbl_tenants.tenant_id, tbl_tenants.firstname, tbl_tenants.lastname,
                 tbl_units.unit_id, tbl_apartments.apartment_id
                 FROM tbl_tenants
                 RIGHT JOIN tbl_units ON tbl_tenants.unit_id = tbl_units.unit_id
                 RIGHT JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE tbl_tenants.status = 1 ORDER BY tbl_units.unit_id';
        return $this->db->fetchAll($query);
    }

    public function getAllTenantsByApartment($apt_key) {
        $query = 'SELECT tbl_tenants.tenant_id, tbl_tenants.firstname, tbl_tenants.lastname,
                 tbl_units.unit_id, tbl_apartments.apartment_key
                 FROM tbl_tenants
                 RIGHT JOIN tbl_units ON tbl_tenants.unit_id = tbl_units.unit_id
                 RIGHT JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE tbl_apartments.apartment_key = :apt_key AND tbl_tenants.status = 2 ORDER BY tbl_units.unit_id';
        $bind = array('apt_key' => $apt_key);
        return $this->db->fetchAll($query, $bind);
    }

    public function addTenant() {
        $query = 'INSERT INTO tbl_tenants(tenant_id, firstname, lastname, gender, birthday, mobile_number, email_address, unit_id)
                  VALUE(:id, :fname, :lname, :gender, :bday, :mobile, :email, :unit)';
        $bind  = array(
            ':id' => $this->model->getId(),
            ':fname' => $this->model->getFirstname(),
            ':lname' => $this->model->getLastName(),
            ':gender' => $this->model->getGender(),
            ':bday' => $this->model->getBday(),
            ':mobile' => $this->model->getMobile(),
            ':email' => $this->model->getEmailAddress(),
            ':unit' => $this->model->getUnitId()
        );
        return $this->db->insert($query, $bind) ? true : false;

    }

    public function delete($id) {
        $query = 'UPDATE tbl_tenants SET tbl_tenants.status = 0 WHERE tbl_tenants.tenant_id = :id';
        $bind  = array(
            ':id' => $id
        );
        $this->db->update($query, $bind) ? true : false;
    }

    public function view($id) {
        $query = 'SELECT * FROM tbl_tenants WHERE tbl_tenants.tenant_id = :id';
        $bind  = array(
            ':id' => $id
        );
        return $this->db->fetch($query, $bind);
    }
}

/* End of file TenantDao.php */