<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />

        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.ico">
        <?php // IDEA: Dasar Assets ?>
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <?php // IDEA: End Dasar Assets ?>
        <?php // IDEA: Penggunaan Assets DataTables ?>
        <?php if ($js == 'dataTables') { ?>
        <link href="<?= base_url(); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      <?php }
        // IDEA: End Penggunaan Assets DataTables
        ?>



    </head>

    <body data-sidebar="dark">
        <div id="layout-wrapper">

            <?php
            // HACK: Semua Untuk Asset Setiap Part sudah di Pilah Ke masing masing file
            $this->load->view('part/topbar');
            $this->load->view('part/navbar');
            ?>
            <div class="main-content">
