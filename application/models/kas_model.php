<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

ini_set('display_errors', 'On');

error_reporting(E_ALL);

/**

* 

*/

class kas_model extends CI_Model

{

	

	function __construct()

	{

		parent::__construct();

	}



	function tambahModalUntung($modal,$untung){

		$queryModal = "SELECT jumlah from kas WHERE kode='cap' ";
		
		$data =  $this->db-query($queryModal)->result();
		$modalSaatIni = $data[0]->jumlah;

		$queryUntung = "SELECT jumlah WHERE kode='pro' ";
		
		$data =  $this->db-query($queryUntung)->result();
		$untungSaatIni = $data[0]->jumlah;

		$modalBaru = $modalSaatIni + $modal;
		$UntungBaru = $untungSaatIni + $untung;

		$this->db->trans_start();		

		$queryModal = "UPDATE kas SET
				jumlah='{$modalBaru}'  WHERE
				kode='cap'";

		$queryUntung = "UPDATE kas SET
				jumlah='{$untungBaru}'  WHERE
				kode='pro'";				

		$this->db-query($queryModal);	

		$this->db->trans_complete();
		return $this->db->trans_status();			     			
	}
}

?>