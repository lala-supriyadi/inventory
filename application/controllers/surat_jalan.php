<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class surat_jalan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('m_login');
        $this->load->model('surat_jalan_model');
    }


    public function index(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $data['fungsi'] = "surat_jalan/cari_pelapak";
        $data['title'] = "DVStar";
        $data['dd_bidang'] = $this->surat_jalan_model->getcombo();
        $content = "surat_jalan";

        $data['judule'] = "Surat Jalan";
        $this->template->output($data,$content);

    }

    public function index_surat_jalan() {
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $data['fungsi'] = "surat_jalan/cari_pelapak";
        $data['title'] = "DVStar";
        $content = "surat_jalan/pelapak";
        $data['judule'] = "Surat Jalan";

        $this->template->output($data,$content);
    }
    function cari_pelapak(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama'));
        $data = array(
            'user' => $ambil_akun,
        );
        $data['title']="DVStar";
        $data['fungsi'] = "surat_jalan/cari_pelapak";
        $data['judule']="Surat Jalan";
        $nama=$this->input->post('nama_pelapak');
        $tgl3=$this->input->post('tanggal2');
        $content = "surat_jalan/cari_pelapak";
        $data['nama_pelapak']= $nama;
        $data['tgl_selesai']= $tgl3;
        $data['lap'] = $this->surat_jalan_model->tanggal($tgl3,$nama)->result();
        $this->template->output($data, $content);
    }

    public function print_laporan($nama_pelapak,$tgl_keluar){
        $this->load->library('cfpdf');

        $pdf = new FPDF('L');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 8, "DV STAR FASHION ", 0, 1, 'C');
        $pdf->Cell(0, 8, "Surat Jalan ", 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 10, "Nama pelapak : " . $nama_pelapak, 0, 1, 'L');
        $pdf->Cell(0, 10, "Tanggal : " .$tgl_keluar, 0, 1, 'L');
        $pdf->SetFillColor(191, 196, 185);
        $pdf->Cell(15, 7, 'No', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(35, 7, 'Tanggal Keluar', 1, 0, 'C');
        $pdf->Cell(30, 7, 'Jumlah Barang', 1, 0, 'C');
        $pdf->Cell(20, 7, 'Motif' , 1, 0, 'C');
        $pdf->Cell(30, 7, 'Sisa Barang' , 1, 0, 'C');
        $pdf->Cell(15, 7, 'Reject' , 1, 0, 'C');
        $pdf->Cell(30, 7, 'Barang Terjual' , 1, 0, 'C');
        $pdf->Cell(20, 7, 'Harga' , 1, 0, 'C');
        $pdf->Cell(20, 7, 'Total' , 1, 0, 'C');
        $pdf->Cell(35, 7, 'Keterangan' , 1, 0, 'C');
        $pdf->Ln();

        $simpan = $this->surat_jalan_model->tanggal($tgl_keluar,$nama_pelapak)->result();

        $no = 1;
        
        foreach ($simpan as $p) {
            $pdf->Cell(15, 7, $no, 1, 0, 'C');
            $pdf->Cell(35, 7, $p->kode_barang, 1, 0, 'C');
            $pdf->Cell(35, 7, $p->tgl_keluar, 1, 0, 'C');
            $pdf->Cell(30, 7, ($p->jml_barang), 1, 0, 'C');            
            $pdf->Cell(20, 7, $p->motif_barang, 1, 0, 'C');
            $pdf->Cell(30, 7, '' , 1, 0, 'C');
            $pdf->Cell(15, 7, '' , 1, 0, 'C');
            $pdf->Cell(30, 7, '' , 1, 0, 'C');
            $pdf->Cell(20, 7, '' , 1, 0, 'C');
            $pdf->Cell(20, 7, '' , 1, 0, 'C');
            $pdf->Cell(35, 7, '' , 1, 0, 'C');
            $pdf->Ln();            
            $no++;
        }        
        $pdf->Output();
    }

}
