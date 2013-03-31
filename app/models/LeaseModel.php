<?php

/**
 * LeaseModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LeaseModel {

    private $tenant_id;
    private $start_date;
    private $end_date;
    private $deposit;
    private $balance;
    private $advance;
    private $rental_date;

    public function setTenantId($id) {
        $this->tenant_id = $id;
    }

    public function getTenantId() {
        return $this->tenant_id;
    }

    public function setStartDate($date) {
        $this->start_date = $date;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function setEndDate($date) {
        $this->end_date = $date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function setDeposit($deposit) {
        $this->deposit = $deposit;
    }

    public function getDeposit() {
        return $this->deposit;
    }

    public function setBalance($balance) {
        $this->balance = $balance;
    }

    public function getBalance() {
        return $this->balance;
    }

    public function setAdvance($advance) {
        $this->advance = $advance;
    }

    public function getAdvance() {
        return $this->advance;
    }

    public function setRentDate($date) {
        $this->rental_date = $date;
    }

    public function getRentDate() {
        return $this->rental_date;
    }

}

/* End of file LeaseModel.php */