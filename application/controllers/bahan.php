<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class bahan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('bahan_model');
		
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('kode_barang','nama_barang','stok','gambar','trim|required');

        return $this->form_validation->run();
    }

	public function index(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		         $data = array(
		             'user' => $ambil_akun,
		         );
				$data['title'] = "DVStar";
				// $data['rupiah'] = "Rp.";
				$table = "bahan";
				$content = "bahan";
				$data['data_bahan'] = $this->bahan_model->get($table);
				$data['judule'] = "Bahan";
				$this->template->output($data, $content);
			}else{
			redirect(base_url("login"));
		}
	}

	public function tambahbahan(){
	 $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $data['title'] = "DVStar";
		$content = "bahan/tambah_bahan";
		$data['judule'] = "Tambah Bahan";
		$this->template->output($data, $content);
	}

	function tambahSubmit(){
		$table = "bahan";
		$data['data_bahan'] = $this->bahan_model->get($table);
		$jenis_barang = $this->input->post('jenis_barang');
		$sub_jenis_barang = $this->input->post('sub_jenis_barang');
		$motif_barang = $this->input->post('motif_barang');
		$kode_barang = 'kode_barang';

			$jenis_barang = $jenis_barang;
			$kode1 = substr($jenis_barang,0,3);

			$sub_jenis_barang = $sub_jenis_barang;
			$kode2 = substr($sub_jenis_barang,0,3);

			$motif_barang = $motif_barang;
			$kode_brg = $kode1."-".$kode2."-".$motif_barang;


		$data = array(
			'jenis_barang' => $this->input->post('jenis_barang'),
			'sub_jenis_barang' => $this->input->post('sub_jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'kode_barang' => $kode_brg,
			'gambar'=> $this->upload(),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			);

		$this->bahan_model->addData($table, $data);
		redirect('bahan/index','refresh');
	}
	
	function updatebahan($id){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
			$data = array(
				'user'	=> $ambil_akun,
			);
		$table="bahan";
		$condition['id']=$id;

		$data['update'] = $this->bahan_model->getData($table, $condition);

		$data['title'] = "DVStar";
		$content = "bahan/edit_bahan";
		$data['judule'] = "Edit Bahan";
		$this->template->output($data, $content);
	}
	}

	function updateSubmit(){
		$table = "bahan";
		$condition['id'] = $this->input->post('id');
		$jenis_barang = $this->input->post('jenis_barang');
		$sub_jenis_barang = $this->input->post('sub_jenis_barang');
		$motif_barang = $this->input->post('motif_barang');

			$jenis_barang = $jenis_barang;
			$kode1 = substr($jenis_barang,0,3);

			$sub_jenis_barang = $sub_jenis_barang;
			$kode2 = substr($sub_jenis_barang,0,3);

			$motif_barang = $motif_barang;
			$kode_brg = $kode1."-".$kode2."-".$motif_barang;

		$data = array(
			'jenis_barang' => $this->input->post('jenis_barang'),
			'sub_jenis_barang' => $this->input->post('sub_jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'kode_barang' => $kode_brg, 
			'gambar'=> $this->upload('gambar'),
			'stok' => $this->input->post('stok'),
			'satuan' => $this->input->post('satuan'),
			);

		$this->bahan_model->updateData($table, $data, $condition);
		redirect('bahan');                                                                                                    
	}

	function delete($id){
		$table = "bahan";
		$condition['id'] = $id;
		$this->bahan_model->deleteData($table, $condition);
		redirect('bahan');
	}

	function upload() {
        $config['upload_path'] = './upload/bahan';
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