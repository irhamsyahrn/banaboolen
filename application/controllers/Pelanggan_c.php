<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model dan library yang diperlukan
        $this->load->model('Pelanggan_m');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if ($this->session->userdata('pelanggan_id')) {
            // Jika sudah login, redirect ke halaman dashboard atau halaman lain yang sesuai
            redirect(base_url(), 'refresh');
        } else {
            //siapkan pesan error
            $this->session->set_flashdata('error', 'Anda harus masuk terlebih dahulu.');
            // Jika belum login, tampilkan halaman login
            $this->load->view('masuk');
        }
    }

    public function masuk()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Memanggil model untuk memverifikasi data pelanggan
        $pelanggan = $this->Pelanggan_m->masuk($username, $password);

        if ($pelanggan) {
            // Jika username ditemukan dalam database
            if (password_verify($password, $pelanggan['Password'])) {
                // Jika password cocok, simpan informasi dalam session
                $this->session->set_userdata('pelanggan_id', $pelanggan['ID_Pelanggan']);
                $this->session->set_userdata('pelanggan_username', $pelanggan['Username']);

                // Redirect ke halaman dashboard atau halaman lain yang sesuai
                redirect(base_url(), 'refresh');
            } else {
                // Jika password tidak cocok, tampilkan pesan error
                $data['error'] = 'Password salah.';
            }
        } else {
            // Jika username tidak ditemukan dalam database, tampilkan pesan error
            $data['error'] = 'Username tidak ditemukan.';
        }

        // Tampilkan halaman login dengan pesan error
        $this->load->view('masuk', $data);
    }

    public function keluar()
    {
        // Menghapus informasi pelanggan dari session
        $this->session->unset_userdata('pelanggan_id');
        $this->session->unset_userdata('pelanggan_username');

        // Redirect ke halaman login atau halaman lain yang sesuai setelah logout
        redirect(base_url(), 'refresh');
    }

    public function daftar()
    {
        $this->load->library('form_validation');

        // Aturan validasi form daftar akun
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('nomor', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan halaman daftar dengan pesan error validasi
            $this->load->view('daftar');
        } else {
            // Ambil data dari input form
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'Nama_Lengkap' => $this->input->post('name'),
                'Email' => $this->input->post('email'),
                'No_Telepon' => $this->input->post('nomor')
            );

            // Memeriksa keberadaan username dan email sebelum menyimpan data baru ke dalam database
            $query = $this->db->get_where('Pelanggan', array('Username' => $data['Username']));
            $query2 = $this->db->get_where('Pelanggan', array('Email' => $data['Email']));
            if ($query->num_rows() > 0) {
                // Username sudah ada dalam database
                $this->session->set_flashdata('error', 'Username sudah digunakan.');
                redirect('daftar');
                return;
            }
            if ($query2->num_rows() > 0) {
                // Email sudah ada dalam database
                $this->session->set_flashdata('error', 'Email sudah digunakan.');
                redirect('daftar');
                return;
            }

            // Mengambil foto menggunakan $_FILES
            if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
                $uploadDir = './assets/upload/img_user/'; // Direktori tujuan penyimpanan file
                $fileName = $_FILES['foto']['name']; // Nama file gambar yang diupload
                $filePath = $uploadDir . $fileName; // Path lengkap file gambar

                // Memeriksa keberadaan file dengan nama yang sama
                $counter = 1;
                while (file_exists($filePath)) {
                    $fileName = $this->generateUniqueFileName($_FILES['foto']['name'], $counter);
                    $filePath = $uploadDir . $fileName;
                    $counter++;
                }

                // Pindahkan file gambar ke folder tujuan
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
                    // Gambar berhasil diupload, simpan path file ke dalam database
                    $data['Foto'] = $filePath;
                } else {
                    // Error saat mengupload gambar
                    var_dump($_FILES['foto']['error']);
                    var_dump($_FILES['foto']['tmp_name']);
                    var_dump($filePath);
                }
            }

            // Panggil model untuk menyimpan data pelanggan baru
            $this->Pelanggan_m->buat($data);

            // Set flashdata pesan sukses
            $this->session->set_flashdata('success', 'Akun berhasil dibuat.');

            // Redirect ke halaman login setelah berhasil mendaftar
            redirect('masuk');
        }
    }

    public function akun_saya()
    {
        // Memeriksa apakah pelanggan sudah login atau belum
        if (!$this->session->userdata('pelanggan_id')) { // Jika belum login
            // Set flashdata pesan error untuk memberitahukan pelanggan harus login terlebih dahulu
            $this->session->set_flashdata('error', 'Mohon masuk terlebih dahulu.');

            // Redirect ke halaman login
            redirect('masuk');
        }

        $id_pelanggan = $this->session->userdata('pelanggan_id');
        // Mengambil detail akun pelanggan berdasarkan ID Pelanggan
        $data['pelanggan'] = $this->Pelanggan_m->akun_saya($id_pelanggan);

        // Tampilkan halaman akun_saya dengan data pelanggan
        $this->load->view('akun_saya', $data);
    }

    public function ganti_password()
    {
        $currentPassword = $this->input->post('current_password');
        $newPassword = $this->input->post('new_password');
        $confirmPassword = $this->input->post('confirm_password');

        // Memanggil model untuk memverifikasi data pelanggan
        $pelanggan = $this->Pelanggan_m->akun_saya($this->session->userdata('pelanggan_id'));

        if (password_verify($currentPassword, $pelanggan['Password'])) {
            // Password saat ini cocok, lanjutkan dengan verifikasi dan perubahan password baru
            if ($newPassword === $confirmPassword) {
                // Password baru dan konfirmasi password baru cocok
                $data = array(
                    'Password' => password_hash($newPassword, PASSWORD_DEFAULT)
                );
                $this->Pelanggan_m->ubah_detil($this->session->userdata('pelanggan_id'), $data);
    
                // Set flashdata pesan sukses
                $this->session->set_flashdata('success', 'Password berhasil diubah.');  
            } else {
                // Password baru dan konfirmasi password baru tidak cocok
                $this->session->set_flashdata('error', 'Konfirmasi password baru tidak cocok.');
            }
        } else {
            // Password saat ini tidak cocok
            $this->session->set_flashdata('error', 'Password saat ini salah.');
        }

        // Redirect kembali ke halaman akun_saya.php
        redirect('akun_saya');
    }

    public function ubah_detil()
    {
        // Ambil data dari form input
        $newUsername = $this->input->post('new_username');
        $newEmail = $this->input->post('new_email');

        // Panggil model untuk memeriksa keberadaan username atau email
        $isUsernameExists = $this->Pelanggan_m->isUsernameExists($newUsername);
        $isEmailExists = $this->Pelanggan_m->isEmailExists($newEmail);

        // Jika username atau email sudah ada, tampilkan pesan error
        $errors = array();

        if ($isUsernameExists) {
            $errors[] = 'Username sudah digunakan.';
        }

        if ($isEmailExists) {
            $errors[] = 'Email sudah digunakan.';
        }

        // Jika terdapat error, tampilkan pesan error pada halaman akun_saya.php
        if (!empty($errors)) {
            $this->session->set_flashdata('error', $errors);
            redirect('akun_saya#slide-ubah-detail-akun');
            return;
        }

        // Data valid, lanjutkan dengan perubahan detil akun
        $data = array(
            'Nama_Lengkap' => $this->input->post('new_nama'),
            'Email' => $newEmail,
            'Username' => $newUsername,
            'No_Telepon' => $this->input->post('new_no_telp')
        );

        // Panggil model untuk mengubah detil akun pelanggan
        $this->Pelanggan_m->ubah_detil($this->session->userdata('pelanggan_id'), $data);

        // Set flashdata pesan sukses
        $this->session->set_flashdata('success', 'Detil akun berhasil diubah.');

        // Redirect kembali ke halaman akun_saya.php
        redirect('akun_saya');
    }

    public function upload_foto()
    {
        // Mengambil foto menggunakan $_FILES
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
            $uploadDir = './assets/upload/img_user/'; // Direktori tujuan penyimpanan file
            $fileName = $_FILES['foto']['name']; // Nama file gambar yang diupload
            $filePath = $uploadDir . $fileName; // Path lengkap file gambar

            // Memeriksa keberadaan file dengan nama yang sama
            $counter = 1;
            while (file_exists($filePath)) {
                $fileName = $this->generateUniqueFileName($_FILES['foto']['name'], $counter);
                $filePath = $uploadDir . $fileName;
                $counter++;
            }

            // Pindahkan file gambar ke folder tujuan
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $filePath)) {
                // Hapus foto sebelumnya (jika ada) menggunakan model Pelanggan_m
                $idPelanggan = $this->session->userdata('pelanggan_id');
                $this->Pelanggan_m->hapus_foto($idPelanggan);

                // Simpan path file ke dalam database menggunakan model Pelanggan_m
                $this->Pelanggan_m->upload_foto($filePath, $idPelanggan);

                // Kirim respon berhasil ke klien
                echo json_encode(['status' => 'success', 'message' => 'Foto berhasil diupload']);
            } else {
                // Error saat mengupload gambar
                echo json_encode(['status' => 'error', 'message' => 'Terjadi kesalahan saat upload foto']);
            }
        } else {
            // Jika foto tidak ada atau terjadi kesalahan saat mengambil foto
            echo json_encode(['status' => 'error', 'message' => 'Foto tidak ditemukan']);
        }
    }

    public function hapus_foto()
    {
        $idPelanggan = $this->input->post('idPelanggan');

        // Panggil fungsi hapus_foto() pada model Pelanggan_m
        $this->Pelanggan_m->hapus_foto($idPelanggan);
    }

    public function cek_username_email()
    {
        $newUsername = $this->input->post('new_username');
        $newEmail = $this->input->post('new_email');
        $oldUsername = $this->session->userdata('pelanggan_username');
        $oldEmail = $this->session->userdata('pelanggan_email');

        $response = array(
            'username_exists' => false,
            'email_exists' => false
        );

        if ($newUsername !== $oldUsername) {
            $isUsernameExists = $this->Pelanggan_m->isUsernameExists($newUsername);
            $response['username_exists'] = $isUsernameExists;
        }

        if ($newEmail !== $oldEmail) {
            $isEmailExists = $this->Pelanggan_m->isEmailExists($newEmail);
            $response['email_exists'] = $isEmailExists;
        }
        echo json_encode($response);
    }

    // Fungsi untuk menghasilkan nama file yang unik
    private function generateUniqueFileName($fileName, $counter)
    {
        $fileInfo = pathinfo($fileName);
        $newFileName = $fileInfo['filename'] . '_' . $counter . '.' . $fileInfo['extension'];
        return $newFileName;
    }
}
