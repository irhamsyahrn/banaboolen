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
        body {
            margin: 0;
            padding: 0;
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
        }

        .ringkasan-belanja {
            position: fixed;
            right: 0;
            bottom: 0;
            width: 300px;
            padding: 20px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 5px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <?php $this->load->view('layout/navbar'); ?>
    <?php if (empty($keranjang)) { ?>
        <div class="col-12">
            <div class="row">
                <div class="col-12 mx-5 my-5">
                    <h3>Keranjang Saya</h3>
                </div>
                <!-- Tampilkan daftar produk dalam keranjang -->
                <div class="col-12 mx-5 my-5"">
                    <div class=" col-12 mx-5 my-5 align-items-center">
                    <iframe src="https://giphy.com/embed/m6aIggqT7oB4A" width="480" height="270" frameBorder="0" class="giphy-embed"></iframe>
                    <p>Belum ada produk dalam keranjang. <a href="<?php echo base_url() ?>home">Pesan dulu yuk?</a></p>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="col-12 mx-5 my-5">
            <h3>Keranjang Saya</h3>
        </div>
        <div class="col-12 mx-5 my-5">
            <?php foreach ($keranjang as $item) { ?>
                <div class="row mb-4">
                    <div class="col-sm-3">
                        <img src="<?php echo $item['Foto']; ?>" class="card-img-top" alt="<?php echo $item['NamaProduk']; ?>">
                    </div>
                    <div class="col-sm-5">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $item['NamaProduk']; ?></h5>
                            <p class="card-text">Jumlah: <?php echo $item['Jumlah']; ?></p>
                            <p class="card-text">Harga Total: <?php echo $item['HargaTotal']; ?></p>
                            <p class="card-text">Catatan: <?php echo $item['CatatanKhusus']; ?></p>
                        </div>
                    </div>
                    <div class="col-sm-4 align-items-center">
                        <div class="d-flex justify-content-start" style="align-items:center !important;">
                            <button type="button" class="btn btn-primary mr-2 btn-ubah" data-toggle="modal" data-target="#ubahProdukModal<?php echo $item['ID']; ?>" data-keranjang-id="<?php echo $item['ID']; ?>">
                                Ubah
                            </button>
                            <button type="button" class="btn btn-danger btnHapusKeranjang" data-keranjang-id="<?php echo $item['ID']; ?>" data-produk-nama="<?php echo $item['NamaProduk']; ?>">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Modal Ubah Produk -->
                <div class="modal fade product-modal" id="ubahProdukModal<?php echo $item['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="ubahProdukModalLabel<?php echo $item['ID']; ?>" aria-hidden="true" data-harga="<?php echo $item['HargaTotal']; ?>" data-stok="<?php echo $item['Stok']; ?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ubahProdukModalLabel<?php echo $item['ID']; ?>">Ubah Produk dalam Keranjang</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <img class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 1.25rem !important;" src="<?php echo $item['Foto']; ?>" alt="<?php echo $item['NamaProduk']; ?>">
                                </div>
                                <div class="mt-4 d-flex flex-column align-items-center text-center">
                                    <div class="form-group">
                                        <h5><?php echo $item['NamaProduk']; ?></h5>
                                        <p><?php echo $item['Deskripsi']; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="catatan">Catatan Produk (opsional):</label>
                                        <textarea class="form-control" id="catatan-<?php echo $item['ID']; ?>" data-catatan-sebelumnya="<?php echo $item['CatatanKhusus']; ?>"><?php echo $item['CatatanKhusus']; ?></textarea>
                                    </div>
                                    <label for="jumlah">Jumlah Produk:</label>
                                    <div class="d-flex justify-content-center">
                                        <div class="input-group justify-content-center">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary btn-kurang" type="button" id="btnKurang-<?php echo $item['ID']; ?>">-</button>
                                            </div>
                                            <input type="text" class="form-control col-2 text-center" id="jumlah-<?php echo $item['ID']; ?>" value="<?php echo $item['Jumlah']; ?>" pattern="[0-9]*" inputmode="numeric" data-jumlah-sebelumnya="<?php echo $item['Jumlah']; ?>">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-tambah" type="button" id="btnTambah-<?php echo $item['ID']; ?>">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-2" id="stok-produk-<?php echo $item['ID']; ?>">Stok : <?php echo $item['Stok']; ?></p>
                                </div>
                                <div class="form-group text-center">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <p id="subtotal-<?php echo $item['ID']; ?>" class="font-weight-bold align-self-center text-center" style="font-size: 14px;"></p>
                                <button type="button" class="btn btn-success btnUbahKeranjang" id="btnUbahKeranjang-<?php echo $item['ID']; ?>" style="font-size: 14px;" data-produk-id="<?php echo $item['ProdukID']; ?>" data-keranjang-id="<?php echo $item['ID']; ?>">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <!-- Tampilkan ringkasan belanja -->
    <div class="ringkasan-belanja">
        <h5>Ringkasan Belanja</h5>
        <p>Total Produk: <span id="totalProduk"><?php echo $totalProduk; ?></span></p>
        <p>Total Harga: <span id="totalHarga"><?php echo $totalHarga; ?></span></p>
        <button type="button" class="btn btn-success btn-block" id="btnCheckout">
            Checkout
        </button>
    </div>


    <?php $this->load->view('layout/footer'); ?>
    <?php $this->load->view('layout/footer_end'); ?>
    <script>
        $(document).ready(function() {

            // Mengirim perubahan detil produk yang dilakukan melalui modalUbah
            $(document).on('click', '.btnUbahKeranjang', function() {
                var keranjangID = $(this).data('keranjang-id');
                var produkID = $(this).data('produk-id');
                var jumlah = $('#jumlah-' + keranjangID).val();
                var catatan = $('#catatan-' + keranjangID).val();

                // Kirim data perubahan melalui AJAX
                $.ajax({
                    url: '<?php echo base_url('Keranjang_c/ubah_produk_di_keranjang'); ?>',
                    type: 'POST',
                    data: {
                        produk_id: produkID,
                        keranjang_id: keranjangID,
                        jumlah: jumlah,
                        catatan: catatan
                    },
                    success: function(response) {
                        // Refresh halaman setelah berhasil merubah
                        location.reload();
                    }
                });
            });

            // Memunculkan pesan alert konfirmasi saat menghapus produk dari keranjang
            $(document).on('click', '.btnHapusKeranjang', function() {
                var keranjangID = $(this).data('keranjang-id');
                var produkNama = $(this).data('produk-nama');

                swal({
                    title: 'Konfirmasi',
                    text: 'Anda akan menghapus produk "' + produkNama + '" dari keranjang. Apakah Anda yakin?',
                    icon: 'warning',
                    buttons: ['Batal', 'Hapus'],
                    dangerMode: true
                }).then(function(confirm) {
                    if (confirm) {
                        // Kirim data penghapusan melalui AJAX
                        $.ajax({
                            url: '<?php echo base_url('Keranjang_c/hapus_produk_dari_keranjang'); ?>',
                            type: 'POST',
                            data: {
                                keranjang_id: keranjangID
                            },
                            success: function(response) {
                                // Refresh halaman setelah berhasil menghapus
                                location.reload();
                            }
                        });
                    }
                });
            });

            // Fungsi untuk mengubah format rupiah
            function formatRupiah(angka) {
                var reverse = angka.toString().split('').reverse().join(''),
                    ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan;
            }

            // Mengubah subtotal harga
            function updateSubTotal(keranjangID, hargaProduk, jumlah) {
                var subtotal = hargaProduk * jumlah;
                $('#subtotal-' + keranjangID).text('Subtotal: Rp ' + formatRupiah(subtotal));
            }

            // Update tombol "btnKurang" dan "btnTambah"
            function updateButtonStatus(keranjangID, jumlah, stok) {
                $('#btnKurang-' + keranjangID).prop('disabled', jumlah <= 1);
                $('#btnTambah-' + keranjangID).prop('disabled', jumlah >= stok);
            }

            // Event handler untuk tombol "Ubah"
            $('.btn-ubah').click(function() {
                var keranjangID = $(this).data('keranjang-id');
                var hargaTotal = parseFloat($('#ubahProdukModal' + keranjangID).data('harga'));
                var hargaProduk = hargaTotal /= 10;
                var stok = parseInt($('#ubahProdukModal' + keranjangID).data('stok'));

                var jumlahInput = $('#jumlah-' + keranjangID);
                var jumlah = parseInt(jumlahInput.val());

                //Inisialisasi jumlah dan catatan sebelumnya
                var catatanSebelumnya = $('#catatan-' + $(this).data('keranjang-id')).data('catatan-sebelumnya');
                var jumlahSebelumnya = $('#jumlah-' + $(this).data('keranjang-id')).data('jumlah-sebelumnya');

                // Saat tombol tampil modal diklik, perbarui kembali input jumlah dan catatan
                $('#jumlah-' + keranjangID).val(jumlahSebelumnya);
                $('#catatan-' + keranjangID).val(catatanSebelumnya);

                // Event handler untuk tombol btnKurang
                $('#btnKurang-' + keranjangID).off('click').on('click', function() {
                    jumlah--;
                    jumlahInput.val(jumlah);
                    updateButtonStatus(keranjangID, jumlah, stok);
                    updateSubTotal(keranjangID, hargaProduk, jumlah);
                });

                // Event handler untuk tombol btnTambah
                $('#btnTambah-' + keranjangID).off('click').on('click', function() {
                    jumlah++;
                    jumlahInput.val(jumlah);
                    updateButtonStatus(keranjangID, jumlah, stok);
                    updateSubTotal(keranjangID, hargaProduk, jumlah);
                });

                jumlahInput.on('keypress', function(event) {
                    var charCode = event.which ? event.which : event.keyCode;

                    // Tombol yang diizinkan untuk angka: 48 - 57 (kode ASCII untuk 0 hingga 9)
                    if (charCode < 48 || charCode > 57) {
                        event.preventDefault();
                    }
                });

                // Mengubah subtotal ketika jumlah produk berubah
                jumlahInput.off('input').on('input', function() {
                    var jumlah = parseInt($(this).val());
                    if (isNaN(jumlah) || jumlah <= 0) {
                        jumlah = 1;
                        $(this).val(jumlah);
                    }
                    updateButtonStatus(keranjangID, jumlah, stok);
                    updateSubTotal(keranjangID, hargaProduk, jumlah);
                });

                // Inisialisasi saat pertama kali
                updateButtonStatus(keranjangID, jumlah, stok);
                updateSubTotal(keranjangID, hargaProduk, jumlah);
            });

            // Event handler untuk mengembalikan nilai field "jumlah" dan "catatan" jika modal ditutup
            $('#ubahProdukModal<?php echo $item['ID']; ?>').on('hidden.bs.modal', function() {
                var jumlahSebelumnya = $(this).data('jumlah-sebelumnya');
                $('#jumlah-<?php echo $item['ID']; ?>').val(jumlahSebelumnya);

                var catatanSebelumnya = $(this).data('catatan-sebelumnya');
                $('#catatan-<?php echo $item['ID']; ?>').val(catatanSebelumnya);
            });

            // Menambahkan event listener untuk tombol Checkout
            $(document).on('click', '#btnCheckout', function() {
                swal({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda ingin melanjutkan ke checkout?',
                    icon: 'warning',
                    buttons: ['Batal', 'Iya'],
                    dangerMode: true
                }).then(function(confirm) {
                    if (confirm) {
                        // Redirect ke halaman checkout
                        window.location.href = '<?php echo base_url('checkout'); ?>';
                    }
                });
            });

            // Periksa jumlah produk di keranjang saat halaman dimuat
            checkCartStatus();

            // Fungsi untuk memeriksa status keranjang
            function checkCartStatus() {
                var totalProduk = parseInt($('#totalProduk').text());
                var btnCheckout = $('#btnCheckout');

                if (totalProduk === 0) {
                    // Nonaktifkan tombol Checkout jika keranjang kosong
                    btnCheckout.prop('disabled', true);
                    btnCheckout.removeClass('btn-success');
                    btnCheckout.addClass('btn-secondary');
                } else {
                    // Aktifkan tombol Checkout jika ada barang di keranjang
                    btnCheckout.prop('disabled', false);
                    btnCheckout.removeClass('btn-secondary');
                    btnCheckout.addClass('btn-success');
                }
            }

            // Fungsi untuk memperbarui status tombol Checkout saat ada perubahan di keranjang
            function updateCartStatus() {
                var totalProduk = parseInt($('#totalProduk').text());
                var btnCheckout = $('#btnCheckout');

                if (totalProduk === 0) {
                    // Nonaktifkan tombol Checkout jika keranjang kosong
                    btnCheckout.prop('disabled', true);
                    btnCheckout.removeClass('btn-success');
                    btnCheckout.addClass('btn-secondary');
                } else {
                    // Aktifkan tombol Checkout jika ada barang di keranjang
                    btnCheckout.prop('disabled', false);
                    btnCheckout.removeClass('btn-secondary');
                    btnCheckout.addClass('btn-success');
                }
            }

            // Tambahkan event listener untuk perubahan keranjang (misalnya saat menghapus atau merubah produk di keranjang)
            $(document).on('click', '.btnUbahKeranjang, .btnHapusKeranjang', function() {
                // Tunggu beberapa saat agar perubahan di keranjang dapat disimpan
                setTimeout(function() {
                    // Perbarui status tombol Checkout
                    updateCartStatus();
                }, 500);
            });
        });
    </script>
</body>

</html>