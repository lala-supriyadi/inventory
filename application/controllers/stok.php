<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('stok_model');
	}
	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'nama_barang','tgl_masuk','stok','trim|required');

        return $this->form_validation->run();
    }


	
	public function index()
	{
	 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
		$data['title'] = "DVStar";
		$table = "barang";
		$content = "stok";
		$data['data_stok'] = $this->stok_model->get($table);
		$data['judule'] = "Stok Barang";
		$this->template->output($data, $content);
	}
	public function tambahstok()
	{
	 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
		$data['title'] = "DVStar";
		$content = "stok/tambah_stok";
		$data['judule'] = "Tambah Barang Mentah Masuk";
		$this->template->output($data, $content);
	}

	function tambahSubmit()
	{
		$table = "barang";
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'), 
			// 'nama_barang' => $this->input->post('nama_barang'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'stok' => $this->input->post('stok'),
			
			);
		$this->stok_model->addData($table, $data);
		redirect('stok/index','refresh');
	}
	function updatestok($kode_barang)
	{
		$table="barang";
		$condition['kode_barang'] = $kode_barang;

		$data['update'] = $this->stok_model->getData($table, $condition);

		$data['title'] = "DVStar";
		$content = "stok/edit_stok";
		$data['judule'] = "Edit Barang Mentah Masuk";
		$this->template->output($data, $content);
	}

	function updateSubmit()
	{
		$table = "barang";
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'), 
			// 'nama_barang' => $this->input->post('nama_barang'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'stok' => $this->input->post('stok'), 
		);
		$this->stok_model->updateData($table, $data, $condition);
		redirect('stok');
	}
	function delete($kode_barang)
	{
		$table = "barang";
		$condition['kode_barang'] = $kode_barang;
		$this->stok_model->deleteData($table, $condition);
		redirect('stok');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */