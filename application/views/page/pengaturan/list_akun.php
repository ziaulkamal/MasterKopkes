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
                          <th>No.</th>
                          <th>Username</th>
                          <th>Level Pengguna</th>
                          <th>Terakhir Login</th>
                          <th>Opsi Lanjutan</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $start = 1;
                        foreach($load as $s){
                          ?>
                      <tr>
    			                <td><?= $start++ ?></td>
    			                <td><?= $s->username ?></td>
    			                <td><?php if ($s->level == 1) {
                            echo "Administrator";
                          }elseif ($s->level == 2) {
                            echo "Pengurus";
                          }elseif ($s->level == 3) {
                            echo "Dewan Pengawas";
                          } ?></td>
    			                <td><?= $s->last_login ?></td>

                          <td>
                          <a href="<?= base_url('#') ?>" class="badge badge-soft-dark">Edit</a>
                          <a href="<?= base_url('delete_account/').$s->user_id ?>" class="badge badge-soft-primary" id="btn-delete">Hapus</a>
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
