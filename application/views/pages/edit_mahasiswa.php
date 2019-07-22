<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url()?>">Dashboard</a></li>
  		<li class="active">Edit Mahasiswa</li>
	</ol>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Edit Data Mahasiswa</h1>
			</div>
			<?= form_open_multipart()?>
			  <div class="form-group">
			    <label for="exampleInputPassword1">NIM</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." value="<?= $data['nim']?>" disabled>
			    <input type="hidden" name="nim" value="<?= $data['nim']?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nama" value="<?= $data['nama']?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Fakultas</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="fakultas" value="<?= $data['fakultas']?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Prodi</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="prodi" value="<?= $data['prodi']?>">
			  </div>
			  <div class="form-group">
			  	<div class="row">
				  	<div class="col-md-3">
				    	<label for="exampleInputPassword1">Foto</label><br>
				    	<img src="<?= base_url()?>assets/img/mahasiswa/<?= $data['gambar']?>" class="img-thumbnail" width="150px">
					</div>
					<div class="col-md-9">
				    	<label for="exampleInputPassword1">Ubah Foto</label>
				    	<input type="file" name="gambar">
				    	<input type="hidden" name="old_gambar" value="<?= $data['gambar']?>">
					</div>
				</div>
			  </div>
			  <div class="form-group">

			  <button type="submit" class="btn btn-default">Proses</button>
			  </div>
			<?= form_close()?>
		</div>
	</div>
</div>