<?php

/**
 * LoginController
 * Type : Class
 * Controller responsible for handling user logins, specifically users of the
 * this apartment management app.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             joeyhipolito.com
 * @copyright           Copyright (c) 2013
 */

class LoginController extends Controller {
    // further improvement : i'll fetch ip_address, user_agent and session_id from LoginView and use it
    private $template;
    private $username;
    private $password;


    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'login'; // replace this
    }

    public function index() {
        if (isset($_SESSION['loggedIn'])) {
            header('Location:' . base_url() . 'apartments');
        }
        $this->view->render($this->template);
    }

    public function submit() {
        $this->username = $_POST['username'];
        $this->password = $_POST['password'];
        $model = new LoginModel();
        $model->setUsername($this->username);
        $model->setPassword($this->password);
        $loginDao = new LoginDao($model);
        $loginDao->login();
        $loginDao->redirect();
    }

    public function logout() {
        session_destroy();
        header('Location:' . base_url());
    }
    //put your code here
}

/* End of file LoginController.php */