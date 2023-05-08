<div class="container-fluid">
    <h1 class="mb-3">Order</h1>
    <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="<?= route('cashier/orders/create') ?>" method="POST" enctype="multipart/form-data" id="file_upload">
                    <div class="mb-3">
                        <label for="costumer_name">Nama Pemesan</label>
                        <input type="text" name="costumer_name" placeholder="Masukkan nama pemesan" class="form-control" id="costumer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="product">Produk</label>
                        <select name="product" class="form-control select2" id="product" required>
                            <option></option>
                            <?php foreach($data['products'] as $product) : ?>
                                <option value="<?= $product['id'] ?>"><?= "{$product['name']} ({$product['code']})" ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="machine_process">Proses Mesin</label>
                        <select name="machine_process[]" class="form-control select2" id="machine_process" multiple="multiple" data-allow-clear="1" required>
                            <?php foreach($data['machine_process'] as $process) : ?>
                                <option value="<?= $process['id'] ?>"><?= "{$process['name']} ({$process['code']})" ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty">Jumlah</label>
                        <input type="text" class="form-control" data-mask="###" maxlength="3" id="qty" name="qty" placeholder="Masukkan jumlah" required>
                    </div>
                    <div class="mb-3">
                        <label for="file">Upload File</label>
                        <input type="file" class="form-control opacity-0" name="file" id="file" multiple="false" required>
                        <div class="d-grid justify-content-center justify-content-md-start gap-3 d-md-flex">
                            <div class="card bg-light mb-0" onclick="upload()" id="upload-button" style="width: 10rem; cursor: pointer;">
                                <div class="card-body text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="file-info ms-4 d-grid justify-content-center justify-content-md-start d-md-flex align-items-center">
                                <div id="file-icon"></div>
                                <span class="mx-2" id="file-name"></span>
                            </div>
                        </div>
                    </div>
                    <?php imageIcon('dadang.jbr') ?>
                    <div class="mb-3">
                        <label for="description">Keterangan</label>
                        <textarea name="description" id="description" cols="20" rows="7" class="form-control" placeholder="Masukkan keterangan" required></textarea>
                    </div>
                    <hr>
                    <div class="text-end">
                        <button type="reset" onclick="resetImage()" class="btn btn-danger">Clear</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const inputFile = document.getElementById('file');
    const uploadButton = document.getElementById('upload_button');
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