<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpan extends CI_Controller {
	

	public function simpan_utama(){
		$this->load->model('M_bendung','bendung');
		$level = ""; $pintu_1 = ""; $pintu_2 = ""; $pintu_3 = ""; $pintu_utama;
		$id = 1;
		$ambil_pintu_utama = $this->bendung->get_satu_data_kontrol($id);
		if (isset($ambil_pintu_utama))
		{
			$pintu_utama = $ambil_pintu_utama->pintu_utama;
		}

		$tinggi_air = $this->input->get('tinggi_air'); 
		$limpasan = $tinggi_air - 14;

		if ($limpasan < 0)
		{
			$limpasan = 0;
		}
		
		if ($limpasan >= 0 && $limpasan < 2.5)
		{
			$level = "Aman";
			$pintu_1 = "Close";
			$pintu_2 = "Close";
			$pintu_3 = "Close";
		}
		else if ($limpasan >= 2.5 && $limpasan < 3.5)
		{
			$level = "Siaga";
			$pintu_1 = "Open";
			$pintu_2 = "Close";
			$pintu_3 = "Close";
		}
		else if ($limpasan >= 3.5 && $limpasan < 4.5)
		{
			$level = "Bahaya";
			$pintu_1 = "Open";
			$pintu_2 = "Open";
			$pintu_3 = "Close";
		}
		else if ($limpasan >= 4.5)
		{
			$level = "Awas";
			$pintu_1 = "Open";
			$pintu_2 = "Open";
			$pintu_3 = "Open";
		}

		$data = array('tinggi_air' => $tinggi_air, 
					'limpasan_air' => $limpasan,
					'level' => $level,
					'pintu_1' => $pintu_1,
					'pintu_2' => $pintu_2,
					'pintu_3' => $pintu_3, );
		$hasil = $this->db->insert('data_rekap', $data);
		if($hasil) {
			echo $pintu_utama;
		} else {
			echo "Error kirim data"
		}
	}

}
