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
                              <th>ID Anggota</th>
                              <th>Nama Anggota</th>
                              <th>Instansi</th>
                              <th>Status</th>
                              <th>Diperbaharui</th>
                              <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                              $start = 1;
                              foreach($anggota as $data){
                                ?>
                            <tr>
                                <td><?= $start++ ?></td>
          			                <td><?= $data->no; ?></td>
          			                <td><?= ucwords($data->nama) ?></td>
                                <td><?= ucwords($data->instansi) ?></td>
                                <td><?php if ($data->status == 1) {
                                  echo '<span class="badge bg-primary">Aktif</span>';
                                }elseif ($data->status == 0) {
                                  echo '<span class="badge bg-light">Non-aktif</span>';
                                }else {
                                  echo '<span class="badge bg-danger">Meninggal</span>';
                                } ?></td>
                                <td><?= date_indo($data->terdaftar); ?></td>
                                <td>
                                <a href="<?= base_url('detail/').$data->no; ?>" class="btn btn-sm btn-outline-info waves-effect waves-light">Detail</a>
                                <a href="<?= base_url('update/').$data->no; ?>" class="btn btn-sm btn-outline-danger waves-effect waves-light">Edit</a>
                                <a href="<?= base_url('hapus/').$data->no; ?>" id="btn-delete" class="btn btn-sm btn-outline-dark waves-effect waves-light" onclick="<?= base_url('anggota') ?>">Keluarkan</a>
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
