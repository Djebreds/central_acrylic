<div class="container-fluid p-0">
    <h1 class="mb-3">Order</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Design & Edit</li>
        </ol>
    </nav>
    <div class="d-none d-md-block">
        <div class="row position-relative g-0">
            <?php if ($data['orders']['status'] == 'processing' || $data['orders']['status'] == 'initial') { ?>
                <?php if ($data['previous']) { ?>
                    <?php if ($data['previous']['name'] == $_SESSION['current_division'] && $data['previous']['status'] == 'processing') { ?>
                        <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                            <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                                <li class="list-group-item">
                                    <h4 class="text-muted">Kode Pemesan</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Jenis Produk:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Proses Mesin:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Jumlah:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Keterangan:</h4>
                                    <dl class="row mb-0">
                                        <div class="col-sm-9 mb-0">
                                            <h5 class="text-muted">Kasir :</h5>
                                            <h4><?= $data['orders']['description']; ?></h4>
                                            <h5 class="text-muted">Admin :</h5>
                                            <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                        </div>
                                    </dl>
                                </li>
                            </ul>
                            <li class="list-group-item">
                                <dl class="row justify-content-center">
                                    <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                                    <dd class="col-sm-9 text-center m-5">
                                        <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                        </a>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                                <dl class="row justify-content-center">
                                    <?php if ($data['orders']['design_file'] != '') { ?>
                                        <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                        <dd class="col-sm-9 text-center m-5">
                                            <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                                <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                                <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                            </a>
                                        </dd>
                                    <?php } else { ?>
                                        <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                    <?php }  ?>
                                </dl>
                            </li>
                        </ul>
                        <div class="text-end mt-4">
                            <form action="<?= route('operator/orders/completeOrderDivision') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                    <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                    <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                    <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                            </form>
                        </div>
                    <?php } else if ($data['previous']['status'] == 'processing') { ?>
                        <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                            <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                                <li class="list-group-item">
                                    <h4 class="text-muted">Kode Pemesan</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Jenis Produk:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Proses Mesin:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Jumlah:</h4>
                                    <dl class="row mb-0">
                                        <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item">
                                    <h4 class="text-muted">Keterangan:</h4>
                                    <dl class="row mb-0">
                                        <div class="col-sm-9 mb-0">
                                            <h5 class="text-muted">Kasir :</h5>
                                            <h4><?= $data['orders']['description']; ?></h4>
                                            <h5 class="text-muted">Admin :</h5>
                                            <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                        </div>
                                    </dl>
                                </li>
                            </ul>
                            <li class="list-group-item">
                                <dl class="row justify-content-center">
                                    <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                                    <dd class="col-sm-9 text-center m-5">
                                        <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                        </a>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                                <dl class="row justify-content-center">
                                    <?php if ($data['orders']['design_file'] != '') { ?>
                                        <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                        <dd class="col-sm-9 text-center m-5">
                                            <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                                <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                                <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                            </a>
                                        </dd>
                                    <?php } else { ?>
                                        <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                    <?php }  ?>
                                </dl>
                            </li>
                        </ul>
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Tunggu prosses <?= $data['previous']['name'] ?> selesai')">Prosess</button>
                        </div>
                    <?php } else { ?>
                        <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                                <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                                    <li class="list-group-item">
                                        <h4 class="text-muted">Kode Pemesan</h4>
                                        <dl class="row mb-0">
                                            <dd class="col-sm-8 mb-0">
                                            <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <h4 class="text-muted">Jenis Produk:</h4>
                                        <dl class="row mb-0">
                                            <dd class="col-sm-8 mb-0">
                                                <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <h4 class="text-muted">Proses Mesin:</h4>
                                        <dl class="row mb-0">
                                            <dd class="col-sm-8 mb-0">
                                                <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <h4 class="text-muted">Jumlah:</h4>
                                        <dl class="row mb-0">
                                            <dd class="col-sm-8 mb-0">
                                                <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                            </dd>
                                        </dl>
                                    </li>
                                    <li class="list-group-item">
                                        <h4 class="text-muted">Keterangan:</h4>
                                        <dl class="row mb-0">
                                                <div class="col-sm-9 mb-0">
                                                <h5 class="text-muted">Kasir :</h5>
                                                <h4><?= $data['orders']['description']; ?></h4>
                                                <h5 class="text-muted">Admin :</h5>
                                                <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                            </div>
                                        </dl>
                                    </li>
                                </ul>
                                <li class="list-group-item">
                                    <dl class="row justify-content-center">
                                        <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                                        <dd class="col-sm-9 text-center m-5">
                                            <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                                <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                                <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                            </a>
                                        </dd>
                                    </dl>
                                </li>
                                <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                                    <dl class="row justify-content-center">
                                        <?php if ($data['orders']['design_file'] != '') { ?>
                                            <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                            <dd class="col-sm-9 text-center m-5">
                                                <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                                    <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                                    <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                                </a>
                                            </dd>
                                        <?php } else { ?>
                                            <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                        <?php }  ?>
                                    </dl>
                                </li>
                            </ul>
                            <div class="d-flex gap-2 justify-content-end my-3">
                                <form action="<?= route('operator/orders/processDivision') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                    <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                    <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                    <button type="submit" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Proses order ?')">Prosess</button>
                                </form>
                                <form action="<?= route('operator/orders/completeOrderDirectly') ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                    <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                    <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                    <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                                </form>
                            </div>
                    <?php } ?>
                <?php } else if ($data['orders']['division_status'] != 'complete') { ?>
                    <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                        <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                            <li class="list-group-item">
                                <h4 class="text-muted">Kode Pemesan</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                    <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jenis Produk:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Proses Mesin:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jumlah:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Keterangan:</h4>
                                <dl class="row mb-0">
                                        <div class="col-sm-9 mb-0">
                                        <h5 class="text-muted">Kasir :</h5>
                                        <h4><?= $data['orders']['description']; ?></h4>
                                        <h5 class="text-muted">Admin :</h5>
                                        <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                    </div>
                                </dl>
                            </li>
                        </ul>
                        <li class="list-group-item">
                            <dl class="row justify-content-center">
                                <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                                <dd class="col-sm-9 text-center m-5">
                                    <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                    </a>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                            <dl class="row justify-content-center">
                                <?php if ($data['orders']['design_file'] != '') { ?>
                                    <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                    <dd class="col-sm-9 text-center m-5">
                                        <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                        </a>
                                    </dd>
                                <?php } else { ?>
                                    <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                <?php }  ?>
                            </dl>
                        </li>
                    </ul>
                    <div class="d-flex gap-2 justify-content-end my-3">
                        <form action="<?= route('operator/orders/processDivision') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                            <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                            <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                            <button type="submit" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Proses order ?')">Prosess</button>
                        </form>
                        <form action="<?= route('operator/orders/completeOrderDirectly') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                            <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                            <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                            <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                        </form>
                    </div>
                <?php } else { ?>
                    <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                        <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                            <li class="list-group-item">
                                <h4 class="text-muted">Kode Pemesan</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                    <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jenis Produk:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Proses Mesin:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jumlah:</h4>
                                <dl class="row mb-0">
                                    <dd class="col-sm-8 mb-0">
                                        <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                    </dd>
                                </dl>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Keterangan:</h4>
                                <dl class="row mb-0">
                                        <div class="col-sm-9 mb-0">
                                        <h5 class="text-muted">Kasir :</h5>
                                        <h4><?= $data['orders']['description']; ?></h4>
                                        <h5 class="text-muted">Admin :</h5>
                                        <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                    </div>
                                </dl>
                            </li>
                        </ul>
                        <li class="list-group-item">
                            <dl class="row justify-content-center">
                                <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                                <dd class="col-sm-9 text-center m-5">
                                    <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                    </a>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                            <dl class="row justify-content-center">
                                <?php if ($data['orders']['design_file'] != '') { ?>
                                    <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                    <dd class="col-sm-9 text-center m-5">
                                        <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                        </a>
                                    </dd>
                                <?php } else { ?>
                                    <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                <?php }  ?>
                            </dl>
                        </li>
                    </ul>
                <?php } ?>
            <?php } else if ($data['orders']['status'] == 'completed' || $data['previous']['name'] == $_SESSION['current_division']) { ?>
                <ul class="list-group list-group-horizontal" style="border-radius: 20px; width: 100%;">
                    <ul class="list-group list-group-item p-0 border border-0"  style="border-radius: 20px 0 0 20px; width: 50%;">
                        <li class="list-group-item">
                            <h4 class="text-muted">Kode Pemesan</h4>
                            <dl class="row mb-0">
                                <dd class="col-sm-8 mb-0">
                                <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jenis Produk:</h4>
                            <dl class="row mb-0">
                                <dd class="col-sm-8 mb-0">
                                    <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Proses Mesin:</h4>
                            <dl class="row mb-0">
                                <dd class="col-sm-8 mb-0">
                                    <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jumlah:</h4>
                            <dl class="row mb-0">
                                <dd class="col-sm-8 mb-0">
                                    <h4 class="mb-0"><?= $data['orders']['qty'] ?> Set</h4>
                                </dd>
                            </dl>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Keterangan:</h4>
                            <dl class="row mb-0">
                                    <div class="col-sm-9 mb-0">
                                    <h5 class="text-muted">Kasir :</h5>
                                    <h4><?= $data['orders']['description']; ?></h4>
                                    <h5 class="text-muted">Admin :</h5>
                                    <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                                </div>
                            </dl>
                        </li>
                    </ul>
                    <li class="list-group-item">
                        <dl class="row justify-content-center">
                            <dt class="col-sm-12"><h4 class="text-muted">File Pesanan:</h4></dt>
                            <dd class="col-sm-9 text-center m-5">
                                <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                    <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                    <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                </a>
                            </dd>
                        </dl>
                    </li>
                    <li class="list-group-item"  style="border-radius: 0 20px 20px 0;">
                        <dl class="row justify-content-center">
                            <?php if ($data['orders']['design_file'] != '') { ?>
                                <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                <dd class="col-sm-9 text-center m-5">
                                    <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                    </a>
                                </dd>
                            <?php } else { ?>
                                <dt class="col-sm-12" style="margin-left: 100px; margin-right: 100px"><h4 class="text-muted">Design & Edited File:</h4></dt>
                            <?php }  ?>
                        </dl>
                    </li>
                </ul>
            <?php } ?>
        </div>    
    </div>

    <div class="d-block d-md-none">
        <div class="row position-relative g-0">
            <?php if ($data['orders']['status'] == 'processing' || $data['orders']['status'] == 'initial') : ?>
                <?php if ($data['previous']) { ?>
                    <?php if ($data['previous']['name'] == $_SESSION['current_division'] && $data['previous']['status'] == 'processing') { ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4 class="text-muted">Kode Pemesan</h4>
                                <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jenis Produk</h4>
                                <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Proses Mesin</h4>
                                <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jumlah</h4>
                                <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Keterangan</h4>
                                <h5 class="text-muted">Kasir :</h5>
                                <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                                <h5 class="text-muted">Admin :</h5>
                                <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">File Pesanan</h4>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Design & Edited File</h4>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <div class="text-end mt-4">
                            <form action="<?= route('operator/orders/completeOrderDivision') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                            </form>
                        </div>
                    <?php } else if ($data['previous']['status'] == 'processing') { ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4 class="text-muted">Kode Pemesan</h4>
                                <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jenis Produk</h4>
                                <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Proses Mesin</h4>
                                <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jumlah</h4>
                                <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Keterangan</h4>
                                <h5 class="text-muted">Kasir :</h5>
                                <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                                <h5 class="text-muted">Admin :</h5>
                                <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">File Pesanan</h4>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Design & Edited File</h4>
                                <?php if ($data['orders']['design_file'] != '') { ?>
                                    <div class="text-center">
                                        <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                        </a>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                        <div class="text-end mt-4">
                            <button type="button" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Tunggu prosses <?= $data['previous']['name'] ?> selesai')">Prosess</button>
                        </div>
                    <?php } else { ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <h4 class="text-muted">Kode Pemesan</h4>
                                <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jenis Produk</h4>
                                <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Proses Mesin</h4>
                                <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Jumlah</h4>
                                <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Keterangan</h4>
                                <h5 class="text-muted">Kasir :</h5>
                                <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                                <h5 class="text-muted">Admin :</h5>
                                <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">File Pesanan</h4>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <h4 class="text-muted">Design & Edited File</h4>
                                <?php if ($data['orders']['design_file'] != '') { ?>
                                    <div class="text-center">
                                        <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                            <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                            <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                        </a>
                                    </div>
                                <?php } ?>
                            </li>
                        </ul>
                        <div class="d-flex gap-2 justify-content-end my-3">
                            <form action="<?= route('operator/orders/processDivision') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                <button type="submit" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Proses order ?')">Prosess</button>
                            </form>
                            <form action="<?= route('operator/orders/completeOrderDirectly') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                                <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                                <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                            </form>
                        </div>
                    <?php } ?>
                <?php } else if ($data['orders']['division_status'] != 'complete') { ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h4 class="text-muted">Kode Pemesan</h4>
                            <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jenis Produk</h4>
                            <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Proses Mesin</h4>
                            <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jumlah</h4>
                            <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Keterangan</h4>
                            <h5 class="text-muted">Kasir :</h5>
                            <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                            <h5 class="text-muted">Admin :</h5>
                            <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">File Pesanan</h4>
                            <div class="text-center">
                                <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                    <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                    <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                </a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Design & Edited File</h4>
                            <?php if ($data['orders']['design_file'] != '') { ?>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                    </a>
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                    <div class="d-flex gap-2 justify-content-end my-3">
                        <form action="<?= route('operator/orders/processDivision') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                            <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                            <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                            <button type="submit" class="btn btn-warning fs-4 ms-2" onclick="return confirm('Proses order ?')">Prosess</button>
                        </form>
                        <form action="<?= route('operator/orders/completeOrderDirectly') ?>" method="POST">
                            <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                            <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                            <input type="hidden" name="qty" value="<?= $data['orders']['qty'] ?>">
                            <button type="submit" class="btn btn-danger fs-4 ms-2" onclick="return confirm('Selesaikan order ?')">Selesai</button>
                        </form>
                    </div>
                <?php } else { ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <h4 class="text-muted">Kode Pemesan</h4>
                            <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jenis Produk</h4>
                            <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Proses Mesin</h4>
                            <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Jumlah</h4>
                            <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Keterangan</h4>
                            <h5 class="text-muted">Kasir :</h5>
                            <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                            <h5 class="text-muted">Admin :</h5>
                            <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">File Pesanan</h4>
                            <div class="text-center">
                                <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                    <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                    <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                                </a>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <h4 class="text-muted">Design & Edited File</h4>
                            <?php if ($data['orders']['design_file'] != '') { ?>
                                <div class="text-center">
                                    <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                        <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                        <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                    </a>
                                </div>
                            <?php } ?>
                        </li>
                    </ul>
                <?php } ?>
            <?php else : ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="text-muted">Kode Pemesan</h4>
                        <h4 class="mb-0"><?= $data['orders']['order_code']; ?></h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">Jenis Produk</h4>
                        <h4 class="mb-0"><?= $data['orders']['product_name']; ?></h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">Proses Mesin</h4>
                        <h4 class="mb-0"><?= $data['orders']['process_names']; ?></h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">Jumlah</h4>
                        <h4 class="mb-0"><?= $data['orders']['qty']; ?> Set</h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">Keterangan</h4>
                        <h5 class="text-muted">Kasir :</h5>
                        <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
                        <h5 class="text-muted">Admin :</h5>
                        <h4 class="mb-3"><?= $data['orders']['note']; ?></h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">File Pesanan</h4>
                        <div class="text-center">
                            <a href="<?= asset('uploaded/' . $data['orders']['order_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                <img src="<?= imageIcon($data['orders']['order_file']) ?>" width="150" alt="file">
                                <p class="mt-2"><?= $data['orders']['order_file']; ?></p>
                            </a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-muted">Design & Edited File</h4>
                        <?php if ($data['orders']['design_file'] != '') { ?>
                            <div class="text-center">
                                <a href="<?= asset('uploaded/' . $data['orders']['design_file']) ?>" onclick="return confirm('Ingin menyimpan file ini?')" download>
                                    <img src="<?= imageIcon($data['orders']['design_file']) ?>" width="150" alt="file">
                                    <p class="mt-2"><?= $data['orders']['design_file']; ?></p>
                                </a>
                            </div>
                        <?php } ?>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</div>
