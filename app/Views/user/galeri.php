<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>


<?php

use App\Models\AuthModel;

$AuthModel = new AuthModel();

?>

<body>
    <div class="container background">
        <div class="row">
            <div class="col-foto">
                <div class="casing-foto mx-auto">
                    <img src="/foto_storage/<?= $foto['lokasi_file'] ?>" class="fotonya" alt="...">
                </div>
            </div>
            <div class="col-info">
                <div class="row mt-3">
                    <div class="col-icon">
                        <?php if ($liked) : ?>
                            <form action="/galeri/unlike/<?= $foto['id_foto']; ?>" method="post">
                                <button class="fa-solid fa-heart fa-2xl uhah" style="color: red;"></button>
                                <p class="text-white mt-3"><?= $jumlahLike; ?> Like</p>
                            </form>
                        <?php else : ?>
                            <form action="/galeri/like/<?= $foto['id_foto']; ?>" method="post">
                                <button class="fa-solid fa-heart fa-2xl uhah" style="color: #ffffff;"></button>
                            </form>
                            <p class="text-white mt-3"><?= $jumlahLike; ?> Like</p>
                        <?php endif; ?>
                    </div>
                    <div class="col-icon">
                        <form action="/galeri/download/<?= $foto['id_foto']; ?>" method="post">
                            <button class="fa-solid fa-circle-down fa-2xl uhah" style="color: #ffffff;"></button>
                        </form>
                    </div>
                    <div class="col-icon">
                        <div class="col-icon">
                            <?php if ($ses == $foto['id_user']) : ?>
                                <button class="fa-solid fa-bookmark fa-2xl uhah" style="color: #ffffff;" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-icon ms-auto">
                        <div class="col-icon">
                            <?php if ($ses == $foto['id_user']) : ?>
                                <form action="/galeri/edit/<?= $foto['id_foto']; ?>" method="post">
                                    <button class="fa-solid fa-pen fa-2xl uhah" style="color: #ffffff;"></button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-icon">
                        <div class="col-icon">
                            <?php if ($ses == $foto['id_user']) : ?>
                                <form action="/galeri/delete/<?= $foto['id_foto']; ?>" method="post">
                                    <button class="fa-solid fa-trash fa-2xl uhah" style="color: #ffffff;" onclick="deleteItem()"></button>
                                    <script>
                                        function deleteItem() {
                                            // alert untuk konfirmasi delete dengan tombol OK dan Cancel
                                            var confirmDelete = confirm('Are you sure you want to delete this item?');
                                            if (confirmDelete) {
                                                alert('Item deleted!');
                                            }
                                        }
                                    </script>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
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
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #07161b;">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Album</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                <form action="/album/saveto/<?= $foto['id_foto']; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="saveto" class="form-label text-white">Tambahkan Ke Album</label>
                        <select class="form-select" aria-label="Default select example" id="saveto" name="saveto">
                            <option selected disabled>Pilih Album :</option>
                            <?php foreach ($albumAdd as $a) : ?>
                                <option value="<?= $a['id_album']; ?>"><?= $a['nama_album']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="submit-create mb-3">Submit</button>
                </form>
            </div>
            <div class="modal-body text-white">
            <form action="/album/delfrom/<?= $foto['id_foto']; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="delfrom" class="form-label text-white">Hapus Dari Album</label>
                        <select class="form-select" aria-label="Default select example" id="delfrom" name="delfrom">
                            <option selected disabled>Pilih Album :</option>
                            <?php foreach ($albumDel as $d) : ?>
                                <option value="<?= $d['id_album']; ?>"><?= $d['nama_album']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="submit-create mb-3">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


</body>


<?= $this->endSection(); ?>