    <!-- navbar -->
    <header style="background-color: #fde722;">
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/homepage.png') ?>" width="75"></a>
                </div>

                <?php if ($this->session->userdata('pelanggan_id') && current_url() == base_url()) { ?>
                    <!-- Tampilkan search box hanya jika pengguna sudah login -->
                    <form action="<?php echo base_url() ?>cari_produk" method="get" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Cari produk..." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                    </form>
                <?php } ?>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <?php if ($this->session->userdata('pelanggan_id')) { ?>
                            <li><a href="<?php echo base_url() ?>pesanan_saya">Pesanan</a></li>
                            <li><a href="<?php echo base_url() ?>keranjang">Keranjang</a></li>
                            <li><a href="<?php echo base_url() ?>obrolan">Obrolan</a></li>
                            <li><a href="<?php echo base_url() ?>akun_saya">Akun Saya</a></li>
                            <li><a href="<?php echo base_url() ?>keluar" onclick="confirmLogout(event)">Keluar</a></li>
                        <?php } else { ?>
                            <li><a href="<?php echo base_url() ?>masuk">Masuk</a></li>
                            <li><a href="<?php echo base_url() ?>daftar">Daftar</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
        <script type="text/javascript">
            function confirmLogout(event) {
                event.preventDefault();
                swal({
                    title: "Apakah Anda ingin keluar?",
                    text: "Anda akan logout dari akun pelanggan.",
                    icon: "warning",
                    buttons: ["Batal", "Keluar"],
                    dangerMode: true,
                }).then(function(willLogout) {
                    if (willLogout) {
                        // Jika pengguna menekan tombol "Keluar"
                        window.location.href = "<?php echo base_url() ?>keluar";
                    }
                });
            }
        </script>
    </header>