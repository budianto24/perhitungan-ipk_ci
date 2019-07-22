<div class="container">
		<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		<strong>Selamat Datang!</strong> Ini adalah aplikasi sederhana untuk mengelolah Data Nilai Mahasiswa.
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="btn-group" role="group" aria-label="...">
			  <a href="<?= base_url()?>dashboard" class="btn btn-default"><span class="glyphicon glyphicon-th-list"></span></a>
			  <a href="<?= base_url()?>dashboard/grid" class="btn btn-default"><span class="glyphicon glyphicon-th"></span></a>
			</div>
		</div>
	</div><br>
	<div class="row">
		<?php foreach ($mahasiswa as $data) :?>
			 <div class="col-sm-3 col-md-3">
			    <div class="thumbnail">
			      <img src="<?= base_url()?>assets/img/mahasiswa/<?= $data['gambar']?>" class="img-thumbnail" width="150px">
			      <div class="caption">
			        <h3><?= $data['nama']?></h3>
			        <p>NIM: <?= $data['nim']?></p>
			        <p class="text-center">
			        	<a href="<?= base_url()?>mahasiswa/detail/<?= $data['nim']?>" class="btn btn-primary" role="button">Lihat Nilai</a> 
			        	<a href="<?= base_url()?>mahasiswa/edit_mahasiswa/<?= $data['nim']?>" class="btn btn-warning" role="button">Edit</a> 
			        	<a href="<?= base_url()?>mahasiswa/delete_mahasiswa/<?= $data['nim']?>" class="btn btn-danger" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Hapus</a></p>
			      </div>
			    </div>
			  </div>
	    <?php endforeach; ?>
	</div>
</div>