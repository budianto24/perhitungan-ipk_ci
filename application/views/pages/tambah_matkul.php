<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url()?>">Mata Kuliah</a></li>
				<li class="breadcrumb-item active">Tambah Mata Kuliah</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Tambah Data Mata Kuliah</h1>
			</div>
			<?= form_open()?>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Kode Mata Kuliah*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="kode_matkul">
				<small><?php echo form_error('kode_matkul'); ?></small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama Mata Kuliah*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="nama_matkul">
				<small><?php echo form_error('nama_matkul'); ?></small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">SKS*</label>
				<input type="number" class="form-control" placeholder="ketik disini.." name="sks">
				<small><?php echo form_error('sks'); ?></small>
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
		</div>
	</div>
</div>