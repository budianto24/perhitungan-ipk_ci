<div class="container">
	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('fakultas')?>">Fakultas</a></li>
				<li class="breadcrumb-item active">Edit Data Fakultas</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Tambah Fakultas</h1>
			</div>
			<?= form_open_multipart()?>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Kode Fakultas</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="kode_fakultas" value="<?= $fakultas['kode_fakultas'];?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Nama Fakultas</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nama_fakultas" value="<?= $fakultas['nama_fakultas'];?>">
			  </div>
			  <div class="form-group">
			  	<button type="submit" class="btn btn-primary btn-md">Proses</button>
			  </div>
			<?= form_close()?>
        </div>
	</div>
</div>