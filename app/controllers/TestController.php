<?php

/**
 * TestController - [Add a short description of what this file does]
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
class TestController extends Controller {
    private $template;

    public function __construct(View $view = null) {
        parent::__construct($view);
        $this->template = 'report_lease'; // replace this
    }

    public function index() {
        $transactioDao = new TransactionsDao();
//        echo '<pre>';
//        print_r($transactioDao->getLeaseTransaction('130401588000001'));
        $this->view->data['trans_info'] = $transactioDao->getAllTransactionDetails('130402587000003');
        $this->view->data['transactions'] = $transactioDao->getRelatedTransactions('130402587000003');
        $content = $this->view->output($this->template);
        $html2pdf = new HTML2PDF('P','Letter','en');
        $html2pdf->WriteHTML($content);
        $html2pdf->Output('example.pdf');
    }
    //put your code here
}

/* End of file TestController.php */