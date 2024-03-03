<?= $this->extend('layout/user'); ?>
<?= $this->section('body'); ?>

<body>

  <div class="gallery-container">
    <?php foreach ($foto as $foto) : ?>
      <div class="gallery-item" onclick="redirectToPage('/galeri/<?= htmlspecialchars($foto['id_foto'], ENT_QUOTES, 'UTF-8') ?>')">
        <img src="/foto_storage/<?= $foto['lokasi_file'] ?>">
      </div>
    <?php endforeach; ?>
  </div>



  <script src="/js/onclick.js"></script>
  <script src="https://kit.fontawesome.com/a3864c1aa4.js" crossorigin="anonymous"></script>
</body>

<?= $this->endSection(); ?>