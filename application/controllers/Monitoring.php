<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring extends CI_Controller {
	
	public function index()
	{
		$data['page'] = 'frontend/home';
		$data['footer'] = 'frontend/footer';
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	public function data_rekap(){
		$this->load->model('M_bendung','rekap_data');
		$data['isi']=$this->rekap_data->get_rekap_desc();
		$data['page'] = 'frontend/data_rekap';
		$data['footer'] = 'frontend/footer2';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function grafik_rekap_cari(){
		$this->load->model('M_bendung','rekap_data');
		$tanggal = $this->input->post('tanggal'); 
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data['isi'] = $this->rekap_data->get_cari_tanggal($tanggal, $bulan, $tahun);
		$data['page'] = 'frontend/grafik_rekap_cari';
		$data['footer'] = 'frontend/footer2';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function grafik(){
		$data['page'] = 'frontend/grafik';
		$data['footer'] = 'frontend/footer2';
		$this->load->view('frontend/monitoring', $data, false);
	}

	function get_realtime(){
		$this->load->model('M_bendung','get_realtime');
		$data_tabel = $this->get_realtime->get();
		echo json_encode($data_tabel);
	}
	
	function get_grafik_rekap(){
		$this->load->model('M_bendung','rekap');
		$data_tabel = $this->rekap->get_rekap();
		echo json_encode($data_tabel);
	}

	function rekap(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'frontend/rekap';
		$data['footer'] = 'frontend/footer2';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function get_kontrol_pintu(){
		$this->load->model('M_bendung','get_kontrol_pintu');
		$data_tabel = $this->get_kontrol_pintu->get_kontrol_pintu();
		echo json_encode($data_tabel);
	}
	
	function status_pintu(){
		$data['page'] = 'frontend/status_pintu';
		$data['footer'] = 'frontend/footer2';
		$this->load->view('frontend/monitoring', $data, FALSE);
	}
	
	function rekap_pintu_kontrol(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'frontend/rekap_pintu_kontrol';
		$data['footer'] = 'frontend/footer2';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal_kontrol();
		$data['option_bulan'] = $this->rekap_data->option_bulan_kontrol();
		$data['option_tahun'] = $this->rekap_data->option_tahun_kontrol();
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function rekap_pintu_kontrol_cari(){
		$this->load->model('M_bendung','rekap_data');
		$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
    	$data['tanggal'] = $tanggal;
    	$data['bulan'] = $bulan;
    	$data['tahun'] = $tahun;
    	$data['option_tanggal'] = $this->rekap_data->option_tanggal_kontrol();
		$data['option_bulan'] = $this->rekap_data->option_bulan_kontrol();
    	$data['option_tahun'] = $this->rekap_data->option_tahun_kontrol();
		$data['isi'] = $this->rekap_data->get_cari_tanggal_kontrol($tanggal, $bulan, $tahun);
		$data['page'] = 'frontend/rekap_pintu_kontrol_cari';
		$data['footer'] = 'frontend/footer2';
		$this->load->view('frontend/monitoring', $data, FALSE);
	}
	
	function cetak_pdf_kontrol() {
    // load view yang akan digenerate atau diconvert
    	$this->load->model('M_bendung','rekap_data');
    	$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
    	$data['record'] = $this->rekap_data->get_cari_tanggal_kontrol($tanggal, $bulan, $tahun);
	    $this->load->view('frontend/rekap_cetak_kontrol', $data, FALSE);
	    // dapatkan output html
	    $html = $this->output->get_output();
	    // Load/panggil library dompdfnya
	    $this->load->library('dompdf_gen');
	    // Convert to PDF
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    //utk menampilkan preview pdf
	    $sekarang=date("d:F:Y H:i:s");
	    $this->dompdf->stream("data_rekap_kontrol_pintu_air_".$sekarang.".pdf",array('Attachment'=>0));
	    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
	    //$this->dompdf->stream("welcome.pdf");
	}
	
	function kontrol_pintu(){
		$this->load->model('M_bendung','kontrol_pintu');
		$data['isi']=$this->kontrol_pintu->get_kontrol_pintu_desc();
		$data['page'] = 'frontend/kontrol_pintu';
		$data['footer'] = 'frontend/footer2';
		$data['option_tanggal'] = $this->kontrol_pintu->option_tanggal_kontrol();
		$data['option_bulan'] = $this->kontrol_pintu->option_bulan_kontrol();
		$data['option_tahun'] = $this->kontrol_pintu->option_tahun_kontrol();
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function cetak_pdf() {
    // load view yang akan digenerate atau diconvert
    	$this->load->model('M_bendung','rekap_data');
    	$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
	    $data['record'] = $this->rekap_data->get_cari_tanggal($tanggal, $bulan, $tahun);
	    $this->load->view('frontend/rekap_cetak', $data, FALSE);
	    // dapatkan output html
	    $html = $this->output->get_output();
	    // Load/panggil library dompdfnya
	    $this->load->library('dompdf_gen');
	    // Convert to PDF
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    //utk menampilkan preview pdf
	    $sekarang=date("d:F:Y:H:i:s");
	    $this->dompdf->stream("rekap_bendung_sidapurna_".$sekarang.".pdf",array('Attachment'=>0));
	    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
	    //$this->dompdf->stream("welcome.pdf");
	}

	function rekap_pintu_air(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'frontend/rekap_pintu_air';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$data['footer'] = 'frontend/footer2';
		$this->load->view('frontend/monitoring', $data, FALSE);
	}

	function rekap_pintu_cari(){
		$this->load->model('M_bendung','rekap_data');
		$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
    	$data['tanggal'] = $tanggal;
    	$data['bulan'] = $bulan;
    	$data['tahun'] = $tahun;
    	$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
    	$data['option_tahun'] = $this->rekap_data->option_tahun();
		$data['isi'] = $this->rekap_data->get_cari_tanggal($tanggal, $bulan, $tahun);
		$data['page'] = 'frontend/rekap_pintu_cari';
		$data['footer'] = 'frontend/footer2';
		$this->load->view('frontend/monitoring', $data, FALSE);
	}
}
