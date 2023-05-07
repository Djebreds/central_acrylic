<div class="container-fluid p-0">
    <div class="d-flex justify-content-between ">
        <h1 class="mb-3">Staff</h1>
        <button type="button" class="btn btn-success my-1" id="addButton" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Staff    
        </button>
    </div>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Staff</li>
        </ol>
    </nav>
    <?= Flasher::flash(); ?>
    <div class="row position-relative">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header"><h3 class="mb-0">Karyawan</h3></div>
                <div class="card-body pt-0">
                    <div id="content">
                        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                        <form action="<?= route('admin/users/create') ?>" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="title-modal">Tambah</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-3">
                                            <input type="hidden" name="id" id="id">
                                            <div class="mb-3">
                                                <label for="name">Nama Staff</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama staff" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="staff_ID">ID Staff</label>
                                                <input type="text" name="staff_ID" id="staff_ID" class="form-control <?= isset($_SESSION['error_staff_id']) ? 'is-invalid' : '' ?>" placeholder="Masukkan ID Staff" required>
                                                <div class="invalid-feedback">
                                                    <?php if (isset($_SESSION['error_staff_id'])) { ?>
                                                        <?= $_SESSION['error_staff_id']; ?>
                                                        <?php unset($_SESSION['error_staff_id']); ?>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="division" value="admin" id="division">
                                                <label class="form-check-label" for="division">
                                                    Admin
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="datatables-column-search-text-inputs_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatables-column-search-text-inputs" class="table table-striped dataTable" style="width: 100%;"
                                        aria-describedby="datatables-column-search-text-inputs_info">
                                        <div class="loading col-12 mt-2" style="height: 20px">
                                        </div>
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatables-column-search-text-inputs"
                                                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="NO: activate to sort column descending"
                                                    >NO</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatables-column-search-text-inputs"
                                                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nama: activate to sort column descending"
                                                    >Nama Karyawan</th>
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="ID: activate to sort column ascending">
                                                    ID
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="Aksi: activate to sort column ascending">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data['staff'] as $staff) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $staff['name']; ?></td>
                                                <td><?= $staff['staff_ID']; ?></td>
                                                <td class="d-flex gap-3">
                                                    <a href="<?= route('admin/users/update/', $staff['id']) ?>" class="btn btn-warning editModal" data-bs-toggle="modal" data-bs-target="#editModal-<?= $staff['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </a>
                                                    <div class="modal fade" id="editModal-<?= $staff['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                    <form action="<?= route('admin/users/update') ?>" method="POST">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="title-modal">Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body m-3">
                                                                        <input type="hidden" name="id" id="id" value="<?= $staff['id'] ?>">
                                                                        <div class="mb-3">
                                                                            <label for="name">Nama Staff</label>
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?= $staff['name'] ?>" placeholder="Masukkan nama staff" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="staff_ID">ID Staff</label>
                                                                            <input type="text" name="staff_ID" id="staff_ID" class="form-control <?= isset($_SESSION['error_staff_id']) ? 'is-invalid' : '' ?>" value="<?= $staff['staff_ID'] ?>" placeholder="Masukkan ID Staff" required>
                                                                            <div class="invalid-feedback">
                                                                                <?php if (isset($_SESSION['error_staff_id'])) { ?>
                                                                                    <?= $_SESSION['error_staff_id']; ?>
                                                                                    <?php unset($_SESSION['error_staff_id']); ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" name="password" id="password" class="form-control <?= isset($_SESSION['error_password']) ? 'is-invalid' : '' ?>" value="<?= $staff['password'] ?>" placeholder="Masukkan password" required>
                                                                            <div class="invalid-feedback">
                                                                                <?php if (isset($_SESSION['error_password'])) { ?>
                                                                                    <?= $_SESSION['error_password']; ?>
                                                                                    <?php unset($_SESSION['error_password']); ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="password_confirmation">Konfirmasi Password</label>
                                                                            <input type="password" name="password_confirmation" value="<?= $staff['password'] ?>" id="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password" required>
                                                                        </div>

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" type="checkbox" name="division" value="admin" id="division">
                                                                            <label class="form-check-label" for="division">
                                                                                Admin
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?= route('admin/users/delete/', $staff['id']) ?>" onclick="return confirm('Hapus staff ini?');" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
            <div class="card-header"><h3 class="mb-0">Admin</h3></div>
                <div class="card-body pt-0">
                    <div id="content">
                        <div id="datatables-column-search-text-inputs_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-admin" class="table table-striped dataTable" style="width: 100%;"
                                        aria-describedby="datatable-admin_info">
                                        <div class="loading col-12 mt-2" style="height: 20px">
                                        </div>
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-admin"
                                                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="NO: activate to sort column descending"
                                                    >NO</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable-admin"
                                                    rowspan="1" colspan="1" aria-sort="ascending" aria-label="Nama: activate to sort column descending"
                                                    >Nama Admin</th>
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatable-admin" rowspan="1"
                                                    colspan="1" aria-label="ID: activate to sort column ascending">
                                                    ID
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatable-admin" rowspan="1"
                                                    colspan="1" aria-label="Aksi: activate to sort column ascending">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data['admin'] as $admin) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $admin['name']; ?></td>
                                                <td><?= $admin['staff_ID']; ?></td>
                                                <td class="d-flex gap-3">
                                                <a href="<?= route('admin/users/update/', $admin['id']) ?>" class="btn btn-warning editModal" data-bs-toggle="modal" data-bs-target="#editModal-<?= $admin['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </a>
                                                    <div class="modal fade" id="editModal-<?= $admin['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                    <form action="<?= route('admin/users/update') ?>" method="POST">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="title-modal">Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body m-3">
                                                                        <input type="hidden" name="id" id="id" value="<?= $admin['id'] ?>">
                                                                        <div class="mb-3">
                                                                            <label for="name">Nama Staff</label>
                                                                            <input type="text" name="name" id="name" class="form-control" value="<?= $admin['name'] ?>" placeholder="Masukkan nama produk" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="staff_ID">ID Staff</label>
                                                                            <input type="text" name="staff_ID" id="staff_ID" class="form-control <?= isset($_SESSION['error_staff_id']) ? 'is-invalid' : '' ?>" value="<?= $admin['staff_ID'] ?>" placeholder="Masukkan ID Staff" required>
                                                                            <div class="invalid-feedback">
                                                                                <?php if (isset($_SESSION['error_staff_id'])) { ?>
                                                                                    <?= $_SESSION['error_staff_id']; ?>
                                                                                    <?php unset($_SESSION['error_staff_id']); ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="password">Password</label>
                                                                            <input type="password" name="password" id="password" class="form-control <?= isset($_SESSION['error_password']) ? 'is-invalid' : '' ?>" value="<?= $admin['password'] ?>" placeholder="Masukkan password" required>
                                                                            <div class="invalid-feedback">
                                                                                <?php if (isset($_SESSION['error_password'])) { ?>
                                                                                    <?= $_SESSION['error_password']; ?>
                                                                                    <?php unset($_SESSION['error_password']); ?>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="password_confirmation">Konfirmasi Password</label>
                                                                            <input type="password" name="password_confirmation" value="<?= $admin['password'] ?>" id="password_confirmation" class="form-control" placeholder="Masukkan konfirmasi password" required>
                                                                        </div>

                                                                        <div class="form-check mb-3">
                                                                            <input class="form-check-input" <?= $admin['division'] == 'admin' ? 'checked' : '' ?> type="checkbox" name="division" value="admin" id="division">
                                                                            <label class="form-check-label" for="division">
                                                                                Admin
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="reset" class="btn btn-danger">Reset</button>
                                                                        <button type="submit" class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="<?= route('admin/users/delete/', $admin['id']) ?>" onclick="return confirm('Hapus admin ini?');" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
