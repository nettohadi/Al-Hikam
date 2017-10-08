<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



/**

* 

*/

class jenis_barang_model extends CI_model

{

	

	function __construct()

	{

		parent::__construct();

	}



	public function getAllJenisBarang(){

		$query = "SELECT * FROM jenis_barang";



        $query = $this->db->query($query);



        if ($query->num_rows() > 0)

            $data = $query->result();

        else

            $data = NULL;



        return $data;

	}

	public function insert(){
		$nama = ucwords($this->input->post('quick-nama'));
		$query = "INSERT INTO jenis_barang(nama) 
				  VALUES ('{$nama}')";
		return $this->db->query($query);   						
	}

}



?>