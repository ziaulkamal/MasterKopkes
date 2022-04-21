<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Instansi</a></li>
                          <li class="breadcrumb-item active"><?= $title ?></li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
        <div class="row">
                    <div class="col-xl-6">
                            <div class="card">
                              <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="card-body">
                                    <form method="post" action="<?=base_url('C_Anggota/daftar_anggota') ?>" class="custom-validation">
                                      <div class="row">
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Kode Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" maxlength="30" value="<?= $instansi+1 ?>" required readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Nama Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="nik" maxlength="16" value="" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="nik" maxlength="16" value="" />
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
                        </div>
                      </div>
                    </div>
