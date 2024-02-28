<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>


<?php

use App\Models\AuthModel;

$AuthModel = new AuthModel();

?>

<body>
    <div class="container background">
        <d iv class="row">
            <div class="col-info">
                
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
                    <div class="row mt-3">
                        <div class="container text-white">
                            <h1><?= $foto['judul_foto'] ?></h1>
                            <p><?= $foto['deskripsi_foto'] ?></p>
                        </div>
                    </div>
                </div>
                

                <div class="row mb-5">
                    <div class="col-12 scrolling">
                        <?php foreach ($komen as $k) : ?>
                            <?php $user = $AuthModel->where('id_user', $k['id_user'])->first(); ?>
                            <div class="container mt-2">
                                <div class="row">
                                  
                                    <div class="col-komentar webe">
                                        <?php if ($k['id_user'] == $foto['id_user']) : ?>
                                            <button class="uhah" onclick="redirectToPage('/profile/<?= $user['username']; ?>')">
                                                <h5 class="username-uploader text-white webe">
                                                    @<?= $user['username']; ?> <span class="creator">CREATOR</span> :
                                                </h5>
                                            </button>
                                        <?php else : ?>
                                            <button class="uhah" onclick="redirectToPage('/profile/<?= $user['username']; ?>')">
                                                <h5 class="username-uploader text-white webe">
                                                    @<?= $user['username']; ?> :
                                                </h5>
                                            </button>
                                        <?php endif; ?>
                                        <h5 class="text-white webe">
                                            <?= $k['isi_komentar']; ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="container mt-3">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="text-white">BERIKAN KOMENTAR</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form action="/komen/save/<?= $foto['id_foto']; ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Tulis Komentar" aria-label="Recipient's username" aria-describedby="button-addon2" name="isi_komentar">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </d>
    </div>


</body>


<?= $this->endSection(); ?>