<div class="page-content">
    <div class="container-fluid">
        <div class="row">
                    <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $title; ?></h4>
                                    <?php echo $this->session->flashdata('message'); ?>

                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?=base_url('update_proses'); ?>" class="custom-validation">
                                      <input type="hidden" name="no_anggota" value="<?= $load->no_anggota; ?>">
                                      <input type="hidden" name="registration" value="<?= $load->registration; ?>">
                                      <div class="row">
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Nama Anggota</label>
                                          <div>
                                            <input type="text" class="form-control" name="nama_anggota"  maxlength="30" value="<?= $load->nama_anggota; ?>" />
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Alamat</label>
                                          <div>
                                            <input type="text" class="form-control" name="alamat"  maxlength="40" value="<?= $load->alamat; ?>"/>
                                          </div>
                                        </div>
                                        <div class="mb-3 col-xl-4">
                                          <label class="form-label">Instansi</label>
                                          <div class="input-group">
                                              <select class="form-control" name="instansi" required>
                                                <option default>-- Pilih Instansi --</option>
                                                <?php foreach ($instansi as $data) { ?>
                                                <option value="<?= $data->kode_instansi ?>"><?= $data->nama_instansi ?></option>
                                                <?php } ?>
                                              </select>
                                          </div>
                                        </div>
                                        <div>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Proses Edit
                                                </button>
                                                <a href="<?= base_url('anggota') ?>" class="btn btn-secondary waves-effect">
                                                    Batalkan
                                                </a>
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
