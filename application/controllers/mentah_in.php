<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mentah_in extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('mentah_in_model');
	}
	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang', 'nama_barang', 'jenis_barang' , 'motif_barang','tgl_masuk','jml_barang','trim|required');

        return $this->form_validation->run();
    }

	public function index(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
	        $data = array(
	            'user' => $ambil_akun,
	        );
			$data['title'] = "DVStar";
			$table = "mentah_in";
			$content = "mentah_in";
			$data['data_mentah_in'] = $this->mentah_in_model->get($table);
			$data['judule'] = "Barang Mentah Masuk";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function tambahmentah_in($kode_barang) {
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
			$table="bahan";
			$condition['kode_barang']=$kode_barang;

			$data['update'] = $this->mentah_in_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "mentah_in/tambah_mentah_in";
			$data['judule'] = "Tambah Barang Jadi Masuk";
			$this->template->output($data, $content);	
		}
		else{
			redirect(base_url("login"));
		}
	}

	function tambahSubmit(){
		if($this->session->userdata('isLogin1')==TRUE){
		$table = "mentah_in";
		$kode_barang = $this->input->post('kode_barang');
		$condition['kode_barang'] = $this->input->post('kode_barang');
		$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang'=> $this->input->post('motif_barang'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'jml_barang' => $this->input->post('jml_barang'), 
			'satuan' => $this->input->post('satuan'),
				
				);
			$this->mentah_in_model->addData($table, $data);
			redirect('bahan/index','refresh');
			}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updatementah_in($kode_barang){
		if($this->session->userdata('isLogin1')==TRUE){
			$table="mentah_in";
			$condition['kode_barang'] = $kode_barang;

			$data['update'] = $this->mentah_in_model->getData($table, $condition);

			$data['title'] = "DVStar";
			$content = "mentah_in/edit_mentah_in";
			$data['judule'] = "Edit Barang Mentah Masuk";
			$this->template->output($data, $content);
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function updateSubmit(){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "mentah_in";
			$condition['kode_barang'] = $this->input->post('kode_barang');
			$data = array(
			'kode_barang' => $this->input->post('kode_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang'=> $this->input->post('motif_barang'),
			'tgl_masuk' => $this->input->post('tgl_masuk'), 
			'jml_barang' => $this->input->post('jml_barang'), 
			'satuan' => $this->input->post('satuan'),

				// 'gambar'=> $this->upload(), 
			);
			$this->mentah_in_model->updateData($table, $data, $condition);
			redirect('mentah_in');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function delete($kode_barang){
		if($this->session->userdata('isLogin1')==TRUE){
			$table = "mentah_in";
			$condition['kode_barang'] = $kode_barang;
			$this->mentah_in_model->deleteData($table, $condition);
			redirect('mentah_in');
		}
		else{
			redirect(base_url('login','refresh'));
		}
	}

	function upload() {
        $config['upload_path'] = './upload/mentah';
        $config['allowed_types'] = 'gif|png|jpg|jpeg';
        $config['max_size'] = 100000;
        $this->load->library('upload', $config);   
        $this->upload->do_upload('gambar');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
	
    
}

/* End of file KelolaUser.php */
/* Location: ./application/controllers/KelolaUser.php */