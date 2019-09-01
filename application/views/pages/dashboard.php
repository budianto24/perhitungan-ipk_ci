<div class="container">
    <div class="row">
      <div class="col">
        <?= $this->session->flashdata('flash')?>
      </div>
    </div>

    <div class="row mt-5">

    <div class="col-md-3">
      <a href="<?= base_url()?>mahasiswa">
        <div class="card-counter primary">
          <i class="fas fa-users"></i>
          <span class="count-numbers"><?= count($mahasiswa)?></span>
          <span class="count-name">Mahasiswa</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>matakuliah">
        <div class="card-counter danger">
          <i class="fas fa-book-open"></i>
          <span class="count-numbers"><?= count($matakuliah)?></span>
          <span class="count-name">Mata Kuliah</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>fakultas">
        <div class="card-counter success">
          <i class="fas fa-book"></i>
          <span class="count-numbers"><?= count($fakultas)?></span>
          <span class="count-name">Fakultas</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>prodi">
        <div class="card-counter info">
          <i class="fas fa-book"></i>
          <span class="count-numbers"><?= count($prodi)?></span>
          <span class="count-name">Program Studi</span>
        </div>
      </a>
    </div>
  </div>
</div>