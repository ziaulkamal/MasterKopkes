<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>

                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Instansi</a></li>
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
                <form method="post" action="<?=base_url('proses_pinjaman/').$rekening->no ?>" class="custom-validation">
                  <div class="row">
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Nama Anggota</label>

                      <div>
                        <input type="text" class="form-control" value="<?= $rekening->nama ?>"  readonly/>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Masa Pinjaman <code>* angka dalam hitungan bulan</code></label>
                      <div>
                        <input type="number" class="form-control" name="tenor" maxlength="2"/>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Jumlah Pinjaman</label>
                      <div>
                        <input type="text" class="form-control" name="jumlah" />
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
</div>
