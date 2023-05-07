<div class="main d-flex justify-content-center w-100">
  <main class="content d-flex p-0">
    <div class="container d-flex flex-column">
      <div class="row h-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">
            <?php Flasher::flash() ?>
            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <div class="text-center mt-3 mb-3">
                    <a href="<?= route('home') ?>">
                        <img src="<?= asset('img/assets/logo-lg.png') ?>" class="img-fluid" width="200" alt="Logo Central Acrylic">
                    </a>
                  </div>
                    <form action="<?= route('staffs/login/process') ?>" method="POST">
                        <div class="mb-3">
                            <label for="staff_ID">ID</label>
                            <input type="text" name="staff_ID" value="<?= isset($_COOKIE['staff_ID']) ? $_COOKIE['staff_ID'] : '' ?>" id="staff_ID" class="form-control" placeholder="Silahkan masukkan ID" autocomplete="current-staff-id" autofocus required>
                        </div>

                        <div class="mb-3">
                            <label for="staff_ID">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Silahkan masukkan password" autocomplete="current-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="division">Staff</label>
                            <select name="division" class="form-control" id="division" required>
                                <option>Silahkan pilih</option>
                                <?php foreach($data['divisions'] as $division): ?>
                                    <option value="<?= $division['name'] ?>" <?= (isset($_COOKIE['division']) && ($_COOKIE['division'] == $division['name'])) ? 'selected' : '' ?> ><?= $division['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember_me" value="" id="remember_me">
                            <label class="form-check-label" for="remember_me">
                                Remember Me
                            </label>
                        </div>
                        
                        <div class="my-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
