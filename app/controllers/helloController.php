<?php

/**
 * helloController - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */
require ROOT . 'libs/fpdf/fpdf.php';
include APPPATH . 'models' . DS . 'LoginModel' . EXT;
include APPPATH . 'dao' . DS . 'LoginDAO' . EXT;

class helloController extends Controller {

    public function index() {
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);



        $model = new LoginModel();
        $model->setUsername('joey');
        $model->setPassword('test');

        $dao = new LoginDao($model);
        $red = $dao->getSomething();

        $pdf->SetFont('Arial', 'B', 16);
//        print_r($red);
        $pdf->Cell(40, 20, $red[0]['firstname'], 0, 1);
        $pdf->Cell(20, 0, $red[0]['firstname']);

                $pdf->Output();

    }

    //put your code here
}

/* End of file helloController.php */