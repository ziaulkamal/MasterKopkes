<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
                    <div class="col-xl-6">
                      <?php echo $this->session->flashdata('message'); ?>
                            <div class="card">
                                <div class="card-body">
                                  <h3><?= $title ?></h3>
                                    <?php echo validation_errors('<div class="alert alert-warning">','</div>'); ?>
                                    <form method="post" action="<?= base_url($action) ?>" class="custom-validation">
                                      <div class="row">
                                        <div class="mb-12 col-xl-12">
                                          <label class="form-label">User</label>
                                          <div>
                                            <input type="text" class="form-control" name="username" value=""/>
                                          </div>
                                        </div>
                                        <div class="mb-12 col-xl-12">
                                          <label class="form-label">Password</label>
                                          <div>
                                            <input type="text" class="form-control" name="password" value=""/>
                                          </div>
                                        </div>
                                        <div class="mb-12 col-xl-12">
                                          <label class="form-label">Level</label>
                                          <div>
                                            <select class="form-control" name="level">
                                              <option value="0"> -- Pilih --</option>
                                              <option value="1"> Administrator </option>
                                              <option value="2"> Pengurus </option>
                                              <option value="3"> Dewan Pengawas </option>
                                            </select>
                                          </div>
                                        </div>
                                        <div>
                                          <br>
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                    Proses
                                                </button>

                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <script language="javascript" type="text/javascript">
                    function removeSpaces(string) {
                     return string.split(' ').join('');
                    }
                    </script>
