<?php

/**
 * TestView - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class TestView extends View {
    public function __construct() {
        $this->data['header'] = 'reports';
        $this->data['title'] = 'Reports';
        $this->data['footer'] = 'reports';
        // add more
    }
}

/* End of file TestView.php */