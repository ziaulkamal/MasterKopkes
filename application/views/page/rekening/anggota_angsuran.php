<div class="page-content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title ?></h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Angsuran</a></li>
                            <li class="breadcrumb-item active"><?= $title ?></li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <?php echo $this->session->flashdata('message'); ?>
          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                  <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Kode Angsuran</th>
                                        <th>Nama Anggota</th>
                                        <th>Angsuran Ke</th>
                                        <th>Jumlah Angsuran</th>
                                        <th>Keterangan</th>
                                        <th>Opsi</th>
                                        <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $start = 1;
                                    foreach ($angsuran as $s) {?>
                                      <tr>
                                        <td><?= $start++; ?></td>
                                        <td><?= $s->kode; ?></td>
                                        <td><?= $s->nama; ?></td>
                                        <td><?= $s->angsuran_ke; ?></td>
                                        <td><?= $this->conv->convRupiah($s->pokok+$s->margin); ?></td>
                                        <td><?= $s->keterangan; ?></td>
                                        <td><a href="<?= base_url('cetak/angsuran/').$s->kode ?>" class="btn btn-outline-primary waves-effect"> Cek Invoice </a></td>
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
