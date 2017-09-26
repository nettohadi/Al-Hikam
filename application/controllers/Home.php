<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){
		parent::__construct();
 
        date_default_timezone_set('Asia/Bangkok');
    }

    public function index(){      
      $data['page'] = 'home';
      $this->load->view('template_without_top_menu',$data);
    }

}