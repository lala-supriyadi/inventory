<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('m_login');
        $this->load->model('laporan_model');
    }


    public function index(){
        if($this->session->userdata('isLogin1')==TRUE){
            $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
            $data = array(
                'user'  => $ambil_akun,
            );

            $data['fungsi'] = "Laporan/cari_tanggal";
            $data['title'] = "DVStar";
            $content = "index_laporan";
            $data['judule'] = "Laporan";
            $this->template->output($data,$content);

        }
        else{
            redirect(base_url("login"));
        }
    }
}