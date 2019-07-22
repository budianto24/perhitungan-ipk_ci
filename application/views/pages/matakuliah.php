<div class="container">

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
	  					<th>Kode Mata Kuliah</th>
	  					<th>Nama Mata Kuliah</th>
	  					<th>SKS</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  			<?php $no = 1 ?>
				<?php foreach ($mahasiswa as $data) :?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td><?= $data['kode_matkul']?></td>
						<td><?= $data['nama_matkul']?></td>
						<td><?= $data['sks']?></td>
						<td class="text-center">
			        	<a href="<?= base_url()?>matakuliah/edit/<?= $data['kode_matkul']?>" class="btn btn-warning  btn-sm" role="button">Edit</a> 
			        	<a href="<?= base_url()?>matakuliah/delete/<?= $data['kode_matkul']?>" class="btn btn-danger  btn-sm" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Hapus</a></td>
					</tr>
			    <?php endforeach; ?>
		    </tbody>
		    </table>
		</div>
	</div>
</div>