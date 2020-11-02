<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class lap_jadi_out extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('cart');
        $this->load->model('m_login');
        $this->load->model('laporan_model');
    }


    public function index(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama')); //menampilkan session login
        $data = array(
            'user' => $ambil_akun,
        );
        $data['fungsi'] = "lap_jadi_out/tanggal_jadi_out";
        $data['title'] = "DVStar";
        $content = "laporan/jadi_out/tanggal";
        $data['judule'] = "Laporan";

        $this->template->output($data,$content);

    }
    function tanggal_jadi_out(){
        $ambil_akun = $this->m_login->ambil_user($this->session->userdata('nama'));
        $data = array(
            'user' => $ambil_akun,
        );
        $data['title']="DVStar";
        $data['fungsi'] = "lap_jadi_out/tanggal_jadi_out";
        $data['judule']="Laporan Barang Keluar";
        $tgl2=$this->input->post('tanggal1');
        $tgl3=$this->input->post('tanggal2');
        $content = "laporan/jadi_out/cari_tanggal";
        $data['tgl_mulai']= $tgl2;
        $data['tgl_selesai']= $tgl3;
        $data['lap'] = $this->laporan_model->tanggal($tgl2,$tgl3)->result();
        $this->template->output($data, $content);
    }

    // public function getjadi_in() {
    //     $from = $this->input->get('from');
    //     $to = $this->input->get('to');
    //     $data = array(
    //         'getJadi_in' => $this->myigniter_model->getJadi_in($from, $to),
    //         'from' => $from,
    //         'to' => $to
    //     );
    // }

    public function pdf($from, $to) {
        $this->load->library('cfpdf');

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->SetFont('Arial', '', 10);
        $this->SetX($this->lMargin);
        $pdf->Cell(0, 8, "Laporan Barang Jadi Keluar " . $from . " - " .$to, 0, 0, 'C');

        $pdf->Cell(15, 7, 'No', 1, 0, 'L');
        $pdf->Cell(85, 7, 'Tanggal', 1, 0, 'L');
        $pdf->Cell(85, 7, 'Total Penjualan', 1, 0, 'L');
        $pdf->Ln();
       
        $penjualan = $this->myigniter_model->getJadi_in($from, $to);

        $no = 1;
        $total_penjualan = 0;
        foreach ($penjualan as $p) {
            $pdf->Cell(15, 7, $no, 1, 0, 'L');
            $pdf->Cell(85, 7, date('d F Y', strtotime($p['tgl'])), 1, 0, 'L');
            $pdf->Cell(85, 7, "Rp. " . str_replace(",", ".", number_format($p['jml_barang'])), 1, 0, 'L');
            $pdf->Ln();
            $total_penjualan = $jml_barang + $p['total_harga'];
            $no++;
        }

        $pdf->Cell(100, 7, 'Total Seluruh Barang Keluar', 1, 0, 'L');
        $pdf->Cell(85, 7, "Rp. " . str_replace(",", ".", number_format($total_jadi_in)), 1, 0, 'L');
        $pdf->Ln();

        $pdf->Output();
    }
    public function print_laporan($tgl_mulai,$tgl_selesai){
        $this->load->library('cfpdf');

        $pdf = new FPDF('L');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 20);
        $pdf->Cell(0, 8, "DV STAR FASHION ", 0, 1, 'C');
        $pdf->Cell(0, 8, "Laporan Barang Keluar ", 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 10, "Periode : " . $tgl_mulai . " - " .$tgl_selesai, 0, 1, 'L');
        $pdf->SetFillColor(191, 196, 185);
        $pdf->Cell(15, 7, 'No', 1, 0, 'C',1);
        $pdf->Cell(50, 7, 'Kode', 1, 0, 'C',1);
        $pdf->Cell(20, 7, 'Jenis', 1, 0, 'C',1);
        $pdf->Cell(40, 7, 'Model Barang', 1, 0, 'C',1);
        $pdf->Cell(40, 7, 'Motif Barang', 1, 0, 'C',1);
        $pdf->Cell(50,7, 'Tanggal Keluar', 1, 0, 'C',1);
        $pdf->Cell(30,7, 'jumlah', 1, 0, 'C',1);
        $pdf->Ln();
       $pdf->SetFont('Arial', '', 10);
        $simpan = $this->laporan_model->tanggal($tgl_mulai,$tgl_selesai)->result();

        $no = 1;
        
        foreach ($simpan as $p) {
        	if($no % 2 == 0)
        	{
        		$pdf->SetFillColor(230,230,230);
        	}
      		else
      		{
      			$pdf->SetFillColor(255,255,255);	
      		}
            $pdf->Cell(15, 7, $no, 1, 0, 'C',1);
            $pdf->Cell(50, 7, $p->kode_barang, 1, 0, 'C',1);
            $pdf->Cell(20, 7, $p->jenis_barang, 1, 0, 'C',1);
            $pdf->Cell(40, 7, $p->model_barang, 1, 0, 'C',1);
            $pdf->Cell(40, 7, $p->motif_barang, 1, 0, 'C',1);
            $pdf->Cell(50, 7, $p->tgl_keluar, 1, 0, 'C',1);
            $pdf->Cell(30, 7, ($p->jml_barang), 1, 0, 'C',1);            
            $pdf->Ln();            
            $no++;
        }        
        $pdf->Output();
    }

}
