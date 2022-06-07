<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-xl-8">
<div class="card">
<div class="card-body">
    <h4 class="card-title"></h4>

<div class="row">
<div class="col-xl-12 col-sm-12">
<div class="card">
    <div class="card-body">
        <div class="d-flex text-muted">
            <div class="flex-grow-1 overflow-hidden">
              <div class="col-md-12 col-lg-12">
                  <h3 class="mb-3"><?= $title; ?></h3>
                  <br>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <h5><b>Nama : </b><?= $master_data->nama_anggota ?></h5>
                      </div>
                      <div class="col-sm-6">
                        <h5><b>Instansi : </b><?= $master_data->nama_instansi ?></h5>
                      </div>
                        </div>
                        <br>
                        <h5 class="mb-3 pd-2"><b>Log Simpanan</b></h5>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                              <th>Jenis Simpanan</th>
                              <th>Kode Log</th>
                              <th>Jumlah</th>
                              <th>Tanggal Update Terakhir</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($log_simpanan as $q) { ?>
                              <tr>
                                <td><b><?php if ($q->kode_jenis == 1) {
                                  echo "Simpanan Pokok";
                                }elseif ($q->kode_jenis == 2) {
                                  echo "Simpanan Wajib";
                                }elseif ($q->kode_jenis == 3) {
                                  echo "Simpanan Khusus";
                                }elseif ($q->kode_jenis == 4) {
                                  echo "Simpanan Lainya";
                                }else {
                                } ?></b></td>
                                <td><?php if ($q->kode_jenis == 1) {
                                  echo "SIMPOK-" . $q->kode_log;
                                }elseif ($q->kode_jenis == 2) {
                                  echo "SIMWA-" . $q->kode_log;
                                }elseif ($q->kode_jenis == 3) {
                                  echo "SIMKUS-" . $q->kode_log;
                                }elseif ($q->kode_jenis == 4) {
                                  echo "SIMLA-" . $q->kode_log;
                                }else {
                                } ?></td>
                                <td><?= $this->conv->convRupiah($q->jumlah) ?></td>
                                <td><?= longdate_indo($q->last_update) ?></td>
                              </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-sm-12">
                          <a href="#" class="btn btn-primary">Export Keseluran Ke Excel</a>
                        </div>


                    </div>



            </div>
        </div>
    </div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
