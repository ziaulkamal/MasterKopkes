<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" class="custom-validation">
                                      <div class="row">
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama App</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $nama_app ; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Versi App</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $versi_app; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Modul</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $modul; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Config App</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $conf_sts; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Zona Waktu</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $zona_waktu; ?>" readonly>
                                          </div>

                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label"> Petugas</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $set_petugas; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Modul Aktif</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $modul_active; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Last Update</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $last_update; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                            <label class="form-label">Akses Token</label>
                                            <div>
                                                  <input type="text" class="form-control"  value="<?php echo $access_token; ?>" readonly/>
                                            </div>
                                        </div>
                                        <div>
                                            <div>
                                              <a type="reset" class="btn btn-secondary waves-effect" href="<?= base_url('C_Pengaturan/index') ?>" title="Cencel">
                                                Cencel
                                              </a>
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
