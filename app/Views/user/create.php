<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>

<body>

    <section id="pengaduan" class="d-flex align-items-center">
        <div class="container mt-4">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="/create/save" enctype="multipart/form-data">
                        <h3>Tambahkan Foto</h3>
                        <br>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                            <input autocomplete="off" type="text" name="judul_foto" id="judul_foto" class="form-control" placeholder="Ketik Judul Foto Anda" style="font-size: 15px">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                            <!-- <input type="textarea" name="isi_deskripsi" id="isi_deskripsi" class="form-control" placeholder="Ketik Deskripsi Anda" style="font-size: 15px"> -->
                            <textarea name="desk" class="form-control" id="" cols="100" rows="5"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Pilih Kategori</label>
                            <select class="form-control" aria-label="Default select example">
                                <option selected>Kategori</option>
                                <option value="1">Kebudayaan</option>
                                <option value="2">Pemandangan</option>
                                <option value="3">Hewan</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputPassword1" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <!-- <input type="text"> -->
                        </div>
                        <div class="d-flex justify-content-end form-check">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>

    <script src="js/onclick.js"></script>
    <script src="https://kit.fontawesome.com/a3864c1aa4.js" crossorigin="anonymous"></script>
</body>

<?= $this->endSection(); ?>