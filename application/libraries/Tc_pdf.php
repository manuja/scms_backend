<?php defined('BASEPATH') OR exit('No direct script access allowed');


require_once APPPATH.'vendor/tcpdf_min/tcpdf.php';

class Tc_pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }
   
}
