<?php

/**
 * TransactionsDao - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TransactionsDao extends Dao {

    private $model;

    public function __construct(TransactionsModel $model = null) {
        parent::__construct();
        $this->model = $model;
    }

    public function getAllTransactionDetails($transaction_id) {
        // first operation
        $query = "SELECT
                    tbl_transactions.transaction_id,
                    tbl_transactions.transaction_date,
                    tbl_transactions.transaction_cost,
                    tbl_transactions.received_by,
                    tbl_transactions.received_from,
                    tbl_apartments.apartment_key,
                    tbl_apartments.address,
                    tbl_units.unit_id,
                    tbl_units.payment_period,
                    tbl_tenants.firstname AS tenant_firstname,
                    tbl_tenants.lastname AS tenant_lastname,
                    tbl_tenants.mobile_number,
                    tbl_tenants.email_address,
                    tbl_users.firstname AS user_firstname,
                    tbl_users.lastname AS user_lastname
                  FROM tbl_transactions
                  LEFT JOIN tbl_tenants
                    ON tbl_transactions.received_from = tbl_tenants.tenant_id
                  LEFT JOIN tbl_units
                    ON tbl_tenants.unit_id = tbl_units.unit_id
                  LEFT JOIN tbl_apartments
                    ON tbl_apartments.apartment_id = tbl_units.apartment_id
                  LEFT JOIN tbl_users
                    ON tbl_apartments.building_manager = tbl_users.id
                  WHERE tbl_transactions.transaction_id = :tid
                  ";
        $bind  = array(':tid' => $transaction_id);
        return $this->db->fetch($query, $bind);
    }

    public function getRelatedTransactions($transaction_id) {
        $query = "SELECT cost, date, transaction_type
                  FROM tbl_unit_water WHERE tbl_unit_water.transaction_id = :tid
                 UNION
                  SELECT cost, date, transaction_type
                  FROM tbl_unit_electricity WHERE tbl_unit_electricity.transaction_id = :tid
                 UNION
                  SELECT cost, date, transaction_type
                  FROM tbl_unit_rent WHERE tbl_unit_rent.transaction_id = :tid
                 ";
        $bind = array(':tid' => $transaction_id);

        return $this->db->fetchAll($query, $bind);
    }

    public function getLeaseTransaction($transaction_id) {
        $query = "SELECT * FROM tbl_lease WHERE tbl_lease.transaction_id = :tid";
        $bind = array(':tid' => $transaction_id);
        return $this->db->fetch($query, $bind);
    }
    //put your code here
}

/* End of file TransactionsDao.php */