<?php

/**
 * LeaseDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LeaseDao extends Dao {

    private $model;
    public function __construct(LeaseModel $model) {
        parent::__construct();
        $this->model = $model;
    }

    public function getPreLeaseTenantDetails() {
        $query = "SELECT * FROM tbl_tenants
                  WHERE tbl_tenants.tenant_id = :tenant";
        $bind = array(':tenant' => $this->model->getTenantId());

        return $this->db->fetch($query, $bind);
    }

    public function getPostLeaseTenantDetails() {
        $query = "SELECT
                    tbl_lease.tenant_id,
                    tbl_lease.start_date,
                    tbl_lease.security_deposit,
                    tbl_tenants.firstname,
                    tbl_tenants.lastname,
                    tbl_tenants.unit_id,
                    tbl_apartments.apartment_key
                 FROM tbl_lease
                 JOIN tbl_tenants ON tbl_lease.tenant_id = tbl_tenants.tenant_id
                 JOIN tbl_units ON tbl_tenants.unit_id = tbl_units.unit_id
                 JOIN tbl_apartments ON tbl_units.apartment_id = tbl_apartments.apartment_id
                 WHERE tbl_lease.tenant_id = :tenant_id";
        $bind = array(':tenant_id' => $this->model->getTenantId());

        return $this->db->fetch($query, $bind);
    }

    public function leaseUnit() {
        $query = "INSERT INTO tbl_lease(tenant_id, start_date, security_deposit, rental_date)
                  VALUES(:tenant, :start, :deposit, :rentDate)";
        $bind = array(
            ':tenant' => $this->model->getTenantId(),
            ':start'  => $this->model->getStartDate(),
            ':deposit' => $this->model->getDeposit(),
            ':rentDate' => $this->model->getRentDate()
            );
        $this->db->insert($query, $bind);

        $query = 'UPDATE tbl_tenants SET tbl_tenants.status = 2 WHERE tbl_tenants.tenant_id = :id';
        $bind  = array(
            ':id' => $this->model->getTenantId()
        );
        $this->db->update($query, $bind);
    }

}

/* End of file LeaseDao.php */