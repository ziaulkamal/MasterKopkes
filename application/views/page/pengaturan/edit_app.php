<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('C_Pengaturan/edit_action'); ?>" class="custom-validation">
                                      <input type="hidden" name="zona_waktu" value="<?= $zona_waktu; ?>">
                                      <input type="hidden" name="last_update" value="<?= $last_update; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama App</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_app" id="nama_app" maxlength="15" value="<?php echo $nama_app; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Versi App</label>
                                          <div>
                                            <input type="text" class="form-control" name="versi_app" id="versi_app" maxlength="10" value="<?php echo $versi_app; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Modul App</label>
                                          <div>
                                            <input type="text" class="form-control" name="modul" id="modul"  maxlength="30" value="<?php echo $modul; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Config App</label>
                                          <div>
                                            <input type="text" class="form-control" name="conf_sts" id="conf_sts"  maxlength="30" value="<?php echo $conf_sts; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Set Petugas</label>
                                          <div>
                                            <input type="text" class="form-control" name="set_petugas" id="set_petugas"  maxlength="30" value="<?php echo $set_petugas; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Modul Aktif</label>
                                          <div>
                                            <input type="text" class="form-control" name="modul_active" id="modul_active"  maxlength="30" value="<?php echo $modul_active; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Akses Token</label>
                                          <div>
                                            <input type="text" class="form-control" name="access_token" id="access_token"  maxlength="30" value="<?php echo $access_token; ?>" />
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
