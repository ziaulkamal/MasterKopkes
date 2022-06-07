 <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $title ?></h4>
                    </div>
                </div>
            </div>
            <?php echo $this->session->flashdata('message'); ?>

            <form class="custom-validation" action="<?= base_url('export/laporan_anggota') ?>"  method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-6 lg-6">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-xl-12">
                            <div>
                              <label class="form-label">Cari Berdasarkan Anggota</label>

                              <div class="input-group">
                                <select class="form-control select2" name="anggota_no" required>
                                  <option default>-- Pilih Anggota --</option>
                                  <?php foreach ($anggota as $q) { ?>
                                    <option value="<?= $q->no_rekening ?>"><?= $q->nama_anggota ?> - <?= $q->nama_instansi ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="mb-3 col-xl-12">
                            <label class="form-label">Jenis Laporan</label>
                            <div class="input-group">
                              <select class="form-control select2" name="jenis" required>
                                <option default>--Pilih --</option>
                                <option value="1">Simpanan</option>
                                <option value="2">Pinjaman</option>
                                <option value="3">Angsuran</option>
                              </select>
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
