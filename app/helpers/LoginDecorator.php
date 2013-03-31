<?php

/**
 * LoginDecorator - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LoginDecorator extends Decorator {

    public function __construct($object) {
        parent::__construct($object);
        $this->object = $object;
    }


    //put your code here
}

/* End of file LoginDecorator.php */