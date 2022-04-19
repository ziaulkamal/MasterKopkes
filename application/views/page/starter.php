<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0"><?= $title ?></h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"><?= $title; ?></a></li>
                            <li class="breadcrumb-item active"><?= $title; ?></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex text-muted">
                          <div class="flex-shrink-0  me-3 align-self-center">
                              <div class="avatar-sm">
                                  <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                      <i class="ri-group-line"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="flex-grow-1 overflow-hidden">
                              <p class="mb-1">Total Instansi Terdata</p>
                              <h5 class="mb-3"><?= $jumlah_instansi->total; ?></h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex text-muted">
                          <div class="flex-shrink-0  me-3 align-self-center">
                              <div class="avatar-sm">
                                  <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                      <i class="ri-group-line"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="flex-grow-1 overflow-hidden">
                              <p class="mb-1">Total Anggota Terdata</p>
                              <h5 class="mb-3"><?= $jumlah_anggota->total ?></h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex text-muted">
                          <div class="flex-shrink-0  me-3 align-self-center">
                              <div class="avatar-sm">
                                  <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                      <i class="ri-group-line"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="flex-grow-1 overflow-hidden">
                              <p class="mb-1">Total Keseluruhan Pinjaman</p>
                              <h5 class="mb-3"><?= $total_pinjaman->total ?></h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex text-muted">
                        <div class="flex-shrink-0  me-3 align-self-center">
                            <div class="avatar-sm">
                                <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                    <i class="ri-group-line"></i>
                                </div>
                            </div>
                        </div>
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="mb-1">Total Keseluruhan Angsuran</p>
                            <h5 class="mb-3"><?= $total_angsuran->total ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex text-muted">
                          <div class="flex-shrink-0  me-3 align-self-center">
                              <div class="avatar-sm">
                                  <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                      <i class="ri-group-line"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="flex-grow-1 overflow-hidden">
                              <p class="mb-1">Jumlah Simpanan Anggota </p>
                              <h5 class="mb-3"><?= convRupiah($jumlah_simpanan->total) ?></h5>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        </div>
        <div class="row">
          <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Spline Area</h4>

                                <div id="spline_area" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div><!--end card-->
                    </div>
                  </div>
              </div>
</div>
