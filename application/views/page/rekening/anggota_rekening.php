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
                                        <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                                        <th>Status Pinjaman</th>
                                        <?php } ?>



                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $start = 1;

                                    foreach ($rekening as $data) {
                                      if ($data->keanggotaan != 2) { ?>
                                        <tr>
                                          <th scope="row"><?= $start++ ?></th>
                                          <td>
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-sm"><?= $data->no_rekening ?></button>

                                            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="mySmallModalLabel">Opsi</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="button-items">
                                                      <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                                                        <a href="<?= base_url('simpanan_pertama/') . $data->no_rekening ?>" class="btn btn-primary waves-effect waves-light">
                                                          Update Simpanan <i class="ri-arrow-right-line align-middle ms-2"></i>
                                                        </a><br>
                                                      <?php } ?>
                                                      <a href="<?= base_url('detail_simpanan/') . $data->no_rekening ?>" class="btn btn-success waves-effect waves-light">
                                                        Log Simpanan <i class="ri-check-line align-middle me-2"></i>
                                                      </a><br>
                                                      <a href="<?= base_url('detail_anggota_all/') . $data->no_rekening ?>" class="btn btn-warning waves-effect waves-light">
                                                        Detail <i class="ri-error-warning-line align-middle me-2"></i>
                                                      </a>
                                                    </div>

                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                          <td><?= $data->nama ?></td>
                                          <td><?= $this->conv->convRupiah($data->pokok) ?></td>
                                          <td><?= $this->conv->convRupiah($data->wajib) ?></td>
                                          <td><?= $this->conv->convRupiah($data->kusus) ?></td>
                                          <td><?= $this->conv->convRupiah($data->lain) ?></td>
                                          <td><?= $this->conv->convRupiah($data->total) ?></td>
                                          <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                                            <td><center><?php if ($data->status_pinjam == 1) { ?>
                                              <a class="btn btn-primary btn-sm waves-effect waves-light">Ada</a>
                                            <?php }else { ?>
                                              <a class="btn btn-dark btn-sm waves-effect waves-light" href="<?= base_url('tambah_pinjaman/').$data->no_rekening ?>">Tidak Ada</a>
                                            <?php } ?></center></td>
                                          <?php } ?>

                                        </tr>
                                      <?php }
                                     }
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
