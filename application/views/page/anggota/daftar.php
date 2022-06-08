<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Anggota</a></li>
                          <li class="breadcrumb-item active"><?= $title ?></li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
        <div class="row">
                    <div class="col-xl-6">
                            <div class="card">
                              <?php echo $this->session->flashdata('message'); ?>
                              <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="card-body">
                                    <form method="post" action="<?= base_url('daftar_baru') ?>" class="custom-validation">
                                      <?php if (isset($id_anggota)) { ?>
                                        <input type="hidden" name="id_anggota" value="<?= $id_anggota; ?>" required />
                                      <?php } ?>

                                      <div class="row">
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat" required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Instansi</label>
                                          <div class="input-group">
                                              <select class="form-control" name="instansi" required>
                                                <option value="0" selected>-- Pilih Instansi --</option>
                                                <?php foreach ($instansi as $data) { ?>
                                                <option value="<?= $data->kode_instansi ?>"><?= $data->nama_instansi ?></option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Status Anggota</label>
                                          <div class="input-group">
                                              <select class="form-control" name="status_anggota" required>
                                                <?php if ($sts_anggota != NULL) { ?>
                                                  <option value="<?php echo $sts_anggota; ?>" selected><?php echo $sts_anggota; ?></option>
                                                  <option value="1">Aktif</option>
                                                  <option value="0">Non Aktif</option>
                                              <?php }else { ?>
                                                  <option value="2">-- Pilih --</option>
                                                  <option value="1">Aktif</option>
                                                  <option value="0">Non Aktif</option>
                                              <?php }
                                              ?>
                                              </select>
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
