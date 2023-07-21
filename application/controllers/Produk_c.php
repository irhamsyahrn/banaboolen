<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('Produk_m');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function get_all_produk()
    {

        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) {
            // Set pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Redirect ke halaman login
            redirect('masuk');
        }

        // Mendapatkan semua produk
        $produkList = $this->Produk_m->get_all_produk();

        // Menampilkan semua produk dalam bentuk HTML
        $data['produkList'] = $produkList;
        $this->load->view('home', $data);
    }

    public function get_detil_produk_by_id()
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) {
            // Set pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Redirect ke halaman login
            redirect('masuk');
        }

        // Set produkID untuk digunakan sebagai where query
        $produkID = $this->input->get('id');

        // Mendapatkan detail produk berdasarkan ID
        $detailProduk = $this->Produk_m->get_detil_produk_by_id($produkID);

        // Jika detail produk ditemukan, tampilkan informasinya
        if ($detailProduk) {
            $data['detailProduk'] = $detailProduk;
            $this->load->view('detil_produk', $data);
        } else {
            echo "Produk tidak ditemukan.";
        }
    }

    public function cari_produk()
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) {
            // Set pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Redirect ke halaman login
            redirect('masuk');
        }

        // Ambil keyword pencarian dari URL
        $keyword = $this->input->get('keyword');

        // Cari produk berdasarkan keyword
        $produkList = $this->Produk_m->cari_produk($keyword);

        // Tampilkan hasil pencarian produk dalam bentuk HTML
        $data['produkList'] = $produkList;
        $this->load->view('cari_produk', $data);
    }

    public function kirim_ulasan()
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) {
            // Set pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Redirect ke halaman login
            redirect('masuk');
        }

        // Ambil data ulasan dari form menggunakan $_POST
        $ulasanData = $this->input->post('ulasanData');

        // Loop melalui daftar produk untuk menyimpan data rating dan ulasan ke database
        foreach ($ulasanData as $data) {
            $produkID = $data['produkID'];
            $rating = $data['rating'];
            $ulasan = $data['ulasan'];

            // Simpan ulasan ke tabel produk_rating
            $this->Produk_m->simpan_produk_rating($produkID, $rating);

            // Simpan ulasan ke tabel ulasan_produk
            $this->Produk_m->simpan_ulasan_produk($produkID, $this->session->userdata('pelanggan_id'), $ulasan);
        }

        // Lakukan update pada kolom 'Rating' tabel 'pesanan'
        $this->Produk_m->update_rating_pesanan($ulasanData);

        // Kirim respon berhasil ke AJAX (JavaScript)
        echo json_encode(array("status" => "success"));
    }
}
