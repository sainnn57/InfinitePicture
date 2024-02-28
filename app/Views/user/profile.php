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
        <button class="profile-batten-1" type="button" onclick="redirectToPage('/logout')">Logout</button>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md d-flex justify-content-center">
        <button class="profile-batten-2 active-2" type="button" onclick="redirectToPage('/')">Album</button>
        <button class="profile-batten-2 ms-2 me-2" type="button" onclick="redirectToPage('/')">Liked</button>
        <button class="profile-batten-2" type="button" onclick="redirectToPage('/')">MyPost</button>
      </div>
    </div>
  </div>


  <script src="js/onclick.js"></script>
</body>


<?= $this->endSection(); ?>