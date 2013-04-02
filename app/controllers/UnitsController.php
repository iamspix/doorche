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

class UnitsController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'units'; // replace this
    }

    public function index() {

        // if ADMIN

        // if MANAGER

        // select apartment details using manager
        $apartmentDao = new ApartmentDao();
        $apartmentKey = $apartmentDao->getAptKeyByManager($_SESSION['username']);
        $this->view->data['message'] = 'Select a Unit to Manage';
        $this->view->data['units'] = $apartmentDao->getAptUnitsByKey($apartmentKey);

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
        $leaseDao = new LeaseDao();
        $results = $leaseDao->getPreLeaseTenantDetails($tenant_id);
        if ($results['status'] != 1) {
            die('The tenant has already rented a unit or not yet completed the registration process');
        }
        $this->view->data['tenant_info'] = $results;
        $this->view->render('unit_lease');
    }

    public function occupy() {

        // set all lease info
        $leaseModel = new LeaseModel();
        $leaseModel->setTenantId($_POST['tenant_id']);
        $leaseModel->setDeposit($_POST['deposit']);
        $leaseModel->setAdvance($_POST['advance']);
        $mysqltime = date("Y-m-d H:i:s");
        $leaseModel->setStartDate($mysqltime);
        $leaseModel->setRentDate($_POST['rental_date']);

        // figure out what apartment via tenant_id
        $tenantDao = new TenantDao();
        $results = $tenantDao->getAllTenantInfo($leaseModel->getTenantId());

        $aptKey = $results[0]['apartment_key'];

        $h = new TransactionHelper();
        $transaction_id = $h->generateID($aptKey);


        $leaseModel->setTransactionID($transaction_id);
        $leaseModel->setTransactionType('lease');

        // set all Transaction info prior to lease info
        $transModel = new TransactionsModel();
        $transModel->setReceivedFrom($leaseModel->getTenantId());

        $transModel->setTransactionDate($leaseModel->getStartDate());

        // compute the total cost of the transactions
        $totalCost = floatval($leaseModel->getDeposit()) + floatval($leaseModel->getAdvance());

        $transModel->setTransactionCost($totalCost);
        $transModel->setTransactionID($leaseModel->getTransactionID());

        $mgr_id = $results[0]['building_manager'];
        $transModel->setReceivedBy($mgr_id);

        $leaseDao = new LeaseDao($leaseModel, $transModel);

        $leaseDao->leaseUnit();

        header('Location:' . base_url() . 'reports/lease/' . $transModel->getTransactionID());
    }

    public function rent($unitId) {

    }
}

/* End of file UnitsController.php */