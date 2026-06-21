<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <title><?= isset($title) ? $title : 'App-CIShop-Homepage'?> </title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/navbar-fixed/">

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url('assets/libs/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">

        <!-- Fontawesome -->
        <link rel="stylesheet" href="<?= base_url('assets/libs/fontawesome/css/all.min.css'); ?>">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">
        <!-- Custom styles for this template -->
    </head>
    <body>
        
		<!-- Navbar -->
		<?php $this->load->view('layouts/_navbar');?>
		<!-- End Navbar -->

		<!-- Content -->
		<?php $this->load->view($page); ?>
		<!-- End Content -->

        <!-- Javascipt -->
		<script src="<?= base_url('assets/libs/jquery/jquery-3.5.0.min.js'); ?>"></script>
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>" ></script>
        <script type="text/javascript">
        function createSlug() {
            const title = document.getElementById('title').value;
            const slugInput = document.getElementById('slug');
            
            const slug = title.toLowerCase()
                            .trim()
                            .replace(/[^a-z0-9 -]/g, '') // Hapus karakter spesial
                            .replace(/\s+/g, '-')        // Ganti spasi dengan minus
                            .replace(/-+/g, '-');        // Satukan minus yang beruntun
                            
            slugInput.value = slug;
        }
        </script>
    </body>
</html>
