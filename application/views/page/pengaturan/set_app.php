<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $title; ?></h4>
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
                  <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                      <thead>
                      <tr>
                          <th>Name App</th>
                          <th>Versi App</th>
                          <th>Modul</th>
                          <th>Zona Waktu</th>
                          <th>Modul Active</th>
                          <th>Opsi Lanjutan</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        foreach($setting as $s){
                          ?>
                      <tr>
    			                <td><?= $s->nama_app ?></td>
    			                <td><?= $s->versi_app ?></td>
    			                <td><?= $s->modul ?></td>
    			                <td><?= $s->zona_waktu ?></td>
                          <td><?= $s->modul_active ?></td>
                          <td>
                          <a href="<?= base_url('C_Pengaturan/detail_app') ?>" class="badge badge-soft-dark">Detail</a>
                          <a href="<?= base_url('C_Pengaturan/edit_app') ?>" class="badge badge-soft-primary">Edit</a>
                          </td>
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
