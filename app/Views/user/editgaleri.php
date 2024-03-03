<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>


<?php

use App\Models\AuthModel;

$AuthModel = new AuthModel();

?>

<body>
    <div class="container background">
        <d iv class="row">
            <div class="col-foto mt-3">
                <div class="casing-foto mx-auto">
                    <img src="/foto_storage/<?= $foto['lokasi_file'] ?>" class="fotonya" alt="...">
                </div>
            </div>
            <div class="col">
                <div class="row mt-5">
                    <div class="col-pp">
                        <img src="/foto_storage/<?= $uploader['foto']; ?>" alt="" class="user-uploader d-flex justify-content-center">
                    </div>
                    <div class="col-uploader">
                        <?php if ($uploader['id_user'] == $user['id_user']) : ?>
                            <h5 class="username-uploader text-white">
                                @<?= $uploader['username']; ?> <span class="creator" style="color: skyblue;">CREATOR</span>
                            </h5>
                        <?php else : ?>
                            <h5 class="username-uploader text-white">
                                @<?= $uploader['username']; ?>
                            </h5>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="container mt-5">
                <!-- button pilih foto -->
                <form action="/galeri/update/<?= $foto['id_foto']; ?>" method="post" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <div class="col-12">
                            <label for="title" class="form-label text-white">Pilih Foto</label>
                            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImg()" hidden>
                            <button type="button" class="button-file" onclick="document.getElementById('foto').click()">Pilih Foto</button>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12">
                            <label for="title" class="form-label text-white">Judul Foto</label>
                            <input type="text" name="title" class="form-control" value="<?= $foto['judul_foto']; ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="title" class="form-label text-white">Deskripsi Foto</label>
                            <input type="text" name="desk" class="form-control" value="<?= $foto['deskripsi_foto']; ?>" required>
                        </div>  
                    </div>
                 
                    <!-- button submit -->
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="submit-create mb-5 mt-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </d>
    </div>


</body>


<?= $this->endSection(); ?>