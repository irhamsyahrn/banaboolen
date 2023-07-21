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

        .modal-content {
            width: 800px;
            /* Atur lebar modal */
            height: 600px;
            /* Atur tinggi modal */
        }
    </style>
    <?php $this->load->view('layout/header'); ?>
</head>

<body>
    <?php $this->load->view('layout/navbar'); ?>
    <div class="col-12">
        <div class="col-12 mx-5 my-5">
            <h3>Pesanan Saya</h3>
        </div>
    </div>
    <div class="container">
        <!-- Kontainer untuk dua tombol tab -->
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" id="tab-berlangsung" data-toggle="tab" href="#pesanan-berlangsung">Pesanan Berlangsung</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tab-semua" data-toggle="tab" href="#semua-pesanan">Semua Pesanan</a>
            </li>
        </ul>

        <!-- Tab Konten -->
        <div class="tab-content">
            <!-- Tab Pesanan Berlangsung -->
            <div class="tab-pane fade show active" id="pesanan-berlangsung" role="tabpanel" aria-labelledby="tab-berlangsung">
                <?php foreach ($pesanan_berlangsung as $pesanan) : ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pesanan - <?php echo date('d F Y', strtotime($pesanan['Tanggal_Pesanan'])) ?> - <?php echo $pesanan['ID_Pesanan'] ?></h5>
                                    <a href="<?php echo base_url('pesanan_saya/detil/') . $pesanan['ID_Pesanan']; ?>" class="btn btn-primary">Lihat Detil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p>Status Pesanan: <?php echo $pesanan['Status_Pesanan'] ?></p>
                        </div>
                        <div class="col-md-3">
                            <p>Harga Total: <?php echo $pesanan['Total_Harga'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Tab Semua Pesanan -->
            <div class="tab-pane fade" id="semua-pesanan" role="tabpanel" aria-labelledby="tab-semua">
                <?php foreach ($semua_pesanan as $pesanan) : ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pesanan - <?php echo date('d F Y', strtotime($pesanan['Tanggal_Pesanan'])) ?> - <?php echo $pesanan['ID_Pesanan'] ?></h5>
                                    <a href="<?php echo base_url('pesanan_saya/detil/') . $pesanan['ID_Pesanan']; ?>" class="btn btn-primary">Lihat Detil</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Harga Total: <?php echo $pesanan['Total_Harga'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('layout/footer'); ?>
    <?php $this->load->view('layout/footer_end'); ?>
</body>

</html>