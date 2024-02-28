<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>


<body>

    <div class="container mt-5">
        <form action="/editprofile/save" class="signup-form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" aria-describedby="nama_lengkap" value="<?= $user['nama_lengkap'] ?>">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="username" value="<?= $user['username'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="email" value="<?= $user['email'] ?>">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="alamat" value="<?= $user['alamat'] ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="foto">
            </div>
            <button type="submit" class="batten-submit mt-3">Submit</button>
        </form>
    </div>

    <script src="js/onclick.js"></script>
</body>

<?= $this->endSection(); ?>