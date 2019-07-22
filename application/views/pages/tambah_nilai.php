<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
  		<li><a href="<?= base_url('mahasiswa/detail/'.$mahasiswa['nim'])?>"><?= $mahasiswa['nama']?></a></li>
  		<li class="active">Tambah Nilai</li>
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
  				<h3>Tambah Data Nilai</p3>
			</div>
			<?= form_open()?>
			 	<input type="hidden" name="nim" value="<?= $mahasiswa['nim']?>"> 
			 	<input type="hidden" name="name" value="<?= $mahasiswa['nama']?>">
			  <div class="form-group">
			    <label for="exampleInputPassword1">Mata Kuliah</label>
			    <select class="form-control" name="kode_matkul">
			    	<option>--Pilih--</option>
			    	<?php foreach ($matkul as $mk):?>
			    		<option value="<?= $mk['kode_matkul']?>"><?= $mk['nama_matkul']?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nilai</label>
			    <input type="number" class="form-control" placeholder="ketik disini.." name="nilai">
			  </div>
			  <button type="submit" class="btn btn-default">Proses</button>
			<?= form_close()?>
		</div>
	</div>
	
</div>