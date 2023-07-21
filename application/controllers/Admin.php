<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('masuk_penjual');
	}

	public function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username != "admin" && $password != "admin") {
			redirect('login_penjual');
		} else {
			$this->session->set_userdata('admin', $username);
		}

		// Tampilkan halaman login dengan pesan error
		$this->load->view('dashboard');
	}
}
