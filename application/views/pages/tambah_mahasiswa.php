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
			    <label for="exampleInputPassword1">NIM</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nim"">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nama"">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Fakultas</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="fakultas"">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Prodi</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="prodi"">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Foto</label>
			    <input type="file" class="" placeholder="ketik disini.." name="gambar"">
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
		</div>
	</div>
</div>