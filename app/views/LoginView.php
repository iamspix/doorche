<?php

/**
 * LoginView - [Add a short description of what this file does]
 *
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class LoginView extends View {
    public function __construct() {
        $this->data['header'] = 'default';
        $this->data['footer'] = 'default';
        $this->data['message'] = 'Hello Guest!, Please login to use the application.';
        $this->data['title'] = 'Login';
        // add more
    }
}

/* End of file LoginView.php */