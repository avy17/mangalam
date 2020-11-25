<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {

    function index()
    {
        $this->load->library('pdf');
        $html = $this->load->view('invoice_details', [], true);
        $this->pdf->createPDF($html, 'mypdf', false);
    }
}
?>