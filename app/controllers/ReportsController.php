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
include ROOT . 'libs/html2pdf/html2pdf.class.php';
class ReportsController extends Controller {


    public function __construct(View $view = null) {
        parent::__construct($view);
    }

    public function lease($transaction_id) {
        $transactioDao = new TransactionsDao();
        $this->view->data['trans_info'] = $transactioDao->getAllTransactionDetails($transaction_id);
        $this->view->data['transactions'] = $transactioDao->getLeaseTransaction($transaction_id);
        $content = $this->view->output('report_lease');
        $html2pdf = new HTML2PDF('P','Letter','en');
        $html2pdf->WriteHTML($content);
        $html2pdf->Output('example.pdf');
    }

    public function paydues($transaction_id) {
        $transactioDao = new TransactionsDao();
        $this->view->data['trans_info'] = $transactioDao->getAllTransactionDetails($transaction_id);
        $this->view->data['transactions'] = $transactioDao->getRelatedTransactions($transaction_id);
        $content = $this->view->output('report_dues');
        $html2pdf = new HTML2PDF('P','Letter','en');
        $html2pdf->WriteHTML($content);
        $html2pdf->Output('example.pdf');
    }
}

/* End of file ReportsController.php */