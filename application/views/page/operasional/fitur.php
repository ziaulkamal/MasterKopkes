<div class="page-content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0"><?= $title ?></h4>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4">
    <div class="card">
      <?= validation_errors('<div class="alert alert-warning">','</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
        <div class="card-body">
            <form method="post" action="<?= base_url('operasional/').$action ?>" class="custom-validation">
              <div class="row">
                <div class="mb-3 col-xl-12">
                  <label class="form-label">Keterangan <?php if ($action == 'p_cash_in') { echo "Pengembalian"; }else { echo "Penggunaan"; } ?></label>
                  <div>
                  <textarea name="keterangan" class="form-control" rows="2" cols="80"></textarea>
                  </div>
                </div>
                <div class="mb-3 col-xl-12">
                  <label class="form-label">Jenis</label>
                  <div>
                    <?php if ($action == 'p_cash_in') { ?>
                      <select class="form-control" name="jenis" readonly>
                          <option selected value="6">-- Pengembalian --</option>
                      </select>
                    <?php }elseif ($action == 'p_cash_out') {?>
                      <select class="form-control" name="jenis" required>
                          <option selected>-- Opsi --</option>
                          <option value="1">Kebutuhan ATK</option>
                          <option value="2">Kebutuhan Honor</option>
                          <option value="3">Kebutuhan RAT</option>
                          <option value="4">Kebutuhan THR</option>
                          <option value="5">Biaya Penghapusan</option>
                      </select>
                    <?php }else {?>
                      <select class="form-control" name="jenis" readonly>
                          <option selected value="10">-- Inventaris --</option>
                      </select>
                    <?php } ?>
                  </div>
                </div>
                <div class="mb-3 col-xl-12">
                  <label class="form-label">Nominal</label>
                  <div>
                    <input type="text"class="form-control" name="nominal"/>
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
<?php if ($action != 'p_out_inventaris') {?>
  <div class="col-xl-8">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex mb-1">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar-sm">
                            <span class="avatar-title rounded-circle bg-primary">
                                <i class="fas fa-cube font-size-20"></i>
                            </span>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h5 class="font-size-16">Kas Tersedia</h5>
                        <p class="text-muted">Status kas tersedia secara akumulasi keseluruhan</p>
                    </div>
                </div>
                <div class="py-4 border-bottom">
                  <h3 class="text-center mb-4"><?= $kas ?></h3>
                  <div class="plan-features mt-4">
                    <h5 class="text-center font-size-15 mb-4">Log Penggunaan terakhir  :</h5>
                    <?php foreach ($logs as $o) {
                      if ($o->jenis != 10) { ?>
                        <p><i class="mdi mdi-checkbox-marked-circle-outline font-size-16 align-middle text-primary me-2"></i> <?= $o->keterangan ?></p>
                      <?php }
                      } ?>

                    </div>
                </div>


            </div>
        </div>
    </div>
  </div>
<?php } ?>
</div>

  </div>
</div>
