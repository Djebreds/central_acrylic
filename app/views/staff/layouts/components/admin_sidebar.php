<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <div class="sidebar-brand">
            <img src="<?= asset('img/assets/logo-light.png') ?>" width="210" alt="logo">
        </div>
        <div class="sidebar-brand p-0" style="background-color: #151924;">
            <img src="<?= getImageStaff($_SESSION['division']) ?>" class="my-3" alt="<?= $_SESSION['division'] ?>" width="120">
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Dashboard</li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= activeLink('admin/index') ? 'link-active' : '' ?>" href="<?= route('admin/index') ?>">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-header">Data</li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= activeLink('admin/orders') ? 'link-active' : '' ?>" href="<?= route('admin/orders/index') ?>">
                    <i class="align-middle" data-feather="shopping-cart"></i> 
                    <span class="align-middle">Orders</span>
                    <span class="badge badge-sidebar-primary bg-danger"><?= $_SESSION['orders_count']; ?></span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= activeLink('admin/finish') ? 'link-active' : '' ?>" href="<?= route('admin/finish/index') ?>">
                    <i class="align-middle" data-feather="check-circle"></i> 
                    <span class="align-middle">Finish</span>
                    <span class="badge badge-sidebar-primary bg-danger"><?= $_SESSION['finish_count']; ?></span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= activeLink('admin/products') ? 'link-active' : '' ?>" href="<?= route('admin/products/index') ?>">
                    <i class="align-middle" data-feather="package"></i> 
                    <span class="align-middle">Products</span>
                    <span class="badge badge-sidebar-primary bg-danger"><?= $_SESSION['products_count']; ?></span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link <?= activeLink('admin/users') ? 'link-active' : '' ?>" href="<?= route('admin/users/index') ?>">
                    <i class="align-middle" data-feather="users"></i> 
                    <span class="align-middle">Staff</span>
                    <span class="badge badge-sidebar-primary bg-danger"><?= $_SESSION['users_count']; ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>