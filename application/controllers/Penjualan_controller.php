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
  		$this->load->model('penjualan_model');
  	}

  	public function index(){
  		$data['page'] = 'penjualan/penjualan_add_edit';
  		$this->load->view('template_with_top_menu',$data);
  	}

  	public function getItem($strFilter){  		  	
  		$data = $this->barang_model->getDataBarang($strFilter);
  		$result['jmlData'] = $data['jmlData'];

  		if ($result['jmlData'] == 0) {
  			$result['html'] = '';
  		}

  		if ($result['jmlData'] == 1) {
  			$result['html'] = $this->load
  								   ->view('penjualan/penjualan_item',$data,true);
  		}

  		if ($result['jmlData'] > 1) {
  			$result['html'] = $this->load
  			                      ->view('barang/barang_list_item_lookUp',$data,true);
  		}  		
  		
  		header('Content-Type: application/json');
    	echo json_encode( $result );  		  		
  	}

  	public function barangCount($strFilter){  		
  		echo $this->barang_model->barangCount($strFilter);  	
  	}

	public function insert(){      
      return $this->penjualan_model->insert();
    }
  }
?>