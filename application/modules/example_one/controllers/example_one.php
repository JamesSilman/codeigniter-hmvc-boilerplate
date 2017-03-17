<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Cal the MX Controoler class rather than the normal CI one
class Example_One extends MX_Controller
{
    function __construct() {
        parent::__construct();
    }

    public function index(){
      //Calling a view from the current module
      $this->load->view('view_example_one');

      //Calling a view from another module
      $this->load->view('example_two/view_example_two');
    }
}
