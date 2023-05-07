<div class="container mt-4">
    <div class="d-flex align-items-center">
        <h1 class="mb-3">Order Detail</h1>
        <a href="<?= route('home') ?>" class="btn btn-primary ms-auto">Kembali</a>
    </div>
    <div class="row position-relative">
        <div class="col-12">
            <div class="card">
            <div class="card-header">Status Pesanan</div>
                <div class="card-body">
                    <ul class="timeline">
                        <?php foreach($data['orders'] as $key => $order) : ?>
                            <li class="timeline-item">
                                <?php if ($order['status_order'] == 'processing' || $order['status_order'] == 'initial') { ?>
                                    <?php if ($key == array_key_first($data['orders'])) : ?>
                                        <p class="my-2 fs-4"><strong><?= $order['description'] . " Oleh " . $order['division'] . ' (' . $order['staff_name'] . ')' ?></strong></p>
                                        <p class="mb-0 text-muted">
                                        Kode Pesanan: <strong><?= $order['code'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Nama Pemesan: <strong><?= $order['costumer_name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Produk: <strong><?= $order['name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Jumlah: <strong><?= $order['qty'] ?> Set</strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Estimasi Selesai: <strong> <?= $order['estimate_complete'] ?> Menit</strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Keterangan: <strong><?= $order['detail_description'] ?></strong>
                                        </p>
                                    <?php else : ?>
                                        <p class="my-2 fs-4"><strong><?= $order['description'] . " Ke " . $order['division'] . ' (' . $order['staff_name'] .  ') ' ?></strong></p>
                                        <p class="mb-0 text-muted">
                                            Kode Pesanan: <strong><?= $order['code'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Nama Pemesan: <strong><?= $order['costumer_name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Produk: <strong><?= $order['name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Jumlah: <strong><?= $order['qty'] ?> Set</strong>
                                        </p>
                                        <?php if ($order['division'] == 'Admin') : ?>
                                            <p class="mb-0 text-muted">
                                                Estimasi Selesai: <strong> <?= $data['orders'][0]['estimate_complete'] ?> Menit</strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Process: <strong><?= $order['process'] ?></strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Keterangan: <strong><?= $order['note'] ?></strong>
                                            </p>
                                        <?php else : ?>
                                            <p class="mb-0 text-muted">
                                                Estimasi Selesai: <strong> <?= $order['estimate_complete'] ?> Menit</strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Process: <strong><?= $order['process'] ?></strong>
                                            </p>
                                        <?php endif ?>
                                    <?php endif ?>
                                <?php } else if ($order['status_order'] == 'completed') {?>
                                    <?php if ($key == array_key_first($data['orders'])) { ?>
                                        <p class="my-2 fs-4"><strong><?= $order['description'] . " Oleh " . $order['division'] . ' (' . $order['staff_name'] . ')' ?></strong></p>
                                        <p class="mb-0 text-muted">
                                        Kode Pesanan: <strong><?= $order['code'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Nama Pemesan: <strong><?= $order['costumer_name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Produk: <strong><?= $order['name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Jumlah: <strong><?= $order['qty'] ?> Set</strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Estimasi Selesai: <strong> <?= $order['estimate_complete'] ?> Menit</strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Keterangan: <strong><?= $order['detail_description'] ?></strong>
                                        </p>
                                    <?php } else if ($key == array_key_last($data['orders'])) { ?>
                                        <p class="my-2 fs-4"><strong><?= $order['description'] ?></strong></p>
                                        <p class="mb-0 text-muted">
                                            Kode Pesanan: <strong><?= $order['code'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Nama Pemesan: <strong><?= $order['costumer_name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Produk: <strong><?= $order['name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Jumlah: <strong><?= $order['qty'] ?> Set</strong>
                                        </p>
                                    <?php } else { ?>
                                        <p class="my-2 fs-4"><strong><?= $order['description'] . " Ke " . $order['division'] . ' (' . $order['staff_name'] .  ') ' ?></strong></p>
                                        <p class="mb-0 text-muted">
                                            Kode Pesanan: <strong><?= $order['code'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Nama Pemesan: <strong><?= $order['costumer_name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Produk: <strong><?= $order['name'] ?></strong>
                                        </p>
                                        <p class="mb-0 text-muted">
                                            Jumlah: <strong><?= $order['qty'] ?> Set</strong>
                                        </p>
                                        <?php if ($order['division'] == 'Admin') : ?>
                                            <p class="mb-0 text-muted">
                                                Estimasi Selesai: <strong> <?= $data['orders'][0]['estimate_complete'] ?> Menit</strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Process: <strong><?= $order['process'] ?></strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Keterangan: <strong><?= $order['note'] ?></strong>
                                            </p>
                                        <?php else : ?>
                                            <p class="mb-0 text-muted">
                                                Estimasi Selesai: <strong> <?= $order['estimate_complete'] ?> Menit</strong>
                                            </p>
                                            <p class="mb-0 text-muted">
                                                Process: <strong><?= $order['process'] ?></strong>
                                            </p>
                                        <?php endif ?>
                                    <?php } ?>
                                <?php } ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>