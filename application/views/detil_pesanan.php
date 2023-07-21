<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/homepage.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Banaboolen</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <style>
        .card {
            height: 100%;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <?php $this->load->view('layout/navbar'); ?>
    <div class="col-12 my-5">
        <div class="row"> <!-- Ganti row di sini -->
            <div class="col-md-8 mb-4"> <!-- Kolom pertama -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>pesanan_saya">Pesanan Saya</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pesanan - <span id="modalTanggal"></span> - <span id="modalIDPesanan"></span></li>
                    </ol>
                </nav>
                <!-- Bagian informasi pesanan -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Detil Pesanan</h5>
                        <p class="card-text">Tanggal Pesanan: <span id="modalTanggalPesanan"></span></p>
                        <p class="card-text">Jenis Pemesanan: <span id="modalJenisPemesanan"></span></p>
                        <p class="card-text">Tanggal Ambil/Kirim: <span id="modalTanggalSiapAmbilKirim"></span></p>
                        <p class="card-text">Status Pesanan: <span id="modalStatusPesanan"></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4"> <!-- Kolom kedua -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Status Pesanan</h5>
                        <ul id="divPerubahanStatusPesanan">
                            <!-- Di sini Anda dapat mengisi data status pesanan dari JSON menggunakan JavaScript -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!-- Bagian daftar produk yang dipesan -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Daftar Produk</h5>
                <div class="row" id="divDaftarProduk">
                    <!-- Di sini Anda dapat mengisi data produk yang dipesan dari JSON menggunakan JavaScript -->
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <!-- Bagian informasi pengiriman -->
            <div class="col-md-6">
                <h6>Informasi Pengiriman</h6>
                <p>Tanggal Kirim: <span id="modalTanggalAmbilKirim"></span></p>
                <p>Nama Penerima: <span id="modalPenerima"></span></p>
                <p>No. Telepon Penerima: <span id="modalNoTelepon"></span></p>
                <p>Alamat: <span id="modalAlamat"></span></p>
            </div>
            <!-- Bagian informasi pembayaran -->
            <div class="col-md-6 ">
                <h6>Informasi Pembayaran</h6>
                <p>Metode Pembayaran: <span id="modalMetodePembayaran"></span></p>
                <p>Bank: <span id="modalBank"></span></p>
                <p class="font-weight-bold">Total Harga: <span id="modalTotalHargaPembayaran"></span></p>
            </div>
        </div>

        <hr>

        <!-- Tombol-tombol untuk batalkan pesanan, selesaikan pesanan, chat penjual, dan beri ulasan -->
        <div class="col-12">
            <div class="d-flex flex-column align-items-end"> <!-- Container untuk tombol-tombol -->
                <button id="tombolBatalkanPesanan" type="button" class="btn btn-danger mb-2" disabled>Batalkan Pesanan</button>
                <button id="tombolSelesaikanPesanan" type="button" class="btn btn-success mb-2" disabled>Selesaikan Pesanan</button>
                <button id="tombolChatPenjual" type="button" class="btn btn-primary mb-2">Chat Penjual</button>
                <button id="tombolBeriUlasan" type="button" class="btn btn-secondary" disabled>Beri Ulasan</button>
            </div>
        </div>
    </div>

    <?php $this->load->view('layout/footer'); ?>
    <?php $this->load->view('layout/footer_end'); ?>

    <!-- Load script untuk format tanggal dan mata uang -->
    <script>
        // Fungsi untuk format tanggal menjadi "dd MMMM yyyy"
        function formatTanggal(inputDate) {
            var date = new Date(inputDate);
            var options = {
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            return date.toLocaleDateString('id-ID', options);
        }

        // Fungsi untuk format mata uang menjadi "Rp XX,XXX,XXX"
        function formatCurrency(amount) {
            var formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return formatter.format(amount);
        }

        // Mendapatkan data JSON dari variabel pesananJSON yang diisi dari controller
        var dataJSON = <?php echo $pesananJSON; ?>;
        console.log(dataJSON)

        // Mengisi data pesanan ke dalam elemen HTML
        document.getElementById('modalIDPesanan').innerText = dataJSON.pesanan.ID_Pesanan;
        document.getElementById('modalTanggal').innerText = formatTanggal(dataJSON.pesanan.Tanggal_Pesanan);
        document.getElementById('modalTanggalPesanan').innerText = formatTanggal(dataJSON.pesanan.Tanggal_Pesanan);
        document.getElementById('modalJenisPemesanan').innerText = dataJSON.pesanan.Jenis_Pemesanan;
        document.getElementById('modalTanggalSiapAmbilKirim').innerText = formatTanggal(dataJSON.pesanan.Tanggal_Siap_Ambil_Kirim);
        document.getElementById('modalStatusPesanan').innerText = dataJSON.pesanan.Status_Pesanan;
        document.getElementById('modalTanggalAmbilKirim').innerText = formatTanggal(dataJSON.pesanan.Tanggal_Siap_Ambil_Kirim);
        document.getElementById('modalPenerima').innerText = dataJSON.pesanan.Penerima;
        document.getElementById('modalNoTelepon').innerText = dataJSON.pesanan.No_Telepon;
        document.getElementById('modalAlamat').innerText = dataJSON.pesanan.Alamat;
        document.getElementById('modalMetodePembayaran').innerText = dataJSON.pesanan.Metode_Pembayaran;
        document.getElementById('modalBank').innerText = dataJSON.pesanan.Bank;
        document.getElementById('modalTotalHargaPembayaran').innerText = formatCurrency(dataJSON.pesanan.Total_Harga);

        // Mengisi data detil status pesanan ke dalam elemen HTML (dalam bentuk list)
        var detilStatusPesananList = '';
        dataJSON.detil_status_pesanan.forEach(function(status) {
            detilStatusPesananList += '<li>' + status.Tanggal_Perubahan_Status + ' - ' + status.Status_Pesanan + '</li>';
        });
        document.getElementById('divPerubahanStatusPesanan').innerHTML = detilStatusPesananList;

        // Mengisi data produk dipesan ke dalam elemen HTML (dalam bentuk baris)
        var produkDipesanRow = '';
        dataJSON.produk_dipesan.forEach(function(produk) {
            var totalHargaProduk = produk.Jumlah * produk.Harga;
            produkDipesanRow += '<div class="col-md-12 mb-3">';
            produkDipesanRow += '<div class="card">';
            produkDipesanRow += '<div class="row g-0">';
            produkDipesanRow += '<div class="col-md-4">';
            produkDipesanRow += '<img src="<?php echo base_url(); ?>' + produk.Foto + '" class="card-img-top" alt="Foto Produk">';
            produkDipesanRow += '</div>';
            produkDipesanRow += '<div class="col-md-8">';
            produkDipesanRow += '<div class="card-body">';
            produkDipesanRow += '<h5 class="card-title">' + produk.Nama + '</h5>';
            produkDipesanRow += '<p class="card-text">' + produk.Jumlah + ' x ' + formatCurrency(produk.Harga) + '</p>';
            var catatanPesanan = produk.CatatanKhusus ? produk.CatatanKhusus : "Tidak Ada";
            produkDipesanRow += '<p class="card-text">Catatan: ' + catatanPesanan + '</p>';
            produkDipesanRow += '<p class="card-text">Harga Total: ' + formatCurrency(totalHargaProduk) + '</p>';
            produkDipesanRow += '</div>';
            produkDipesanRow += '</div>';
            produkDipesanRow += '</div>';
            produkDipesanRow += '</div>';
            produkDipesanRow += '</div>';
        });
        document.getElementById('divDaftarProduk').innerHTML = produkDipesanRow;

        // Mengatur status tombol berdasarkan dataJSON.pesanan.Status_Pesanan
        var statusPesanan = dataJSON.pesanan.Status_Pesanan;
        var tombolBatalkanPesanan = document.getElementById('tombolBatalkanPesanan');
        var tombolSelesaikanPesanan = document.getElementById('tombolSelesaikanPesanan');
        var tombolBeriUlasan = document.getElementById('tombolBeriUlasan');

        if (statusPesanan === "Menunggu Konfirmasi") {
            tombolBatalkanPesanan.disabled = false;
        } else if (statusPesanan === "Dikirim" || statusPesanan === "Siap Diambil") {
            tombolSelesaikanPesanan.disabled = false;
        } else if (statusPesanan === "Selesai") {
            tombolBeriUlasan.disabled = false;
        }

        // Menggunakan base_url dalam JavaScript untuk mengarahkan ke beri_ulasan.php
        document.getElementById("tombolBeriUlasan").addEventListener("click", function() {
            var url = "<?php echo base_url('beri_ulasan/') ?>" + dataJSON.pesanan.ID_Pesanan;
            window.location.href = url;
        });
    </script>
</body>

</html>