<div class="page-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Anggota</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
                <?php echo $this->session->flashdata('message'); ?>
                  <div class="row">
                    <div class="col-12">
                      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                          <thead>
                          <tr>
                            <th>No.</th>
                            <th>Tahun Neraca</th>
                            <th>Total Margin Keseluruhan</th>
                            <th>Total SHU</th>

                            <th>Download Laporan</th>
                            <th>Terakhir Dibuat</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $start = 1;
                            foreach($load as $q){
                              ?>
                          <tr>
                              <td><?= $start++ ?></td>
                              <td><?= $q->tahun_neraca ?></td>
                              <td><?= $this->conv->convRupiah($q->akumulasi_margin) ?></td>
                              <td><?= $this->conv->convRupiah($q->akumulasi_shu_bersih) ?></td>

                              <td>
                              <a href="<?= base_url('export/pembagian_shu/').$q->id_master; ?>" class="btn btn-sm btn-outline-info waves-effect waves-light">Pembagian SHU Docs</a>
                              <a href="<?= base_url('export/neraca_saldo/').$q->id_master; ?>" class="btn btn-sm btn-outline-success waves-effect waves-light">Neraca Saldo</a>
                              <a href="<?= base_url('detail/').$q->id_master; ?>" class="btn btn-sm btn-outline-dark waves-effect waves-light">Detail</a>
                            </td>
                            <td><?= $q->last_update ?></td>
                          </tr>
                          <?php } ?>
                          </tbody>


                      </table>

          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- container-fluid -->
</div>
</div>
</div>
<!-- End Page-content -->
