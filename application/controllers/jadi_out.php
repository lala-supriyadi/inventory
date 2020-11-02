<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadi_out extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('jadi_out_model');
		
	}
	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'nama_barang', 'jenis_barang' , 'motif_barang','tgl_keluar','jml_barang','model_barang','trim|required');

        return $this->form_validation->run();
    }
	
	public function index() {
	 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
		$data['title'] = "DVStar";
		// $data['rupiah'] = "Rp.";
		$table = "jadi_out";
		$content = "jadi_out";
		$data['data_jadi_out'] = $this->jadi_out_model->get($table);
		$data['judule'] = "Barang jadi Keluar";
		$this->template->output($data, $content);
	}

	function tambahjadi_out($kode_barang) {
				if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);

			$table="artikel";
			$condition['kode_barang']=$kode_barang;

			$data['update'] = $this->jadi_out_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "jadi_out/tambah_jadi_out";
			$data['judule'] = "Tambah Barang Jadi Keluar";
			$this->template->output($data, $content);
		}
		else{
	
			redirect(base_url("login"));
		}
	}

	function tambahSubmit() {
		$table = "jadi_out";
		$kode_barang = $this->input->post('kode_barang');
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' =>  $this->input->post('kode_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'nama_pelapak' => $this->input->post('nama_pelapak'),
			'model_barang' => $this->input->post('model_barang'),
			'size' => $this->input->post('size'),
			'tgl_keluar' => $this->input->post('tgl_keluar'), 
			'jml_barang' => $this->input->post('jml_barang'), 
			// 'total_simpan' => $this->input->post('total_simpan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->jadi_out_model->addData($table, $data);
		redirect('artikel/index','refresh');
	}

	function updatejadi_out($kode_barang) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
		$table="jadi_out";
		$condition['kode_barang']=$kode_barang;

		$data['update'] = $this->jadi_out_model->getData($table, $condition);

		$data['title'] = "DVStar";
		$content = "jadi_out/edit_jadi_out";
		$data['judule'] = "Edit Barang Jadi Keluar";
		$this->template->output($data, $content);
	}

	function updateSubmit() {
		$table = "jadi_out";
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'size' => $this->input->post('size'),
			'nama_pelapak' => $this->input->post('nama_pelapak'),
			'tgl_keluar' => $this->input->post('tgl_keluar'), 
			'jml_barang' => $this->input->post('jml_barang'),
			 
		);
		$this->jadi_out_model->updateData($table, $data, $condition);
		redirect('jadi_out');
	}

	function delete($kode_barang) {
		$table = "jadi_out";
		$condition['kode_barang'] = $kode_barang;
		$this->jadi_out_model->deleteData($table, $condition);
		redirect('jadi_out');
	}    
}
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */