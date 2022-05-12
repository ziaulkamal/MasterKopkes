<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('proses_instansi'); ?>" class="custom-validation">
                                      <input type="hidden" name="kode_instansi" value="<?= $kode_instansi; ?>">
                                      <input type="hidden" name="registration" value="<?= $registration; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_instansi" id="Nama_instansi"  maxlength="30" value="<?= $nama_instansi; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Alamat Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat_instansi" id="Alamat_instansi"  maxlength="30" value="<?= $alamat_instansi; ?>" />
                                          </div>
                                        </div>
                                        <div>
                                            <div>
                                                <button class="btn btn-primary waves-effect waves-light me-1">
                                                    Submit
                                                </button>
                                                <button class="btn btn-secondary waves-effect">
                                                    Cancel
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
