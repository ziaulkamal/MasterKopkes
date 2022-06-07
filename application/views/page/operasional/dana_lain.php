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
            <form method="post" action="<?= base_url($action.'/').$tipe ?>" class="custom-validation">
              <div class="row">
                <div class="mb-3 col-xl-12">
                  <label class="form-label">Keterangan</label>
                  <div>
                  <textarea name="keterangan" class="form-control" rows="2" cols="80"></textarea>
                  </div>
                </div>
                <?php if ($tipe == 'dana_sosial') { ?>
                  <div class="mb-3 col-xl-12">
                    <label class="form-label">Anggota </label>
                    <div class="input-group">
                      <select class="form-control select2" name="anggota_no" required>
                        <option default>-- Pilih Anggota --</option>
                        <?php foreach ($anggota as $q) { ?>
                          <option value="<?= $q->no_anggota ?>"><?= $q->nama_anggota ?> - <?= $q->nama_instansi ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                <?php } ?>

                <div class="mb-3 col-xl-12">
                  <label class="form-label">Nominal</label>
                  <div>
                    <input type="text"class="form-control uang" name="nominal"/>
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

  <div class="col-xl-12">
    <div class="card">
      <div class="card-body">
        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Dana Cadangan</th>
                    <th>Dana Pengurus</th>
                    <th>Dana Pendidikan</th>
                    <th>Dana Kesejahteraan Pegawai</th>
                    <th>Dana Sosial</th>
                    <th>Dana Audit</th>
                    <th>Dana Pembangunan</th>
                    <th>Dana Penghapusan</th>
                </tr>
            </thead>
            <tbody>
            <tr>

                <td><?= $this->conv->convRupiah($load->dana_cadangan) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_pengurus) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_pendidikan) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_kes_pegawai) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_sosial) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_audit) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_pembangunan) ?></td>
                <td><?= $this->conv->convRupiah($load->dana_penghapusan) ?></td>


            </tr>
            </tbody>
        </table>
    </div>
  </div>

</div>

  </div>
</div>
