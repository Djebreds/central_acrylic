<div class="container-fluid p-0">
    <h1 class="mb-3">Order Selesai</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Finish</li>
        </ol>
    </nav>
    <div class="row position-relative">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="content">
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
                                                    >Kode Pesanan</th>
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="Staff: activate to sort column ascending">
                                                    Staff
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending">
                                                    Status
                                                </th>
                                                <th class="no-short" tabindex="0" aria-controls="datatables-column-search-text-inputs" rowspan="1"
                                                    colspan="1" aria-label="File: activate to sort column ascending">File
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($data['orders'] as $order) : ?>
                                            <tr>
                                                <td></td>
                                                <td><a href="<?= route('admin/finish/detail/', $order['code']) ?>"><?= $order['code']; ?></a></td>
                                                <td><?= $order['name']; ?></td>
                                                <td>
                                                    <span class="badge fs-5 rounded-pill bg-success"><?= $order['process'] == 'completed' ? 'selesai' : '' ?></span>
                                                </td>
                                                <td><a href="<?= asset('uploaded/' . $order['order_file']) ?>" download onclick="return confirm('Ingin menyimpan file ini?')">Download</a></td>
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
