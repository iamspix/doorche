<?php

/**
 * TenantsController - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */
include APPPATH . 'models' . DS . 'TenantModel' . EXT;
include APPPATH . 'models' . DS . 'UserModel' . EXT;
include APPPATH . 'models' . DS . 'UnitModel' . EXT;
include APPPATH . 'models' . DS . 'ApartmentModel' . EXT;
include APPPATH . 'dao' . DS . 'ApartmentDao' . EXT;
include APPPATH . 'dao' . DS . 'UnitDao' . EXT;
include APPPATH . 'dao' . DS . 'UserDao' . EXT;
include APPPATH . 'dao' . DS . 'TenantDao' . EXT;

class TenantsController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'tenants'; // replace this
    }

    public function index() {
        if ($_SESSION['accessLevel'] == 'admin') {
            $tenantDao = new TenantDao();
            $this->view->data['tenants'] = $tenantDao->getAllTenants();
        } else if($_SESSION['accessLevel'] == 'manager') {

            // get unit assignment of loggedIn manager
            $userModel = new UserModel();
            $userModel->setUsername($_SESSION['username']);
            $userDao = new UserDao($userModel);
//            print_r($userDao->getUserAssignment());
            $aptAssignment = $userDao->getUserAssignment();

            // select * tenants where id = apartment_id
            $tenantDao = new TenantDao();

            $this->view->data['tenants'] = $tenantDao->getAllTenantsByApartment($aptAssignment['apartment_key']);

        }
        $this->view->render($this->template);
    }

    public function add($add_to_unitID = null) {
        if (is_null($add_to_unitID)) {

        } else {
            $unitModel = new UnitModel();
            $unitModel->setUnitID($add_to_unitID);

            $unitDao = new UnitDao($unitModel);
            $this->view->data['reg_info'] = $unitDao->getRegInfo();
        }

        $this->view->render('add_tenant');
    }

    public function addSubmit(){
        $model = new TenantModel();
        $model->setFirstName($_POST['firstname']);
        $model->setLastName($_POST['lastname']);
        $model->setGender($_POST['gender']);
        $model->setMobile($_POST['mobile']);
        $model->setBday($_POST['birthday']);
        $model->setEmailAddress($_POST['email']);
        $model->setUnitId($_POST['unit']);

        // get apartment ID via unit
        $aptModel = new ApartmentModel();
        $aptModel->setApartmentKey($_POST['apartment']);
//        echo $aptModel->getApartmentKey();
        $aptDao = new ApartmentDao($aptModel);
//        print_r($aptDao->getAptIdByKey());
        $result = $aptDao->getAptIdByKey();
        $aptID = $result['apartment_id'];

        // generate new tenantID
        $h = new Helpers();
        $model->setId($h->generateID($aptID));

        $dao = new TenantDao($model);
        $dao->addTenant();

        header('Location:' . base_url() . 'units/lease/' . $model->getId());
    }

    public function delete($id) {
        $tenantDao = new TenantDao();
        $tenantDao->delete($id);
        header('Location:' . base_url() .'tenants');
    }

    public function update($id) {

    }

    public function view($id) {
        $tenantDao = new TenantDao();
        $this->view->data['tenant'] =  $tenantDao->view($id);
         $this->view->render('tenant_lookup');
    }

    //put your code here
}

/* End of file TenantsController.php */