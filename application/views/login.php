<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login | Sistem Pengelolaan Aplikasi Koperasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Sistem Pengelolaan Aplikasi Koperasi" name="description" />
        <meta content="Kopkes System" name="author" />
        <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url(); ?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-pattern">
        <div class="bg-overlay"></div>
        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-8">
                        <div class="card">

                            <div class="card-body p-4">
                                <div class="">
                                    <div class="text-center">
                                        <a href="<?= base_url(); ?>" class="">
                                            <img src="<?= base_url(); ?>assets/images/logo-sm.png" alt="" height="150" class="auth-logo logo-dark mx-auto">

                                        </a>
                                    </div>
                                    <!-- end row -->
                                    <h4 class="font-size-18 text-muted mt-2 text-center">Selamat Datang !</h4>
                                    <p class="mb-5 text-center">Silahkan login untuk mulai pengelolaan</p>
                                    <br>
                                    <?= $this->session->flashdata('message'); ?>
                                    <br>
                                    <form class="form-horizontal" action="<?= base_url('process_login') ?>" method="POST" >

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label" for="username">Username</label>
                                                    <input type="text" class="form-control" name="username" placeholder="Enter username">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label" for="userpassword">Password</label>
                                                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                                                </div>

                                                <div class="d-grid mt-4">
                                                    <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Kopkes Mandiri Syariah Aceh Barat Daya.</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>

        <script src="<?= base_url(); ?>assets/js/app.js"></script>

    </body>
</html>
