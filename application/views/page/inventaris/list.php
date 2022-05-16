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
                              <td><?= $data->jumlah.' '.$data->satuan ?></td>
                              <td><?= $this->conv->convRupiah($data->harga_beli) ?></td>
                              <td><?= $this->conv->convRupiah($data->harga_sekarang) ?></td>
                              <td><?= $data->keterangan ?></td>
                              <td>
                              <a href="<?= base_url('edit_inventaris/').$data->id; ?>" class="btn btn-sm btn-outline-info waves-effect waves-light">Update Harga Barang</a>
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
