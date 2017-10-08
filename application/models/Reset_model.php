<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 'On');

error_reporting(E_ALL);

/**

* 

*/

class reset_model extends CI_Model

{

	

	function __construct()

	{

		parent::__construct();

	}

	public function reset_all(){
		$queryBarang = "TRUNCATE TABLE barang";
		$queryJenis = "TRUNCATE TABLE jenis_barang";
		$querySatuan = "TRUNCATE TABLE satuan";
		$querySupplier ="TRUNCATE TABLE supplier";
		$queryKode="TRUNCATE TABLE tabel_kode";
		$queryKodeJenis ="ALTER TABLE `jenis_barang` auto_increment = 1;";
		$queryKodeSatuan ="ALTER TABLE `satuan` auto_increment = 1;";
		$queryKodeSupplier ="ALTER TABLE `supplier` auto_increment = 1;";

		$this->db->trans_start();


  		$this->db->query($queryBarang);   

      	$this->db->query($queryJenis);

      	$this->db->query($querySatuan);

      	$this->db->query($querySupplier);

      	$this->db->query($queryKode);

		$this->db->query($queryKodeJenis);      	

		$this->db->query($queryKodeSatuan);

		$this->db->query($queryKodeSupplier);

	  	$this->db->trans_complete();

	  	echo $this->db->trans_status();			     
	}
}

?>