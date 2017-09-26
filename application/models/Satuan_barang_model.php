<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* 
*/
class satuan_barang_model extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getAllSatuanBarang(){
		$query = "SELECT * FROM satuan";

        $query = $this->db->query($query);

        if ($query->num_rows() > 0)
            $data = $query->result();
        else
            $data = NULL;

        return $data;
	}
}

?>