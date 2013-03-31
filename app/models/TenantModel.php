<?php

/**
 * TenantModel - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TenantModel {

    private $id;
    private $firstname;
    private $lastname;
    private $gender;
    private $image;
    private $mobile_number;
    private $bday;
    private $email_address;
    private $current_address;
    private $unit_id;
    private $status;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setFirstName($firstname) {
        $this->firstname = $firstname;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function setLastName($lastname) {
        $this->lastname = $lastname;
    }

    public function getLastName() {
        return $this->lastname;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    public function setMobile($mobile_number) {
        $this->mobile_number = $mobile_number;
    }

    public function getMobile(){
        return $this->mobile_number;
    }

    public function setBday($bday) {
        $this->bday = $bday;
    }

    public function getBday() {
        return $this->bday;
    }

    public function setEmailAddress($email) {
        $this->email_address = $email;
    }

    public function getEmailAddress() {
        return $this->email_address;
    }

     public function setAddress($current_address) {
        $this->current_address = $current_address;
    }

    public function getAddress() {
        return $this->current_address;
    }

    public function setUnitId($unit_id) {
        $this->unit_id = $unit_id;
    }

    public function getUnitId(){
        return $this->unit_id;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

}

/* End of file TenantModel.php */