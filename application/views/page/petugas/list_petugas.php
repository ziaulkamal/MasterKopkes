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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Username</th>
                              <th>Level</th>
                              <th>Status</th>
                              <th>Terdaftar</th>
                              <th>Opsi Lanjutan</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            foreach ($petugas as $data) {
                            ?>
                            <tr>
                                 <td><?= $no++ ?></td>
  			                         <td><?= $data->nama ?></td>
  			                         <td><?= $data->username ?></td>
  			                         <td><?= $data->level ?></td>
                                 <td><?= $data->status ?></td>
                                 <td><?= $data->terdaftar ?></td>
                             <td>
                               <a href="<?= base_url('edit/').$data->id; ?>" class="badge badge-soft-primary">Edit</a>
                               <a href="<?= base_url('hapus/').$data->id; ?>" id="btn-delete" class="badge badge-soft-danger" onclick="<?= base_url('anggota') ?>">Hapus</a>
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
