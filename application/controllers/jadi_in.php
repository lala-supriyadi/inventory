<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadi_in extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('jadi_in_model');
		
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'model_barang', 'jenis_barang' , 'motif_barang','tgl_masuk','jml_barang','trim|required');

        return $this->form_validation->run();
    }
    
	public function index() {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);

			$data['title'] = "DVStar";
			// $data['rupiah'] = "Rp.";
			$table = "jadi_in";
			$content = "jadi_in";
			$data['data_jadi_in'] = $this->jadi_in_model->get($table);
			$data['judule'] = "Barang Jadi Masuk";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url("login"));
		}
	}
	// public function tambahjadi_in() {	
	//  $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
 //        $data = array(
 //            'user' => $ambil_akun,
 //        );
 //        $data = array('kode_barang' => $this->jadi_in_model->get_option());
 //        $data['title'] = "Tambah Barang Jadi Masuk";
	// 	$content = "jadi_in/Tambah_jadi_in";
	// 	$data['judule'] = "Tambah Barang Masuk";
		
	// 	$this->template->output($data, $content);
	// }

	function tambahjadi_in($kode_barang) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);

					$table="artikel";
					$condition['kode_barang']=$kode_barang;

					$data['update'] = $this->jadi_in_model->getData($table, $condition);

					$data['title'] = "DVStar";
					$content = "jadi_in/tambah_jadi_in";
					$data['judule'] = "Tambah Barang Jadi Masuk";
					$this->template->output($data, $content);
		}
		else{
			redirect(base_url("login"));
		}
	}

	function tambahSubmit() {
		$table = "jadi_in";
		$kode_barang = $this->input->post('kode_barang');
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'model_barang' => $this->input->post('model_barang'), 
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang'=> $this->input->post('motif_barang'),
			'size' => $this->input->post('size'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'jml_barang' => $this->input->post('jml_barang'), 
			// 'total_simpan' => $this->input->post('total_simpan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->jadi_in_model->addData($table, $data);
		redirect('artikel/index','refresh');
	}

	public function tidak_laku() {
	$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        // $data = array('kode_barang' => $this->jadi_in_model->get_option());
		$data['title'] = "DVStar";
		$content = "jadi_in/tidak_laku";
		$data['judule'] = "Tambah Barang Tidak Laku";
		$this->template->output($data, $content);
	}

	function tidak_lakuSubmit() {
		$table = "jadi_in";
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'model_barang' => $this->input->post('model_barang'), 
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang'=> $this->input->post('motif_barang'),
			'size' => $this->input->post('size'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'jml_barang' => $this->input->post('jml_barang'),
			// 'total_simpan' => $this->input->post('total_simpan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->jadi_in_model->addData($table, $data);
		redirect('jadi_in/index','refresh');
	}

	function updatejadi_in($kode_barang) {
		$table="jadi_in";
		$condition['kode_barang']=$kode_barang;

		$data['update'] = $this->jadi_in_model->getData($table, $condition);

		$data['title'] = "DVStar";
		$content = "jadi_in/edit_jadi_in";
		$data['judule'] = "Edit Barang Jadi Masuk";
		$this->template->output($data, $content);
	}

	function updateSubmit() {
		$table = "jadi_in";
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'nama_barang' => $this->input->post('nama_barang'), 
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'size' => $this->input->post('size'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'jml_barang' => $this->input->post('jml_barang'),
			 
		);
		$this->jadi_in_model->updateData($table, $data, $condition);
		redirect('jadi_in');
	}

	function delete($kode_barang) {
		$table = "jadi_in";
		$condition['kode_barang'] = $kode_barang;
		$this->jadi_in_model->deleteData($table, $condition);
		redirect('jadi_in');
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */