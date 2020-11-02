<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kredit extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('kredit_model');
		$this->load->model('bayar_model');
		
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('nama_pelapak', 'tgl_kredit', 'jumlah_kredit' ,'trim|required');

        return $this->form_validation->run();
    }

	public function index() {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$table = "kredit";
			$content = "kredit";
			$data['data_kredit'] = $this->kredit_model->get($table);
			$data['judule'] = "Kredit";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function detail($id) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$table = "bayar";
			$condition['id']=$id;
			$content = "detail";
			$data['data_detail'] = $this->kredit_model->getData($table, $condition);
			$data['judule'] = "Detail";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function detailkredit($id) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	             'user' => $ambil_akun,
	         );
			$data['title'] = "DVStar";
			$table = "kredit_baru";
			$condition['id']=$id;
			$content = "detailkredit";
			$data['data_kredit_detail'] = $this->kredit_model->getData($table, $condition);
			$data['judule'] = "Detail";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	public function tambahkredit() {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$content = "kredit/tambah_kredit";
			$data['judule'] = "Tambah Kredit";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function tambahSubmit() {
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "kredit";
			$data = array(
				'nama_pelapak' =>  $this->input->post('nama_pelapak'),
				'no_tlp' =>  $this->input->post('no_tlp'),
				'alamat' =>  $this->input->post('alamat'),
				'tgl_kredit' => $this->input->post('tgl_kredit'), 
				'kredit_awal' => $this->input->post('jumlah_kredit'),
				'jumlah_kredit' => $this->input->post('jumlah_kredit'),
				'sisa_hutang' => $this->input->post('jumlah_kredit'),
				);
			$this->kredit_model->addData($table, $data);
			redirect('kredit/index','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	
	function utang($id) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$table="kredit";
			$condition['id']=$id;

			$data['update'] = $this->kredit_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "kredit/utang";
			$data['judule'] = "Tambah Kredit";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function utangSubmit() {
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "kredit_baru";
			$data = array(
				'id' => $this->input->post('id'),
				'nama_pelapak' =>  $this->input->post('nama_pelapak'),
				'tgl_kredit' => $this->input->post('tgl_kredit'), 
				'jml_kredit' => $this->input->post('jml_kredit'),
				
				);
			$this->kredit_model->addData($table, $data);
			redirect('kredit/index','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	
	function bayarkredit($id) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$table="kredit";
			$condition['id']=$id;

			$data['update'] = $this->kredit_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "kredit/bayar";
			$data['judule'] = "Bayar Kredit";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function bayarSubmit() {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );		
			$table = "bayar";
			$condition['id'] = $this->input->post('id');
			// $id = $this->input->post('id');
			$data = array(
				'id' => $this->input->post('id'),
				'nama_pelapak' => $this->input->post('nama_pelapak'),
				'tgl_bayar' => $this->input->post('tgl_bayar'), 
				'jml_bayar' => $this->input->post('jml_bayar'),
				// 'sisa_hutang' => $this->input->post('sisa_hutang'),
				 
			);
			$this->bayar_model->addData($table, $data);
			redirect('kredit/index','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updatekredit($id){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$table="kredit";
			$condition['id']=$id;

			$data['update'] = $this->kredit_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "kredit/edit_kredit";
			$data['judule'] = "Edit Kredit";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateSubmit(){
			if($this->session->userdata('isLogin1')==TRUE){
			$table = "kredit";
			$condition['id'] = $this->input->post('id');
			$jumlah_kredit = $this->input->post('jumlah_kredit');
			$data = array(
				'nama_pelapak' =>  $this->input->post('nama_pelapak'),
				'no_tlp' =>  $this->input->post('no_tlp'),
				'alamat' =>  $this->input->post('alamat'),
				'tgl_kredit' => $this->input->post('tgl_kredit'), 
				'jumlah_kredit' => $this->input->post('jumlah_kredit'),
				);
			$this->kredit_model->updateData($table, $data, $condition);
			redirect('kredit/index','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function delete($id){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "kredit";
			$condition['id'] = $id;
			$this->kredit_model->deleteData($table, $condition);
			redirect('kredit');
		
		} 
	}
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */