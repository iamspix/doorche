<?php

/**
 * ApartmentsController - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */

class ApartmentsController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'apartment'; // replace this
    }

    public function index() {
        // if admin
        if ($_SESSION['accessLevel'] == 'admin') {
            $dao = new ApartmentDao();
            $this->view->data['apartments'] = $dao->getAllApartments();
            $this->view->render($this->template);
        } else {// if manager
            // determine apartment key by manager
            $apartmentDao = new ApartmentDao();
            $apartmentKey = $apartmentDao->getAptKeyByManager($_SESSION['username']);
            $apt_info = array();
            $apt_info['apt_details'] = $apartmentDao->getAptInfoByID($apartmentKey);
            $apt_info['units'] = $apartmentDao->getAptUnitsByKey($apartmentKey);
            $this->view($apartmentKey, $apt_info);
        }
    }

    public function view($apartmentKey, $params = array()) {
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $this->view->data[$key] = $value;
            }
        } else {
            $aptDao = new ApartmentDao();
            $this->view->data['units'] = $aptDao->getAptUnitsByKey($apartmentKey);
            $this->view->data['apt_details'] = $aptDao->getAptInfoByKey($apartmentKey);
        }
        $this->view->data['message'] = 'Select a Unit to Manage';
        $this->view->data['sidebar'] = 'default';
        $this->view->render('units');
    }
    //put your code here
}

/* End of file ApartmentsController.php */