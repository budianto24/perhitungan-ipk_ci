<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item active">Fakultas</li>
		</ol>
    </nav>
    

	<div class="row mb-4">
		<div class="col-md-12">
			<a href="<?= base_url()?>fakultas/tambah" class="btn btn-primary float-right">Tambah Fakultas</a>
		</div>
    </div>
    
    <?= $this->session->flashdata('flash')?>

	<div class="row">
		<div class="col-md-12">
			<table class="table table-bordered" id="table">
	  			<thead>
	  				<tr>
	  					<th width="10px">No</th>
	  					<th>Kode Fakultas</th>
	  					<th>Nama Fakultas</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
                    <?php $no = '1';
                    foreach($fakultas as $f):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $f['kode_fakultas'];?></td>
                        <td><?= $f['nama_fakultas'];?></td>
                        <td class="text-center">
			        	<a href="<?= base_url()?>fakultas/edit/<?= $f['kode_fakultas']?>" class="btn btn-warning  btn-sm" role="button">Edit</a> 
			        	<a href="<?= base_url()?>fakultas/delete/<?= $f['kode_fakultas']?>" class="btn btn-danger  btn-sm" role="button" onclick="return confirm('Yakin Ingin Mengapus Data?')">Hapus</a></td>
                    </tr>
                    <?php endforeach;?>
		        </tbody>
		    </table>
		</div>
	</div>
</div>