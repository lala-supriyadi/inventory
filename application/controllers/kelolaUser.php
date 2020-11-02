<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KelolaUser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('KelolaUser_model');
	}

	
	public function index()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);

			$data['title'] = "DVStar";
			$table = "user";
			$content = "user";

			$data['data_user'] = $this->KelolaUser_model->get($table);
			$data['judule'] = "Kelola User";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url("login"));
		}
	}
	public function tambahUser()
	{	
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
			$data['title'] = "DVStar";
			$content = "user/tambah_user";
			$data['judule'] = "TAMBAH USER";
			$data['id'] = $this->m_login->getIDOtomatis();
			$this->template->output($data, $content);	
		}
		else{
			redirect(base_url("login"));
		}
	}

	function tambahSubmit()
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "user";
			$level = $this->input->post('level');
			$data = array(
				'id_user' => $this->input->post('id'), 
				'nama' => $this->input->post('nama'), 
				'username' => $this->input->post('username'), 
				'password' => md5($this->input->post('password')), 
				'level' => $level,
				);
			$this->KelolaUser_model->addData($table, $data);
			if($level=='anggota'){
				$data_ = array(
					'id_anggota' => $this->input->post('id'), 
					'nama_anggota' => $this->input->post('nama'),
					'status' => 'aktif'			
				);
			   $this->KelolaUser_model->addData('anggota', $data_);
		    }
			redirect('kelolaUser/index','refresh');
		}
		else{
			redirect(base_url("login"));
		}
	}
	function updateBarang($id_user)
	{
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
			$table="user";
			$condition['id_user'] = $id_user;

			$data['update'] = $this->KelolaUser_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "user/edit_user";
			$data['judule'] = "EDIT USER";
			$this->template->output($data, $content);	
		}
		else{
			redirect(base_url("login"));
		}
	}

	function updateSubmit()
	{	

		if($this->session->userdata('isLogin1')==TRUE){
			$table = "user";
			$condition['id_user'] = $this->input->post('id_user');
			$data = array(
				'nama' => $this->input->post('nama'), 
				'username' => $this->input->post('username'), 
				'level' => $this->input->post('level'), 
			);
			$this->KelolaUser_model->updateData($table, $data, $condition);
			redirect('KelolaUser');
		}
		else{
			redirect(base_url("login"));
		}
	}

	function delete($id_user)
	{
		if($this->session->userdata('isLogin1')==TRUE){

			$table = "user";
			$condition['id_user'] = $id_user;
			$this->KelolaUser_model->deleteData($table, $condition);
			redirect('KelolaUser');
		}
		else{
			redirect(base_url("login"));
		}
	}
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */