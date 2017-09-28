<?php 

  ini_set('display_errors', 'On');
  error_reporting(E_ALL);

  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class barang_controller extends CI_Controller {

	 function __construct(){        
		    parent::__construct();
        $this->load->model('barang_model');
        $this->load->model('jenis_barang_model'); 
        $this->load->model('satuan_barang_model'); 
        $this->load->model('supplier_model');        
        date_default_timezone_set('Asia/Bangkok');
    }

    public function index(){            
      $data['page'] = 'barang/barang_list';
      $data['daftarBarang'] = $this->barang_model->getAllBarang();
      $this->load->view('template_with_top_menu',$data);              
    }

    public function add(){
      $data['page'] = 'barang/barang_add';
      $data['dataJenisBarang'] = $this->jenis_barang_model->getAllJenisBarang();
      $data['dataSatuanBarang'] = $this->satuan_barang_model->getAllSatuanBarang();
      $data['dataSupplier'] = $this->supplier_model->getAllSupplier();
      $this->load->view('template_with_top_menu',$data);
    }

    public function edit($id){
      $data['page'] = 'barang/barang_edit';
      $data['dataJenisBarang'] = $this->jenis_barang_model->getAllJenisBarang();
      $data['dataSatuanBarang'] = $this->satuan_barang_model->getAllSatuanBarang();
      $data['dataSupplier'] = $this->supplier_model->getAllSupplier();
      $data['dataBarang'] = $this->barang_model->getById($id);
      $this->load->view('template_with_top_menu',$data);
    }

    public function insert(){      
      return $this->barang_model->insert();
    }

    public function update(){
      return $this->barang_model->update();
    }

    public function delete(){
      $kode = $this->input->post('kode');            
      $result = $this->barang_model->delete($kode);      
      if ($result == 1) {
        echo "berhasil";

      }
      else{
        echo "gagal";
      }
    }

}