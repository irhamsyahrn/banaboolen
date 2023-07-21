<?php
class Pesanan_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pesanan_m');
        $this->load->model('Keranjang_m');
    }

    public function tambah_pesanan()
    {
        // Mengambil data dari form
        $data['ID_Pelanggan'] = $this->session->userdata('pelanggan_id');
        $data['jenis_pemesanan'] = $this->input->post('jenis_pemesanan');
        $data['metode_pembayaran'] = $this->input->post('metode_pembayaran');
        $data['bank'] = $this->input->post('bank');
        $data['penerima'] = $this->input->post('penerima');
        $data['no_telepon'] = $this->input->post('telepon_kirim');
        $data['alamat'] = $this->input->post('alamat_kirim');
        $data['tanggal_pesanan'] = date('Y-m-d'); // Tanggal pesanan dihitung saat data dikirim ke database
        $data['tanggal_siap_ambil_kirim'] = $this->input->post('tanggal_siap_kirim_ambil');
        $data['status_pesanan'] = 'Menunggu Pembayaran';

        // Mengambil data keranjang dari model Keranjang_m
        $keranjang = $this->Keranjang_m->lihat_keranjang();

        // Hitung total harga pesanan
        $totalHargaPesanan = $this->Keranjang_m->hitung_total_harga();

        // Simpan pesanan utama ke tabel pesanan menggunakan model Pesanan_m
        $data['total_harga'] = $totalHargaPesanan;
        $this->Pesanan_m->simpan_pesanan($data);
        $pesananID = $this->db->insert_id(); // Mendapatkan ID pesanan yang baru saja disimpan

        // Iterasi melalui data keranjang dan simpan ke tabel detil_pesanan
        foreach ($keranjang as $item) {
            $detilPesanan['ID_Pesanan'] = $pesananID;
            $detilPesanan['ID_Produk'] = $item['ProdukID'];
            $detilPesanan['Jumlah'] = $item['Jumlah'];

            $this->Pesanan_m->simpan_detil_pesanan($detilPesanan);

            // Hapus produk dari keranjang menggunakan model Keranjang_m
            $this->Keranjang_m->hapus_produk_dari_keranjang($item['ID']);
        }

        // Tambahkan data pada tabel detil_status_pesanan
        $statusPesanan['ID_Pesanan'] = $pesananID;
        $statusPesanan['Tanggal_Perubahan_Status'] = date('Y-m-d');
        $statusPesanan['Status_Pesanan'] = 'Menunggu Pembayaran';
        $this->Pesanan_m->simpan_detil_status_pesanan($statusPesanan);

        // Hapus keranjang secara keseluruhan
        $this->Keranjang_m->hapus_seluruh_produk_dari_keranjang();

        // Tampilkan pesan berhasil atau redirect ke halaman lain
        echo $pesananID; // Mengembalikan ID_Pesanan sebagai respons
    }

    public function pesanan_saya()
    {
        // Ambil data pesanan berlangsung dan semua pesanan dari model Pesanan_m
        $data['pesanan_berlangsung'] = $this->Pesanan_m->get_pesanan_berlangsung();
        $data['semua_pesanan'] = $this->Pesanan_m->get_semua_pesanan();

        // Load view pesanan_saya.php dengan data pesanan berlangsung dan semua pesanan
        $this->load->view('pesanan_saya', $data);
    }

    public function detil_pesanan($id_pesanan)
    {
        // Ambil data pesanan berdasarkan ID_Pesanan dari model Pesanan_m
        $data['pesanan'] = $this->Pesanan_m->get_pesanan_by_id($id_pesanan);

        // Ambil data detil pesanan berdasarkan ID_Pesanan dari model Pesanan_m
        $data['detil_pesanan'] = $this->Pesanan_m->get_detil_pesanan_by_id_pesanan($id_pesanan);

        // Ambil data detil status pesanan berdasarkan ID_Pesanan dari model Pesanan_m
        $data['detil_status_pesanan'] = $this->Pesanan_m->get_detil_status_pesanan_by_id_pesanan($id_pesanan);

        // Ambil data produk dipesan berdasarkan ID_Pesanan dari model Pesanan_m
        $data['produk_dipesan'] = $this->Pesanan_m->get_produk_dipesan_by_id_pesanan($id_pesanan);

        // Muat halaman detil_pesanan.php dan kirim data JSON sebagai variabel pesananJSON
        $data['pesananJSON'] = json_encode($data);

        // Muat view detil_pesanan.php dan kirimkan data sebagai variabel $data
        $this->load->view('detil_pesanan', $data);
    }

    public function beri_ulasan($id_pesanan)
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) {
            // Set pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Redirect ke halaman login
            redirect('masuk');
        }

        // Mengambil data pesanan berdasarkan ID_Pesanan
        $data['id_pesanan'] = $id_pesanan;
        $data['detil_pesanan'] = $this->Pesanan_m->get_produk_dipesan_by_id_pesanan($id_pesanan);

        // Menampilkan view beri_ulasan.php dengan data produk yang dipesan
        $this->load->view('beri_ulasan', $data);
    }
}
