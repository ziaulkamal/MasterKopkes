<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                  <?php echo $this->session->flashdata('message'); ?>
                                   <?php foreach ($anggota as $data){?>

                                    <form method="post" action="<?=base_url('C_Simpanan/data_simpan'); ?>" class="custom-validation">
                                      <input type="hidden" name="x" value="<?= $data->no_rek; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">ID Anggota</label>
                                          <div>
                                            <input type="text" class="form-control" name="no_anggota"  value="<?= $data->no_anggota ?>"  readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Lengkap</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?= $data->nm_lengkap ?>" readonly/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Jenis Simpanan</label>
                                            <div class="input-group">
                                                <select class="form-control" name="jn_simpanan" required>
                                                  <option value="0" selected>-- Pilih --</option>
                                                  <option value="1">Pokok</option>
                                                  <option value="2">Wajib</option>
                                                  <option value="3">Sukarela</option>
                                                  <option value="4">Dana gotongroyong</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Jumlah Simpanan</label>
                                          <div>
                                            <input type="text" class="form-control uang" name="jml_simpan" required/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Tanggal Transaksi</label>
                                          <div class="input-group" id="datepicker1">
                                            <input type="date" class="form-control" name="tgl_simpan"
                                             data-date-format="dd M, yyyy" data-date-container="#datepicker1" data-provide="datepicker" required>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Keterangan</label>
                                          <div>
                                            <input type="text" class="form-control" name="keterangan"  value="" />
                                          </div>
                                        </div>
                                        <?php } ?>
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
