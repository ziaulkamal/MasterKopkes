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
                                        <th>Kode Pinjaman</th>
                                        <th>Nama Anggota</th>
                                        <th>Durasi Tunggakan</th>
                                        <th>Sisa Angsuran Pokok</th>
                                        <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                                          <th>Opsi</th>
                                        <?php } ?>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($angsuran as $s) {

                                      if ($this->bulan->parse($s->last_update) - $date != 0 && $s->tenor - $s->ke != 0) { ?>
                                      <tr>
                                        <td><?= $s->kode; ?></td>
                                        <td><?= $s->nama; ?></td>
                                        <td><?= $date - $this->bulan->parse($s->last_update). ' bulan' ?></td>
                                        <td><?= $this->conv->convRupiah($s->sisa_angsuran); ?></td>
                                        <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                                          <td>
                                            <a href="<?= base_url('angsuran/').$s->kode ?>" class="btn btn-outline-info waves-effect">  Bayar </a>
                                            <a href="<?= base_url('pelunasan/').$s->kode ?>" class="btn btn-outline-dark waves-effect"> Percepat Pelunasan </a>
                                            <a href="<?= base_url('meninggal/').$s->kode ?>" class="btn btn-outline-danger waves-effect"> Meninggal Dunia </a>
                                          </td>
                                        <?php } ?>
                                      </tr>

                                      <?php }
                                     } ?>
                                  </tbody>
                                  </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      </div>
