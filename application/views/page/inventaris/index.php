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
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Harga Beli</th>
                            <th>Harga Barang</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php $start = 1;
                            foreach ($inventaris as $data) { ?>
                          <tr>
                              <td><?= $start++ ?></td>
                              <td><?= $data->nama_barang ?></td>
                              <td><?= $data->satuan ?></td>
                              <td><?= $data->jumlah ?></td>
                              <td><?= $data->harga_beli ?></td>
                              <td><?= $data->harga_barang ?></td>
                              <td><?= $data->keterangan ?></td>
                              <td>
                              <a href="<?= base_url('tambah_inventaris'); ?>" class="btn btn-sm btn-outline-info waves-effect waves-light">Tambah Data Barang</a>
                              <a href="<?= base_url('edit_inventaris/').$data->id; ?>" class="btn btn-sm btn-outline-danger waves-effect waves-light">Edit Data Barang</a>
                            </td>
                          </tr>
                        <?php }
                         ?>
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
