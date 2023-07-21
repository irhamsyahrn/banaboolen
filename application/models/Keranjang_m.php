<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang_m extends CI_Model
{
    public function tambah_produk_ke_keranjang($produkID, $jumlah, $catatan, $hargaTotal)
    {
        // Implementasikan logika untuk menambahkan produk ke dalam tabel keranjang
        // Misalnya, melakukan operasi INSERT pada tabel keranjang dengan data yang diterima

        $data = array(
            'PelangganID' => $this->session->userdata('pelanggan_id'),
            'ProdukID' => $produkID,
            'Jumlah' => $jumlah,
            'HargaTotal' => $hargaTotal,
            'CatatanKhusus' => $catatan
        );

        $this->db->insert('keranjang', $data);
    }

    public function lihat_keranjang()
    {
        // Implementasikan logika untuk mendapatkan data keranjang dari tabel keranjang
        // dengan melakukan join dengan tabel produk

        $pelangganID = $this->session->userdata('pelanggan_id');

        $this->db->select('keranjang.*, produk.Nama as NamaProduk, produk.Stok, produk.Foto, produk.Deskripsi');
        $this->db->from('keranjang');
        $this->db->join('produk', 'produk.ID_Produk = keranjang.ProdukID');
        $this->db->where('keranjang.PelangganID', $pelangganID);

        return $this->db->get()->result_array();
    }

    public function hitung_total_harga()
    {
        $pelangganID = $this->session->userdata('pelanggan_id');
        $this->db->select('SUM(HargaTotal) as total_harga');
        $this->db->where('PelangganID', $pelangganID);
        $query = $this->db->get('keranjang');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->total_harga;
        } else {
            return 0;
        }
    }

    public function lihat_detil_produk_dari_keranjang($produkID)
    {
        // Implementasikan logika untuk mengambil data produk dari tabel keranjang berdasarkan ID produk
        // Misalnya, melakukan operasi SELECT pada tabel keranjang berdasarkan ID produk

        $pelangganID = $this->session->userdata('pelanggan_id');

        $this->db->select('produk.Nama as NamaProduk, produk.Harga, produk.Stok, produk.Foto, produk.Deskripsi, produk.Rating');
        $this->db->from('keranjang');
        $this->db->join('produk', 'produk.ID_Produk = keranjang.ProdukID');
        $this->db->where('keranjang.PelangganID', $pelangganID);
        $this->db->where('produk.ID_Produk', $produkID);

        return $this->db->get()->row_array();
    }

    public function ubah_produk_di_keranjang($keranjangID, $jumlah, $catatan, $produkID)
    {
        // Implementasikan logika untuk mengubah data produk dalam tabel keranjang
        // Misalnya, melakukan operasi UPDATE pada tabel keranjang dengan data yang diterima

        $data = array(
            'Jumlah' => $jumlah,
            'CatatanKhusus' => $catatan
        );

        $pelangganID = $this->session->userdata('pelanggan_id');
        $this->db->where('ID', $keranjangID);
        $this->db->where('PelangganID', $pelangganID);
        $this->db->where('ProdukID', $produkID);

        $this->db->update('keranjang', $data);
    }

    public function hapus_produk_dari_keranjang($keranjangID)
    {
        // Implementasikan logika untuk menghapus produk dari tabel keranjang
        // Misalnya, melakukan operasi DELETE pada tabel keranjang berdasarkan ID keranjang

        $this->db->where('ID', $keranjangID);
        $this->db->delete('keranjang');
    }

    public function hapus_seluruh_produk_dari_keranjang()
    {
        // Implementasikan logika untuk menghapus semua produk dari tabel keranjang
        // Misalnya, melakukan operasi DELETE tanpa menggunakan kondisi WHERE

        $this->db->empty_table('keranjang');
    }
}
