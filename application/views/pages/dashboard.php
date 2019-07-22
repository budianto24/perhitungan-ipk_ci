<div class="container">
		<div class="alert alert-info alert-dismissible" role="alert">
  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  		<strong>Selamat Datang!</strong> Ini adalah aplikasi sederhana untuk mengelolah Data Nilai Mahasiswa.
		</div>

		<?= $this->session->flashdata('flash')?>

	<div class="row">
		<div class="col-md-3">
			<div class="btn-group" role="group" aria-label="...">
			  <a href="<?= base_url()?>dashboard" class="btn btn-default"><span class="glyphicon glyphicon-th-list"></span></a>
			  <a href="<?= base_url()?>dashboard/grid" class="btn btn-default"><span class="glyphicon glyphicon-th"></span></a>
			</div>
		</div>
	</div><br>
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
						<td class="text-center"><img src="<?= base_url()?>assets/img/mahasiswa/<?= $data['gambar']?>" class="img-thumbnail" width="50px"></td>
						<td><?= $data['nim']?></td>
						<td><?= $data['nama']?></td>
						<td><?= $data['fakultas']?></td>
						<td><?= $data['prodi']?></td>
						<td class="text-center"><a href="<?= base_url()?>mahasiswa/detail/<?= $data['nim']?>" class="btn btn-primary btn-sm" role="button">Lihat Nilai</a> 
			        	<a href="<?= base_url()?>mahasiswa/edit/<?= $data['nim']?>" class="btn btn-warning  btn-sm" role="button">Edit</a> 
			        	<a href="<?= base_url()?>mahasiswa/delete/<?= $data['nim']?>" class="btn btn-danger  btn-sm" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Hapus</a></td>
					</tr>
			    <?php endforeach; ?>
		    </tbody>
		    </table>
		</div>
	</div>
</div>