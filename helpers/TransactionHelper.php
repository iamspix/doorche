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

    public function generateID($param) {
        $tpl = 'A-D-T';
        $tpl_len = strlen($tpl);
        $lastTransId = intval(substr($this->getLastTransId, 6));
        $zeropadded = '00000';
        $aptCode = 'FUE'; //tatanggap ng apartment code. 587, etc. yung fuentes, fue na lang.
        $transid = '';
        for ($i = 0; $i < $templen; $i++) {
            $last = substr($zeropadded, 0, 5 - strlen($transcount)) . $transcount;
            switch ($template[$i]) {
                case 'A': $transid .= $aptCode;
                    break;
                case 'D': $transid .= date('y') . date('m') . date('d');
                    break;
                case 'T': $transid .= $last;
                    break;
                case '-': $transid .= ' ';
                    break;
            }
            //$transcount += 1;
        }
        return $transid;
    }
}

/* End of file TransactionHelper.php */