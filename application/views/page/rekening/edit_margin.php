<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Angsuran</a></li>
                          <li class="breadcrumb-item active"><?= $title ?></li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>

      <div class="row">
      <?= validation_errors('<div class="alert alert-warning">','</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
                <form method="post" action="<?= base_url('proses_update_margin')  ?>" class="custom-validation" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <input type="hidden" name="kode_pinjaman" value="<?= $pinjaman->kode_pinjaman ?>">
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Nama Anggota</label>
                      <div>
                        <input type="hidden" name="no_anggota" value="<?= $anggota->no ?>" required>
                        <input type="text" class="form-control" value="<?= $anggota->nama ?>"  readonly/>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Plafon Pinjaman</label>
                      <div>
                        <input type="text" class="form-control" value="<?= $this->conv->convRupiah($pinjaman->plafon) ?>" readonly/>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Margin</label>
                      <div>
                        <input type="text" class="form-control uang" name="margin" value="<?= $pinjaman->margin ?>" />
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Pokok</label>
                      <div>
                        <?php if ($jenis == 1) { ?>
                          <input type="hidden" class="form-control" name="pokok" value="<?= $pinjaman->pokok_murabahan ?>" readonly/>
                          <input type="text" class="form-control"value="<?= $this->conv->convRupiah($pinjaman->pokok_murabahan) ?>" readonly/>

                        <?php }else { ?>
                          <input type="hidden" class="form-control" name="pokok" value="<?= ($pinjaman->tenor-$pinjaman->angsuran_ke)*$pinjaman->pokok_murabahan ?>" readonly/>
                          <input type="text" class="form-control" value="<?= $this->conv->convRupiah(($pinjaman->tenor-$pinjaman->angsuran_ke)*$pinjaman->pokok_murabahan) ?>" readonly/>

                        <?php } ?>
                      </div>
                    </div>
                    <div>
                        <div>
                          <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Proses Data
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
</div>
