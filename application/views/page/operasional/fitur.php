<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0"><?= $title ?></h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6">
                        <div class="card">
                          <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                            <div class="card-body">
                                <form method="post" action="" class="custom-validation">
                                  <div class="row">
                                    <div class="mb-3 col-xl-12">
                                      <label class="form-label">Kebutuhan Penggunaan</label>
                                      <div>
                                      <textarea name="name" class="form-control" rows="2" cols="80"></textarea>
                                      </div>
                                    </div>
                                    <div class="mb-3 col-xl-12">
                                      <label class="form-label">Kategori</label>
                                      <div>
                                        <select class="form-control" name="status_anggota" required>
                                            <option selected>-- Pilih Kategori --</option>
                                            <option value="1">Wajib</option>
                                            <option value="2">Pokok</option>
                                            <option value="3">Khusus</option>
                                            <option value="4">Lainya</option>

                                        </select>
                                      </div>
                                    </div>
                                    <div class="mb-3 col-xl-12">
                                      <label class="form-label">Nominal</label>
                                      <div>
                                        <input type="text" class="form-control" />
                                      </div>
                                    </div>
                                    <div>
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                Proses Data
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect">
                                                Reset Form
                                            </button>
                                        </div>
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                          <div class="card">
                              <div class="card-body p-4">
                                  <div class="d-flex mb-1">
                                      <div class="flex-shrink-0 me-3">
                                          <div class="avatar-sm">
                                              <span class="avatar-title rounded-circle bg-primary">
                                                  <i class="fas fa-cube font-size-20"></i>
                                              </span>
                                          </div>
                                      </div>
                                      <div class="flex-grow-1">
                                          <h5 class="font-size-16">Kas Tersedia</h5>
                                          <p class="text-muted">Status kas tersedia secara akumulasi keseluruhan</p>
                                      </div>
                                  </div>
                                  <div class="py-4 border-bottom">
                                    <h3 class="text-center mb-4">aaaaaaaaaaaaaa</h3>
                                    <div class="plan-features mt-4">
                                      <h5 class="text-center font-size-15 mb-4">Log Penggunaan terakhir  :</h5>
                                      <?php foreach ($kas as $o) {
                                        if ($o->konfirmasi == '1') { ?>
                                          <p><i class="mdi mdi-checkbox-marked-circle-outline font-size-16 align-middle text-primary me-2"></i> <?= $o->keterangan ?></p>
                                        <?php }else { ?>
                                          <p><i class="mdi mdi-progress-alert font-size-16 align-middle text-danger me-2"></i> <?= $o->keterangan ?> </p>
                                        <?php }
                                       } ?>

                                      </div>
                                  </div>


                              </div>
                          </div>
                      </div>
                    </div>

  </div>
</div>
