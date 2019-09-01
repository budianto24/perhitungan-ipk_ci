<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item active">Mahasiswa</li>
		</ol>
	</nav>

	<?= $this->session->flashdata('flash')?>

	<div class="row mb-4">
		<div class="col-md-12">
			<div class="btn-group" role="group">
			  <a href="<?= base_url()?>mahasiswa" class="btn btn-outline-dark active"><span class="fas fa-th-list"></span></a>
			  <a href="<?= base_url()?>mahasiswa/grid" class="btn btn-outline-dark"><span class="fas fa-th"></span></a>
			</div>

			<a href="<?= base_url()?>mahasiswa/tambah" class="btn btn-primary float-right">Tambah Mahasiswa</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="table">
	  			<thead>
	  				<tr>
	  					<th width="10px">No</th>
	  					<th width="50px">Foto</th>
	  					<th>NIM</th>
	  					<th>Nama</th>
	  					<th>Fakultas</th>
	  					<th>Prodi</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
				  <?php $no = 1 ?>
				<?php foreach ($mahasiswa as $data) :?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td class="text-center"><img src="<?= base_url()?>assets/img/mahasiswa/<?= $data['gambar']?>" width="55px"></td>
						<td><?= $data['nim']?></td>
						<td><?= $data['nama']?></td>
						<td><?= $data['nama_fakultas']?></td>
						<td><?= $data['nama_prodi']?></td>
						<td class="text-center"><a href="<?= base_url()?>mahasiswa/detail/<?= $data['nim']?>" class="btn btn-success btn-sm" role="button">Lihat Nilai</a> 
			        	<a href="<?= base_url()?>mahasiswa/edit/<?= $data['nim']?>" class="btn btn-warning  btn-sm" role="button">Edit</a> 
			        	<a href="<?= base_url()?>mahasiswa/delete/<?= $data['nim']?>" class="btn btn-danger  btn-sm" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Delete</a></td>
					</tr>
			    <?php endforeach; ?>
		    </tbody>
		    </table>
		</div>
	</div>
</div>