<?php

/**
 * UnitModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class UnitModel extends Controller {

       private $unit_id;
       private $apartment_id;

       public function setUnitID($unit_id) {
           $this->unit_id = $unit_id;
       }

       public function getUnitID() {
           return $this->unit_id;
       }

       public function setApartmentID($apartment_id) {
           $this->apartment_id = $apartment_id;
       }

       public function getApartmentID() {
           return $this->apartment_id;
       }
}

/* End of file UnitModel.php */