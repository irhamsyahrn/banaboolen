    <!-- CSS -->
    <style type="text/css">
        .combined {
            -webkit-text-stroke: 1px black;
            color: white;
            text-shadow:
                2px 2px 0 #000,
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 0 #000;
        }

        .border-black {
            color: blue;
            /*border white with light shadow*/
            text-shadow:
                2px 0 0 #000,
                -2px 0 0 #000,
                0 2px 0 #000,
                0 -2px 0 #000,
                1px 1px 0 #000,
                -1px -1px 0 #000,
                1px -1px 0 #000,
                -1px 1px 0 #000,
                1px 1px 5px #000;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/linearicons.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css">
    <link rel="stylesheet" href="http://anijs.github.io/lib/anicollection/anicollection.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datepicker/dist/css/bootstrap-datepicker.min.css">
    <link href="<?php echo base_url() ?>assets/select2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.1.1/jquery.rateyo.min.css">
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /* background-color: #fff; */
        }

        .pre {
            border: 1px solid grey;
            min-height: 10em;
        }

        .preloader .loading {
            position: relative;
            /* Change to relative positioning */
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
            display: flex;
            /* Add flex display */
            flex-direction: column;
            /* Set flex direction to column */
            align-items: center;
            /* Center align items horizontally */
        }

        .loading p {
            position: absolute;
            bottom: 0;
            /* Position at the bottom */
            left: 0;
            /* Align to the left */
            width: 100%;
            /* Set width to 100% */
            text-align: center;
            /* Center align text horizontally */
        }
    </style>
