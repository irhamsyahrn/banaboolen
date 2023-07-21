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
    <title>Banaboolen - Akun Saya</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <?php $this->load->view('layout/navbar'); ?>
    <section class="service-area section-gap relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <!-- Slide 1: Melihat Detail Akun -->
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i> Detail Akun Saya
                                    </div>
                                    <div class="card-body">
                                        <?php if ($this->session->flashdata('success')) { ?>
                                            <div class="alert alert-success" id="detail-alert-success" role="alert">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('error')) { ?>
                                            <div class="alert alert-danger" id="detail-alert-error" role="alert">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-sm-4 photo-container mx-auto">
                                                <img src="<?php echo base_url() . $pelanggan['Foto']; ?>" alt="Foto Profil" id="foto-preview">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="d-flex flex-column position-absolute bottom-0 start-0">
                                                    <button id="tambah-foto-btn" class="btn btn-primary btn-sm" onclick="showUploadFotoModal()"><i class="fa fa-plus"></i></button>
                                                    <button id="ubah-foto-btn" class="btn btn-secondary btn-sm mt-2" onclick="showUploadFotoModal()"><i class="fa fa-pencil-square-o"></i></button>
                                                    <button id="hapus-foto-btn" class="btn btn-danger btn-sm mt-2" onclick="deletePhoto()"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" value="<?php echo $pelanggan['Username']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap:</label>
                                            <input type="text" class="form-control" id="nama" value="<?php echo $pelanggan['Nama_Lengkap']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" value="<?php echo $pelanggan['Email']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor">Nomor Telepon:</label>
                                            <input type="text" class="form-control" id="nomor" value="<?php echo $pelanggan['No_Telepon']; ?>" readonly>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary" data-target="#myCarousel" data-slide-to="1" onclick="hideAlert()">Ubah Detail Akun</button>
                                            <button class="btn btn-primary" data-target="#myCarousel" data-slide-to="2" onclick="hideAlert()">Ubah Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!-- Slide 2: Mengubah Detail Akun -->
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i> Ubah Detil Akun
                                    </div>
                                    <div class="card-body">
                                        <?php if ($this->session->flashdata('success')) { ?>
                                            <div class="alert alert-success" id="ubah-detil-alert-success" role="alert">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('error')) { ?>
                                            <div class="alert alert-danger" id="ubah-detil-alert-error" role="alert">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php } ?>
                                        <form id="ubah-detil-akun-form" action="<?php echo base_url() ?>Pelanggan_c/ubah_detil" method="post">
                                            <div class="form-group" id="div-change-new-username">
                                                <label for="inp-change-new-username">Username:</label>
                                                <input type="text" class="form-control" id="inp-change-new-username" name="new_username" value="<?php echo $pelanggan['Username']; ?>">
                                                <label id="err-change-new-username" hidden></label>
                                            </div>
                                            <div class="form-group" id="div-change-new-nama">
                                                <label for="inp-change-new-nama">Nama Lengkap:</label>
                                                <input type="text" class="form-control" id="inp-change-new-nama" name="new_nama" value="<?php echo $pelanggan['Nama_Lengkap']; ?>">
                                                <label id="err-change-new-nama" hidden></label>
                                            </div>
                                            <div class="form-group" id="div-change-new-email">
                                                <label for="inp-change-new-email">Email:</label>
                                                <input type="email" class="form-control" id="inp-change-new-email" name="new_email" value="<?php echo $pelanggan['Email']; ?>">
                                                <label id="err-change-new-email" hidden></label>
                                            </div>
                                            <div class="form-group" id="div-change-new-no-telp">
                                                <label for="inp-change-new-no-telp">Nomor Telepon:</label>
                                                <input type="text" class="form-control" id="inp-change-new-no-telp" name="new_no_telp" value="<?php echo $pelanggan['No_Telepon']; ?>">
                                                <label id="err-change-new-no-telp" hidden></label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" onclick="validateForm(event)">Simpan</button>
                                                <button class="btn btn-secondary" data-target="#myCarousel" data-slide-to="0" onclick="removeValidationUbahDetil()">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <!-- Slide 3: Mengubah Password -->
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i> Ubah Password
                                    </div>
                                    <div class="card-body">
                                        <?php if ($this->session->flashdata('success')) { ?>
                                            <div class="alert alert-success" id="ubah-pass-detil-alert-success" role="alert">
                                                <?php echo $this->session->flashdata('success'); ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($this->session->flashdata('error')) { ?>
                                            <div class="alert alert-danger" id="ubah-pass-detil-alert-error" role="alert">
                                                <?php echo $this->session->flashdata('error'); ?>
                                            </div>
                                        <?php } ?>
                                        <form id="form-ubah-password-akun" action="<?php echo base_url() ?>Pelanggan_c/ganti_password" method="post">
                                            <div class="form-group" id="div-change-old-password">
                                                <label for="old_password">Password Lama:</label>
                                                <input type="password" class="form-control" id="inp-change-old-password" name="old_password">
                                                <label id="err-change-old-password" hidden></label>
                                            </div>
                                            <div class="form-group" id="div-change-new-password">
                                                <label for="new_password">Password Baru:</label>
                                                <input type="password" class="form-control" id="inp-change-new-password" name="new_password">
                                                <label id="err-change-new-password" hidden></label>
                                            </div>
                                            <div class="form-group" id="div-change-confirm-password">
                                                <label for="confirm_password">Konfirmasi Password Baru:</label>
                                                <input type="password" class="form-control" id="inp-change-confirm-password" name="confirm_password">
                                                <label id="err-change-confirm-password" hidden></label>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary" onclick="validateNewPass()">Simpan</button>
                                                <button class="btn btn-secondary" data-target="#myCarousel" data-slide-to="0" onclick="removeValidationNewPass()">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Tambah/Ubah Foto -->
    <div class="modal fade" id="uploadFotoModal" tabindex="-1" role="dialog" aria-labelledby="uploadFotoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadFotoModalLabel">Upload Foto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Upload Foto -->
                    <form id="uploadFotoForm" enctype="multipart/form-data">
                        <div class="form-group" id="div-change-new-foto">
                            <label for="foto-input">Pilih Foto (Format: jpeg/jpg/png. Maks. 1,5 MB)</label>
                            <input type="file" class="form-control-file" id="foto-input" name="foto" onchange="validasiFoto()">
                            <label id="err-change-new-foto" hidden></label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary" onclick="submitFoto()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        //remove validation field ubah username
        document.getElementById('inp-change-new-username').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-new-username').html('').removeClass("error-info").hide();
            $('#err-change-new-username').prop("hidden", true);
            $('#div-change-new-username').removeClass('error-color');
            $('input[id=inp-change-new-username]').css({
                "border-color": ""
            });
        });

        //remove validation field ubah nama lengkap
        document.getElementById('inp-change-new-nama').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-new-nama').html('').removeClass("error-info").hide();
            $('#err-change-new-nama').prop("hidden", true);
            $('#div-change-new-nama').removeClass('error-color');
            $('input[id=inp-change-new-nama]').css({
                "border-color": ""
            });
        });

        //remove validation field ubah email
        document.getElementById('inp-change-new-email').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-new-email').html('').removeClass("error-info").hide();
            $('#err-change-new-email').prop("hidden", true);
            $('#div-change-new-email').removeClass('error-color');
            $('input[id=inp-change-new-email]').css({
                "border-color": ""
            });
        });

        //remove validation field ubah no. telp
        document.getElementById('inp-change-new-no-telp').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-new-no-telp').html('').removeClass("error-info").hide();
            $('#err-change-new-no-telp').prop("hidden", true);
            $('#div-change-new-no-telp').removeClass('error-color');
            $('input[id=inp-change-new-no-telp]').css({
                "border-color": ""
            });
        });

        //remove validation field password lama
        document.getElementById('inp-change-old-password').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-old-password').html('').removeClass("error-info").hide();
            $('#err-change-old-password').prop("hidden", true);
            $('#div-change-old-password').removeClass('error-color');
            $('input[id=inp-change-old-password]').css({
                "border-color": ""
            });
        });

        //remove validation field password baru
        document.getElementById('inp-change-new-password').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-new-password').html('').removeClass("error-info").hide();
            $('#err-change-new-password').prop("hidden", true);
            $('#div-change-new-password').removeClass('error-color');
            $('input[id=inp-change-new-password]').css({
                "border-color": ""
            });
        });

        //remove validation field konfirmasi password baru
        document.getElementById('inp-change-confirm-password').addEventListener('input', function() {
            // Kode yang akan dijalankan saat nilai input berubah
            $('#err-change-confirm-password').html('').removeClass("error-info").hide();
            $('#err-change-confirm-password').prop("hidden", true);
            $('#div-change-confirm-password').removeClass('error-color');
            $('input[id=inp-change-confirm-password]').css({
                "border-color": ""
            });
        });

        function removeValidationUbahDetil() {
            //clear value form
            $('#inp-change-new-username').prop('value', null);
            $('#inp-change-new-email').prop('value', null);
            $('#inp-change-new-nama').prop('value', null);
            $('#inp-change-new-no-telp').prop('value', null);

            //hapus validasi error
            $('#err-change-new-username').html('').removeClass("error-info").hide();
            $('#err-change-new-username').prop("hidden", true);
            $('#div-change-new-username').removeClass('error-color');
            $('input[id=inp-change-new-username]').css({
                "border-color": ""
            });
            $('#err-change-new-email').html('').removeClass("error-info").hide();
            $('#err-change-new-email').prop("hidden", true);
            $('#div-change-new-email').removeClass('error-color');
            $('input[id=inp-change-new-email]').css({
                "border-color": ""
            });
            $('#err-change-new-nama').html('').removeClass("error-info").hide();
            $('#err-change-new-nama').prop("hidden", true);
            $('#div-change-new-nama').removeClass('error-color');
            $('input[id=inp-change-new-nama]').css({
                "border-color": ""
            });
            $('#err-change-new-no-telp').html('').removeClass("error-info").hide();
            $('#err-change-new-no-telp').prop("hidden", true);
            $('#div-change-new-no-telp').removeClass('error-color');
            $('input[id=inp-change-new-no-telp]').css({
                "border-color": ""
            });
        }

        function removeValidationNewPass() {
            //clear value form
            $('#inp-change-old-password').prop('value', null);
            $('#inp-change-new-password').prop('value', null);
            $('#inp-change-confirm-password').prop('value', null);

            //hapus validasi error
            $('#err-change-old-password').html('').removeClass("error-info").hide();
            $('#err-change-old-password').prop("hidden", true);
            $('#div-change-old-password').removeClass('error-color');
            $('input[id=inp-change-old-password]').css({
                "border-color": ""
            });
            $('#err-change-new-password').html('').removeClass("error-info").hide();
            $('#err-change-new-password').prop("hidden", true);
            $('#div-change-new-password').removeClass('error-color');
            $('input[id=inp-change-new-password]').css({
                "border-color": ""
            });
            $('#err-change-confirm-password').html('').removeClass("error-info").hide();
            $('#err-change-confirm-password').prop("hidden", true);
            $('#div-change-confirm-password').removeClass('error-color');
            $('input[id=inp-change-confirm-password]').css({
                "border-color": ""
            });
        }

        function validateForm(event) {
            event.preventDefault(); // Mencegah pengiriman form secara otomatis
            var err_count_ubah_detil = 0;

            removeValidationUbahDetil();

            // Validasi Username
            if ($('#inp-change-new-username').val() == '') {
                $('#err-change-new-username').html('Username wajib diisi.').addClass("error-info").show();
                $('#err-change-new-username').prop("hidden", false);
                $('#div-change-new-username').addClass('error-color');
                $('input[id=inp-change-new-username]').css({
                    "border-color": "red"
                });
                err_count_ubah_detil++;
            } else {
                $('#err-change-new-username').html('').removeClass("error-info").hide();
                $('#err-change-new-username').prop("hidden", true);
                $('#div-change-new-username').removeClass('error-color');
                $('input[id=inp-change-new-username]').css({
                    "border-color": ""
                });
            }

            // Validasi Nama
            if ($('#inp-change-new-nama').val() == '') {
                $('#err-change-new-nama').html('Nama Lengkap wajib diisi.').addClass("error-info").show();
                $('#err-change-new-nama').prop("hidden", false);
                $('#div-change-new-nama').addClass('error-color');
                $('input[id=inp-change-new-nama]').css({
                    "border-color": "red"
                });
                err_count_ubah_detil++;
            } else {
                $('#err-change-new-nama').html('').removeClass("error-info").hide();
                $('#err-change-new-nama').prop("hidden", true);
                $('#div-change-new-nama').removeClass('error-color');
                $('input[id=inp-change-new-nama]').css({
                    "border-color": ""
                });
            }

            // Validasi Email
            if ($('#inp-change-new-email').val() == '') {
                $('#err-change-new-email').html('Email wajib diisi.').addClass("error-info").show();
                $('#err-change-new-email').prop("hidden", false);
                $('#div-change-new-email').addClass('error-color');
                $('input[id=inp-change-new-email]').css({
                    "border-color": "red"
                });
                err_count_ubah_detil++;
            } else {
                $('#err-change-new-email').html('').removeClass("error-info").hide();
                $('#err-change-new-email').prop("hidden", true);
                $('#div-change-new-email').removeClass('error-color');
                $('input[id=inp-change-new-email]').css({
                    "border-color": ""
                });
            }

            // Validasi No. Telp
            if ($('#inp-change-new-no-telp').val() == '') {
                $('#err-change-new-no-telp').html('No. Telp wajib diisi.').addClass("error-info").show();
                $('#err-change-new-no-telp').prop("hidden", false);
                $('#div-change-new-no-telp').addClass('error-color');
                $('input[id=inp-change-new-no-telp]').css({
                    "border-color": "red"
                });
                err_count_ubah_detil++;
            } else {
                $('#err-change-new-no-telp').html('').removeClass("error-info").hide();
                $('#err-change-new-no-telp').prop("hidden", true);
                $('#div-change-new-no-telp').removeClass('error-color');
                $('input[id=inp-change-new-no-telp]').css({
                    "border-color": ""
                });
            }

            if (err_count_ubah_detil == 0) {
                // Membuat objek FormData dari form
                var formData = new FormData(document.getElementById('ubah-detil-akun-form'));

                // Membuat objek XMLHttpRequest
                var xhr = new XMLHttpRequest();
                var err_count_cek_username_email = 0;
                xhr.open('POST', '<?php echo base_url() ?>Pelanggan_c/cek_username_email', true);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.email_exists && response.username_exists) {
                            $('#err-change-new-username').html('Username sudah ada.').addClass("error-info").show();
                            $('#err-change-new-username').prop("hidden", false);
                            $('#div-change-new-username').addClass('error-color');
                            $('input[id=inp-change-new-username]').css({
                                "border-color": "red"
                            });
                            $('#err-change-new-email').html('Email sudah ada.').addClass("error-info").show();
                            $('#err-change-new-email').prop("hidden", false);
                            $('#div-change-new-email').addClass('error-color');
                            $('input[id=inp-change-new-email]').css({
                                "border-color": "red"
                            });
                            err_count_cek_username_email++;
                            return;
                        } else {
                            if (response.username_exists) {
                                $('#err-change-new-username').html('Username sudah ada.').addClass("error-info").show();
                                $('#err-change-new-username').prop("hidden", false);
                                $('#div-change-new-username').addClass('error-color');
                                $('input[id=inp-change-new-username]').css({
                                    "border-color": "red"
                                });
                                err_count_cek_username_email++;
                                return;
                            } else {
                                $('#err-change-new-username').html('').removeClass("error-info").hide();
                                $('#err-change-new-username').prop("hidden", true);
                                $('#div-change-new-username').removeClass('error-color');
                                $('input[id=inp-change-new-username]').css({
                                    "border-color": ""
                                });
                            }
                            if (response.email_exists) {
                                $('#err-change-new-email').html('Email sudah ada.').addClass("error-info").show();
                                $('#err-change-new-email').prop("hidden", false);
                                $('#div-change-new-email').addClass('error-color');
                                $('input[id=inp-change-new-email]').css({
                                    "border-color": "red"
                                });
                                err_count_cek_username_email++;
                                return;
                            } else {
                                $('#err-change-new-email').html('').removeClass("error-info").hide();
                                $('#err-change-new-email').prop("hidden", true);
                                $('#div-change-new-email').removeClass('error-color');
                                $('input[id=inp-change-new-email]').css({
                                    "border-color": ""
                                });
                            }
                        }

                        if (err_count_cek_username_email == 0) {
                            // Lanjutkan pengiriman form jika validasi sukses
                            document.getElementById('ubah-detil-akun-form').submit();
                        }
                    } else {
                        // Error saat melakukan permintaan AJAX
                        alert('Terjadi kesalahan saat memeriksa username dan email');
                    }
                };

                // Mengirim permintaan AJAX dengan FormData
                xhr.send(formData);
            }
        }

        function validateNewPass() {
            event.preventDefault(); // Mencegah pengiriman form secara otomatis

            var err_count_ubah_pass = 0;

            // validasi password lama
            if ($('#inp-change-old-password').val() == '') {
                $('#err-change-old-password').html('Password lama wajib diisi.').addClass("error-info").show();
                $('#err-change-old-password').prop("hidden", false);
                $('#div-change-old-password').addClass('error-color');
                $('input[id=inp-change-old-password]').css({
                    "border-color": "red"
                });
                err_count_ubah_pass++;
            } else {
                $('#err-change-old-password').html('').removeClass("error-info").hide();
                $('#err-change-old-password').prop("hidden", true);
                $('#div-change-old-password').removeClass('error-color');
                $('input[id=inp-change-old-password]').css({
                    "border-color": ""
                });
            }

            //validasi password baru
            if ($('#inp-change-new-password').val() == '') {
                $('#err-change-new-password').html('Password baru wajib diisi.').addClass("error-info").show();
                $('#err-change-new-password').prop("hidden", false);
                $('#div-change-new-password').addClass('error-color');
                $('input[id=inp-change-new-password]').css({
                    "border-color": "red"
                });
                err_count_ubah_pass++;
            } else {
                // apakah password baru sama dengan konfirmasi
                if ($('#inp-change-new-password').val() != $('#inp-change-confirm-password').val()) {
                    $('#err-change-new-password').html('Kombinasi Password Baru tidak cocok.').addClass("error-info").show();
                    $('#err-change-new-password').prop("hidden", false);
                    $('#div-change-new-password').addClass('error-color');
                    $('input[id=inp-change-new-password]').css({
                        "border-color": "red"
                    });
                    err_count_ubah_pass++;
                } else {
                    $('#err-change-new-password').html('').removeClass("error-info").hide();
                    $('#err-change-new-password').prop("hidden", true);
                    $('#div-change-new-password').removeClass('error-color');
                    $('input[id=inp-change-new-password]').css({
                        "border-color": ""
                    });
                }
            }

            //validasi konfirmasi password
            if ($('#inp-change-confirm-password').val() == '') {
                $('#err-change-confirm-password').html('Konfirmasi Password Baru wajib diisi.').addClass("error-info").show();
                $('#err-change-confirm-password').prop("hidden", false);
                $('#div-change-confirm-password').addClass('error-color');
                $('input[id=inp-change-confirm-password]').css({
                    "border-color": "red"
                });
                err_count_ubah_pass++;
            } else {
                // apakah password baru sama dengan konfirmasi
                if ($('#inp-change-new-password').val() != $('#inp-change-confirm-password').val()) {
                    $('#err-change-confirm-password').html('Kombinasi Password Baru tidak cocok.').addClass("error-info").show();
                    $('#err-change-confirm-password').prop("hidden", false);
                    $('#div-change-confirm-password').addClass('error-color');
                    $('input[id=inp-change-confirm-password]').css({
                        "border-color": "red"
                    });
                    err_count_ubah_pass++;
                } else {
                    $('#err-change-confirm-password').html('').removeClass("error-info").hide();
                    $('#err-change-confirm-password').prop("hidden", true);
                    $('#div-change-confirm-password').removeClass('error-color');
                    $('input[id=inp-change-confirm-password]').css({
                        "border-color": ""
                    });
                }
            }

            if (err_count_ubah_pass == 0) {
                // Lanjutkan pengiriman form jika validasi sukses
                document.getElementById('form-ubah-password-akun').submit();
            }
        }

        function hideAlert() {
            $('#detail-alert-success').hide();
            $('#detail-alert-error').hide();
            $('#ubah-detil-alert-success').hide();
            $('#ubah-detil-alert-error').hide();
            $('#ubah-pass-detil-alert-success').hide();
            $('#ubah-pass-detil-alert-error').hide();
        }

        // Cek apakah foto sudah ada
        var fotoSudahAda = (<?php echo $pelanggan['Foto'] ? 'true' : 'false'; ?>);

        // Tombol Tambah Foto
        var tambahFotoBtn = document.getElementById('tambah-foto-btn');
        if (tambahFotoBtn) {
            tambahFotoBtn.disabled = fotoSudahAda;
        }

        // Tombol Ubah Foto
        var ubahFotoBtn = document.getElementById('ubah-foto-btn');
        if (ubahFotoBtn) {
            ubahFotoBtn.disabled = !fotoSudahAda;
        }

        // Tombol Hapus Foto
        var hapusFotoBtn = document.getElementById('hapus-foto-btn');
        if (hapusFotoBtn) {
            hapusFotoBtn.disabled = !fotoSudahAda;
        }

        // Fungsi untuk menampilkan modal upload foto
        function showUploadFotoModal() {
            $('#uploadFotoModal').modal('show');
        }

        //Validasi ukuran & tipe file untuk upload pada modal
        function validasiFoto() {
            var fotoInput = document.getElementById('foto-input');
            var foto = fotoInput.files[0];
            var ekstensi = foto.name.split('.').pop().toLowerCase();

            // hapus validasi pada field
            $('#err-change-new-foto').html('').removeClass("error-info").hide();
            $('#err-change-new-foto').prop("hidden", true);
            $('#div-change-new-foto').removeClass('error-color');
            $('input[id=foto-input]').css({
                "border-color": ""
            });

            if (foto != undefined) {
                if (!['jpeg', 'jpg', 'png'].includes(ekstensi)) {
                    swal('Format salah', 'Mohon pilih foto dengan jenis JPEG, JPG dan PNG saja.', 'error');
                    fotoInput.value = '';
                    $('#err-change-new-foto').html('Mohon pilih foto dengan jenis JPEG, JPG dan PNG saja.').addClass("error-info").show();
                    $('#err-change-new-foto').prop("hidden", false);
                    $('#div-change-new-foto').addClass('error-color');
                    $('input[id=foto-input]').css({
                        "border-color": "red"
                    });
                    return;
                }

                if (foto.size > 1.5 * 1024 * 1024) {
                    swal('Ukuran foto terlalu besar', 'Mohon pilih file dengan ukuran maksimal 1,5 MB.', 'error');
                    fotoInput.value = '';
                    $('#err-change-new-foto').html('Mohon pilih file dengan ukuran maksimal 1,5 MB.').addClass("error-info").show();
                    $('#err-change-new-foto').prop("hidden", false);
                    $('#div-change-new-foto').addClass('error-color');
                    $('input[id=foto-input]').css({
                        "border-color": "red"
                    });
                    return;
                }
            } else { // jika klik cancel saat pilih file
                fotoInput.value = '';
            }
        }

        // Fungsi untuk mengirim foto
        function submitFoto() {
            var fotoInput = document.getElementById('foto-input');
            var formData = new FormData();
            formData.append('foto', fotoInput.files[0]);

            //Validasi apakah inputan foto baru/ubahan kosong
            if (fotoInput.value == '' || fotoInput.value == "" || fotoInput.value == null || fotoInput.value == undefined) {
                $('#err-change-new-foto').html('Foto belum dipilih.').addClass("error-info").show();
                $('#err-change-new-foto').prop("hidden", false);
                $('#div-change-new-foto').addClass('error-color');
                $('input[id=foto-input]').css({
                    "border-color": "red"
                });
            } else {
                $('#err-change-new-foto').html('').removeClass("error-info").hide();
                $('#err-change-new-foto').prop("hidden", true);
                $('#div-change-new-foto').removeClass('error-color');
                $('input[id=foto-input]').css({
                    "border-color": ""
                });

                // Lakukan permintaan AJAX untuk mengirim foto ke server
                // Pastikan untuk menyesuaikan URL dan metode pengiriman sesuai dengan kebutuhan Anda
                $.ajax({
                    url: '<?php echo base_url() ?>Pelanggan_c/upload_foto',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Sembunyikan modal setelah selesai
                        $('#uploadFotoModal').modal('hide');

                        // Perbarui tampilan detil akun saya dengan foto yang telah berubah
                        var fotoInput = document.getElementById('foto-input');
                        var fotoPreview = document.getElementById('foto-preview');

                        if (fotoInput.files && fotoInput.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                fotoPreview.src = e.target.result;
                            }

                            reader.readAsDataURL(fotoInput.files[0]);
                        }

                        // Panggil fungsi untuk memperbarui status tombol
                        updateButtonStatus();
                    },
                    error: function(xhr, status, error) {
                        // Terjadi kesalahan saat mengupload foto, tampilkan pesan kesalahan
                        console.log(error);
                    }
                });
            }
        }

        // Fungsi untuk memperbarui status tombol
        function updateButtonStatus() {
            var tambahFotoBtn = document.getElementById('tambah-foto-btn');
            var ubahFotoBtn = document.getElementById('ubah-foto-btn');
            var hapusFotoBtn = document.getElementById('hapus-foto-btn');

            if (tambahFotoBtn) {
                tambahFotoBtn.disabled = true; // Tombol Tambah Foto akan selalu ter-disabled setelah menambah atau mengubah foto
            }

            if (ubahFotoBtn) {
                ubahFotoBtn.disabled = false; // Tombol Ubah Foto akan selalu ter-enabled setelah menambah atau mengubah foto
            }

            if (hapusFotoBtn) {
                hapusFotoBtn.disabled = false; // Tombol Hapus Foto akan selalu ter-enabled setelah menambah atau mengubah foto
            }
        }


        function deletePhoto() {
            swal({
                title: "Hapus Foto?",
                text: "Apakah Anda yakin ingin menghapus foto ini?",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                dangerMode: true,
            }).then(function(willDelete) {
                if (willDelete) {
                    // Perform AJAX request to delete the photo from the database

                    // Dapatkan ID Pelanggan (misalnya dari variabel $pelanggan['ID_Pelanggan'])
                    var idPelanggan = <?php echo $pelanggan['ID_Pelanggan']; ?>;

                    // Panggil fungsi hapus_foto() pada model Pelanggan_m
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Pelanggan_c/hapus_foto'); ?>",
                        data: {
                            idPelanggan: idPelanggan
                        },
                        success: function(response) {
                            // After deleting the photo, you can show a success message or redirect to a different page
                            swal("Foto berhasil dihapus!", {
                                icon: "success",
                            }).then(function() {
                                // Optionally, redirect to a different page after successful deletion
                                location.reload();
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error case if necessary
                            console.log(xhr.responseText);
                        }
                    });
                }
            });
        }
    </script>
    <?php $this->load->view('layout/footer_end'); ?>
</body>

</html>