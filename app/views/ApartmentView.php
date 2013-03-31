<?php

/**
 * ApartmentView - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class ApartmentView extends View {
    public function __construct() {
        $this->data['header'] = 'apartment';
        $this->data['sidebar'] = 'default';
        $this->data['footer'] = 'default';
        $this->data['title'] = 'Apartment';
        // add more
    }
}

/* End of file ApartmentView.php */