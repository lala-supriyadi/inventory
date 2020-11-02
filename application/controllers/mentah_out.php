<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mentah_out extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('mentah_out_model');
		
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'nama_barang', 'nama_pemaklun','tgl_keluar', 'jml_barang' ,'trim|required');

        return $this->form_validation->run();
    }

	public function index()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			// $data['rupiah'] = "Rp.";
			$table = "mentah_out";
			$content = "mentah_out";
			$data['data_mentah_out'] = $this->mentah_out_model->get($table);
			$data['judule'] = "Barang Mentah Keluar";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function tambahmentah_out($kode_barang) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
			$table="bahan";
			$condition['kode_barang']=$kode_barang;

			$data['update'] = $this->mentah_out_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "mentah_out/tambah_mentah_out";
			$data['judule'] = "Tambah Barang Mentah Keluar";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url("login"));
		}
	}

	function tambahSubmit() {
		$table = "mentah_out";
		$kode_barang = $this->input->post('kode_barang');
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' =>  $this->input->post('kode_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'nama_pemaklun' => $this->input->post('nama_pemaklun'),
			'tgl_keluar' => $this->input->post('tgl_keluar'), 
			'jml_barang' => $this->input->post('jml_barang'),
			'satuan' => $this->input->post('satuan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->mentah_out_model->addData($table, $data);
		redirect('bahan/index','refresh');
	}

	function updatementah_out($kode_barang)
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table="mentah_out";
			$condition['kode_barang']=$kode_barang;

			$data['update'] = $this->mentah_out_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "mentah_out/edit_mentah_out";
			$data['judule'] = "Edit Barang Mentah Keluar";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateSubmit()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "mentah_out";
			$condition['kode_barang'] = $this->input->post('kode_barang');
			$data = array(
				'kode_barang' =>  $this->input->post('kode_barang'),
				'jenis_barang' => $this->input->post('jenis_barang'),
				'motif_barang' => $this->input->post('motif_barang'),
				'nama_pemaklun' => $this->input->post('nama_pemaklun'),
				'tgl_keluar' => $this->input->post('tgl_keluar'), 
				'jml_barang' => $this->input->post('jml_barang'),
				'satuan' => $this->input->post('satuan'),
				 
			);
			$this->mentah_out_model->updateData($table, $data, $condition);
			redirect('mentah_out');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function delete($kode_barang)
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "mentah_out";
			$condition['kode_barang'] = $kode_barang;
			$this->mentah_out_model->deleteData($table, $condition);
			redirect('mentah_out');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */