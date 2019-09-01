<div class="container">
	
	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
			<li class="breadcrumb-item active">Program Studi</li>
		</ol>
	</nav>
	
	<?= $this->session->flashdata('flash')?>

	<div class="row mb-4">
		<div class="col-md-12">
			<a href="<?= base_url()?>prodi/tambah" class="btn btn-primary float-right">Tambah Prodi</a>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="table">
	  			<thead>
	  				<tr>
	  					<th width="10px">No</th>
	  					<th>Kode Prodi</th>
						<th>Prodi</th>
						<th>Fakultas</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			<?php $no = 1 ?>
				<?php foreach ($prodi as $data) :?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td><?= $data['kode_prodi']?></td>
						<td><?= $data['nama_prodi']?></td>
						<td><?= $data['nama_fakultas']?></td>
						<td class="text-center">
			        	<a href="<?= base_url()?>prodi/edit/<?= $data['kode_prodi']?>" class="btn btn-warning  btn-sm" role="button">Edit</a> 
			        	<a href="<?= base_url()?>prodi/delete/<?= $data['kode_prodi']?>" class="btn btn-danger  btn-sm" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Hapus</a></td>
					</tr>
			    <?php endforeach; ?>
		    </tbody>
		    </table>
		</div>
	</div>
</div>