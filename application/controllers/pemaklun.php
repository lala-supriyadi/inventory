<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pemaklun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('pemaklun_model');
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('nama_pemaklun', 'alamat', 'no_telepon' ,'trim|required');

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
			$table = "pemaklun";
			$content = "pemaklun";
			$data['data_pemaklun'] = $this->pemaklun_model->get($table);
			$data['judule'] = "Pemaklun";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	public function tambahpemaklun()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$content = "pemaklun/tambah_pemaklun";
			$data['judule'] = "TAMBAH PEMAKLUN";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function tambahSubmit()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "pemaklun";
			$data = array(
				'nama_pemaklun' => $this->input->post('nama_pemaklun'), 
				'alamat' => $this->input->post('alamat'),
				'no_telepon' => $this->input->post('no_telepon'), 
				
				);
			$this->pemaklun_model->addData($table, $data);
			redirect('pemaklun/index','refresh');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	function updatepemaklun($nama_pemaklun)
	{

		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$table="pemaklun";
			$condition['nama_pemaklun'] = $nama_pemaklun;

			$data['update'] = $this->pemaklun_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "pemaklun/edit_pemaklun";
			$data['judule'] = "EDIT PEMAKLUN";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateSubmit()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "pemaklun";
			$condition['nama_pemaklun'] = $this->input->post('nama');
			$data = array(
				'nama_pemaklun' => $this->input->post('nama_pemaklun'), 
				'alamat' => $this->input->post('alamat'), 
				'no_telepon' => $this->input->post('no_telepon'), 
			);
			$this->pemaklun_model->updateData($table, $data, $condition);
			redirect('pemaklun');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function delete($id_user)
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "pemaklun";
			$condition['nama_pemaklun'] = $id_user;
			$this->pemaklun_model->deleteData($table, $condition);
			redirect('pemaklun');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */