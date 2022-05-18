<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?= base_url($action) ?>" class="custom-validation">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Kas</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="kas" value="<?= $load->kas ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Gotong Royong</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_gotongroyong" value="<?= $load->dana_gotongroyong ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Simpanan Pokok</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_simpok" value="<?= $load->dana_simpok ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Simpanan Wajib</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_simwa" value="<?= $load->dana_simwa ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Simpanan Khusus</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_kusus" value="<?= $load->dana_kusus ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Lainya</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_lainya" value="<?= $load->dana_lainya ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Total Hutang</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="total_hutang" value="<?= $load->total_hutang ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Total Piutang</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="total_piutang" value="<?= $load->total_piutang ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Jasa Usaha</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="jasa_usaha" value="<?= $load->jasa_usaha ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Jasa Simpanan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="jasa_simpanan" value="<?= $load->jasa_simpanan ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Cadangan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_cadangan" value="<?= $load->dana_cadangan ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Pengurus</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_pengurus" value="<?= $load->dana_pengurus ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Pendidikan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_pendidikan" value="<?= $load->dana_pendidikan ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Kesejahteraan Pegawai</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_kes_pegawai" value="<?= $load->dana_kes_pegawai ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Sosial</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_sosial" value="<?= $load->dana_sosial ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Audit</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_audit" value="<?= $load->dana_audit ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Pembangunan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_pembangunan" value="<?= $load->dana_pembangunan ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Dana Penghapusan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="dana_penghapusan" value="<?= $load->dana_penghapusan ?>"/>
                                          </div>
                                        </div>
                                        <div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Proses
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
