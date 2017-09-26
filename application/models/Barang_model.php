<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class barang_model extends CI_Model

{

	

	function __construct()

	{

		parent::__construct();	

		$this->load->model('kode_model');

	}



	public function getAllBarang()

	{

		$query = "SELECT 
              barang.kode, 
              barang.nama, 
              merk, 
              jenis_barang.kode AS kode_jenis, 
              jenis_barang.nama AS nama_jenis,
              harga_beli,
              harga_jual,
              diskon,
              qty_diskon,
              satuan.kode AS kode_satuan,
              satuan.nama AS nama_satuan,
              qty,
              tgl_expired,
              supplier                    
              FROM barang 
              INNER JOIN jenis_barang 
              on barang.kode_jenis = jenis_barang.kode
              INNER JOIN satuan 
              on barang.kode_satuan = satuan.kode";



        $dataSet = $this->db->query($query);



        if ($dataSet->num_rows() > 0)

            $dataBarang = $dataSet->result();

        else

            $dataBarang = NULL;



        return $dataBarang;

	}



	public function getById($id){

		$query = "SELECT * FROM barang WHERE kode='".$id."' LIMIT 1";



        $dataSet = $this->db->query($query);



        if ($dataSet->num_rows() > 0)

            $dataBarang = $dataSet->result();

        else

            $dataBarang = NULL;



        return $dataBarang;

	}



	public function update(){

	  $harga_beli = str_replace('.', '', $this->input->post('harga_beli'));

      $harga_jual = str_replace('.', '', $this->input->post('harga_jual'));

      $diskon = str_replace('.', '', $this->input->post('diskon'));

      $qty_diskon = str_replace('.', '', $this->input->post('qty_diskon'));

      $qty = str_replace('.', '', $this->input->post('qty'));	

      $nama = strtoupper($this->input->post('nama'));
      $merk = ucfirst($this->input->post('merk'));

      $query = "UPDATE `barang` SET        

        `nama`='{$nama}',

        `merk`='{$merk}',        

        `kode_jenis`='{$this->input->post('jenis')}',

        `kode_satuan`='{$this->input->post('satuan')}',

        `harga_beli`='{$harga_beli}',

        `harga_jual`='{$harga_jual}',

        `diskon`='{$diskon}',

        `qty_diskon`='{$qty_diskon}',

        `qty`='{$qty}',

        `tgl_expired`='',        

        `supplier`='{$this->input->post('supplier')}'        

          WHERE

         `kode`='{$this->input->post('kode')}'";         

      return $this->db->query($query);



	}



	public function insert(){		

	

	  $kodeJenis = $this->input->post('jenis');

	  $newUrutan = $this->kode_model->getNewUrutan($kodeJenis);

      $kodeBarang = $kodeJenis.$newUrutan;

      

      $harga_beli = str_replace('.', '', $this->input->post('harga_beli'));

      $harga_jual = str_replace('.', '', $this->input->post('harga_jual'));

      $diskon = str_replace('.', '', $this->input->post('diskon'));

      $qty_diskon = str_replace('.', '', $this->input->post('qty_diskon'));

      $qty = str_replace('.', '', $this->input->post('qty'));

      $nama = strtoupper($this->input->post('nama'));
      $merk = ucfirst($this->input->post('merk'));

	  $queryBarang = "INSERT INTO `barang`(     

      `kode`, 

      `nama`, 

      `merk`, 

      `kode_jenis`, 

      `harga_beli`, 

      `harga_jual`, 

      `diskon`, 

      `qty_diskon`, 

      `kode_satuan`, 

      `qty`, 

      `tgl_expired`,

      `supplier`) 

      VALUES 

      ('{$kodeBarang}',

      '{$nama}',

      '{$merk}',

      '{$this->input->post('jenis')}',      

      '{$harga_beli}',

      '{$harga_jual}',

      '{$diskon}',

      '{$qty_diskon}',

      '{$this->input->post('satuan')}',

      '{$qty}',

      '{$this->input->post('tgl_expired')}'),

      '{$this->input->post('supplier')}')";

      



      if ($newUrutan == '01') {

			$queryKode = "INSERT INTO tabel_kode (kode, urutan) VALUES ('{$kodeJenis}', '{$newUrutan}')";

	  }

	  else{

			$queryKode = "UPDATE tabel_kode SET

        	urutan='{$newUrutan}'  WHERE

         	kode='{$kodeJenis}'";	

	  }



	  $this->db->trans_start();



      $this->db->query($queryBarang);   

      $this->db->query($queryKode);

		

	  $this->db->trans_complete();



	  return $this->db->trans_status();			     

	}



	public function delete($kode){

		$query = "DELETE FROM barang WHERE kode in (".$kode.")";

		return $this->db->query($query);

	}

}  