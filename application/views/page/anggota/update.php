<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('update_proses'); ?>" class="custom-validation">
                                      <input type="hidden" name="no_anggota" value="<?= $no_anggota; ?>">
                                      <input type="hidden" name="registration" value="<?= $registration; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Anggota</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_anggota" id="Nama_anggota"  maxlength="30" value="<?= $nama_anggota; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIK</label>
                                          <div>
                                            <input type="text" class="form-control" name="nik" id="nik"  maxlength="16" value="<?= $nik; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIP</label>
                                          <div>
                                            <input type="text" class="form-control" name="nip" id="nip"  maxlength="16" value="<?= $nip; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Tanggal_lahir</label>
                                          <div class="input-group" id="datepicker1">
                                            <input type="date" class="form-control" name="tgl_lahir" id="Tgl_lahir" value="<?= $tgl_lahir; ?>"
                                             data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" placeholder="dd-mm-yy"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat" id="Alamat"  maxlength="40" value="<?php echo  $alamat; ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Instansi</label>
                                          <div class="input-group">
                                              <select class="form-control" name="instansi" required>
                                                <option default>-- Pilih Instansi --</option>
                                                <?php foreach ($instansi as $data) { ?>
                                                <option value="<?= $data->kode_instansi ?>"><?= $data->nama_instansi ?></option>
                                                <?php } ?>
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
