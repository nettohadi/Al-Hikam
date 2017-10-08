<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class supplier_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();	

		$this->load->model('kode_model');
    	date_default_timezone_set('Asia/Bangkok');
	}

	public function getAllSupplier(){
		$query = "SELECT * FROM supplier";

        $query = $this->db->query($query);
        if ($query->num_rows() > 0)

            $data = $query->result();

        else

            $data = NULL;

        return $data;

	}

		public function quickInsert(){
		$nama = ucwords($this->input->post('quick-nama'));
		$query = "INSERT INTO supplier(nama) 
				  VALUES ('{$nama}')";
		return $this->db->query($query);   						
	}
}?>