<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('C_Anggota/update_action') ?>" class="custom-validation">
                                      <input type="hidden" name="id_anggota" value="<?= $id_anggota; ?>">
                                      <input type="hidden" name="tanggal_daftar" value="<?= $d_reg; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Depan</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_depan" id="Nama_depan" maxlength="10" value="<?php echo $nm_depan; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Belakang</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_belakang" id="Nama_belakang" maxlength="10" value="<?php echo $nm_belakang; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" id="Nama_lengkap"  maxlength="30" value="<?php echo $nm_lengkap; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Status Anggota</label>
                                          <div class="input-group">
                                              <select class="form-control" name="sts_anggota" required>
                                                  <option value="Aktif">Aktif</option>
                                                  <option value="Non-Aktif">Non Aktif</option>
                                                  <option value="<?php echo $sts_anggota; ?>" selected><?php echo $sts_anggota; ?></option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Status Perkawinan</label>
                                            <div class="input-group">
                                                <select class="form-control" name="sts_kawin" required>
                                                  <option default>-- Pilih --</option>
                                                  <option value="Kawin">Kawin</option>
                                                  <option value="Belum Kawin">Belum Kawin</option>
                                                  <option value="Janda">Janda</option>
                                                  <option value="Duda">Duda</option>
                                                  <option value="<?php echo $sts_kawin; ?>" selected><?php echo $sts_kawin; ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIK</label>
                                          <div>
                                            <input type="text" class="form-control" name="nik" id="nik"  maxlength="16" value="<?php echo $nik; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">NIP</label>
                                          <div>
                                            <input type="text" class="form-control" name="nip" id="nip"  maxlength="16" value="<?php echo $nip; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Tanggal_lahir</label>
                                          <div class="input-group" id="datepicker1">
                                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $tgl_lahir; ?>"
                                             data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" placeholder="">
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat" id="Alamat"  maxlength="40" value="<?php echo  $alamat; ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                            <label class="form-label">Tempat Lahir</label>
                                            <div>
                                                  <input type="text" class="form-control" name="tempat_lahir" id="Tempat_lahir"  maxlength="30" value="<?php echo $tp_lahir;?>" placeholder=""/>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nomor HP</label>
                                          <div>
                                            <input type="text" class="form-control" name="nomor_hp" id="Nomor_hp"  maxlength="14" value="<?php echo $no_hp; ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Instansi</label>
                                          <div>
                                            <input type="text" class="form-control" name="instansi" id="instansi"  maxlength="20" value="<?php echo $instansi; ?>"/>
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
