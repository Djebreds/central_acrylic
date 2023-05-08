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
            <?php if ($data['orders']['status'] == 'initial') { ?>
                <form action="<?= route('admin/orders/update') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
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
                                        <h4 class="mb-5"><?= $data['orders']['description']; ?></h4>
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
                                <dt class="col-sm-12"><h4 class="text-muted">Design & Edited File:</h4></dt>
                                <dd class="col-sm-9 text-center m-5">
                                    <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
                                    <input type="hidden" name="code" value="<?= $data['orders']['order_code'] ?>">
                                    <input type="file" class="form-control opacity-0" name="file" id="file" multiple="false">
                                    <input type="hidden" name="process_names" value="<?= $data['orders']['process_names'] ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card bg-light mb-0 mx-auto" onclick="upload()" id="upload-button" style="width: 10rem; cursor: pointer;">
                                                <div class="card-body text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <?php if (isset($_SESSION['file_error'])) : ?>
                                                <div class="text-danger">   
                                                    <?= $_SESSION['file_error']; ?>
                                                </div>
                                                <?php unset($_SESSION['file_error']) ?>
                                            <?php endif ?>
                                        </div>
                                        <div class="col">
                                            <div class="file-info ms-4 align-items-center">
                                                <div id="file-icon"></div>
                                                <span class="mx-2" id="file-name"></span>
                                            </div>
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                    <div class="my-4">
                        <label for="note" class="fs-4">Keterangan:</label>
                        <textarea name="note" class="form-control" id="note" cols="30" rows="5" placeholder="Masukkan keterangan"></textarea>
                    </div>
                    <div class="text-end">
                        <a href="<?= route('admin/orders/delete/', $data['orders']['id']) ?>" onclick="return confirm('Yakin akan menghapus order ini?')" class="btn btn-danger fs-4">Hapus</a>
                        <button type="submit" class="btn btn-success fs-4 ms-2" onclick="return confirm('Simpan order ini?')">Save</button>
                    </div>
                </form>
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
                <div class="text-end mt-4">
                    <a href="<?= route('admin/orders/delete/', $data['orders']['id']) ?>" onclick="return confirm('Yakin akan menghapus order ini?')" class="btn btn-danger fs-4">Hapus</a>        
                </div>
            <?php } ?>
        </div>    
    </div>

    <div class="d-block d-md-none">
        <div class="row postition-relative g-0">
            <?php if ($data['orders']['design_file'] == '' && $data['orders']['status'] == 'initial') { ?>
                <form action="<?= route('admin/orders/update') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_order_detail" value="<?= $data['orders']['id_order_detail'] ?>">
                    <input type="hidden" name="id" value="<?= $data['orders']['id'] ?>">
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
                            <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
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
                            <input type="hidden" name="code" value="<?= $data['orders']['order_code'] ?>">
                            <input type="file" class="form-control opacity-0" name="file" id="file-mb" multiple="false">
                            <input type="hidden" name="process_names" value="<?= $data['orders']['process_names'] ?>">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card bg-light mb-0 mx-auto" onclick="uploadMB()" id="upload-button-mb" style="width: 10rem; cursor: pointer;">
                                        <div class="card-body text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['file_error'])) : ?>
                                        <div class="text-danger">   
                                            <?= $_SESSION['file_error']; ?>
                                        </div>
                                        <?php unset($_SESSION['file_error']) ?>
                                    <?php endif ?>
                                </div>
                                <div class="col-12">
                                    <div class="file-info-mb ms-4 text-center mt-4 align-items-center">
                                        <div id="file-icon-mb"></div>
                                        <span class="mx-2" id="file-name-mb"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="my-4">
                        <label for="note" class="fs-4">Keterangan:</label>
                        <textarea name="note" class="form-control" id="note" cols="30" rows="5" placeholder="Masukkan keterangan"></textarea>
                    </div>
                    <div class="text-end">
                        <a href="<?= route('admin/orders/delete/', $data['orders']['id']) ?>" onclick="return confirm('Yakin akan menghapus order ini?')" class="btn btn-danger fs-4">Hapus</a>
                        <button type="submit" class="btn btn-success fs-4 ms-2" onclick="return confirm('Simpan order ini?')">Save</button>
                    </div>
                </form>
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
                        <h4 class="mb-0"><?= $data['orders']['description']; ?></h4>
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
                    <a href="<?= route('admin/orders/delete/', $data['orders']['id']) ?>" onclick="return confirm('Yakin akan menghapus order ini?')" class="btn btn-danger fs-4">Hapus</a>        
                </div>
            <?php } ?>
        </div>
    </div>
