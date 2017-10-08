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
      // echo $this->barang_model->getAllBarang();;
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

    public function getBarangFormSearch(){
      $data['dataJenisBarang'] = $this->jenis_barang_model->getAllJenisBarang();      
      $data['dataSupplier'] = $this->supplier_model->getAllSupplier();      
      $this->load->view('barang/barang_list_search',$data);       
    }

    public function filterBarang(){      
        $data['daftarBarang'] = $this->barang_model->getAllBarang(
        $this->input->post('kode'),          
        $this->input->post('nama'),
        $this->input->post('jenis'),
        $this->input->post('supplier'));

        
        if ($data['daftarBarang']==NULL) {
          echo '<div class="no-data">Data yang anda cari tidak ditemukan</div>';
        }
        else{
          $this->load->view('barang/barang_list_item',$data);                
        }        
    }

    public function getQuickAddFormJenis($selectName){
      $data['insertUrl']= site_url('Barang_controller/quickInsertJenis');
      $data['getUrl']=site_url('Barang_controller/quickGetJenis');;
      $data['selectId']=$selectName;
      $this->load->view('shared_views/quick_add_form',$data);
    }

    public function quickInsertJenis(){
      return $this->jenis_barang_model->insert();
    }

    public function quickGetJenis(){
        $dataJenis = $this->jenis_barang_model->getAllJenisBarang();
        echo print_html_select_options($dataJenis, 'kode','nama','Pilih Jenis Barang');
    }

    public function getQuickAddFormSatuan($selectName){
      $data['insertUrl']= site_url('Barang_controller/quickInsertSatuan');
      $data['getUrl']=site_url('Barang_controller/quickGetSatuan');;
      $data['selectId']=$selectName;
      $this->load->view('shared_views/quick_add_form',$data);
    }

    public function quickInsertSatuan(){
      return $this->satuan_barang_model->insert();
    }

    public function quickGetSatuan(){
        $dataSatuan = $this->satuan_barang_model->getAllSatuanBarang();
        echo print_html_select_options($dataSatuan, 'kode','nama','Pilih Satuan Barang');
    }

    public function getQuickAddFormSupplier($selectName){
      $data['insertUrl']= site_url('Barang_controller/quickInsertSupplier');
      $data['getUrl']=site_url('Barang_controller/quickGetSupplier');;
      $data['selectId']=$selectName;
      $this->load->view('shared_views/quick_add_form',$data);
    }

    public function quickInsertSupplier(){
      return $this->supplier_model->QuickInsert();
    }

    public function quickGetSupplier(){
        $dataSupplier = $this->supplier_model->getAllSupplier();
        echo print_html_select_options($dataSupplier, 'kode','nama','Pilih Supplier');
    }

}