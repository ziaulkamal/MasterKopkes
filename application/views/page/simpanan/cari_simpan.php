 <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $title ?></h4>
                    </div>
                </div>
            </div>

            <form class="custom-validation" action="<?= base_url('C_Simpanan/simpan_action') ?>"  method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-xl-12">
                            <div>
                              <input type="text" class="form-control" name="<?= $name ?>" maxlength="12"  placeholder="<?= $placeholder ?>" />
                            </div>
                          </div>
                        </div>
                          <div class="button-items">
                              <div class="d-grid">
                                <button class="btn btn-primary btn-lg-12 ">Cari</button>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                  </form>
                  </div>
                </div>
