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

    private $leaseModel;
    private $transModel;

    public function __construct(LeaseModel $leaseModel = null, TransactionsModel $transModel = null) {
        parent::__construct();
        $this->leaseModel = $leaseModel;
        $this->transModel = $transModel;
    }

    public function getPreLeaseTenantDetails($tenant_id) {
        $query = "SELECT * FROM tbl_tenants
                  WHERE tbl_tenants.tenant_id = :tenant";
        $bind = array(':tenant' => $tenant_id);

        return $this->db->fetch($query, $bind);
    }

    public function getPostLeaseTenantDetails($tenant_id) {
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
        $bind = array(':tenant_id' => $tenant_id);

        return $this->db->fetch($query, $bind);
    }

    public function leaseUnit() {
        // get connection
        $con = $this->db->getConnection();

        $con->beginTransaction();

            // first action - generate transaction infos
            $query = "INSERT INTO tbl_transactions(
                        transaction_id, transaction_date, transaction_cost, received_by, received_from
                      )
                      VALUES(
                        :trans_id, :trans_date, :trans_cost, :receiver, :recipient
                      )";
            $bind = array(
                ':trans_id'   => $this->transModel->getTransactionID(),
                ':trans_date' => $this->transModel->getTransactionDate(),
                ':trans_cost' => $this->transModel->getTransactionCost(),
                ':receiver'   => $this->transModel->getReceivedBy(),
                ':recipient'  => $this->transModel->getReceivedFrom()
            );

            $stmt = $con->prepare($query);
            $stmt->execute($bind);


            // second action - insert lease information

            $query = "INSERT INTO tbl_lease(
                        tenant_id,
                        start_date,
                        security_deposit,
                        advance,
                        rental_date,
                        transaction_id,
                        transaction_type
                      )
                      VALUES(
                        :tenant,
                        :start,
                        :deposit,
                        :advance,
                        :rentDate,
                        :transaction_id,
                        :transaction_type
                      )";
            $bind = array(
                ':tenant' => $this->leaseModel->getTenantId(),
                ':start'  => $this->leaseModel->getStartDate(),
                ':deposit' => $this->leaseModel->getDeposit(),
                ':advance' => $this->leaseModel->getAdvance(),
                ':rentDate' => $this->leaseModel->getRentDate(),
                ':transaction_id' => $this->leaseModel->getTransactionID(),
                ':transaction_type' => $this->leaseModel->getTransactionType()
                );
            $stmt = $con->prepare($query);
            $stmt->execute($bind);

            // third action - update tenant status

            $query = 'UPDATE tbl_tenants SET tbl_tenants.status = 2 WHERE tbl_tenants.tenant_id = :id';
            $bind  = array(
                ':id' => $this->leaseModel->getTenantId()
            );

            $stmt = $con->prepare($query);
            $stmt->execute($bind);

        $con->commit();
    }

}

/* End of file LeaseDao.php */