<?php

/**
 * ReportsController - [Add a short description of what this file does]
 * Type : Class
 * [Add a long description of the file (1 sentence) and then delete my example]
 * Example: A PHP file template created to standardize code.
 *
 * @package		dbms
 * @author              Jose Marcelius Hipolito <hi@joeyhipolito.com>
 * @license             University of the East Research and Development Unit
 * @copyright           Copyright (c) 2013
 */
include ROOT . 'libs/fpdf/fpdf.php';
include APPPATH . 'models' . DS . 'LeaseModel' . EXT;
include APPPATH . 'dao' . DS . 'LeaseDao' . EXT;

class ReportsController extends Controller {

    public function genReportUponReg($tenantID) {
        $leaseModel = new LeaseModel();
        $leaseModel->setTenantId($tenantID);
        $leaseDao = new LeaseDao($leaseModel);
        $info = $leaseDao->getPostLeaseTenantDetails();
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Image(asset_url() . 'img/post-reg-report.png', 0, 0,200, 200);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(30, 40, "Tenant ID: ");
        $pdf->Cell(40, 40, $info['tenant_id']);
        $pdf->Ln(30);
        $pdf->Cell(20, 0, "Date: ");
        $pdf->Cell(40, 0, $info['start_date']);
        $fields = '
        Name
        Unit #
        Apt #
        Deposit';

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Ln(10);
        $pdf->Cell(40, 0, "Name", 0, 0, 'C');
        $pdf->Cell(30, 0, "Unit #", 0, 0, 'C');
        $pdf->Cell(80, 0, "Apt. #", 0, 0, 'C');
        $pdf->Cell(20, 0, "Deposit", 0, 0, 'C');
        $pdf->SetFont('Arial', '', 14);

        $pdf->Ln(10);
        $pdf->Cell(40, 0, $info['firstname'] . ' ' . $info['lastname'], 0, 0, 'C');
        $pdf->Cell(30, 0, $info['unit_id'], 0, 0, 'C');
        $pdf->Cell(80, 0, $info['apartment_key'], 0, 0, 'C');
        $pdf->Cell(20, 0, $info['security_deposit'], 0, 0, 'C');
        $pdf->Output();
        //print_r($leaseDao->getPostLeaseTenantDetails());
    }
}

/* End of file ReportsController.php */