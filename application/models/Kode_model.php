<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
ini_set('display_errors', 'On');
error_reporting(E_ALL);
/**
* 
*/
class kode_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function getNewUrutan($kodeJenis){
		$query = "SELECT urutan FROM tabel_kode WHERE kode='".$kodeJenis."' LIMIT 1";
		$dataSet = $this->db->query($query);

        if ($dataSet->num_rows() > 0){
            $result = $dataSet->result();
        }
        else{
            $result = NULL;
        }
                
        if ($result != NULL) {
        	$lastUrutan = $result[0]->urutan;        
        	$newUrutan = $lastUrutan + 1;
        }
        else{
        	$newUrutan = '01'; 
        }

	    if (strlen($newUrutan) == 1) {
	        $newUrutan = '0'.$newUrutan;
	    }      

	    
        return $newUrutan;
	}

	function save($kode, $newUrutan){
		if ($newUrutan == '01') {
			$query = "INSERT INTO 'tabel_kode ('kode','urutan') VALUES ('{$kode}', '{$newUrutan}'')";
		}
		else{
			$query = "UPDATE `tabel_kode` SET
        	`urutan`='{$newUrutan}'  WHERE
         	`kode`='{$kode}'";	
		}
		
        return $this->db->query($query); 
	}
}
?>