<div class="page-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Simpanan</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('message'); ?>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Rekening</th>
                                        <th>Simpanan Pokok</th>
                                        <th>Simpanan Wajib</th>
                                        <th>Simpanan Khusus</th>
                                        <th>Simpanan Lainya</th>
                                        <th>Total Simpanan</th>
                                        <th>Status Pinjaman</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $start = 1;

                                    foreach ($rekening as $data) { ?>
                                        <tr>
                                          <td><?= $start++ ?></td>
                                          <td><?= $data->no ?></td>
                                          <td><?= $data->nama ?></td>
                                          <td><?= convRupiah($data->pokok) ?></td>
                                          <td><?= convRupiah($data->wajib) ?></td>
                                          <td><?= convRupiah($data->kusus) ?></td>
                                          <td><?= convRupiah($data->lain) ?></td>
                                          <td><?= convRupiah($data->total) ?></td>
                                          <td><?php if ($data->status == 1) { ?>
                                            <span class="badge bg-success">Ada</span>
                                          <?php }else { ?>
                                            <span class="badge bg-info">Tidak Ada</span>
                                          <?php } ?></td>

                                        </tr>
                                    <?php }
                                     ?>


                                  </tbody>
                                  </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>