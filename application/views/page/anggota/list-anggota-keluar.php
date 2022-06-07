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
                              <th>Instansi</th>
                              <th>Nama Anggota</th>
                              <th>Keterangan</th>
                              <th>Pengembalian Simpanan</th>
                              <th>Tanggal</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              $start = 1;
                              foreach($anggota as $data){
                                ?>
                            <tr>
                                <td><?= $start++ ?></td>
          			                <td><?= ucwords($data->instansi) ?></td>
          			                <td><?= ucwords($data->nama_anggota) ?></td>
                                <td><?= ucwords($data->keterangan) ?></td>
                                <td><?php if ($data->pengembalian_simpanan == 0) { ?>
                                  <a href="<?= base_url('cetak/anggota_keluar/').$data->no_anggota ?>" class="btn btn-warning">Dana Belum Di Kembalikan</a>
                                <?php }else {
                                  echo "<strong>Dana Sudah Di Kembalikan</strong>";
                                } ?></td>
                                <td><?= date_indo($data->last_update) ?></td>
                              </td>
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
