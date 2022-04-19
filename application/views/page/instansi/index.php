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
                                            <td>aksi</td>

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