</div>


    <script>
        const inputFile = document.getElementById('file');
        const uploadButton = document.getElementById('upload-button');
        const fileInfo = document.getElementById('file-info');
        const fileIcon = document.getElementById('file-icon');
        const fileName = document.getElementById('file-name');
        const reset = document.getElementById('reset');

        function upload() {
            inputFile.click();
        }

        inputFile.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const extension = file.name.split('.').pop();
        
            if (extension == 'doc' || extension == 'docx') {
                imageIcon = `<img src="<?= asset('img/assets/doc.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'jpg' || extension == 'jpeg') {
                imageIcon = `<img src="<?= asset('img/assets/jpg.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'pdf') {
                imageIcon = `<img src="<?= asset('img/assets/pdf-2.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'ps') {
                imageIcon = `<img src="<?= asset('img/assets/ps.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'psd') {
                imageIcon = `<img src="<?= asset('img/assets/psd.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'png') {
                imageIcon = `<img src="<?= asset('img/assets/png.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'cdr') {
                imageIcon = `<img src="<?= asset('img/assets/cdr.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == '3ds') {
                imageIcon = `<img src="<?= asset('img/assets/3ds.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'ai') {
                imageIcon = `<img src="<?= asset('img/assets/ai.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'cad') {
                imageIcon = `<img src="<?= asset('img/assets/cad.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'bmp') {
                imageIcon = `<img src="<?= asset('img/assets/bmp.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'eps') {
                imageIcon = `<img src="<?= asset('img/assets/eps.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'svg') {
                imageIcon = `<img src="<?= asset('img/assets/svg.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'tif') {
                imageIcon = `<img src="<?= asset('img/assets/tif.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else {
                imageIcon = `<img src="<?= asset('img/assets/file.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            }

            fileName.innerHTML = file.name.slice(0, 20) + '...';
            fileIcon.innerHTML = imageIcon;
            
        })

        function resetImage() {
            $('.file-info').find('img').remove();
            fileName.innerHTML = '';
        }
    </script>

    <script>
        const inputFileMB = document.getElementById('file-mb');
        const uploadButtonMB = document.getElementById('upload-button-mb');
        const fileInfoMB = document.getElementById('file-info-mb');
        const fileIconMB = document.getElementById('file-icon-mb');
        const fileNameMB = document.getElementById('file-name-mb');
        const resetMB = document.getElementById('reset-mb');

        function uploadMB() {
            inputFileMB.click();
        }

        inputFileMB.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const extension = file.name.split('.').pop();
        
            if (extension == 'doc' || extension == 'docx') {
                imageIcon = `<img src="<?= asset('img/assets/doc.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'jpg' || extension == 'jpeg') {
                imageIcon = `<img src="<?= asset('img/assets/jpg.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'pdf') {
                imageIcon = `<img src="<?= asset('img/assets/pdf-2.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'ps') {
                imageIcon = `<img src="<?= asset('img/assets/ps.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'psd') {
                imageIcon = `<img src="<?= asset('img/assets/psd.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'png') {
                imageIcon = `<img src="<?= asset('img/assets/png.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'cdr') {
                imageIcon = `<img src="<?= asset('img/assets/cdr.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == '3ds') {
                imageIcon = `<img src="<?= asset('img/assets/3ds.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'ai') {
                imageIcon = `<img src="<?= asset('img/assets/ai.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'cad') {
                imageIcon = `<img src="<?= asset('img/assets/cad.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'bmp') {
                imageIcon = `<img src="<?= asset('img/assets/bmp.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'eps') {
                imageIcon = `<img src="<?= asset('img/assets/eps.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'svg') {
                imageIcon = `<img src="<?= asset('img/assets/svg.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else if (extension == 'tif') {
                imageIcon = `<img src="<?= asset('img/assets/tif.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            } else {
                imageIcon = `<img src="<?= asset('img/assets/file.png') ?>" class="pdf-image" alt="PDF" width="100" >`
            }

            fileNameMB.innerHTML = file.name.slice(0, 20) + '...';
            fileIconMB.innerHTML = imageIcon;
            
        })

        function resetImage() {
            $('.file-info-mb').find('img').remove();
            fileNameMB.innerHTML = '';
        }
    </script>