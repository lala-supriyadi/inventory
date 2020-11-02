<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class retur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('retur_model');
		
	}
	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'tgl_retur' , 'jenis_barang','motif_barang','tgl_masuk','jml_barang','keterangan','trim|required');

        return $this->form_validation->run();
    }
	
    public function index(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$data['judule'] = "Return Barang";
			$content = "retur_menu";	
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	
	public function index_return_rusak(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$table = "retur";
			$content = "retur";
			$data['data_retur'] = $this->retur_model->get($table);
			$data['judule'] = "Return Barang";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}


	public function tambahretur(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
				$data['title'] = "DVStar";
				$content = "retur/tambah_retur";
				$data['judule'] = "Tambah Barang Retur";
				$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function tambahSubmit(){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "retur";
			$data = array(
				'kode_barang' =>  $this->input->post('kode_barang'),
				'tgl_retur' => $this->input->post('tgl_retur'),
				'jenis_barang' => $this->input->post('jenis_barang'),
				'motif_barang'=> $this->input->post('motif_barang'),
				'size' => $this->input->post('size'),
				'jml_barang' => $this->input->post('jml_barang'),
				'keterangan' => $this->input->post('keterangan'),
				);
			$this->retur_model->addData($table, $data);
			redirect('retur/index_return_rusak','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateretur($kode_barang){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
			$table="retur";
			$condition['kode_barang']=$kode_barang;

			$data['update'] = $this->retur_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "retur/edit_retur";
			$data['judule'] = "EDIT Barang Retur";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateSubmit(){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "retur";
			$condition['kode_barang'] = $this->input->post('kode_barang');
			$data = array(
				'kode_barang' => $this->input->post('kode_barang'),
				'tgl_retur' => $this->input->post('tgl_retur'),
				'nama_barang' => $this->input->post('nama_barang'), 
				'jenis_barang' => $this->input->post('jenis_barang'),
				'motif_barang' => $this->input->post('motif_barang'), 
				'size' => $this->input->post('size'),
				'jml_barang' => $this->input->post('jml_barang'),
				'keterangan' => $this->input->post('keterangan'),
				 
			);
			$this->retur_model->updateData($table, $data, $condition);
			redirect('retur');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function delete($kode_barang){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "retur";
			$condition['kode_barang'] = $kode_barang;
			$this->retur_model->deleteData($table, $condition);
			redirect('retur');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */