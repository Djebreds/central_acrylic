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
                    <form action="<?= route('costumer/search') ?>" method="POST">
                        <div class="mb-3">
                            <label for="product_code">No Pesanan</label>
                            <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Masukan nomor pesanan" autofocus required>
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
