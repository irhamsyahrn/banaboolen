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
            height: 300px;
            object-fit: cover;
        }
    </style>
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <?php $this->load->view('layout/navbar'); ?>
    <div class="col-12 my-5">
        <div class="row">
            <div class="col-md-2 mt-2 ml-2">
                <a id="kembaliDetilPesanan" style="font-size: 18px; color: gold;">
                    <i class="fa fa-angle-left" style="font-size: 18px; color: gold;"></i> Kembali
                </a>
            </div>
            <div class="col-md-8 mt-1">
                <h3>Ulasan - Pesanan - <?php echo $id_pesanan; ?></h3>
            </div>
        </div>

        <hr>

        <!-- Daftar produk yang dipesan -->
        <?php foreach ($detil_pesanan as $index => $produk) { ?>
            <div class="col-12">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?php echo base_url() . $produk['Foto']; ?>" class="card-img-top" alt="<?php echo $produk['Nama']; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $produk['Nama']; ?></h5>
                                <!-- Input untuk rating -->
                                <div class="form-group">
                                    <label for="rating<?php echo $index; ?>">Rating:</label>
                                    <div class="rateyo" id="rating<?php echo $index; ?>" data-rateyo-rating="0" data-rateyo-num-stars="5" data-rateyo-step="0.5"></div>
                                    <!-- Input tersembunyi untuk menyimpan nilai rating yang dipilih -->
                                    <input type="hidden" name="rating<?php echo $index; ?>">
                                </div>
                                <!-- Input untuk ulasan -->
                                <div class="form-group">
                                    <label for="ulasan<?php echo $index; ?>">Ulasan:</label>
                                    <textarea class="form-control" id="ulasan<?php echo $index; ?>" name="ulasan<?php echo $index; ?>" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!-- Tombol untuk memberikan ulasan -->
        <div class="col-12">
            <div class="d-flex flex-column align-items-end">
                <button id="tombolKirimUlasan" type="button" class="btn btn-primary">Kirim Ulasan</button>
            </div>
        </div>
    </div>
    <?php $this->load->view('layout/footer'); ?>
    <?php $this->load->view('layout/footer_end'); ?>

    <script>
        $(document).ready(function() {
            document.getElementById("kembaliDetilPesanan").addEventListener("click", function() {
                // Display the SweetAlert
                swal({
                    title: "Tidak jadi kasih rating?",
                    text: "Penilaianmu sangat berharga lho :(",
                    icon: "warning",
                    buttons: {
                        tetapDisini: {
                            text: "Tetap Disini",
                            value: "tetap", // Menambahkan kelas CSS untuk tombol "Tetap"
                            className: "btn btn-primary swal-button"
                        },
                        kembali: {
                            text: "Nggak jadi deh",
                            value: "kembali", // Menambahkan kelas CSS untuk tombol "Kembali"
                            className: "btn btn-danger swal-button"
                        }
                    },
                    closeOnClickOutside: false
                }).then((value) => {
                    // If the "Ya, kembali" button is clicked, redirect back to the previous page
                    if (value === "tetap") {
                        swal.close();
                    } else if (value === "kembali") {
                        window.location.href = "<?php echo base_url('pesanan_saya/detil/') . $id_pesanan ?>";
                    }
                });
            });

            // Inisialisasi RateYo pada elemen dengan class "rateyo"
            $(".rateyo").rateYo({
                starWidth: "23px", // Ubah ukuran bintang sesuai keinginan
                ratedFill: "#FFD700", // Warna bintang terisi
                normalFill: "#ccc", // Warna bintang kosong
                halfStar: true, // Aktifkan pemilihan setengah bintang
                readOnly: false, // Aktifkan interaksi dengan pengguna
                onSet: function(rating, rateYoInstance) {
                    // Mendapatkan ID dari elemen rateyo yang dipilih
                    var id = rateYoInstance.node.id;

                    // Mengambil nilai rating yang dipilih dan memasukkan ke dalam input tersembunyi
                    $("input[name='" + id + "']").val(rating);
                }
            });
        });

        // Event saat tombol "Kirim Ulasan" diklik
        $("#tombolKirimUlasan").on("click", function() {
            // Tampilkan SweetAlert konfirmasi
            swal({
                    title: "Apakah Anda yakin ingin mengirim penilaian dan ulasan?",
                    text: "Penilaianmu akan sangat membantu kami!",
                    icon: "info",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willSend) => {
                    if (willSend) {
                        // Jika tombol "Ya" diklik, kirim data rating dan ulasan ke server
                        kirimUlasan();
                    } else {
                        // Jika tombol "Tidak" diklik, tutup SweetAlert
                        swal("Penilaian dan ulasan tidak terkirim.", {
                            icon: "error",
                        });
                    }
                });
        });

        // Fungsi untuk mengirim data rating dan ulasan ke server
        function kirimUlasan() {
            // Loop melalui daftar produk untuk mengambil data rating dan ulasan
            var ulasanData = [];
            <?php foreach ($detil_pesanan as $index => $produk) { ?>
                var rating = $("input[name='rating<?php echo $index; ?>']").val();
                var ulasan = $("#ulasan<?php echo $index; ?>").val();
                ulasanData.push({
                    produkID: <?php echo $produk['ID_Produk']; ?>,
                    rating: rating,
                    ulasan: ulasan
                });
            <?php } ?>

            // Kirim data rating dan ulasan menggunakan AJAX
            $.ajax({
                url: "<?php echo base_url('produk_c/kirim_ulasan'); ?>",
                method: "POST",
                data: {
                    ulasanData: ulasanData
                },
                success: function(response) {
                    // Jika berhasil terkirim, tampilkan pesan sukses
                    swal("Penilaian dan ulasan berhasil terkirim!", {
                        icon: "success",
                    }).then(function() {
                        // Redirect ke halaman pesanan_saya
                        window.location.href = "<?php echo base_url('pesanan_saya/detil/') . $id_pesanan ?>";
                    });
                },
                error: function(error) {
                    // Jika terjadi kesalahan, tampilkan pesan error
                    swal("Terjadi kesalahan saat mengirim penilaian dan ulasan.", {
                        icon: "error",
                    });
                }
            });
        }
    </script>
</body>

</html>