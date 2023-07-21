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
        <?php $this->load->view('layout/header'); ?>
    </head>

    <body>
        <?php $this->load->view('layout/navbar'); ?>
        <section class="service-area section-gap relative">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <!-- Default Card Example -->
                        <div class="card ">
                            <div class="card-header">
                                <i class="fas fa-user"></i> Daftar Akun
                            </div>
                            <div class="card-body">
                                <?php if ($this->input->post('username') || $this->input->post('email')) { ?>
                                    <?php if ($this->session->flashdata('error')) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $this->session->flashdata('error'); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                                <form action="<?php echo base_url() ?>daftar" method="post" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            <img id="foto-preview" style="border: 1px solid #ccc; margin: auto; padding: 5px; width: 150px; height: 150px; max-width: 150px; max-height: 150px;"></img>
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="foto" class="col-form-label">Format: jpeg/jpg/png. Maks. 1,5 MB</label>
                                            <input type="file" id="foto" name="foto" class="form-control" onchange="previewFoto(event)">
                                            <input type="hidden" id="inp-foto" value="<?php echo set_value('foto') ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="nama">Nama Lengkap :</label>
                                                <input type="text" name="name" class="form-control" required="" placeholder="Nama Lengkap" value="<?php echo set_value('name') ?>">
                                                <?php echo form_error('name'), '<small class="text-danger pl-3">', '</small>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="email">E-mail :</label>
                                                <input type="text" name="email" class="form-control" required="" placeholder="E-mail" value="<?php echo set_value('email') ?>">
                                                <?php echo form_error('email'), '<small class="text-danger pl-3">', '</small>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class="form-label-group">
                                                <label for="telepon">No. Telepon :</label>
                                                <input type="text" name="nomor" class="form-control" required="" placeholder="No. Telepon" pattern="[0-9]+" title="Harap masukkan hanya angka" value="<?php echo set_value('nomor') ?>">
                                                <?php echo form_error('nomor'), '<small class="text-danger pl-3">', '</small>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label for="nama">Username :</label>
                                            <input type="text" id="username" name="username" class="form-control" required="" placeholder="Username">
                                            <?php echo form_error('username'), '<small class="text-danger pl-3">', '</small>'; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label for="password1">Password :</label>
                                            <input type="password" class="form-control form-control-user" name="password1" placeholder="Password">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="nama">Ulangi Password :</label>
                                            <input type="password" class="form-control form-control-user" name="password2" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <?php echo form_error('password1'), '<small class="text-danger pl-3">', '</small>'; ?>
                                    <button class="btn btn-info btn-block">Register</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <p>sudah memiliki akun? <a href="<?php echo base_url() ?>masuk">Masuk.</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <?php $this->load->view('layout/footer_end'); ?>
        <!-- JavaScript di sini -->
        <script type="text/javascript">
            function previewFoto(event) {
                var input = event.target;
                if (input.files && input.files[0]) {
                    var file = input.files[0];
                    var fileSize = file.size; // Ukuran file dalam byte
                    var maxSize = 1.5 * 1024 * 1024; // Ukuran maksimum 1,5 MB

                    // Memeriksa ukuran file
                    if (fileSize > maxSize) {
                        // Ukuran file melebihi batas
                        swal({
                            icon: 'error',
                            title: 'Ukuran foto terlalu besar',
                            text: 'Mohon pilih file dengan ukuran maksimal 1,5 MB.',
                        });

                        // Mengosongkan input file
                        input.value = '';
                        return;
                    }

                    var fileExtension = file.name.split('.').pop().toLowerCase();

                    // Memeriksa format file
                    if (!['jpeg', 'jpg', 'png'].includes(fileExtension)) {
                        // Format file tidak valid
                        swal({
                            icon: 'error',
                            title: 'Format salah',
                            text: 'Mohon pilih foto dengan jenis JPEG, JPG dan PNG saja.',
                        });

                        // Mengosongkan input file
                        input.value = '';
                        return;
                    }

                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = document.getElementById('foto-preview');
                        preview.setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    </body>

    </html>