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
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Anggota</th>
                        <th>No Rekening</th>
                        <th>Nama Anggota</th>
                        <th>Status Anggota</th>
                        <th>Opsi Lanjutan</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach($anggota as $data){
                        ?>
                    <tr>
                        <td><?= $no++ ?></td>
  			                <td><?= $data->no_anggota ?></td>
  			                <td><?= $data->no_rek ?></td>
  			                <td><?= $data->nm_lengkap ?></td>
                        <td><?= $data->sts_anggota ?></td>

                        <td>
                        <a href="<?= base_url('detail/').$data->id_anggota; ?>" class="badge badge-soft-dark">Detail</a>
                        <a href="<?= base_url('edit/').$data->id_anggota; ?>" class="badge badge-soft-primary">Edit</a>
                        <a href="<?= base_url('hapus/').$data->id_anggota; ?>" id="btn-delete" class="badge badge-soft-danger" onclick="<?= base_url('anggota') ?>">Hapus</a>

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
