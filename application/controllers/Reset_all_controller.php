<?php 

  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reset_all_controller extends CI_Controller {

	 function __construct(){        
		    parent::__construct();
        $this->load->model('reset_model');
        date_default_timezone_set('Asia/Bangkok');
    }

    public function index(){            
      $data['page'] = 'shared_views/reset_all';
      $this->load->view('template_with_top_menu',$data);              
    }

    public function reset_all(){
      echo $this->reset_model->reset_all();
    }
}
?>