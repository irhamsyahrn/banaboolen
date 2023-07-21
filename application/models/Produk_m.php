<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_m extends CI_Model
{
    // Fungsi untuk mendapatkan semua produk
    public function get_all_produk()
    {
        // Query SQL untuk mengambil semua produk
        $query = $this->db->get('produk');

        // Jika berhasil mendapatkan hasil query, kembalikan datanya dalam bentuk array
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            // Jika tidak ada produk yang ditemukan, kembalikan nilai false atau array kosong
            return false;
        }
    }

    // Fungsi untuk mendapatkan detail suatu produk berdasarkan ID
    public function get_detil_produk_by_id($produkID)
    {
        // Query SQL untuk mengambil detail produk berdasarkan ID
        $this->db->where('ID_Produk', $produkID);
        $query = $this->db->get('produk');

        // Jika berhasil mendapatkan hasil query, kembalikan datanya dalam bentuk array
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            // Jika terjadi kesalahan dalam query atau produk tidak ditemukan, kembalikan nilai false
            return false;
        }
    }

    // Fungsi untuk mencari produk berdasarkan keyword
    public function cari_produk($keyword)
    {
        // Query SQL untuk mencari produk berdasarkan nama atau deskripsi produk
        $this->db->like('Nama', $keyword);
        $query = $this->db->get('produk');

        // Jika berhasil mendapatkan hasil query, kembalikan datanya dalam bentuk array
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            // Jika tidak ada produk yang ditemukan, kembalikan nilai false atau array kosong
            return false;
        }
    }

    // Fungsi untuk menyimpan rating produk ke tabel produk_rating
    public function simpan_produk_rating($produkID, $rating)
    {
        // Validasi rating untuk memastikan nilai tidak melebihi 5.0
        $rating = ($rating > 5.0) ? 5.0 : $rating;

        // Simpan data rating produk ke tabel produk_rating
        $data = array(
            'ProdukID' => $produkID,
            'PelangganID' => $this->session->userdata('pelanggan_id'),
            'Rating' => $rating
        );
        $this->db->insert('produk_rating', $data);
    }

    // Fungsi untuk menyimpan ulasan produk ke tabel ulasan_produk
    public function simpan_ulasan_produk($produkID, $pelangganID, $ulasan)
    {
        // Simpan data ulasan produk ke tabel ulasan_produk
        $data = array(
            'ID_Produk' => $produkID,
            'ID_Pelanggan' => $pelangganID,
            'Ulasan' => $ulasan,
            'Tanggal_Ulasan' => date('Y-m-d H:i:s') // Tanggal ulasan saat ini
        );
        $this->db->insert('ulasan_produk', $data);
    }

    // Fungsi untuk melakukan update pada kolom 'Rating' tabel 'pesanan'
    public function update_rating_pesanan($ulasanData)
    {
        // Loop melalui data ulasan dan perbarui kolom 'Rating' pada tabel 'pesanan'
        foreach ($ulasanData as $data) {
            $produkID = $data['produkID'];

            // Hitung rata-rata rating dari 'produk_rating' berdasarkan 'ProdukID'
            $this->db->select_avg('Rating', 'rataRating');
            $this->db->where('ProdukID', $produkID);
            $query = $this->db->get('produk_rating');
            $result = $query->row();

            $rataRating = $result->rataRating;

            // Update nilai 'Rating' pada tabel 'pesanan' berdasarkan 'ProdukID'
            $this->db->set('Rating', $rataRating);
            $this->db->where('ID_Produk', $produkID);
            $this->db->update('produk');
        }
    }
}
