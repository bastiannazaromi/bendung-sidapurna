<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}
	public function proses()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');
		$this->load->model('M_login');
		$a = $this->M_login->cek_login($user,$pass);
		// var_dump($a);
		// die();
		if($a == "valid"){
			redirect('Dashboard','refresh');
		}
		else {
			$this->session->set_flashdata('notif', '<div style="text-align: center" class="alert alert-danger">Username atau password salah !!</div>');
			redirect('Login','refresh');
		}
	}
	function logout(){
		$this->session->sess_destroy($this->session->userdata('data_login'));
		redirect('Login','refresh');
	}
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */