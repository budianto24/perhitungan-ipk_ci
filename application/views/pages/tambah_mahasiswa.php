<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url()?>">Dashboard</a></li>
  		<li class="active">Tambah Mahasiswa</li>
	</ol>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Tambah Data Mahasiswa</h1>
			</div>
			<?= form_open_multipart()?>
			  <div class="form-group">
			    <label for="exampleInputPassword1">NIM*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="nim"">
				<small><?php echo form_error('nim'); ?></small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="nama"">
				<small><?php echo form_error('nama'); ?></small>
			  </div>
			  <div class="form-group">
			    <label>Jenis Kelamin</label>
			    <select class="form-control" name="jenis_kelamin">
						<option value="">--Pilih--</option>
						<option value="Laki-Laki">Laki-Laki</option>
						<option value="Perempuan">Perempuan</option>
				</select>
			  </div>
			  <div class="form-group">
			    <label>Fakultas</label>
			    <select class="form-control" name="fakultas" id="fakultas">
						<option value="">--Pilih--</option>
					<?php foreach($fakultas as $f):?>
						<option value="<?= $f['kode_fakultas']?>"><?= $f['nama_fakultas']?></option>
					<?php endforeach;?>
				</select>
			  </div>
			  <div class="form-group">
			    <label>Prodi</label>
			    <select class="form-control" name="prodi" id="prodi">
					<option value="">--Pilih--</option>
				</select>
			  </div>
			  <div class="form-group">
			    <label>Foto</label><br>
			    <input type="file" class="" placeholder="ketik disini.." name="gambar"">
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
		</div>
	</div>
</div>