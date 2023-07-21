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
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-11">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><i class="fas fa-bus"></i> Admin Login Panel</h1>
                                    </div>
                                    <form class="user" method="post" action="<?= base_url('admin/masuk') ?>">
                                        <div class="form-group">
                                            <input required="" type="text" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input required="" type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-success btn-block">
                                            Login
                                        </button>
                                        <!--  <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
              <i class="fab fa-google fa-fw"></i> Login with Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
              <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
            </a> -->
                                    </form>
                                    <hr>
                                    <!-- <p align="center" class="login-box-msg">Your IP : <?= $ipaddres; ?></p> -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('layout/footer_end'); ?>
</body>

</html>