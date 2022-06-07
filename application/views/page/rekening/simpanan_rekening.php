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
                <form method="post" action="<?= base_url('simpan_rekening/').$rekening->no ?>" class="custom-validation" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Nama Anggota</label>
                      <div>
                        <input type="hidden" name="no_rekening" value="<?= $rekening->no ?>" required>
                        <input type="text" class="form-control" value="<?= $rekening->nama ?>"  readonly/>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Jenis Simpanan</label>
                      <div>
                        <select class="form-control" name="jenis_simpanan" required>
                            <option value="0" selected>-- Pilih Jenis Simpanan --</option>
                            <option value="1">Pokok</option>
                            <option value="2">Wajib</option>
                            <option value="3">Khusus</option>
                            <option value="4">Lainya</option>

                        </select>
                      </div>
                    </div>
                    <div class="mb-3 col-xl-12">
                      <label class="form-label">Jumlah Simpanan</label>
                      <div>
                        <input type="text" class="form-control uang" name="jml_simpan" />
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
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                              <tr>
                                <th>Nomor Rekening</th>
                                <th>Simpanan Pokok</th>
                                <th>Simpanan Wajib</th>
                                <th>Simpanan Khusus</th>
                                <th>Simpanan Lainya</th>
                                <th>Total Simpanan</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                <td><?= $rekening->no ?></td>
                                <td><?= $this->conv->convRupiah($rekening->pokok) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->wajib) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->kusus) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->lain) ?></td>
                                <td><strong><?= $this->conv->convRupiah($rekening->total) ?></strong></td>
                              </tr>


                          </tbody>
                          </table>
                  </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
    </div>
  </div>
</div>
