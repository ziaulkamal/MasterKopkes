<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                              <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <form method="post" action="<?=base_url('C_Anggota/daftar_anggota') ?>" class="custom-validation">
                                      <input type="hidden" name="id_anggota" value="<?= $id_anggota; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Depan</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_depan" id="Nama_depan" maxlength="10" value="<?php echo set_value('nama_depan'); ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Belakang</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_belakang" id="Nama_belakang" maxlength="10" value="<?php echo set_value('nama_belakang'); ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" id="Nama_lengkap"  maxlength="30" value="<?php echo set_value('nama_lengkap'); ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Status Anggota</label>
                                          <div class="input-group">
                                              <select class="form-control" name="status_anggota" required>
                                                <?php if ($sts_anggota != NULL) { ?>
                                                  <?php var_dump($sts_anggota); ?>
                                                  <option value="Aktif">Aktif</option>
                                                  <option value="Non-Aktif">Non Aktif</option>
                                                  <option value="<?php echo $sts_anggota; ?>" selected><?php echo $sts_anggota; ?></option>
                                              <?php }else { ?>
                                                  <option>-- Pilih --</option>
                                                  <option value="Aktif">Aktif</option>
                                                  <option value="Non-Aktif">Non Aktif</option>
                                              <?php }

                                              ?>

                                              </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Status Perkawinan</label>
                                            <div class="input-group">
                                                <select class="form-control" name="sts_kawin" required>
                                                  <option default>-- Pilih --</option>
                                                  <option value="Kawin">Kawin</option>
                                                  <option value="Belum">Belum Kawin</option>
                                                  <option value="Janda">Janda</option>
                                                  <option value="Duda">Duda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIK</label>
                                          <div>
                                            <input type="text" class="form-control" name="nik" id="nik"  maxlength="16" value="<?php echo set_value('nik'); ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIP</label>
                                          <div>
                                            <input type="text" class="form-control" name="nip" id="nip"  maxlength="16" value="<?php echo set_value('nip'); ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Tanggal_lahir</label>
                                          <div class="input-group" id="datepicker1">
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo set_value('tgl_lahir'); ?>"
                                             data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker">
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat" id="Alamat"  maxlength="40" value="<?php echo set_value('alamat'); ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                            <label class="form-label">Tempat Lahir</label>
                                            <div>
                                                  <input type="text" class="form-control" name="tempat_lahir" id="Tempat_lahir"  maxlength="30" value="<?php echo set_value('tempat_lahir'); ?>" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nomor HP</label>
                                          <div>
                                            <input type="text" class="form-control" name="nomor_hp" id="Nomor_hp"  maxlength="14" value="<?php echo set_value('nomor'); ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="instansi" id="instansi"  maxlength="20" value="<?php echo set_value('instansi'); ?>"/>
                                          </div>
                                        </div>
                                        <div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-secondary waves-effect">
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
