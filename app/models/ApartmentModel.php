<?php

/**
 * ApartmentsModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class ApartmentModel {

    private $apartment_id;
    private $apartment_key;
    private $apartment_address;
    private $building_manager;
    private $image;

    public function setApartmentId($apartment_id) {
        $this->apartment_id = $apartment_id;
    }

    public function getApartmentId() {
        return $this->apartment_id;
    }

    public function setApartmentKey($key) {
        $this->apartment_key = $key;
    }

    public function getApartmentKey() {
        return $this->apartment_key;
    }

    public function setApartmentAddress($address) {
        $this->apartment_address = $address;
    }

    public function getApartmentAddress() {
        return $this->apartment_address;
    }

    public function setBuildingManager($manager) {
        $this->building_manager = $manager;
    }

    public function getBuildingManager() {
        return $this->building_manager;
    }

}

/* End of file ApartmentModel.php */