<div class="container-fluid p-0">
    <h1 class="mb-3">Produk</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Produk</li>
        </ol>
    </nav>
    <div class="row position-relative">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="content">
                        <button type="button" class="btn btn-success my-1" id="addButton" data-bs-toggle="modal" data-bs-target="#addModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam-fill me-2" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.01-.003.268-.108a.75.75 0 0 1 .558 0l.269.108.01.003 6.97 2.789ZM10.404 2 4.25 4.461 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339L8 5.961 5.596 5l6.154-2.461L10.404 2Z"/>
                            </svg> Tambah Produk    
                        </button>
                        <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                        <form action="<?= route('admin/products/create') ?>" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="title-modal">Tambah</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-3">
                                                <input type="hidden" name="id" id="id">
                                                <div class="mb-3">
                                                    <label for="name">Nama Produk</label>
                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama produk" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="code">Kode Produk</label>
                                                    <input type="text" name="code" id="code" class="form-control" maxlength="3" placeholder="Masukkan kode produk" required>
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
                                                    >Produk</th>
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="Kode: activate to sort column ascending">
                                                    Kode
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="Aksi: activate to sort column ascending">Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data['products'] as $product) : ?>
                                            <tr>
                                                <td></td>
                                                <td><?= $product['name']; ?></td>
                                                <td><?= $product['code']; ?></td>
                                                <td class="d-flex gap-3">
                                                    <a href="<?= route('cashier/products/update/', $product['id']) ?>" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#editModal-<?= $product['id'] ?>">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                                        </svg>
                                                    </a>
                                                    <div class="modal fade" id="editModal-<?= $product['id'] ?>" tabindex="-1" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                    <form action="<?= route('cashier/products/update') ?>" method="POST">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="title-modal">Tambah</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body m-3">
                                                                        <input type="hidden" name="id" id="id" value="<?= $product['id'] ?>">
                                                                        <div class="mb-3">
                                                                            <label for="name">Nama Produk</label>
                                                                            <input type="text" name="name" id="name" value="<?= $product['name'] ?>" class="form-control" placeholder="Masukkan nama produk" required>
                                                                        </div>

                                                                        <div class="mb-3">
                                                                            <label for="code">Kode Produk</label>
                                                                            <input type="text" name="code" id="code" class="form-control" value="<?= $product['code'] ?>" maxlength="3" placeholder="Masukkan kode produk" required>
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

                                                    <a href="<?= route('cashier/products/delete/', $product['id']) ?>" onclick="return confirm('Hapus produk ini?');" class="btn btn-danger">
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
