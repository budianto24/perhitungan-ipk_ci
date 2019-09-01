<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
			<li class="breadcrumb-item"><a href="<?= base_url('prodi')?>">Program Studi</a></li>
			<li class="breadcrumb-item active">Tambah Program Studi</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Tambah Program Studi</h1>
			</div>
			<?= form_open()?>
			<div class="form-group">
				<label for="exampleInputPassword1">Kode Prodi*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="kode_prodi"">
				<small><?php echo form_error('kode_prodi'); ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Nama Prodi*</label>
				<input type="text" class="form-control" placeholder="ketik disini.." name="nama_prodi">
				<small><?php echo form_error('nama_prodi'); ?></small>
			</div>
			<div class="form-group">
			  <label>Fakultas*</label>
			  <select class="form-control" name="kode_fakultas">
					  <option value="">--Pilih--</option>
				  <?php foreach($fakultas as $f):?>
					  <option value="<?= $f['kode_fakultas']?>"><?= $f['nama_fakultas']?></option>
				  <?php endforeach;?>
			  </select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
        </div>
	</div>
</div>