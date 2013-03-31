<?php

/**
 * Helpers - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

 class Helpers extends Dao {

    public function __construct() {
        parent::__construct();
    }

    public function generateID($apartmentID) {
        $tpl = 'Y-A-X';
        $tpl_len = strlen($tpl);
        $aptId = $apartmentID;
        $lastTenantId = intval(substr($this->getLastTenantID(), 6));
        $newTenantId = $lastTenantId + 1;
        $zero_pad = '00000';
        $apt_pad = '00';

        $sernum = '';
        for ($i = 0; $i < $tpl_len; $i++) {
            $last = substr($zero_pad, 0, 5 - strlen($newTenantId)).$newTenantId;
            $mid  = substr($apt_pad, 0, 2 - strlen($aptId)).$aptId;
            switch ($tpl[$i]) {
                case 'Y': $sernum .= date('Y');
                    break;
                case 'A': $sernum .= $mid;
                    break;
                case 'X': $sernum .= $last;
                    break;
                case '-': $sernum .= '';
                    break;
            }
        }
        return $sernum;
    }

    public function getLastTenantID() {
        $q = "SELECT MAX(tenant_id) FROM tbl_tenants";
        $result = $this->db->fetch($q);
        return $result['MAX(tenant_id)'];

    }
}

/* End of file Helpers.php */