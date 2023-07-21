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
            <div class="row height align-items-center justify-content-center">
                <div class="col-lg-5">
                    <div class="card card-login mx-auto mt-10">
                        <div class="card-header">Login Pelanggan</div>
                        <div class="card-body" align="left">
                            <!-- Tampilkan pesan error jika ada -->
                            <?php if ($this->input->post('username')) { ?>
                                <?php if (!empty($error)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($this->session->flashdata('success')) { ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php } ?>
                            <?php if ($this->session->flashdata('error')) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php } ?>
                            <form action="<?php echo base_url('masuk'); ?>" method="post">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="text" id="username" name="username" class="form-control" placeholder="Username/Email" required="required">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                                    </div>
                                </div>
                                <button class="btn btn-success btn-block">Login</button>
                            </form>
                            <div class="text-center">
                                <p><a class="d-block mt-3" href="<?php echo base_url() ?>daftar">belum punya akun? Daftar.</a>
                                    <hr>
                                    <b><a class="d-block mt-3" style="font-size:15px;" href="<?php echo base_url() ?>login_penjual">Login sebagai Penjual</a></b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">

    </script>
    <?php $this->load->view('layout/footer_end'); ?>
</body>

</html>