<nav class="navbar navbar-expand navbar-light navbar-bg">
	<a class="sidebar-toggle">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" id="notification-icon" data-feather="bell"></i>
                        <span class="indicator" id="notification_counter"></span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" style="height: auto;max-height: 400px; overflow-x: hidden;" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            <span id="counter"></span> notifikasi
                        </div>
                    </div>
                    <div class="list-group">
                        <?php if ($_SESSION['notifications'] != []) : ?>
                            <?php foreach ($_SESSION['notifications'] as $notification) : ?>
                                <?php if ($notification['status'] == 'initial') { ?>
                                    <div class="list-group-item notification cursor-pointer" id="notification" data-id="<?= $notification['id'] ?>">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="<?= getNotificationImage($notification['division']) ?>" class="img-fluid" width="60" alt="<?= $notification['division'] ?>">
                                            <div class="text-dark">Pesanan baru <a href=""><?= $notification['code']; ?></a>  <?= $notification['message'] ?> Oleh <?= $notification['name']; ?></div>
                                        </div>
                                    </div>
                                <?php } else if ($notification['status'] == 'process') { ?>
                                    <div class="list-group-item notification cursor-pointer" id="notification" data-id="<?= $notification['id'] ?>">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="<?= getNotificationImage($notification['division']) ?>" class="img-fluid" width="60" alt="<?= $notification['division'] ?>">
                                            <div class="text-dark">Pesanan <a href=""><?= $notification['code']; ?></a> <?= $notification['message']; ?> <?= divisionProcess($notification['division']) ?> Oleh <?= $notification['name']; ?> </div>
                                        </div>
                                    </div>
                                <?php } else if ($notification['status'] == 'complete') { ?>
                                    <div class="list-group-item notification cursor-pointer" id="notification" data-id="<?= $notification['id'] ?>">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="<?= asset('img/assets/Finish Button Dark.png') ?>" class="img-fluid" width="60" alt="<?= $notification['division'] ?>">
                                            <div class="text-dark">Pesanan <a href=""><?= $notification['code']; ?></a> <?= $notification['message']; ?> Oleh <?= $notification['name']; ?> </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach ?>
                        <?php endif; ?>
                    </div>
                </div>
            </li>
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>
                
				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
					<span class="text-dark"><?= $_SESSION['name'] ?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-end">
					<a class="dropdown-item" href="<?= routeDivision($_SESSION['division'], 'setting') ?>"><i class="align-middle me-1"
							data-feather="settings"></i>Settings</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="<?= route('login/logout') ?>"
						onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
							class="align-middle me-1" data-feather="power"></i>Logout</a>
					<form action="<?= route('login/logout') ?>" id="logout-form" method="POST" class="d-none">
					</form>
				</div>
			</li>
		</ul>
	</div>
</nav>
