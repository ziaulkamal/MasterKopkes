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
                      <?php echo $this->session->flashdata('message'); ?>
                            <div class="card">
                              <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                <div class="card-body">
                                    <form method="post" action="<?= base_url($action); ?>" class="custom-validation" enctype="multipart/form-data">
                                      <?php if ($action == 'update_inventaris') { ?>
                                        <input type="hidden" name="id" value="<?= $id->id ?>">
                                      <?php } ?>
                                      <div class="row">
                                        <?php if ($action == 'update_inventaris') { ?>
                                          <div class="mb-3 col-xl-12">
                                            <label class="form-label">Nama Barang</label>
                                            <div>
                                              <input type="text" class="form-control" name="nama_barang" value="<?= $id->nama_barang ?>" />
                                            </div>
                                          </div>
                                          <div class="mb-3 col-xl-12">
                                            <label class="form-label">Satuan</label>
                                            <div>
                                              <input type="text" class="form-control" name="satuan" value="<?= $id->satuan ?>" />
                                            </div>
                                          </div>
                                          <div class="mb-3 col-xl-12">
                                            <label class="form-label">Jumlah</label>
                                            <div>
                                              <input type="number" class="form-control" name="jumlah" value="<?= $id->jumlah ?>" />
                                            </div>
                                          </div>
                                          <div class="mb-3 col-xl-12">
                                            <label class="form-label">Harga Beli</label>
                                            <div>
                                              <input type="hidden" class="form-control" name="harga_beli" value="<?= $id->harga_beli ?>" />
                                              <input type="text" class="form-control uang" name="harga_sekarang" value="<?= $id->harga_sekarang ?>" />
                                            </div>
                                          </div>
                                          <div class="mb-3 col-xl-12">
                                            <label class="form-label">Keterangan</label>
                                            <div>
                                              <input type="text" class="form-control" name="keterangan" value="<?= $id->keterangan ?>" />
                                            </div>
                                          </div>

                                      <?php }else { ?>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Nama Barang</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_barang" maxlength="50" placeholder="Masukkan Nama Barang" required />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Satuan</label>
                                          <div>
                                            <input type="text" class="form-control" name="satuan" maxlength="30" placeholder="misalkan : Pcs, Box, Galon, Unit, dll."  />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Jumlah</label>
                                          <div>
                                            <input type="number" class="form-control" name="jumlah" maxlength="20"  placeholder="Jumlah"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Harga Beli</label>
                                          <div>
                                            <input type="text" class="form-control" name="harga_beli" maxlength="16"  placeholder="Harga Barang" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Keterangan</label>
                                          <div>
                                            <input type="text" class="form-control" name="keterangan" placeholder="Masukkan Keterangan"/>
                                          </div>
                                        </div>

                                      <?php } ?>

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
