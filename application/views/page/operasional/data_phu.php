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
                            <th>ID Anggota</th>
                            <th>Nama Anggota</th>
                            <th>Pembagian Jasa Simpanan</th>
                            <th>Pembagian Jasa Usaha</th>
                            <th>Total Diserahkan</th>
                            <th>Status Penyerahan</th>
                            <th>Aksi</th>
                          </tr>
                          </thead>
                          <tbody>
                            <?php
                            $start = 0;
                            foreach ($load as $q) { ?>
                              <tr>
                                <td><?= $start++ ?></td>
                                <td><?= $q->no_anggota ?></td>
                                <td><?= $q->nama_anggota ?></td>
                                <td><?= $this->conv->convRupiah($q->persen_jasa_simpanan) ?></td>
                                <td><?= $this->conv->convRupiah($q->persen_jasa_usaha) ?></td>
                                <td><?= $this->conv->convRupiah($q->persen_jasa_usaha + $q->persen_jasa_simpanan) ?></td>
                                <td><?php if ($q->sudah_diserahkan == 0) { ?> <span class="badge bg-light">Belum diserahkan</span> <?php }elseif ($q->sudah_diserahkan == 1) { ?> <span class="badge bg-primary">Sudah diserahkan</span> <?php }else { ?> <span class="badge bg-danger">Error</span> <?php } ?></td>
                                <td><?php if ($q->sudah_diserahkan == 0) {?>
                                  <a class="badge bg-dark" href="<?= base_url('detail_phu/').$q->id ?>">Serahkan</a>
                                <?php }elseif ($q->sudah_diserahkan == 1) {
                                  echo 'Diserahkan : '.$this->conv->convRupiah($q->total_diserahkan).'.<br>Sisa : '.$this->conv->convRupiah($q->sisa_pembagian);
                                }else {
                                  echo "--## Error ##--";
                                } ?></td>
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
