<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url()?>">Dashboard</a></li>
  		<li class="active">Tambah Mata Kuliah</li>
	</ol>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Tambah Data Mata Kuliah</h1>
			</div>
			<?= form_open_multipart()?>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Kode Mata Kuliah</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="kode_matkul">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama Mata Kuliah</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nama_matkul">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">SKS</label>
			    <input type="number" class="form-control" placeholder="ketik disini.." name="sks">
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
		</div>
	</div>
</div>