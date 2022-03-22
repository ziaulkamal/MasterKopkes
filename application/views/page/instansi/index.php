  <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $title ?></h4>
                        <a href="<?=base_url('tambah_instansi') ?>" type="button" class="btn btn-primary waves-effect waves-light">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Datatable Editable</h4>
                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>instansi</th>
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
