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
                                                <th>No</th>
                                                <th>Nama Anggota</th>
                                                <th>Instansi</th>
                                                <th>Simpanan Pokok</th>
                                                <th>Simpanan Wajib</th>
                                                <th>Simpanan Khusus</th>
                                                <th>Simpanan Lain</th>
                                                <th>Total Simpanan</th>
                                                <th>Update Simpanan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($load as $data) {
                                            ?>
                                            <tr>
                                              <td><?= $no++ ?></td>
                        			                <td><?= $data->nama ?></td>
                        			                <td><?= $data->instansi ?></td>
                        			                <td><?= $this->conv->convRupiah($data->pokok) ?></td>
                        			                <td><?= $this->conv->convRupiah($data->wajib) ?></td>
                        			                <td><?= $this->conv->convRupiah($data->kusus) ?></td>
                        			                <td><?= $this->conv->convRupiah($data->lain) ?></td>
                        			                <td><?= $this->conv->convRupiah($data->pokok+$data->wajib+$data->kusus+$data->lain) ?></td>
                        			               <td>
                                               <a href="<?=  base_url('simpanan_pertama/') . $data->norek ?>"class="btn btn-primary btn-rounded waves-effect waves-light">Update Simpanan</a>

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
