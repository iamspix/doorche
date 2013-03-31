<?php

/**
 * HomeView - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class HomeView extends View {
    public function __construct() {
        $this->data['header'] = 'default';
        $this->data['footer'] = 'default';
        $this->data['message'] = 'Welcome To Doorche, an interactive apartment management system.';
        $this->data['title'] = 'Home';
        // add more
    }
}

/* End of file HomeView.php */