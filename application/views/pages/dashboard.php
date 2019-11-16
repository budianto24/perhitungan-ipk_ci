<div class="container">
    <div class="row">
      <div class="col">
        <?= $this->session->flashdata('flash')?>
      </div>
    </div>

    <div class="row mt-4">

    <div class="col-md-3">
      <a href="<?= base_url()?>mahasiswa">
        <div class="card-counter primary">
          <i class="fas fa-users"></i>
          <span class="count-numbers"><?= $data['mahasiswa']['total']?></span>
          <span class="count-name">Mahasiswa</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>matakuliah">
        <div class="card-counter danger">
          <i class="fas fa-book-open"></i>
          <span class="count-numbers"><?= $data['matkul']['total']?></span>
          <span class="count-name">Mata Kuliah</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>fakultas">
        <div class="card-counter success">
          <i class="fas fa-book"></i>
          <span class="count-numbers"><?= $data['fakultas']['total']?></span>
          <span class="count-name">Fakultas</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="<?= base_url()?>prodi">
        <div class="card-counter info">
          <i class="fas fa-book"></i>
          <span class="count-numbers"><?= $data['prodi']['total']?></span>
          <span class="count-name">Program Studi</span>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-5">
    <div class="col-md-6">
      <div class="card card-shadow">
        <div class="card-header">
         <span class="fa fa-chart-pie"></span> Grafik Mahasiswa Per Fakultas
        </div>
        <div class="card-body">
          <?php $this->load->view('charts/pie')?>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card card-shadow">
        <div class="card-header">
          <span class="fa fa-chart-bar"></span> Grafik Mahasiswa Per Fakultas
        </div>
        <div class="card-body">
          <?php $this->load->view('charts/bars')?>
        </div>
      </div>
    </div>
  </div>
</div>