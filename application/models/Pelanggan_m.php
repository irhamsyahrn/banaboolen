<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_m extends CI_Model
{

    public function masuk($username, $password)
    {
        // Query untuk memverifikasi data pelanggan berdasarkan username
        $this->db->where('Username', $username);
        $query = $this->db->get('Pelanggan');

        if ($query->num_rows() == 1) {
            $pelanggan = $query->row_array();
            // Memverifikasi password menggunakan password_verify()
            if (password_verify($password, $pelanggan['Password'])) {
                // Jika password cocok, kembalikan data pelanggan
                return $pelanggan;
            }
        }

        // Jika data pelanggan tidak ditemukan atau password tidak cocok, kembalikan false
        return false;
    }

    public function akun_saya($idPelanggan)
    {
        // Query untuk mengambil detail akun pelanggan berdasarkan ID Pelanggan
        $this->db->where('ID_Pelanggan', $idPelanggan);
        $query = $this->db->get('Pelanggan');

        // Mengembalikan hasil query dalam bentuk array
        return $query->row_array();
    }


    public function buat($data)
    {
        // Menambahkan data pelanggan baru ke tabel Pelanggan
        $this->db->insert('Pelanggan', $data);
    }

    public function ubah_detil($id, $data)
    {
        $this->db->where('ID_Pelanggan', $id);
        $this->db->update('Pelanggan', $data);
    }

    public function hapus_foto($idPelanggan)
    {
        // Dapatkan informasi foto sebelum dihapus
        $foto = $this->db->select('Foto')->where('ID_Pelanggan', $idPelanggan)->get('Pelanggan')->row()->Foto;

        // Hapus foto dari database
        $this->db->set('Foto', '')->where('ID_Pelanggan', $idPelanggan)->update('Pelanggan');

        // Hapus file foto dari sistem file (jika diperlukan)
        if (!empty($foto)) {
            if (file_exists($foto)) {
                unlink($foto);
            }
        }
    }

    public function upload_foto($filePath, $idPelanggan)
    {
        $this->db->where('ID_Pelanggan', $idPelanggan);
        $this->db->update('Pelanggan', ['Foto' => $filePath]);
    }

    public function isUsernameExists($username)
    {
        $this->db->where('Username', $username);
        $query = $this->db->get('Pelanggan');
        return $query->num_rows() > 0;
    }

    public function isEmailExists($email)
    {
        $this->db->where('Email', $email);
        $query = $this->db->get('Pelanggan');
        return $query->num_rows() > 0;
    }
}
