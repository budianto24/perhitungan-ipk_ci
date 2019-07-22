<div class="container">
	<div class="page-header">
  		<h3>
  			Menampilkan hasil untuk "<font color="blue"><?= $this->input->get('keyword');?></font>"
  			<small class="pull-right"><?= count($list);?> Data yang ditemukan</small>
  		</h3>
	</div>

		<?php if (count($list)>0) {?>
			<div class="row">
				<?php foreach ($list as $data) :?>
					 <div class="col-sm-6 col-md-3">
					    <div class="thumbnail">
					      <img src="<?= base_url()?>assets/img/default.jpg" class="img-thumbnail" width="150px">
					      <div class="caption">
					        <h3><?= $data['nama']?></h3>
					        <p>NIM: <?= $data['nim']?></p>
					        <p><a href="<?= base_url()?>dashboard/detail/<?= $data['nim']?>" class="btn btn-primary" role="button">Lihat Nilai</a> <a href="#" class="btn btn-danger" role="button">Hapus</a></p>
					      </div>
					    </div>
					  </div>
			    <?php endforeach; ?>
		    </div>
		<?php }else{ ?>
			<div class="text-center" style="margin-top: 100px">
			<h1><span class="glyphicon glyphicon-warning-sign"></span></h1>
			<h3>Data tidak Ditemukan!!</h3>
			</div>
		<?php } ?>
	
</div>