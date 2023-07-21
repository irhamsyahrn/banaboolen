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

		.banner-content {
			padding: 20px !important; /* Atur nilai padding sesuai keinginan Anda */
			background-color: #fde722 !important;
			color: #875c21 !important;
			border-radius: 20px !important; /* Atur nilai border-radius untuk membuat sudut melengkung */
			margin-left: 2px !important;
		}

	</style>
	<?php $this->load->view('layout/header'); ?>
</head>

<body>
	<?php $this->load->view('layout/navbar'); ?>
	<!-- start banner Area -->
	<section class="banner-area relative section-gap relative" id="home">
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-end">
				<div class="banner-content col-lg-7 col-md-12">
					<h2 style="background-color: #fde722; color: #875c21;">
						Banaboolen
					</h2>
					<p style="background-color: #fde722; color: #875c21;">
						Kini toko tersedia secara online! Anda dapat melihat seluruh produk yang dijual, melakukan pemesanan hingga melacak pesanan anda hanya melalui situs ini.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- start product list section -->
	<section>
		<div class="col-12 mx-5 my-5">
			<h3>Produk Kami</h3>
		</div>
		<div class="row mx-5 my-5">
			<?php $count = count($produkList); ?>
			<?php foreach ($produkList as $key => $produk) { ?>
				<div class="col-lg-3 col-md-4 col-sm-6 px-2 <?php echo ($key == 0) ? 'ml-auto' : (($key == $count - 1) ? 'mr-auto' : ''); ?> mb-4 my-3">
					<div class="card rounded shadow" style="width: 100%;">
						<a href="<?php echo base_url('detil_produk?id=' . $produk['ID_Produk']); ?>">
							<img class="card-img-top rounded-top" src="<?php echo $produk['Foto']; ?>" alt="<?php echo $produk['Nama']; ?>">
						</a>
						<div class="card-body">
							<a href="<?php echo base_url('detil_produk?id=' . $produk['ID_Produk']); ?>" class="stretched-link" style="text-decoration: none; color: inherit;">
								<h5 class="card-title"><?php echo $produk['Nama']; ?></h5>
								<p class="card-text">Stok: <?php echo $produk['Stok']; ?></p>
								<h6 class="card-text">Rp <?php echo number_format($produk['Harga'], 0, ',', '.'); ?></h6>
							</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</section>
	<!-- end product list section -->
	<!-- End service Area -->
	<!-- End feature Area -->
	<!-- End Generic Start -->
	<?php $this->load->view('layout/footer'); ?>
	<?php $this->load->view('layout/footer_end'); ?>
</body>

</html>