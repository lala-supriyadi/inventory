<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class surat_jalan_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}

	function get($table)
	{
		$this->db->select("*");
		$this->db->from($table);

		return $this->db->get();
	}

	function getcombo()
	{
		$query = $this->db->query('SELECT DISTINCT nama_pelapak FROM jadi_out');
        return $query->result();
	}
	function getData($table, $condition)
	{
        $this->db->where($condition); 
        $this->db->select("*");
        $this->db->from($table);
        
        return $this->db->get();
	}

	function addData($table,$data)
	{
		$this->db->insert($table, $data);
	}

	function updateData($table, $data, $condition)
	{
        $this->db->where($condition);
        $this->db->update($table, $data);
	}

	function deleteData($table, $condition)
	{
        $this->db->where($condition);
        $this->db->delete($table);
	}
 public function tanggal($tgl,$nama){
        return $this->db->query("select * from jadi_out where tgl_keluar in('$tgl') and nama_pelapak in('$nama') group by kode_barang");
    }
	
}

/* End of file simpan_model.php */
/* Location: ./application/models/simpan_model.php */