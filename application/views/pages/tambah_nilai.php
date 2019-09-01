<div class="container">

<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('mahasiswa/detail/'.$mahasiswa['nim'])?>"><?= $mahasiswa['nama']?></a></li>
				<li class="breadcrumb-item" active">Tambah Nilai</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-4">
			<div class="card text-center">
				<div class="card-body">
		      <img src="<?= base_url()?>assets/img/mahasiswa/<?= $mahasiswa['gambar']?>" class="img-thumbnail mb-2" width="150px">
		      <div class="caption">
		        <h3><?= $mahasiswa['nama']?></h3>
		        <p>NIM: <?= $mahasiswa['nim']?></p>
		        <p><?= $mahasiswa['nama_fakultas']?></p>
		        <p><?= $mahasiswa['nama_prodi']?></p>
		      </div>
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
			    <label for="exampleInputPassword1">Mata Kuliah*</label>
			    <select class="form-control" name="kode_matkul">
			    	<option>--Pilih--</option>
			    	<?php foreach ($matkul as $mk):?>
			    		<option value="<?= $mk['kode_matkul']?>"><?= $mk['nama_matkul']?></option>
			    	<?php endforeach;?>
			    </select>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nilai*</label>
				<input type="number" class="form-control" placeholder="ketik disini.." name="nilai">
				<small><?php echo form_error('nilai'); ?></small>
			  </div>
			  <button type="submit" class="btn btn-primary">Proses</button>
			<?= form_close()?>
		</div>
	</div>
	
</div>