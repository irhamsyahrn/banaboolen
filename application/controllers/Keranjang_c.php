<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_c extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Keranjang_m');
        $this->load->model('Pelanggan_m');
    }

    public function tambah_produk_ke_keranjang()
    {
        // Tangkap data produk dari input pengguna
        $produkID = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');
        $catatan = $this->input->post('catatan');
        $hargaTotal = $this->input->post('harga_total');

        // Panggil fungsi model untuk menambahkan produk ke keranjang
        $this->Keranjang_m->tambah_produk_ke_keranjang($produkID, $jumlah, $catatan, $hargaTotal);

        // Redirect atau tampilkan pesan sukses
    }

    public function keranjang_saya()
    {
        // Mengambil data keranjang dari model
        $data['keranjang'] = $this->Keranjang_m->lihat_keranjang();

        $data['totalProduk'] = count($data['keranjang']);
        $data['totalHarga'] = $this->Keranjang_m->hitung_total_harga();

        // Loop melalui daftar keranjang untuk mendapatkan data produk dari tabel keranjang
        foreach ($data['keranjang'] as &$item) {
            // Panggil fungsi untuk mendapatkan data produk dari tabel keranjang
            $item['detailProduk'] = $this->Keranjang_m->lihat_detil_produk_dari_keranjang($item['ProdukID']);
        }

        // Load view untuk menampilkan halaman keranjang
        $this->load->view('keranjang', $data);
    }

    public function ubah_produk_di_keranjang()
    {
        // Tangkap data perubahan produk dari input pengguna
        $keranjangID = $this->input->post('keranjang_id');
        $jumlah = $this->input->post('jumlah');
        $catatan = $this->input->post('catatan');
        $produkID = $this->input->post('produk_id');

        // Panggil fungsi model untuk mengubah data produk dalam keranjang
        $this->Keranjang_m->ubah_produk_di_keranjang($keranjangID, $jumlah, $catatan, $produkID);

        // Redirect atau tampilkan pesan sukses
    }

    public function hapus_produk_dari_keranjang()
    {
        $keranjangID = $this->input->post('keranjang_id');

        // Panggil fungsi model untuk menghapus produk dari keranjang
        $this->Keranjang_m->hapus_produk_dari_keranjang($keranjangID);

        // Redirect atau tampilkan pesan sukses
    }


    public function checkout()
    {
        // Mengambil data pelanggan dari session
        $pelangganID = $this->session->userdata('pelanggan_id');
        $data['pelanggan'] = $this->Pelanggan_m->akun_saya($pelangganID);

        // Mengambil data keranjang dari model
        $data['keranjang'] = $this->Keranjang_m->lihat_keranjang();

        // Menghitung total harga pesanan
        $data['totalHargaPesanan'] = $this->Keranjang_m->hitung_total_harga();

        // Loop melalui daftar keranjang untuk mendapatkan data produk dari tabel keranjang
        foreach ($data['keranjang'] as &$item) {
            // Mengambil data produk dari tabel keranjang
            $item['detailProduk'] = $this->Keranjang_m->lihat_detil_produk_dari_keranjang($item['ProdukID']);
        }

        $this->load->view('checkout', $data);
    }
}
