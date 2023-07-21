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

    <div class="col-12 mx-5 my-5">
        <h3>Checkout</h3>
    </div>

    <!-- Informasi Pemesan dan Informasi Pengiriman -->
    <div class="col-10 mx-5 my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Informasi Pemesan</h5>
                    <div class="card-body">
                        <!-- Konten informasi pemesan -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" readonly class="form-control" id="nama" name="nama" value="<?php echo $pelanggan['Nama_Lengkap']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" readonly class="form-control" id="email" name="email" value="<?php echo $pelanggan['Email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="telepon">No. Telepon</label>
                                <input type="text" readonly class="form-control" id="telepon" name="telepon" value="<?php echo $pelanggan['No_Telepon']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Siap Ambil/Kirim</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_siap_kirim_ambil">
                            </div>
                            <div class="form-group">
                                <label for="jenis_pemesanan">Jenis Pemesanan</label>
                                <select class="form-control" id="jenis_pemesanan" name="jenis_pemesanan">
                                    <option value=""></option>
                                    <option value="Pesan Antar">Pesan Antar / Delivery</option>
                                    <option value="Pesan Ambil">Pesan Ambil / Dine In</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Informasi Pengiriman</h5>
                    <div class="card-body">
                        <!-- Konten informasi pengiriman -->
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input type="text" class="form-control" style="max-width: 100%;" id="penerima" name="penerima">
                        </div>
                        <div class="form-group">
                            <label for="telepon_kirim">No. Telepon</label>
                            <input type="text" class="form-control" style="max-width: 100%;" id="telepon_kirim" name="telepon_kirim">
                        </div>
                        <div class="form-group">
                            <label for="alamat_kirim">Alamat</label>
                            <textarea class="form-control" style="max-width: 100%;" id="alamat_kirim" name="alamat_kirim"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10 mx-5 my-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Ringkasan Pemesanan</h5>
                    <div class="card-body">
                        <!-- Konten ringkasan pemesanan -->
                        <?php foreach ($keranjang as $item) : ?>
                            <div>
                                <h5><?php echo $item['detailProduk']['NamaProduk']; ?></h5>
                                <p>Jumlah: <?php echo $item['Jumlah']; ?></p>
                                <p>Harga Total: <?php echo $item['detailProduk']['Harga'] * $item['Jumlah']; ?></p>
                                <p>Catatan: <?php echo $item['CatatanKhusus']; ?></p>
                            </div>
                        <?php endforeach; ?>
                        <h5>Total Harga Pesanan: <?php echo $totalHargaPesanan; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h5 class="card-header">Metode Pembayaran</h5>
                    <div class="card-body">
                        <!-- Konten metode pembayaran -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="metode_pembayaran">Metode Pembayaran</label>
                                <select class="form-control" id="metode_pembayaran" name="metode_pembayaran" placeholder="PILIH METODE PEMBAYARAN">
                                    <option value=""></option>
                                    <option value="Bank Transfer">Bank Transfer</option>
                                    <option value="COD">COD</option>
                                    <option value="Bayar Saat Ambil">Bayar Saat Ambil</option>
                                </select>
                            </div>
                            <div class="form-group mb-5">
                                <label for="bank">Bank</label>
                                <select class="form-control" id="bank" name="bank" placeholder="PILIH BANK">
                                    <option value=""></option>
                                    <option value="BCA">BCA</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <!-- Tombol Kembali ke Keranjang dan Buat Pesanan -->
                            <div class="row mt-4">
                                <div class="col-md-12 d-flex justify-content-between">
                                    <a href="<?php echo base_url() ?>keranjang" class="btn btn-primary">Kembali ke Keranjang</a>
                                    <button type="button" id="buat-pesanan-btn" class="btn btn-success">Buat Pesanan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('layout/footer'); ?>
    <?php $this->load->view('layout/footer_end'); ?>

    <script>
        $(document).ready(function() {

            // Ketika halaman dimuat, cek nilai awal metode pembayaran dan terapkan fungsi untuk mengatur properti disabled pada field bank
            toggleBankField();
            toggleInformasiPengiriman();

            $('#jenis_pemesanan').change(function() {
                toggleInformasiPengiriman();

                var selectedOption = $(this).val();
                var metodePembayaranSelect = $('#metode_pembayaran');

                // Cek apakah pilihan "Jenis Pemesanan" adalah "Pesan Ambil"
                if (selectedOption === 'Pesan Ambil') {
                    // Atur nilai dan status disabled pada "Metode Pembayaran"
                    metodePembayaranSelect.val('Bayar Saat Ambil').trigger('change')
                    metodePembayaranSelect.prop('disabled', true);
                } else {
                    // Jika bukan "Pesan Ambil", aktifkan kembali "Metode Pembayaran"
                    metodePembayaranSelect.prop('disabled', false);
                }
            });

            // Event handler untuk memantau perubahan pada pilihan metode pembayaran
            $('#metode_pembayaran').change(function() {
                toggleBankField();
            });

            function toggleBankField() {
                // Ambil nilai yang dipilih pada pilihan metode pembayaran
                var selectedMetodePembayaran = $('#metode_pembayaran').val();

                // Jika metode pembayaran adalah "Bank Transfer", aktifkan kembali field bank
                if (selectedMetodePembayaran === "Bank Transfer") {
                    $('#bank').prop('disabled', false);
                } else {
                    // Jika metode pembayaran bukan "Bank Transfer", nonaktifkan field bank
                    $('#bank').prop('disabled', true);
                }
            }

            function toggleInformasiPengiriman() {
                // Ambil nilai yang dipilih pada pilihan jenis pemesanan
                var selectedJenisPemesanan = $('#jenis_pemesanan').val();

                // Jika jenis pemesanan adalah "Pesan Antar", aktifkan field di informasi pengiriman
                if (selectedJenisPemesanan === "Pesan Antar") {
                    $('#penerima').prop('disabled', false);
                    $('#telepon_kirim').prop('disabled', false);
                    $('#alamat_kirim').prop('disabled', false);
                } else {
                    // Jika metode pembayaran bukan "Pesan Antar", nonaktifkan field di informasi pengiriman
                    $('#penerima').prop('disabled', true);
                    $('#telepon_kirim').prop('disabled', true);
                    $('#alamat_kirim').prop('disabled', true);
                }
            }

            // Mengirim data checkout menggunakan AJAX
            $('#buat-pesanan-btn').click(function() {
                var data = {
                    jenis_pemesanan: $('#jenis_pemesanan').val(),
                    metode_pembayaran: $('#metode_pembayaran').val(),
                    bank: $('#bank').val(),
                    penerima: $('#penerima').val(),
                    telepon_kirim: $('#telepon_kirim').val(),
                    alamat_kirim: $('#alamat_kirim').val(),
                    tanggal_siap_kirim_ambil: $('#tanggal').val()
                };

                $.ajax({
                    url: '<?php echo base_url('Pesanan_c/tambah_pesanan'); ?>', // Ganti dengan URL untuk memproses checkout
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        // Tampilkan swal berhasil dengan ID_Pesanan
                        swal({
                            title: 'Pesanan berhasil dibuat',
                            text: 'ID Pesanan: ' + response,
                            icon: 'success',
                            buttons: {
                                pesanLagi: {
                                    text: 'Pesan lagi',
                                    value: 'pesanLagi'
                                },
                                lihatPesanan: {
                                    text: 'Lihat Pesanan Saya',
                                    value: 'lihatPesanan'
                                }
                            }
                        }).then(function(value) {
                            // Redirect sesuai dengan tombol yang dipilih
                            if (value === 'pesanLagi') {
                                window.location.href = '<?php echo base_url('home'); ?>';
                            } else if (value === 'lihatPesanan') {
                                window.location.href = '<?php echo base_url('pesanan_saya'); ?>';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan swal error dengan pesan error
                        swal({
                            title: 'Oops...',
                            text: 'Terjadi kesalahan: ' + error,
                            icon: 'error'
                        }).then(function() {
                            // Redirect ke halaman checkout
                            window.location.href = '<?php echo base_url('checkout'); ?>';
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>