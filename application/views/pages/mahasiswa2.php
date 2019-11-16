<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item active">Mahasiswa</li>
		</ol>
	</nav>

	<div class="row mb-4">
		<div class="col-md-12">
			<div class="btn-group" role="group">
			  <a href="<?= base_url()?>mahasiswa" class="btn btn-outline-dark"><span class="fas fa-th-list"></span></a>
			  <a href="<?= base_url()?>mahasiswa/grid" class="btn btn-outline-dark active"><span class="fas fa-th"></span></a>
			</div>

			<div class="float-right">
				<a href="<?= base_url()?>mahasiswa/tambah" class="btn btn-primary float-right mb-1">Tambah Mahasiswa</a>				
			</div>
			
		</div>
	</div>
	
	<p class="text-center">Total Mahasiswa: <b><?= count($mahasiswa)?></b></p>
	<div class="row">
		<?php foreach ($mahasiswa as $data) :?>
			<div class="col-sm-3 col-md-3">
				<div class="card mb-4 text-center">
					<div class="text-center">
						<img src="<?= base_url();?>assets/img/mahasiswa/<?= $data['gambar']?>" class="mt-3" style="width:150px;">
					</div>
					<div class="card-body">
						<h5 class="card-title">
							<?= $data['nama'];?><br>
							<small class="card-text">
								NIM: <?= $data['nim']?> / <?php if ($data['jenis_kelamin'] == 'Laki-Laki'){echo "L";}else{echo "P";}?><br>
								<?= str_replace('Fakultas Teknik Komunikasi dan Infromatika', 'FTKI' ,$data['nama_fakultas'])?><br>
								<?= $data['nama_prodi']?>
							</small>
						</h5>
						<a href="<?= base_url();?>mahasiswa/detail/<?= $data['nim']?>" class="btn btn-primary btn-sm">Lihat Nilai</a>
						<a href="<?= base_url();?>mahasiswa/edit/<?= $data['nim']?>" class="btn btn-warning btn-sm">Edit</a>
						<a href="<?= base_url();?>mahasiswa/delete/<?= $data['nim']?>" class="btn btn-danger btn-sm">Delete</a>
					</div>
				</div>
			</div>
	    <?php endforeach; ?>
	</div>
</div>