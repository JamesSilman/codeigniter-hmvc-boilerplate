<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Example_Two extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->view('view_example_two');
    }
}
