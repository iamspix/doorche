<?php

/**
 * TransactionHelper - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TransactionHelper extends Dao implements Helper {

    public function generateID($aptKey) {
        $tpl = 'D-A-T';
        $tpl_len = strlen($tpl);
        $lastTransId = intval(substr($this->getLastTransId(), 9));
        $newTransId = $lastTransId + 1;
        $zeropadded = '000000';
        $aptCode = $aptKey; //tatanggap ng apartment code. 587, etc. yung fuentes, fue na lang.
        $transid = '';
        for ($i = 0; $i < $tpl_len; $i++) {
            $last = substr($zeropadded, 0, 6 - strlen($newTransId)) . $newTransId;
            switch ($tpl[$i]) {
                case 'A': $transid .= $aptCode;
                    break;
                case 'D': $transid .= date('y') . date('m') . date('d');
                    break;
                case 'T': $transid .= $last;
                    break;
                case '-': $transid .= '';
                    break;
            }
            //$transcount += 1;
        }
        return $transid;
    }

    public function getLastTransId() {
        $q = "SELECT MAX(transaction_id) FROM tbl_transactions ORDER BY transaction_id ASC";
        $result = $this->db->fetch($q);
        return $result['MAX(transaction_id)'];
    }
}

/* End of file TransactionHelper.php */