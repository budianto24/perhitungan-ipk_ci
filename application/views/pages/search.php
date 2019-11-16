<div class="container">
		<div class="card mb-4">
			<div class="card-body">
					<h5 class="mb-0">
						Menampilkan hasil untuk "<font color="blue"><?= htmlspecialchars($this->input->get('keyword'));?></font>"
						<small class="float-right"><b><?= count($list);?></b> data yang ditemukan</small>
					</h5>
			</div>
		</div>

		<?php if (count($list)>0) {?>
			<div class="row">
				<?php foreach ($list as $data) :?>
				<div class="col-sm-3 col-md-3">
					<div class="card mb-4 text-center">
						<div class="text-center">
							<img src="<?= base_url();?>assets/img/mahasiswa/<?= $data['gambar']?>" class="mt-3" style="width:150px;">
						</div>
						<div class="card-body">
							<h5 class="card-title">
								<?= $data['nama'];?><br>
								<small class="card-text">NIM: <?= $data['nim']?></small>
							</h5>
							<a href="<?= base_url();?>mahasiswa/detail/<?= $data['nim']?>" class="btn btn-primary btn-sm">Lihat Nilai</a>
							<a href="<?= base_url();?>mahasiswa/edit/<?= $data['nim']?>" class="btn btn-warning btn-sm">Edit</a>
							<a href="<?= base_url();?>mahasiswa/delete/<?= $data['nim']?>" class="btn btn-danger btn-sm">Delete</a>
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