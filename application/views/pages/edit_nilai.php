<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
  		<li><a href="<?= base_url('mahasiswa/detail/'.$mahasiswa['nim'])?>"><?= $mahasiswa['nama']?></a></li>
  		<li class="active">Edit Nilai</li>
	</ol>

	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
		      <img src="<?= base_url()?>assets/img/mahasiswa/<?= $mahasiswa['gambar']?>" class="img-thumbnail" width="150px">
		      <div class="caption text-center">
		        <h3><?= $mahasiswa['nama']?></h3>
		        <p>NIM: <?= $mahasiswa['nim']?></p>
		        <p><?= $mahasiswa['fakultas']?></p>
		        <p><?= $mahasiswa['prodi']?></p>
		      </div>
		    </div>
		</div>
		<div class="col-md-6">
			<div class="page-header">
  				<h3>Edit Data Nilai</p3>
			</div>
			<?= form_open()?>
				<input type="hidden" name="id" value="<?= $data[0]['id']?>">
			  <div class="form-group">
			    <label for="exampleInputPassword1">Mata Kuliah</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." value="<?= $data[0]['nama_matkul']?>" readonly>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nilai</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nilai" value="<?= $data[0]['nilai']?>">
			  </div>
			  <button type="submit" class="btn btn-default">Proses</button>
			<?= form_close()?>
		</div>
	</div>
</div>
