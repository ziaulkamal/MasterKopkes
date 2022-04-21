<body class="bg-light">
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-8">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="">
                                <div class="text-center">
                                    <a href="index.html" class="">
                                        <img src="<?=base_url(); ?>assets/images/logo-dark.png" alt="" height="24" class="auth-logo logo-dark mx-auto">
                                        <img src="<?=base_url(); ?>assets/images/logo-light.png" alt="" height="24" class="auth-logo logo-light mx-auto">
                                    </a>
                                </div>
                                <!-- end row -->
                                <h4 class="font-size-18 text-muted mt-2 text-center">Akses Masuk</h4>
                                <p class="mb-5 text-center"> KPRI Kopkes Mandiri Syariah Abdya</p>
                                <?php echo $this->session->flashdata('message'); ?>
                                <form class="form-horizontal" action="<?= base_url('C_Auth/login'); ?>" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-4">
                                                <input type="text" class="form-control" name="username" placeholder="Username">
                                            </div>
                                            <div class="mb-4">
                                                <input  type="password" class="form-control" name="password" placeholder="Password" >
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
                          <script>document.write(new Date().getFullYear())</script> © KPRI Kopkes Mandiri Syariah Abdya.
                      </div>
                </div>
            </div>
        </div>
    </div>
