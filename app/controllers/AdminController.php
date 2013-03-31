<?php

/**
 * AdminController - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 * 
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class AdminController extends Controller {
    private $template;
    
    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'admin'; // replace this
    }
    
    public function index() {
        $this->view->render($this->template);
    }
    //put your code here
}

/* End of file AdminController.php */