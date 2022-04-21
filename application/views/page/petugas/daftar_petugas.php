<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Data Petugas</a></li>
                          <li class="breadcrumb-item active"><?= $title ?></li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
        <div class="row">
                    <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('C_Admin/proses_petugas'); ?>" class="custom-validation">
                                      <div class="row">
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama" required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label"> Username</label>
                                          <div>
                                            <input type="text" class="form-control" name="username" required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Password</label>
                                          <div>
                                            <input type="text" class="form-control" name="pass"  required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Level Akses</label>
                                          <div class="input-group">
                                              <select class="form-control" name="level" required >
                                                  <option default >--Pilih--</option>
                                                  <option value="manajer">Manager</option>
                                                  <option value="operasional">Kabag Operasional</option>
                                                  <option value="pembiayaan">Kabag Pembiayaan</option>
                                                  <option value="teller">Teller</option>
                                              </select>
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
