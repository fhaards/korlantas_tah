<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('modelUser');
	}

	public function index()
	{
		$data['title'] 	 =  APP_NAME;
		if ($this->session->userdata('status') == "login") {
			redirect(base_url("beranda"));
		} else {
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() === FALSE) {
				// $this->session->set_flashdata('error', 'Data berhasil ditambahkan');
				$this->load->view('auth-form', $data);
			} else {
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$cek = $this->modelUser->cekLogin($email, $password);
				if ($cek) {
					$userData = $this->modelUser->findBy('email', $email);
					$data_session = array('email' => $email, 'status' => "login", 'userid' => $userData['user_id'], 'level' => $userData['level']);
					$this->session->set_userdata($data_session);
					$this->session->set_flashdata('loginMsg', 'Data berhasil ditambahkan');
					redirect(base_url("beranda"));
				} else {
					$this->session->set_flashdata('errorLogin', 'Data berhasil ditambahkan');
					redirect(base_url("auth"));
				}
			}
		}
		// $this->load->view('auth');
	}

	public function insert()
	{

		$this->form_validation->set_rules('email', 'email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE) {
			$this->session->set_flashdata('error', 'Data berhasil ditambahkan');
			redirect(base_url("auth"));
		} else {
			$this->modelUser->add();
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect(base_url("auth"));
		}
	}

	public function authProccess()
	{
		$this->load->view('auth');
	}

	public function destroy()
	{
		$this->session->sess_destroy();
		redirect('beranda');
	}
}
