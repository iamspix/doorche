<?php

/**
 * TransactionsModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TransactionsModel {

    private $transaction_id;
    private $transaction_date;
    private $transaction_cost;
    private $received_by;
    private $received_from;

    public function setTransactionID($id) {
        $this->transaction_id = $id;
    }

    public function getTransactionID() {
        return $this->transaction_id;
    }

    public function setTransactionDate($datetime) {
        $this->transaction_date = $datetime;
    }

    public function getTransactionDate() {
        return $this->transaction_date;
    }

    public function setTransactionCost($cost) {
        $this->transaction_cost = $cost;
    }

    public function getTransactionCost() {
        return $this->transaction_cost;
    }

    public function setReceivedBy($user_id) {
        $this->received_by = $user_id;
    }

    public function getReceivedBy() {
        return $this->received_by;
    }

    public function setReceivedFrom($tenant_id) {
        $this->received_from = $tenant_id;
    }

    public function getReceivedFrom() {
        return $this->received_from;
    }

    //put your code here
}

/* End of file TransactionsModel.php */