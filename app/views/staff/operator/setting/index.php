<div class="container-fluid p-0">
    <h1 class="mb-3">Setting</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Setting</li>
        </ol>
    </nav>
    <div class="row position-relative">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= route('operator/updatePassword') ?>" method="POST" >
                        <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                        <div class="mb-3">
                            <label for="password">New Password</label>
                            <input type="password" name="new_password" class="form-control <?= isset($_SESSION['error_new_password']) ? 'is-invalid' : '' ?>" id="password" placeholder="Masukkan password baru">
                            <div class="invalid-feedback">
                                <?= $_SESSION['error_new_password'] ?>
                                <?php unset($_SESSION['error_new_password']); ?>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Masukkan konfirmasi password">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>