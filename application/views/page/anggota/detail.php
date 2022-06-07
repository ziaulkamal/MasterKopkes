<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-xl-8">
<div class="card">
<div class="card-body">
    <h4 class="card-title"></h4>

<div class="row">
<div class="col-xl-12 col-sm-12">
<div class="card">
    <div class="card-body">
        <div class="d-flex text-muted">
            <div class="flex-grow-1 overflow-hidden">
              <div class="col-md-12 col-lg-12">
                  <h3 class="mb-3"><?= $title; ?></h3>
                  <br>
                    <div class="row g-3">
                      <div class="col-sm-6">
                        <h5><b>Nama : </b><?= $master_data->nama_anggota ?></h5>
                      </div>
                      <div class="col-sm-6">
                        <h5><b>Instansi : </b><?= $master_data->nama_instansi ?></h5>
                      </div>
                        </div>
                        <br>
                        <h5 class="mb-3 pd-2">Simpanan</h5>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                              <th>Simpanan Pokok</th>
                              <th>Simpanan Wajib</th>
                              <th>Simpanan Kusus</th>
                              <th>Simpanan Sukarela</th>
                              <th>Total Simpanan</th>

                            </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?= $this->conv->convRupiah($rekening->s_pokok) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->s_wajib) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->s_khusus) ?></td>
                                <td><?= $this->conv->convRupiah($rekening->s_lain) ?></td>
                                <td><b><?= $this->conv->convRupiah($rekening->total_akumulasi) ?></b></td>
                              </tr>
                            </tbody>
                        </table>
                        <br>
                        <h5 class="mb-3 pd-2">Pinjaman</h5>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                              <th>Kode Pinjaman</th>
                              <th>Plafon</th>
                              <th>Tanggal Pengajuan</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pinjaman as $q) { ?>
                                  <tr>
                                  <td><?= $q->kode_pinjaman ?></td>
                                  <td><?= $this->conv->convRupiah($q->plafon) ?></td>
                                  <td><?= date_indo($q->tanggal_pengajuan) ?></td>
                                  <td><?php if ($q->tenor == $q->angsuran_ke) {
                                    echo "<b>Selesai</b>";
                                  }else{
                                    echo "<i>Masih dalam Pinjaman</i>";
                                  } ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br>
                        <h5 class="mb-3 pd-2">Angsuran </h5>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                              <th>Kode Pinjaman</th>
                              <th>Pokok</th>
                              <th>Margin</th>
                              <th>Tanggal Transaksi</th>
                              <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($angsuran as $s) { ?>
                                <tr>
                                  <td><?= $s->kode_pinjaman ?></td>
                                  <td><?= $this->conv->convRupiah($s->angsuran_pokok) ?></td>
                                  <td><?= $this->conv->convRupiah($s->angsuran_margin) ?></td>
                                  <td><?= date_indo($s->last_update) ?></td>
                                  <td><?= $s->keterangan ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                        <div class="col-sm-12">
                          <a href="#" class="btn btn-primary">Export Keseluran Ke Excel</a>
                        </div>


                    </div>



            </div>
        </div>
    </div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>
</div>
