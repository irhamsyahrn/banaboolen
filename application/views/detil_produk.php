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
	<style>
		.rating-ulasan {
			margin-top: 20px;
		}

		.rating {
			font-size: 15px;
		}

		.star-filled {
			color: gold;
		}

		.star-empty {
			color: gray;
		}

		.foto-pengulas img {
			width: 50px;
			height: 50px;
			border-radius: 50%;
			object-fit: cover;
		}

		.nama-pengulas {
			font-size: 9px;
			font-weight: bold;
		}

		.tanggal-ulasan {
			font-size: 12px;
			color: gray;
		}

		.isi-ulasan {
			margin-top: 10px;
		}

		.swal-button.swal-button--lanjutBelanja {
			float: left;
		}

		.swal-button.swal-button--lihatKeranjang {
			float: right;
		}

		#subtotal {
			font-weight: bold;
			font-size: 14px;
			display: flex;
			justify-content: flex-start;
			/* Align the text to the left */
			align-items: center;
			/* Align the text vertically in the center */
			height: 100%;
			margin-top: 0px !important;
			margin-bottom: 0px !important;
			/* Ensure the text is vertically centered in the container */
		}
	</style>
</head>

<body>
	<?php $this->load->view('layout/navbar'); ?>
	<div class="container mt-5 mb-5">
		<!-- start header Area -->
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>home">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Detil Produk - <?php echo $detailProduk['Nama']; ?></li>
			</ol>
		</nav>
		<!-- end header area -->
		<!-- start detil produk area -->
		<div class="col-12 mt-4 mb-5">
			<div class="row">
				<div class="col-sm-3 align-self-start">
					<div class="d-flex align-items-center justify-content-center" style="height: 300px;">
						<img class="card-img-top img-fluid" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 1.25rem !important;" src="<?php echo $detailProduk['Foto']; ?>" alt="<?php echo $detailProduk['Nama']; ?>">
					</div>
				</div>
				<div class="col-sm-7 align-self-center">
					<h3 class="card-title"><?php echo $detailProduk['Nama']; ?></h3>
					<div class="row">
						<div class="col-2">
							<p>Terjual 0</p>
						</div>
						<div class="col-10 d-flex justify-content-start">
							<p><i class="fa fa-star" style="color:gold;"></i> <?php echo number_format($detailProduk['Rating'], 0, ',', '.'); ?></p>
						</div>
					</div>
					<h4 class="card-text">Rp <?php echo number_format($detailProduk['Harga'], 0, ',', '.'); ?></h4>
					<p class="mt-3"><?php echo $detailProduk['Deskripsi']; ?></p>
				</div>
				<div class="col-sm-2 align-self-center">
					<div class="text-center">
						<?php if ($detailProduk['Stok'] > 0) { ?>
							<button class="btn btn-success" data-toggle="modal" data-target="#tambahKeranjangModal">+Keranjang</button>
						<?php } else { ?>
							<button class="btn btn-success" disabled>+Keranjang</button>
						<?php } ?>
					</div>
					<p class="text-center">
						<?php echo ($detailProduk['Stok'] > 0) ? 'Stok: ' . $detailProduk['Stok'] : 'Stok Habis'; ?>
					</p>
				</div>
			</div>
		</div>
		<!-- end detil produk area -->
		<!-- start ulasan area -->
		<div class="col-12 mt-5 mb-4">
			<h5>Ulasan Produk - 0 Rating</h5>
			<div class="rating-ulasan">
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row ulasan mt-3 mb-2">
					<div class="col-md-2">
						<div class="rating">
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-filled"></i>
							<i class="fa fa-star star-empty"></i>
							<i class="fa fa-star star-empty"></i>
						</div>
						<div class="col-md-2 d-flex justify-content-between">
							<div class="foto-pengulas align-self-start">
								<img src="./assets/img/default.png" alt="Foto Pengulas">
							</div>
							<div class="mx-auto my-auto">
								<div class="nama-pengulas">Nama Pengulas</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-10">
								<div class="row">
									<div class="col-md-12">
										<div class="tanggal-ulasan">Tanggal Ulasan</div>
									</div>
									<div class="col-md-12">
										<div class="isi-ulasan">Isi Ulasan</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end ulasan area -->
	</div>
	<!-- Modal Tambah Produk Ke Keranjang -->
	<div class="modal fade" id="tambahKeranjangModal" tabindex="-1" role="dialog" aria-labelledby="tambahKeranjangModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="tambahKeranjangModalLabel">Tambahkan ke Keranjang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="d-flex align-items-center justify-content-center" style="height: 300px;">
						<img class="img-fluid" style="max-width: 100%; max-height: 100%; object-fit: contain; border-radius: 1.25rem !important;" src="<?php echo $detailProduk['Foto']; ?>" alt="<?php echo $detailProduk['Nama']; ?>">
					</div>
					<div class="mt-4 d-flex flex-column align-items-center text-center">
						<div class="form-group">
							<h5><?php echo $detailProduk['Nama']; ?></h5>
							<p><?php echo $detailProduk['Deskripsi']; ?></p>
						</div>
						<div class="form-group">
							<label for="catatan">Catatan Produk (opsional):</label>
							<textarea class="form-control" id="catatan"></textarea>
						</div>
						<label for="jumlah">Jumlah Produk:</label>
						<div class="d-flex justify-content-center">
							<div class="input-group justify-content-center">
								<div class="input-group-prepend">
									<button class="btn btn-primary" type="button" id="btnKurang">-</button>
								</div>
								<input type="text" class="form-control col-2 text-center" id="jumlah" value="1" pattern="[0-9]*" inputmode="numeric">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button" id="btnTambah">+</button>
								</div>
							</div>
						</div>
						<p class="mt-2" id="stok-produk" value="<?php echo $detailProduk['Stok'] ?>">Stok : <?php echo $detailProduk['Stok']; ?></p>
					</div>
					<div class="form-group text-center">
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<p id="subtotal" class="font-weight-bold" style="font-size: 14px;"></p>
					<button type="button" class="btn btn-success" id="btnMasukkanKeranjang" style="font-size: 14px;" data-produk-id="<?php echo $detailProduk['ID_Produk']; ?>">
						Tambah ke Keranjang
					</button>
				</div>
			</div>
		</div>
	</div>
	<?php $this->load->view('layout/footer'); ?>
	<?php $this->load->view('layout/footer_end'); ?>
	<script>
		$(document).ready(function() {

			// Inisialisasi harga produk dari atribut data-harga
			var hargaProduk = <?php echo $detailProduk['Harga']; ?>;

			// Inisialisasi nilai stok produk dari atribut value
			var stokProduk = parseInt($('#stok-produk').attr('value'));

			// Fungsi untuk mengubah format rupiah
			function formatRupiah(angka) {
				var reverse = angka.toString().split('').reverse().join(''),
					ribuan = reverse.match(/\d{1,3}/g);
				ribuan = ribuan.join('.').split('').reverse().join('');
				return ribuan;
			}

			// Mengubah subtotal harga
			function updateSubTotal(jumlah) {
				var subtotal = hargaProduk * jumlah;
				$('#subtotal').text('Subtotal: Rp ' + formatRupiah(subtotal));
			}

			// Mengubah status tombol btnKurang dan btnTambah berdasarkan jumlah produk
			function updateButtonStatus(jumlah) {
				if (jumlah <= 1) {
					$('#btnKurang').prop('disabled', true);
				} else {
					$('#btnKurang').prop('disabled', false);
				}

				if (jumlah >= stokProduk) {
					$('#btnTambah').prop('disabled', true);
				} else {
					$('#btnTambah').prop('disabled', false);
				}

				updateSubTotal(jumlah);
			}

			// Inisialisasi status tombol
			updateButtonStatus(1);

			// Event handler untuk tombol btnKurang
			$('#btnKurang').click(function() {
				var jumlah = parseInt($('#jumlah').val());
				jumlah--;
				$('#jumlah').val(jumlah);
				updateButtonStatus(jumlah);
				updateSubTotal(jumlah);
			});

			// Event handler untuk tombol btnTambah
			$('#btnTambah').click(function() {
				var jumlah = parseInt($('#jumlah').val());
				jumlah++;
				$('#jumlah').val(jumlah);
				updateButtonStatus(jumlah);
				updateSubTotal(jumlah);
			});

			$('#jumlah').on('keypress', function(event) {
				var charCode = event.which ? event.which : event.keyCode;

				// Tombol yang diizinkan untuk angka: 48 - 57 (kode ASCII untuk 0 hingga 9)
				if (charCode < 48 || charCode > 57) {
					event.preventDefault();
				}
			});


			// Mengubah subtotal ketika jumlah produk berubah
			$('#jumlah').on('input', function() {
				if ($('#jumlah').val() == '' || $('#jumlah').val() == '0') {
					$('#jumlah').val('1');
				}
				var jumlah = parseInt($(this).val());
				if (jumlah == 0) {
					jumlah = 1;
				}
				updateSubTotal(jumlah);
			});

			// Menangani klik tombol "Tambah ke Keranjang"
			$('#btnMasukkanKeranjang').click(function() {
				var produkID = $(this).data('produk-id');
				console.log(produkID)
				var jumlah = parseInt($('#jumlah').val());
				var catatan = $('#catatan').val();
				var hargaTotal = hargaProduk * jumlah;

				// Kirim data ke controller menggunakan AJAX
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('Keranjang_c/tambah_produk_ke_keranjang'); ?>',
					data: {
						produk_id: produkID,
						jumlah: jumlah,
						catatan: catatan,
						harga_total: hargaTotal
					},
					success: function(response) {
						// Tampilkan pesan sukses menggunakan SweetAlert dengan dua tombol
						swal({
							title: "Berhasil!",
							text: "Produk berhasil ditambahkan ke keranjang!",
							icon: "success",
							buttons: {
								lanjutBelanja: {
									text: "Lanjut Belanja",
									value: "lanjut",
									className: "btn btn-primary swal-button" // Menambahkan kelas CSS untuk tombol "Lanjut Belanja"
								},
								lihatKeranjang: {
									text: "Lihat Keranjang",
									value: "keranjang",
									className: "btn btn-success swal-button" // Menambahkan kelas CSS untuk tombol "Lihat Keranjang"
								}
							},
							buttonsStyling: false, // Menonaktifkan gaya tombol bawaan SweetAlert
							closeOnClickOutside: false // Menonaktifkan penutupan SweetAlert saat diklik di luar modal
						}).then((value) => {
							if (value === "lanjut") {
								// Redirect ke halaman beranda
								window.location.href = "<?php echo base_url('home'); ?>";
							} else if (value === "keranjang") {
								// Redirect ke halaman keranjang
								window.location.href = "<?php echo base_url('keranjang'); ?>";
							}
						});
					},
					error: function() {
						// Tampilkan pesan error jika ada kesalahan
						swal("Error!", "Terjadi kesalahan saat menambahkan produk ke keranjang.", "error");
					}
				});
			});
		});
	</script>
</body>

</html>