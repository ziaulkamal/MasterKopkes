<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                  <?php echo $this->session->flashdata('message'); ?>
                                    <form method="post" action="<?=base_url('') ?>" class="custom-validation">
                                      <input type="hidden" name="x" value="">
                                      <div class="row">
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">ID Anggota</label>
                                          <div>
                                            <input type="text" class="form-control" name="no_anggota"  value=""  readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-6">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" value="" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Total Simpanan Pokok</label>
                                          <div>
                                            <input type="text" class="form-control" name="simpok" value="" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Total Simpanan Wajib</label>
                                          <div>
                                            <input type="text" class="form-control" name="simwa" value="" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Total Simpanan Sukarela</label>
                                          <div>
                                            <input type="text" class="form-control" name="simka" value="" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-12">
                                          <label class="form-label">Pengajuan Penarika</label>
                                            <div class="input-group">
                                                <select class="form-control" name="pengajuan_penarikan" >
                                                  <option selected>-- Pilih --</option>
                                                  <option value="1">Pokok</option>
                                                  <option value="2">Wajib</option>
                                                  <option value="3">Sukarela</option>
                                                  <option value="4">Dana gotongroyong</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Jumlah Penarikan</label>
                                          <div>
                                            <input type="text" class="form-control" name="keterangan"  value="" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Keterangan</label>
                                          <div>
                                            <input type="text" class="form-control" name="keterangan"  value="" />
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
