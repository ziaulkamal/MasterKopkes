<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <br>
                                  <?php echo $this->session->flashdata('message'); ?>
                                    <form method="post" action="<?=base_url('kelola_dana/proses_anggota_phu'); ?>" class="custom-validation">
                                      <input type="hidden" name="id" value="<?= $load->id; ?>">
                                      <div class="mb-3">
                                        <label class="form-label">No Anggota</label>
                                        <div>
                                            <input type="text" class="form-control" value="<?= $load->no_anggota ?>" readonly>
                                        </div>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label">Nama Anggota</label>
                                        <div>
                                            <input type="text" class="form-control" value="<?= $load->nama_anggota ?>" readonly>
                                        </div>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label">Pembagian Jasa Usaha</label>
                                        <div>
                                            <input type="text" class="form-control" value="<?= $this->conv->convRupiah($load->persen_jasa_usaha) ?>" readonly>
                                        </div>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label">Pembagian Jasa Simpanan</label>
                                        <div>
                                            <input type="text" class="form-control" value="<?= $this->conv->convRupiah($load->persen_jasa_simpanan) ?>" readonly>
                                        </div>
                                      </div>

                                      <div class="mb-3">
                                        <label class="form-label">Total Diserahkan</label>
                                        <div>
                                            <input type="hidden" class="form-control uang" name="nominal_sebelum" value="<?= $load->persen_jasa_usaha + $load->persen_jasa_simpanan ?>">
                                            <input type="text" class="form-control uang" name="total_diserahkan" value="<?= $load->persen_jasa_usaha + $load->persen_jasa_simpanan ?>">
                                        </div>
                                      </div>

                                      <div>
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1"> Submit </button>
                                            <button type="reset" class="btn btn-secondary waves-effect"> Cancel </button>
                                        </div>
                                      </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
