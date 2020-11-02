<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class artikel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('cart');
		$this->load->model('m_login');
		$this->load->model('artikel_model');
		
	}

	private function validate() {			
            // $this->form_validation->set_rules('parent_id_siswa', 'Men siswa Id', 'trim|max_length[10]|integer');
			$this->form_validation->set_rules('model_barang','jenis_barang','motif_barang','kode_barang','gambar','trim|required');

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
				$table = "artikel";
				$content = "artikel";
				$data['data_artikel'] = $this->artikel_model->get($table);
				$data['judule'] = "Artikel";
				$this->template->output($data, $content);
			}else{
				redirect(base_url("login"));
			}
	}

	public function tambahartikel(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		         $data = array(
		             'user' => $ambil_akun,
		         );
	        $data['title'] = "DVStar";
			$content = "artikel/tambah_artikel";
			$data['judule'] = "Tambah Artikel";
			$this->template->output($data, $content);
		}else{
				redirect(base_url("login"));
			}
	}

	function tambahSubmit(){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		         $data = array(
		             'user' => $ambil_akun,
		         );
		}else{
				redirect(base_url("login"));
			}
		$table = "artikel";
		$data['data_artikel'] = $this->artikel_model->get($table);
		$model_barang = $this->input->post('model_barang');
		$jenis_barang = $this->input->post('jenis_barang');
		$motif_barang = $this->input->post('motif_barang');
		$size = $this->input->post('size');
		// $gambar = $this->upload();
		$kode_barang = 'kode_barang';

		$model_barang = $model_barang;
			$kode2 = substr($model_barang,0,2);

			$jenis_barang = $jenis_barang;
			$kode1 = substr($jenis_barang,0,3);

			// $size = $size;
			$kode3 = substr($size,0,3);

			$motif_barang = $motif_barang;
			$kode_brg = $kode1."-".$kode2."-".$motif_barang."-".$kode3;

		$data = array(
			'model_barang' =>  $this->input->post('model_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'size' => $this->input->post('size'), 
			'kode_barang' => $kode_brg,
			'gambar'=> $this->upload(),
			'stok' => $this->input->post('stok'),

		
									
			// 'total_simpan' => $this->input->post('total_simpan'),
			
			//'total_simpan2' => $this->set_pinjam_m->insert($this->input->post ('total_simpan')),
			);
		$this->artikel_model->addData($table, $data);
		redirect('artikel/index','refresh');
	}
	
	function updateartikel($kode_barang){
		if($this->session->userdata('isLogin1')==TRUE){
			$ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
		         $data = array(
		             'user' => $ambil_akun,
		         );
		}else{
				redirect(base_url("login"));
			}
		$table="artikel";
		$condition['kode_barang']=$kode_barang;

		$data['update'] = $this->artikel_model->getData($table, $condition);

		$data['title'] = "DVStar";
		$content = "artikel/edit_artikel";
		$data['judule'] = "Edit Artikel";
		$this->template->output($data, $content);
	}


	function updateSubmit(){
		$table = "artikel";
		$condition['kode_barang'] = $this->input->post('kode_barang');
		// $kode_barang = 'kode_barang';
		$model_barang = $this->input->post('model_barang');
		$jenis_barang = $this->input->post('jenis_barang');
		$motif_barang = $this->input->post('motif_barang');
		$size = $this->input->post('size');

		$model_barang = $model_barang;
			$kode2 = substr($model_barang,0,2);

			$jenis_barang = $jenis_barang;
			$kode1 = substr($jenis_barang,0,3);

			// $size = $size;
			$kode3 = substr($size,0,3);

			$motif_barang = $motif_barang;
			$kode_brg = $kode1."-".$kode2."-".$motif_barang."-".$kode3;

		$data = array(
			'model_barang' =>  $this->input->post('model_barang'),
			'jenis_barang' => $this->input->post('jenis_barang'),
			'motif_barang' => $this->input->post('motif_barang'),
			'size' => $this->input->post('size'),
			'kode_barang' => $kode_brg, 
			'gambar'=> $this->upload('gambar'),
			'stok' => $this->input->post('stok'),
			 
		);
		$this->artikel_model->updateData($table, $data, $condition);
		redirect('artikel');                                                                                                    
	}

	function delete($kode_barang){
		$table = "artikel";
		$condition['kode_barang'] = $kode_barang;
		$this->artikel_model->deleteData($table, $condition);
		redirect('artikel');
	}

	function upload() {
        $config['upload_path'] = './upload/gambar';
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