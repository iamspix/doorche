<?php

/**
 * UnitsController - [Add a short description of what this file does]
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
include APPPATH . 'models' . DS . 'UnitModel' . EXT;
include APPPATH . 'models' . DS . 'LeaseModel' . EXT;
include APPPATH . 'dao' . DS . 'ApartmentDao' . EXT;
include APPPATH . 'dao' . DS . 'UnitDao' . EXT;
include APPPATH . 'dao' . DS . 'LeaseDao' . EXT;

class UnitsController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'units'; // replace this
    }

    public function index() {

        // if ADMIN

        // if MANAGER
        $apartmentModel = new ApartmentModel();
        $apartmentModel->setBuildingManager($_SESSION['username']);

        // select apartment details using manager
        $apartmentDao = new ApartmentDao($apartmentModel);
        $apartmentKey = $apartmentDao->getKeyViaManager();
        print_r($apartmentKey);

        // set apartmentId using key
        $unitModel = new UnitModel();
        $unitModel->setApartmentID($apartmentKey['apartment_id']);

        // select * apartments where id = apartment_id
        $unitDao = new UnitDao($unitModel);
        $this->view->data['units'] = $unitDao->getAllUnitsViaApartmentId();

        $this->view->render($this->template);
    }

    public function view($unitID = null) {
        if ($unitID == null) {
            $this->view->data['message'] = ('Please select a unit to manage');
            $this->view->render('unit_view_exception');
        } else {
            $unitModel = new UnitModel();
            $unitModel->setUnitID($unitID);

            $unitDao = new UnitDao($unitModel);
            $this->view->data['tenants'] = $unitDao->getAllTenants();
            $this->view->data['tenant_count'] = $unitDao->getTenantCount();
            $this->view->data['unit'] = $unitModel->getUnitID();
            $this->view->render('unit_look_up');
        }
    }

    public function lease($tenant_id = null) {
        $leaseModel = new LeaseModel();
        $leaseModel->setTenantId($tenant_id);
        $leaseDao = new LeaseDao($leaseModel);
        $this->view->data['tenant_info'] = $leaseDao->getPreLeaseTenantDetails();
        $this->view->render('unit_lease');
    }

    public function leaseSubmit() {
        $leaseModel = new LeaseModel();
        $leaseModel->setTenantId($_POST['tenant_id']);
        $leaseModel->setDeposit($_POST['deposit']);
        $mysqltime = date("Y-m-d H:i:s");
        $leaseModel->setStartDate($mysqltime);
        $leaseModel->setRentDate($_POST['rental_date']);

        $leaseDao = new LeaseDao($leaseModel);
        $leaseDao->leaseUnit();

        header('Location:' . base_url() . 'reports/genReportUponReg/' . $leaseModel->getTenantId());
    }

    public function rent($unitId) {

    }
}

/* End of file UnitsController.php */