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
                                                <th>ID Anggota</th>
                                                <th>Nama Anggota</th>
                                                <th>Simpana Pokok</th>
                                                <th>Simpana Wajib</th>
                                                <th>Simpana Sukarela</th>
                                                <th>Tanggal Update</th>
                                                <th>Opsi Lanjutan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($simpanan as $data) {
                                            ?>
                                            <tr>
                                              <td><?= $no++ ?></td>
                        			                <td><?= $data->no_anggota ?></td>
                        			                <td><?= $data->nm_lengkap ?></td>
                        			                <td><?= $data->simpok ?></td>
                        			                <td><?= $data->simwa ?></td>
                        			                <td><?= $data->simka ?></td>
                        			                <td><?= $data->tgl_update ?></td>
                        			               <td>
                                               <a href="<?= base_url('C_Simpanan/penarikan') ?>"class="btn btn-primary btn-rounded waves-effect waves-light">Penarikan</a>

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
