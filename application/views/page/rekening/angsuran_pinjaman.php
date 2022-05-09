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
                <form method="post" action="<?php if ($jenis != 3) {
                  echo base_url('proses_angsuran/').$pinjaman->kode_pinjaman;
                }else {
                  echo base_url('proses_tutup_meninggal/').$pinjaman->kode_pinjaman;
                } ?>" class="custom-validation" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <input type="hidden" name="jenis" value="<?= $jenis ?>">
                    <input type="hidden" name="no_rekening" value="<?= $pinjaman->no_rekening ?>">
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
                        <input type="hidden" class="form-control" name="margin" value="<?= $pinjaman->margin ?>" readonly/>
                        <input type="text" class="form-control" value="<?= $this->conv->convRupiah($pinjaman->margin) ?>" readonly/>
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
                          <input type="text" class="form-control"value="<?= $this->conv->convRupiah(($pinjaman->tenor-$pinjaman->angsuran_ke)*$pinjaman->pokok_murabahan) ?>" readonly/>

                        <?php } ?>
                      </div>
                    </div>
                    <div>
                        <div>
                          <?php if ($jenis != 3) {?>
                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                Proses Data
                            </button>
                          <?php }else {?>
                            <button type="submit" class="btn btn-outline-primary waves-effect waves-light me-1">
                                Proses & Tutup Akun Anggota
                            </button>
                          <?php } ?>

                        </div>
                    </div>
                    </div>
                </form>
            </div>

          </div>
      </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                  <div class="">
                    <?php
                    if ($angsuran->row() != NULL) {
                      foreach ($angsuran->result() as $a) {?>
                        <div class="alert alert-primary" >
                            Telah melakukan angsuran dengan kode <b><?= $a->kode_angsuran ?></b> dan angsuran ke  <b><?= $a->angsuran_ke ?></b> dengan jumlah <b><?= $this->conv->convRupiah($a->angsuran_pokok+$a->angsuran_margin) ?></b> pada Tanggal  <b><?= $a->last_update ?> </b>
                        </div>
                      <?php }
                    }else { ?>
                      <div class="alert alert-danger" >
                            Anggota ini belum pernah melakukan Angsuran
                      </div>
                    <?php }
                     ?>
              </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
  </div>
</div>
