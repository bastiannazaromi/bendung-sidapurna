<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('data_login'))) {
			redirect('Login','refresh');
		}
	}
	
	function index()
	{
		$data['page'] = 'backend/home';
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function search()
	{
		$search = $this->input->post('search');
		redirect('Dashboard/'.$search);
	}
	
	function user(){
		$this->load->model('M_user','user');
		$status = $this->session->userdata('status');
        if ($status == "Super Admin")
        {
        	$data['isi']=$this->user->get();
        }
        else if ($status == "Admin")
        {
        	$id = $this->session->userdata('log_id');
			$data['isi']=$this->user->get_satu_data($id);
        }
		$data['page'] = 'backend/user';
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function user_view(){
		$this->load->model('M_user','user');
		$id= $this->input->get('id'); 
		$data['isi'] = $this->user->get_satu_data($id);
		$data['page'] = 'backend/user_view';
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function data_rekap(){
		$this->load->model('M_bendung','rekap_data');
		$data['isi'] = $this->rekap_data->get_rekap_desc();
		$data['page'] = 'backend/data_rekap';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function kontrol_pintu(){
		$this->load->model('M_bendung','kontrol_pintu');
		$data['isi'] = $this->kontrol_pintu->get_kontrol_pintu_desc();
		$data['page'] = 'backend/kontrol_pintu_view';
		$data['option_tanggal'] = $this->kontrol_pintu->option_tanggal_kontrol();
		$data['option_bulan'] = $this->kontrol_pintu->option_bulan_kontrol();
		$data['option_tahun'] = $this->kontrol_pintu->option_tahun_kontrol();
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function aksi($aksi){
		$this->load->model('M_user','user');
		if($aksi == 'delete')
		{
			$status = $this->session->userdata('status');
            if ($status == "Super Admin")
            {
            	$id= $this->input->get('id'); 
				$this->db->where('id',$id);
				$query = $this->db->get('user');
				$row = $query->row();
				if (is_file("./uploads/$row->foto")) {
					unlink("./uploads/$row->foto");
				}
				$hasil = $this->user->delete($id);
				if ($hasil)
				{
					$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses delete user</div>');
					redirect('Dashboard/user','refresh');
				}
				else
				{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal delete user</div>');
					redirect('Dashboard/user','refresh');
				}	
            }
            else
            {
            	$data['page'] = 'backend/error';
				$this->load->view('backend/dashboard', $data, FALSE);
            }
		}
		else if($aksi == 'edit')
		{
			$id= $this->input->get('id');
			if ($this->uri->segment(4) == 'proses') {
				$config['upload_path']          = 'uploads/';
            	$config['allowed_types']        = 'gif|jpg|png';
            	$config['max_size']             = 10024;
            	// $config['overwrite']			= TRUE;
            	$config['encrypt_name']			= TRUE;
            	$config['max_width']            = 1024;
            	$config['max_height']           = 768;

				$this->load->library('upload', $config);

				$status = $this->session->userdata('status');
                if ($status == "Super Admin")
                {
                	if ( ! $this->upload->do_upload('file_foto'))
                	{
	    	        	$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'status' => $this->input->post('status'),
						'alamat' => $this->input->post('alamat') );
						$this->db->where('id', $id);
						$hasil = $this->db->update('user', $data);
						if ($hasil)
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit data</div>');
							redirect('Dashboard/user','refresh');
						} 
						else 
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit data</div>');
							redirect('Dashboard/user','refresh');
						}
	            	}
	            	else {
		            	$data = array('upload_data' => $this->upload->data());
	            		
	            		$this->db->where('id',$id);
						$query = $this->db->get('user');
						$row = $query->row();
						if (is_file("./uploads/$row->foto"))
						{
							unlink("./uploads/$row->foto");
						}

						$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'foto'  => $this->upload->data('file_name'),
						'status' => $this->input->post('status'),
						'alamat' => $this->input->post('alamat') );
						$this->db->where('id', $id);
						$hasil = $this->db->update('user', $data);
						if ($hasil)
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit data</div>');
							redirect('Dashboard/user','refresh');
						}
						else
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit data</div>');
							redirect('Dashboard/user','refresh');
						}
					}
                }
                else
                {
                	if ( ! $this->upload->do_upload('file_foto'))
                	{
	    	        	$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'alamat' => $this->input->post('alamat') );
						$this->db->where('id', $id);
						$hasil = $this->db->update('user', $data);
						if ($hasil)
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit data</div>');
							redirect('Dashboard/user','refresh');
						} 
						else 
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit data</div>');
							redirect('Dashboard/user','refresh');
						}
	            	}
	            	else
	            	{
		            	$data = array('upload_data' => $this->upload->data());
	            		
	            		$this->db->where('id',$id);
						$query = $this->db->get('user');
						$row = $query->row();
						if (is_file("./uploads/$row->foto"))
						{
							unlink("./uploads/$row->foto");
						}

						$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'foto'  => $this->upload->data('file_name'),
						'alamat' => $this->input->post('alamat') );
						$this->db->where('id', $id);
						$hasil = $this->db->update('user', $data);
						if ($hasil)
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit data</div>');
							redirect('Dashboard/user','refresh');
						}else
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit data</div>');
							redirect('Dashboard/user','refresh');
						}
					}
                }
			}
			else
			{
				$this->load->model('M_user','user');
				$data['isi'] = $this->user->get_satu_data($id);
				$data['page'] = 'backend/add_user';
				$this->load->view('backend/dashboard', $data, FALSE);
			}
		}
		else if($aksi == 'edit_pass')
		{
			$id = $this->input->get('id');
			if ($this->uri->segment(4) == 'proses')
			{
	        	$data = array('password' => md5($this->input->post('pass_baru')));
				
				$pass_kuno = $this->user->get_satu_data($id);
				if (isset($pass_kuno))
				{
					$password_kuno = $pass_kuno->password;
				}

				$pass_lama = md5($this->input->post('pass_lama'));
				$pass_baru = md5($this->input->post('pass_baru'));
				$pass_konfirm = md5($this->input->post('pass_konfirm'));

				$status = $this->session->userdata('status');
                if ($status == "Admin")
                {
					if ($pass_lama == $password_kuno)
					{
						if ($pass_baru == $pass_konfirm)
						{
							$this->db->where('id', $id);
							$hasil = $this->db->update('user', $data);
							if ($hasil)
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit password</div>');
								redirect('Dashboard/user','refresh');
							}
							else
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit password</div>');
								redirect('Dashboard/user','refresh');
							}
						}
						else
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Password konfirmasi salah</div>');
							redirect('Dashboard/user','refresh');
						}
					}
					else 
					{
						$this->session->set_flashdata('notif', '<div class="alert alert-danger">Password lama salah</div>');
						redirect('Dashboard/user','refresh');
					}
				}
				else
				{
					if ($pass_baru == $pass_konfirm)
						{
							$this->db->where('id', $id);
							$hasil = $this->db->update('user', $data);
							if ($hasil)
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses edit password</div>');
								redirect('Dashboard/user','refresh');
							}
							else
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal edit password</div>');
								redirect('Dashboard/user','refresh');
							}
						}
						else
						{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Password konfirmasi salah</div>');
								redirect('Dashboard/user','refresh');
						}
				}
			}
			else
			{
				$this->load->model('M_user','user');
				$data['isi'] = $this->user->get_satu_data($id);
				$data['page'] = 'backend/edit_password';
				$this->load->view('backend/dashboard', $data, FALSE);
			}
		}
		else if($aksi == 'view')
		{
			$id= $this->input->get('id'); 
			$data['isi'] = $this->user->get_satu_data($id);
			$data['page'] = 'backend/user_view';
			$this->load->view('backend/dashboard', $data, FALSE);
		}
		else if($aksi =='tambah')
		{
			$status = $this->session->userdata('status');
        	if ($status == "Super Admin")
        	{
        		if ($this->uri->segment(4) == 'proses')
        		{
            		$config['upload_path']          = 'uploads/';
	            	$config['allowed_types']        = 'gif|jpg|png';
	            	$config['max_size']             = 10024;
	            	// $config['overwrite']			= TRUE;
	            	$config['encrypt_name']			= TRUE;
	            	$config['max_width']            = 1024;
	            	$config['max_height']           = 768;

	            	$this->load->library('upload', $config);

		            if ( ! $this->upload->do_upload('file_foto'))
		            {
	    	        	$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('password')),
						'status' => $this->input->post('status'),
						'alamat' => $this->input->post('alamat') );

						$pass = md5($this->input->post('password'));
						$passKonfirm = md5($this->input->post('passwordKonfirm'));

						if ($pass == $passKonfirm)
						{
							$hasil = $this->db->insert('user', $data);
							if ($hasil)
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah user berhasil</div>');
								redirect('Dashboard/user','refresh');
							}
							else
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Tambah user gagal</div>');
								redirect('Dashboard/user','refresh');
							}
						}
						else
						{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Password konfirmasi salah</div>');
								redirect('Dashboard/user','refresh');
						}
	            	}
	            	else
	            	{
		            	$data = array('upload_data' => $this->upload->data());
	            		// $this->load->view('upload_success', $data);
	            		$data = array('nama' => $this->input->post('nama'), 
						'email' => $this->input->post('email'),
						'password' => md5($this->input->post('password')),
						'status' => $this->input->post('status'),
						'foto' => $this->upload->data('file_name'),
						'alamat' => $this->input->post('alamat') );

						$pass = md5($this->input->post('password'));
						$passKonfirm = md5($this->input->post('passwordKonfirm'));

						if ($pass == $passKonfirm)
						{
							$hasil = $this->db->insert('user', $data);
							if ($hasil)
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-success">Tambah user berhasil</div>');
								redirect('Dashboard/user','refresh');
							}
							else
							{
								$this->session->set_flashdata('notif', '<div class="alert alert-danger">Tambah user gagal</div>');
								redirect('Dashboard/user','refresh');
							}
						}
						else
						{
							$this->session->set_flashdata('notif', '<div class="alert alert-danger">Password konfirmasi salah</div>');
							redirect('Dashboard/user','refresh');
						}
		            }
				}
				else 
				{
					$this->load->model('M_user','user');
					$data['page'] = 'backend/add_user';
					$this->load->view('backend/dashboard', $data, FALSE);
				}
        	}
        	else
        	{
        		$data['page'] = 'backend/error';
				$this->load->view('backend/dashboard', $data, FALSE);
        	}
		}
	}

	function aksi3($aksi3) {
		$this->load->model('M_bendung','kontrol_pintu');
		if($aksi3 == 'kontrol')
		{
			if ($this->uri->segment(4) == 'proses')
			{
				$data = array('waktu' => date('Y-m-d H:i:s'),
        				    'pintu_air_1' => $this->input->post('pintu_air_1'), 
        				    'pintu_air_2' => $this->input->post('pintu_air_2'), 
        				    'pintu_air_3' => $this->input->post('pintu_air_3'), 
        			    	'pintu_air_irigasi' => $this->input->post('pintu_air_irigasi'), );
				$hasil = $this->db->insert('kontroling', $data);
				if ($hasil)
				{
					$this->session->set_flashdata('notif', '<div class="alert alert-success">Sukses kontrol</div>');
					redirect('Dashboard/kontrol_pintu','refresh');
				}
				else
				{
					$this->session->set_flashdata('notif', '<div class="alert alert-danger">Gagal kontrol</div>');
					redirect('Dashboard/kontrol_pintu','refresh');
				}
			}
			else
			{
			    $data['isi'] = $this->kontrol_pintu->get_kontrol_satu();
				$data['page'] = 'backend/kontrol_pintu';
				$this->load->view('backend/dashboard', $data, FALSE);
			}
		}
	}
	
	function multiple_delete()
	{
		$this->load->model('M_bendung','bendung');
		$id = $this->input->post('id');
		if ($id == NULL)
		{
			redirect('Dashboard/data_rekap');
		}
		else
		{
			$this->bendung->multiple_delete($id);
			redirect('Dashboard/data_rekap');
		}
	}

	function multiple_delete_kontrol()
	{
		$this->load->model('M_bendung','bendung');
		$id = $this->input->post('id');
		if ($id == NULL)
		{
			redirect('Dashboard/kontrol_pintu');
		}
		else
		{
			$this->bendung->multiple_delete_kontrol($id);
			redirect('Dashboard/kontrol_pintu');
		}
	}

	function grafik(){
		$data['page'] = 'backend/grafik_realtime';
		$this->load->view('backend/dashboard', $data, false);
	}

	function grafik_rekap_cari(){
		$this->load->model('M_bendung','rekap_data');
		$tanggal = $this->input->post('tanggal'); 
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$data['isi'] = $this->rekap_data->get_cari_tanggal($tanggal, $bulan, $tahun);
		$data['page'] = 'backend/grafik_rekap_cari';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('backend/dashboard', $data, FALSE);
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

	function get_kontrol_pintu(){
		$this->load->model('M_bendung','get_kontrol_pintu');
		$data_tabel = $this->get_kontrol_pintu->get_kontrol_pintu();
		echo json_encode($data_tabel);
	}

	function rekap(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'backend/grafik_rekap';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function status_pintu(){
		$data['page'] = 'backend/status_pintu';
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function rekap_pintu_air(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'backend/rekap_pintu_air';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal();
		$data['option_bulan'] = $this->rekap_data->option_bulan();
		$data['option_tahun'] = $this->rekap_data->option_tahun();
		$this->load->view('backend/dashboard', $data, FALSE);
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
		$data['page'] = 'backend/rekap_pintu_cari';
		$this->load->view('backend/dashboard', $data, FALSE);
	}
	
	function rekap_pintu_kontrol(){
		$this->load->model('M_bendung','rekap_data');
		$data['page'] = 'backend/rekap_pintu_kontrol';
		$data['option_tanggal'] = $this->rekap_data->option_tanggal_kontrol();
		$data['option_bulan'] = $this->rekap_data->option_bulan_kontrol();
		$data['option_tahun'] = $this->rekap_data->option_tahun_kontrol();
		$this->load->view('backend/dashboard', $data, FALSE);
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
		$data['page'] = 'backend/rekap_pintu_kontrol_cari';
		$this->load->view('backend/dashboard', $data, FALSE);
	}

	function cetak_pdf() {
    // load view yang akan digenerate atau diconvert
    	$this->load->model('M_bendung','rekap_data');
    	$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
    	$data['record'] = $this->rekap_data->get_cari_tanggal($tanggal, $bulan, $tahun);
	    $this->load->view('backend/rekap_cetak', $data, FALSE);
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
	
	function cetak_pdf_kontrol() {
    // load view yang akan digenerate atau diconvert
    	$this->load->model('M_bendung','rekap_data');
    	$tanggal = $this->input->post('tanggal');
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');
    	$data['record'] = $this->rekap_data->get_cari_tanggal_kontrol($tanggal, $bulan, $tahun);
	    $this->load->view('backend/rekap_cetak_kontrol', $data, FALSE);
	    // dapatkan output html
	    $html = $this->output->get_output();
	    // Load/panggil library dompdfnya
	    $this->load->library('dompdf_gen');
	    // Convert to PDF
	    $this->dompdf->load_html($html);
	    $this->dompdf->render();
	    //utk menampilkan preview pdf
	    $sekarang=date("d:F:Y h:i:s");
	    $this->dompdf->stream("data_rekap_kontrol_pintu_air".$sekarang.".pdf",array('Attachment'=>0));
	    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
	    //$this->dompdf->stream("welcome.pdf");
	}

}