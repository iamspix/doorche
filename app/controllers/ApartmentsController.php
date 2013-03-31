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

include APPPATH . 'models' . DS . 'ApartmentModel' . EXT;
include APPPATH . 'dao' . DS . 'ApartmentDao' . EXT;

class ApartmentsController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'apartment'; // replace this
    }

    public function index() {
        $model = new ApartmentModel();
        $dao = new ApartmentDao($model);
        $this->view->data['apartments'] = $dao->getAllApartments();
        $this->view->render($this->template);
    }

    public function view($apartmentID) {
        $model = new ApartmentModel();
        $model->setApartmentId($apartmentID);
        $dao = new ApartmentDao($model);
//        print_r($dao->getAptDetails());
        $this->view->data['apt_details'] = $dao->getAptDetails();
        $this->view->data['message'] = 'Select a Unit to Manage';
        $this->view->data['sidebar'] = 'default';
        $this->view->data['units'] = $dao->getAllUnits();
        $this->view->render('units');
    }
    //put your code here
}

/* End of file ApartmentsController.php */