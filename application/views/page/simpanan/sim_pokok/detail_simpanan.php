 <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0"><?= $title ?></h4>
                        <a href="<?=base_url('tambah_simpanan') ?>" type="button" class="btn btn-primary waves-effect waves-light">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Datatable Editable</h4>

                            <div class="table-responsive">
                                <table class="table table-editable table-nowrap align-middle table-edits">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Edit</th>
                                            <th>Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-id="1">
                                            <td data-field="id" style="width: 80px">1</td>
                                            <td data-field="name">David McHenry</td>
                                            <td data-field="age">24</td>
                                            <td data-field="gender">Male</td>
                                            <td style="width: 100px">
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                              <a class="btn btn-outline-secondary btn-sm" title="Profile">
                                                <i class="far fa-trash-alt"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <tr data-id="2">
                                            <td data-field="id">2</td>
                                            <td data-field="name">Frank Kirk</td>
                                            <td data-field="age">22</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                              <a class="btn btn-outline-secondary btn-sm" title="Profile">
                                                <i class="far fa-trash-alt"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <tr data-id="3">
                                            <td data-field="id">3</td>
                                            <td data-field="name">Rafael Morales</td>
                                            <td data-field="age">26</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                              <a class="btn btn-outline-secondary btn-sm" title="Profile">
                                                <i class="far fa-trash-alt"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <tr data-id="4">
                                            <td data-field="id">4</td>
                                            <td data-field="name">Mark Ellison</td>
                                            <td data-field="age">32</td>
                                            <td data-field="gender">Male</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                              <a class="btn btn-outline-secondary btn-sm" title="Profile">
                                                <i class="far fa-trash-alt"></i>
                                              </a>
                                            </td>
                                        </tr>
                                        <tr data-id="5">
                                            <td data-field="id">5</td>
                                            <td data-field="name">Minnie Walter</td>
                                            <td data-field="age">27</td>
                                            <td data-field="gender">Female</td>
                                            <td>
                                                <a class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                            </td>
                                            <td>
                                              <a class="btn btn-outline-secondary btn-sm" title="Profile">
                                                <i class="far fa-trash-alt"></i>
                                              </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>