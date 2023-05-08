<div class="container-fluid p-0">
    <h1 class="mb-3">Dashboard</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <div class="row position-relative">
        <?php foreach($data['orders'] as $order) : ?>
            <?php if ($order['status'] == 'processing') { ?>
                <div class="col-12 col-md-3">
                    <div class="card bg-danger bg-opacity-75 text-dark" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <h3 class="text-dark"><?= $order['name']; ?></h3>
                            <img src="<?= imageIcon($order['order_file']) ?>" class="mt-3" width="100" alt="order">
                            <p><a href="<?= route('admin/orders/edit/', $order['code']) ?>" class="stretched-link text-dark text-decoration-none"><?= $order['order_file']; ?></a></p>
                            <p class="mb-0 fs-4">Waktu Pemesanan:</p>
                            <p class="mb-0 fs-4"><?= date('Y/m/d H:i', strtotime($order['created_at'])); ?> WIB</p>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-12 col-md-3">
                    <div class="card bg-warning bg-opacity-50 text-dark" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <h3 class="text-dark"><?= $order['name']; ?></h3>
                            <img src="<?= imageIcon($order['order_file']) ?>" class="mt-3" width="100" alt="order">
                            <p><a href="<?= route('admin/orders/edit/', $order['code']) ?>" class="stretched-link text-dark text-decoration-none"><?= $order['order_file']; ?></a></p>
                            <p class="mb-0 fs-4">Waktu Pemesanan:</p>
                            <p class="mb-0 fs-4"><?= date('Y/m/d H:i', strtotime($order['created_at'])); ?> WIB</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php endforeach ?>
    </div>
</div>