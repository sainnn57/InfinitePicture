<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>


<body>

  <div class="container text-center mt-5">
    <div class="row">
      <div class="col-12 d-flex justify-content-center">
        <img src="<?= 'foto_storage/' . $user['foto'] ?>" alt="" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
      </div>
    </div>
    <div class="row mt-2 d-flex justify-content-center text-center">
      <div class="row d-flex justify-content-center text-center">
        <h1 class="profile-username text-black"><?= $user['nama_lengkap'] ?></h1>
      </div>
      <div class="row d-flex justify-content-center text-center">
        <p class="profile-username text-black ">@<?= $user['username'] ?></p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md d-flex justify-content-center">
        <button class="profile-batten-1 ms-2 me-2" type="button" onclick="redirectToPage('/editprofile')">Edit Profile</button>
        <button class="profile-batten-1 me-2" type="button" onclick="redirectToPage('/logout')">Logout</button>
        <button class="profile-batten-1" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Album</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md d-flex justify-content-center">
        <button class="profile-batten-2 active-2" type="button" onclick="redirectToPage('/profile')">Album</button>
        <button class="profile-batten-2 ms-2 me-2" type="button" onclick="redirectToPage('/profilelike')">Liked</button>
        <button class="profile-batten-2" type="button" onclick="redirectToPage('/profilepost')">MyPost</button>
      </div>
    </div>
  </div>

  <div class="gallery-container">
    <?php foreach ($post as $p) : ?>
      <div class="gallery-item" onclick="redirectToPage('/galeri/<?= htmlspecialchars($p['id_foto'], ENT_QUOTES, 'UTF-8') ?>')">
        <img src="/foto_storage/<?= $p['lokasi_file'] ?>">
      </div>
    <?php endforeach; ?>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background: #07161b;">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Album</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/album/save" method="post" enctype="multipart/form-data">
          <div class="modal-body text-white">
            <div class="mb-3">
              <label for="title" class="form-label text-white">Nama Album</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Album Anda" required>
            </div>
            <div class="mb-3">
              <label for="desk" class="form-label text-white">Deskripsi Album</label>
              <textarea class="form-control" id="desk" name="desk" rows="3" placeholder="Deskripsi Album Anda" required></textarea>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label text-white">Cover Album</label>
              <input type="file" name="foto" id="foto" class="form-control">
            </div>
            <div class="mb-3 mx-auto d-flex justify-content-center">
              <div id="image-preview" class="mx-auto d-flex justify-content-center">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const dropArea = document.getElementById("drop-area");
    const chooseFile = document.getElementById("foto");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function() {
      getImgData();
    });

    function getImgData() {
      const files = chooseFile.files[0];
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function() {
          imgPreview.style.display = "block";
          imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });
      }
    }

    dropArea.addEventListener("dragover", function(e) {
      e.preventDefault();
    });
    dropArea.addEventListener("drop", function(e) {
      e.preventDefault();
      chooseFile.files = e.dataTransfer.files;
      getImgData();
    });
  </script>


  <script src="js/onclick.js"></script>
</body>


<?= $this->endSection(); ?>