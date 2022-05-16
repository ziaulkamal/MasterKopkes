  <div class="page-content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                      <h4 class="mb-sm-0"><?= $title ?></h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Instansi</a></li>
                              <li class="breadcrumb-item active"><?= $title ?></li>
                          </ol>
                      </div>

                  </div>
              </div>
          </div>
            <div class="row">
                <div class="col-12">
                  <?php echo $this->session->flashdata('message'); ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                          <th>Kode Instansi</th>
                                          <th>Nama Instansi </th>
                                          <th>Terdata </th>
                                          <th>Aksi </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php $start = 1;
                                      foreach ($instansi as $data) { ?>
                                        <tr>
                                            <td><?= $start++ ?></td>
                                            <td><?= $data->kode_instansi ?></td>
                                            <td><?= $data->nama_instansi ?></td>
                                            <td><?= $data->registration ?></td>
                                            <td>
                                              <a href="<?= base_url('update_instansi/').$data->kode_instansi; ?>" class="btn btn-sm btn-outline-danger waves-effect waves-light">Edit</a>
                                              <a href="<?= base_url('delete/').$data->kode_instansi; ?>" id="btn-delete" class="btn btn-sm btn-outline-dark waves-effect waves-light" onclick="<?= base_url('anggota') ?>">Hapus</a>
                                            </td>

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
