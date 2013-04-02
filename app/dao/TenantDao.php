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
                 tbl_units.unit_id, tbl_apartments.apartment_key
                 FROM tbl_tenants
                 RIGHT JOIN tbl_units ON tbl_tenants.unit_id = tbl_units.unit_id
                 RIGHT JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE tbl_tenants.status = 2 ORDER BY tbl_units.unit_id';
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

    public function getAllTenantInfo($tenantID) {
        $query = 'SELECT * FROM tbl_tenants
                  JOIN tbl_units ON tbl_tenants.unit_id = tbl_units.unit_id
                  JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                  WHERE tbl_tenants.tenant_id = :tenant_id';
        $bind = array(':tenant_id' => $tenantID);
        return $this->db->fetchAll($query, $bind);

    }

    public function addTenant() {
        $query = 'INSERT INTO tbl_tenants(tenant_id, firstname, lastname, gender, mobile_number, unit_id)
                  VALUE(:id, :fname, :lname, :gender, :mobile, :unit)';
        $bind  = array(
            ':id' => $this->model->getId(),
            ':fname' => $this->model->getFirstname(),
            ':lname' => $this->model->getLastName(),
            ':gender' => $this->model->getGender(),
            ':mobile' => $this->model->getMobile(),
            ':unit' => $this->model->getUnitId()
        );
        return $this->db->query($query, $bind) ? true : false;

    }


    public function delete($id) {
        $con = $this->db->getConnection();
        $con->beginTransaction();
            $query = 'UPDATE tbl_tenants SET tbl_tenants.status = 0 WHERE tbl_tenants.tenant_id = :id';
            $bind  = array(
                ':id' => $id
            );
            $stmt = $con->prepare($query);
            $stmt->execute($bind);
            // next
            $query = 'UPDATE tbl_lease SET tbl_lease.end_date = NOW() WHERE tbl_lease.tenant_id = :id';
            $bind  = array(
                ':id' => $id
            );
            $stmt = $con->prepare($query);
            $stmt->execute($bind);
        $con->commit();
//        $this->db->query($query, $bind) ? true : false;
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