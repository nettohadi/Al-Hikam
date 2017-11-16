<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class penjualan_model extends CI_Model

{

	

	function __construct()

	{

		parent::__construct();	
		$this->load->model('kode_model');
		date_default_timezone_set('Asia/Bangkok');

	}

	public function insert(){

		$prefix = 'TJ'.date('y').date('m');
	  	$newUrutan = $this->kode_model->getNewUrutan($prefix);
	  	$kodeTrs = $prefix.$newUrutan;		

	  	$tgl_trs = date('Y-m-d');
	  	$waktu_trs = date('h:i:sa');



		$this->db->trans_start();

		$queryModal = "SELECT jumlah from kas WHERE kode='cap' ";
		
		$data =  $this->db->query($queryModal)->result();
		$modal = $data[0]->jumlah;

		$queryUntung = "SELECT jumlah from kas WHERE kode='pro' ";
		
		$data =  $this->db->query($queryUntung)->result();
		$untung = $data[0]->jumlah;



		for ($i=0; $i < count($_POST['kode']) ; $i++) { 
			$kode = $this->input->post('kode['.$i.']');
			$harga_jual = $this->input->post('harga_jual['.$i.']');
			$harga_beli = $this->input->post('harga_beli['.$i.']');
			$qty = $this->input->post('qty['.$i.']');
			$subTotal = $this->input->post('subTotal['.$i.']');

			$modal += $harga_beli * $qty;
			$untung += $subTotal - ($harga_beli * $qty);			

			$queryDetail = "INSERT INTO penjualan_detail (kode_trs, kode_barang, harga_beli, harga_jual, qty, total, diskon, modal, keuntungan) VALUES ('{$kodeTrs}', '{$kode}', '{$harga_beli}', '{$harga_jual}', '{$qty}', '{$subTotal}','0', '{$modal}','$untung')";
			
			$this->db->query($queryDetail);			


		}

		// !----penambahan modal dan untung-----!
		

		$queryModal = "UPDATE kas SET
				jumlah='{$modal}'  WHERE
				kode='cap'";

		$queryUntung = "UPDATE kas SET
				jumlah='{$untung}'  WHERE
				kode='pro'";				

		$this->db->query($queryModal);	
		$this->db->query($queryUntung);	
		// --------------------------------------

		$queryTransaksi = "INSERT INTO transaksi (kode, tgl, waktu, jumlah, kode_aksi, modal, keuntungan) VALUES ('{$kodeTrs}','{$tgl_trs}', '{$waktu_trs}', '{$this->input->post('text-total-trans')}','TJ','{$modal}','{$untung}')";

		$this->db->query($queryTransaksi);   


		if ($newUrutan == '01') {
			$queryKode = "INSERT INTO tabel_kode (kode, urutan) VALUES ('{$prefix}', '{$newUrutan}')";
		}
		else{
			$queryKode = "UPDATE tabel_kode SET
				urutan='{$newUrutan}'  WHERE
				kode='{$prefix}'";	
		}

		$this->db->query($queryKode);

		$this->db->trans_complete();
		return $this->db->trans_status();			     
	}
}

?>