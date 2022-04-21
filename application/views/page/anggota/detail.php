<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <form method="post" class="custom-validation">

                                      <div class="row">
                                        <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>">
                                        <!-- <input type="hidden" name="tanggal_daftar" value="<?php echo $d_reg; ?>"> -->
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama Depan</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $nm_depan ; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama Belakang</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $nm_belakang; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $nm_lengkap; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">No Rekening</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $no_rek; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Status Keanggotaan</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $sts_anggota; ?>" readonly>
                                          </div>

                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Status Perkawinan</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $sts_kawin; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">NIK/NIP</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $nip; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Tanggal Lahir</label>
                                          <div>
                                            <input type="text" class="form-control" value="<?php echo $tgl_lahir; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $alamat; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                            <label class="form-label">Tempat Lahir</label>
                                            <div>
                                                  <input type="text" class="form-control"  value="<?php echo $tp_lahir; ?>" readonly/>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nomor HP</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $no_hp; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Instansi</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $instansi; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Tanggal Terdata</label>
                                          <div>
                                            <input type="text" class="form-control"  value="<?php echo $d_reg; ?>" readonly/>
                                          </div>
                                        </div>
                                        <div>
                                            <div>
                                              <a type="reset" class="btn btn-secondary waves-effect" href="<?= base_url('/anggota') ?>" title="Cencel">
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
