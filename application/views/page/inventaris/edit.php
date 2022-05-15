<div class="page-content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                  <h4 class="mb-sm-0"><?= $title ?></h4>
                  <div class="page-title-right">
                      <ol class="breadcrumb m-0">
                          <li class="breadcrumb-item"><a href="javascript: void(0);">Inventaris</a></li>
                          <li class="breadcrumb-item active"><?= $title ?></li>
                      </ol>
                  </div>

              </div>
          </div>
      </div>
        <div class="row">
                    <div class="col-xl-6">
                            <div class="card">
                              <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="card-body">
                                    <form method="post" action="<?=base_url('proses_edit'); ?>" class="custom-validation">
                                      <input type="hidden" name="id" value="<?= $id; ?>">
                                      <input type="hidden" name="last_update" >
                                      <input type="hidden" name="selisih_harga" >
                                      <div class="row">
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Nama Barang</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_barang" value="<?= $nama_barang ?>" readonly />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Satuan</label>
                                          <div>
                                            <input type="text" class="form-control" name="satuan"  value="<?= $satuan ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Jumlah</label>
                                          <div>
                                            <input type="text" class="form-control" name="jumlah" value="<?= $jumlah ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Harga Beli</label>
                                          <div>
                                            <input type="text" class="form-control" name="harga_beli"  value="<?= $harga_beli ?>" readonly />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Harga Barang</label>
                                          <div>
                                            <input type="text" class="form-control" name="harga_barang"  value="<?= $harga_barang ?>"  />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Keterangan</label>
                                          <div>
                                            <input type="text" class="form-control" name="keterangan" value="<?= $keterangan ?>"/>
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
