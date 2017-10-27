<?php
 ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  /**
  * 
  */
  class penjualan_controller extends CI_controller
  {
  	
  	function __construct()
  	{
  		parent::__construct();
  		$this->load->model('barang_model');
  	}

  	public function index(){
  		$data['page'] = 'penjualan/penjualan_add_edit';
  		$this->load->view('template_with_top_menu',$data);
  	}

  	public function getItem($id){  		
  		// echo '<div>berhasil</div>';
  		$data['dataBarang'] = $this->barang_model->getById($id);
  		$this->load->view('penjualan/penjualan_item',$data);
  	}
  }
?>