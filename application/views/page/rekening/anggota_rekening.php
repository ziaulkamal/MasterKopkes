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
                                        <th>Nomor Rekening</th>
                                        <th>Nama</th>
                                        <th>Simpanan Pokok</th>
                                        <th>Simpanan Wajib</th>
                                        <th>Simpanan Khusus</th>
                                        <th>Simpanan Lainya</th>
                                        <th>Total Simpanan</th>
                                        <th>Status Pinjaman</th>
                                        <th>Tambah Simpanan</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $start = 1;

                                    foreach ($rekening as $data) { ?>
                                        <tr>
                                          <th scope="row"><?= $start++ ?></th>
                                          <td><?= $data->no ?></td>
                                          <td><?= $data->nama ?></td>
                                          <td><?= $this->conv->convRupiah($data->pokok) ?></td>
                                          <td><?= $this->conv->convRupiah($data->wajib) ?></td>
                                          <td><?= $this->conv->convRupiah($data->kusus) ?></td>
                                          <td><?= $this->conv->convRupiah($data->lain) ?></td>
                                          <td><?= $this->conv->convRupiah($data->total) ?></td>
                                          <td><center><?php if ($data->status == 1) { ?>
                                            <span class="badge bg-success">Ada</span>
                                          <?php }else { ?>
                                            <span class="badge bg-info">Tidak Ada</span>
                                          <?php } ?></center></td>
                                          <td><center><a href="<?= base_url('simpanan_pertama/').$data->no ?>" class="badge bg-primary">  Update Simpanan  </a></center></td>
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
