<?php

class Pesanan_m extends CI_Model
{

    public function simpan_pesanan($data)
    {
        $this->db->insert('pesanan', $data);
        return $this->db->insert_id(); // Mengembalikan ID_Pesanan yang baru saja disimpan
    }

    public function simpan_detil_pesanan($data)
    {
        $this->db->insert('detil_pesanan', $data);
        return $this->db->insert_id(); // Mengembalikan ID_Detil_Pesanan yang baru saja disimpan
    }

    public function simpan_detil_status_pesanan($data)
    {
        $this->db->insert('detil_status_pesanan', $data);
        return $this->db->insert_id(); // Mengembalikan ID_Detil_Status_Pesanan yang baru saja disimpan
    }

    public function get_pesanan_berlangsung()
    {
        // Ambil data pesanan yang belum selesai berdasarkan Status_Pesanan dari tabel pesanan
        $this->db->where('Status_Pesanan !=', 'Selesai');
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }

    public function get_semua_pesanan()
    {
        // Ambil semua data pesanan tanpa memperhatikan Status_Pesanan dari tabel pesanan
        $query = $this->db->get('pesanan');
        return $query->result_array();
    }

    public function get_pesanan_by_id($id_pesanan)
    {
        // Ambil data pesanan berdasarkan ID_Pesanan dari tabel pesanan
        $this->db->where('ID_Pesanan', $id_pesanan);
        $query = $this->db->get('pesanan');
        return $query->row_array();
    }

    public function get_detil_pesanan_by_id_pesanan($id_pesanan)
    {
        // Ambil data detil pesanan berdasarkan ID_Pesanan dari tabel detil_pesanan
        $this->db->where('ID_Pesanan', $id_pesanan);
        $query = $this->db->get('detil_pesanan');
        return $query->result_array();
    }

    public function get_detil_status_pesanan_by_id_pesanan($id_pesanan)
    {
        // Ambil data detil status pesanan berdasarkan ID_Pesanan dari tabel detil_status_pesanan
        $this->db->where('ID_Pesanan', $id_pesanan);
        $query = $this->db->get('detil_status_pesanan');
        return $query->result_array();
    }

    public function get_produk_dipesan_by_id_pesanan($id_pesanan)
    {
        // Ambil data produk yang dipesan berdasarkan ID_Pesanan dari tabel detil_pesanan dan produk
        $this->db->select('detil_pesanan.ID_Pesanan, produk.ID_Produk, produk.Nama, produk.Foto, detil_pesanan.Jumlah, produk.Harga, detil_pesanan.CatatanKhusus');
        $this->db->from('detil_pesanan');
        $this->db->join('produk', 'produk.ID_Produk = detil_pesanan.ID_Produk');
        $this->db->where('detil_pesanan.ID_Pesanan', $id_pesanan);
        $query = $this->db->get();
        return $query->result_array();
    }

}
