<div class="container">

<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('prodi')?>">Program Studi</a></li>
				<li class="breadcrumb-item active">Edit Program Studi</li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="page-header">
  				<h1>Edit Program Studi</h1>
			</div>
            <?= form_open()?>
			<div class="form-group">
				<label for="exampleInputPassword1">Kode Prodi</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="kode_prodi" value="<?= $prodi['kode_prodi']?>" readonly>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Nama Prodi*</label>
			    <input type="text" class="form-control" placeholder="ketik disini.." name="nama_prodi" value="<?= $prodi['nama_prodi']?>">
			</div>
			<div class="form-group">
			  <label>Fakultas*</label>
			  <select class="form-control" name="kode_fakultas">
					  <option value="">--Pilih--</option>
				  <?php foreach($fakultas as $f):?>
					  <option value="<?= $f['kode_fakultas']?>" <?php if($prodi['kode_fakultas'] == $f['kode_fakultas']){echo "selected";}?>><?= $f['nama_fakultas']?></option>
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