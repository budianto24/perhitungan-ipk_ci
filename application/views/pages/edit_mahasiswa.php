<div class="container">

<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
				<li class="breadcrumb-item active">Edit Data Mahasiswa</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Edit Data Mahasiswa</h1>
			</div>
			<?= form_open_multipart()?>
			  <div class="form-group">
			    <label for="NIM">NIM*</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." id="NIM" value="<?= $data['nim']?>" disabled>
			    <input type="hidden" name="nim" value="<?= $data['nim']?>">
			  </div>
			  <div class="form-group">
			    <label for="Nama">Nama*</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." id="Nama" name="nama" value="<?= $data['nama']?>">
			  </div>
			  <div class="form-group">
			    <label>Fakultas*</label>
			    <select class="form-control" name="fakultas">
						<option value="">--Pilih--</option>
					<?php foreach($fakultas as $f):?>
						<option value="<?= $f['kode_fakultas']?>" <?php if($data['kode_fakultas'] == $f['kode_fakultas']){echo "selected";}?>><?= $f['nama_fakultas']?></option>
					<?php endforeach;?>
				</select>
			  </div>
			  <div class="form-group">
			    <label>Prodi*</label>
			    <select class="form-control" name="prodi">
					<option value="">--Pilih--</option>
					<?php foreach($prodi as $p):?>
						<option value="<?= $p['kode_prodi']?>" <?php if($data['kode_prodi'] == $p['kode_prodi']){echo "selected";}?>><?= $p['nama_prodi']?></option>
					<?php endforeach;?>
				</select>
			  </div>
			  <div class="form-group">
			  	<div class="row">
				  	<div class="col-md-3">
				    	<label>Foto</label><br>
				    	<img src="<?= base_url()?>assets/img/mahasiswa/<?= $data['gambar']?>" class="img-thumbnail" width="150px">
					</div>
					<div class="col-md-9">
				    	<label for="exampleInputPassword1">Ubah Foto</label><br>
				    	<input type="file" name="gambar">
				    	<input type="hidden" name="old_gambar" value="<?= $data['gambar']?>">
					</div>
				</div>
			  </div>
			  
			  <button type="submit" class="btn btn-primary">Proses</button>
			  
			<?= form_close()?>
		</div>
	</div>
</div>