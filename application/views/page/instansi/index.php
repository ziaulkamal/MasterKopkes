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
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Asal Instansi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      $no = 1;
                                      foreach($anggota as $data){
                                        ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->nm_lengkap ?></td>
                                        <td><?= $data->instansi ?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
