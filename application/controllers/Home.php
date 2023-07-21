<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
		$this->load->model('Produk_m'); // Memuat model Produk_m
    }
	
	public function index()
	{
		$data['produkList'] = $this->Produk_m->get_all_produk(); // Mendapatkan semua produk

		$this->load->view('home', $data); // Menampilkan halaman "home.php" dengan data produk
	}
}

