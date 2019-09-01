<div class="container">

	<nav aria-label="breadcrumb">	
		<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url()?>"><span class="fas fa-home"></span></a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
				<li class="breadcrumb-item active"><?= $mahasiswa['nama']?></li>
		</ol>
	</nav>

	<div class="row">
		<div class="col-md-3">
			<div class="card text-center">
				<div class="card-body">
					<img src="<?= base_url()?>assets/img/mahasiswa/<?= $mahasiswa['gambar']?>" class="img-thumbnail mb-2" width="150px">
					<div class="caption">
						<h3><?= $mahasiswa['nama']?></h3>
						<p>NIM: <?= $mahasiswa['nim']?></p>
						<p><?= $mahasiswa['nama_fakultas']?></p>
						<p><?= $mahasiswa['nama_prodi']?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-9">
			<a href="<?= base_url()?>nilai/tambah/<?= $mahasiswa['nim'] ?>" class="btn btn-primary float-right">Tambah Nilai</a><br><br><br>

			<?= $this->session->flashdata('flash')?>
			
			<?php if(!empty($nilai)){?>
			<table class="table table-bordered table-hover" id="table">
	  			<thead>
	  				<tr>
					  	<th class="text-center">No</th>
						<th class="text-center">Mata Kuliah</th>
						<th width="1px">HM</th>
						<th width="1px">AM</th>
						<th width="1px">SKS</th>
						<th width="1px">M</th>
						<th></th>
					</tr>
	  			</thead>
	  			<tbody>
	  				<?php $no = 1 ?>
	  				<?php foreach ($nilai as $data) :?>
	  				<tr>
	  					<td class="text-center"><?= $no++ ?></td>
						<td><?= $data['nama_matkul']?></td>
	  					<td class="text-center">
	  						<?php if($data['nilai'] >= 85 && $data['nilai'] <= 100) {
	  							echo $mutu = "A";
	  						}elseif ($data['nilai'] >= 70 && $data['nilai'] <= 84) {
	  							echo $mutu = "B";
	  						}elseif ($data['nilai'] >= 60 && $data['nilai'] <= 69) {
	  							echo $mutu = "C";
	  						}elseif ($data['nilai'] >= 50 && $data['nilai'] <= 59) {
	  							echo $mutu = "D";
	  						}else{
	  							echo $mutu = "E";
	  						}
	  						?>
						</td>
						<td class="text-center">
							<?php if ($mutu == "A") {
								echo number_format("4",2,".",".");
							}elseif ($mutu == "B") {
								echo number_format("3",2,".",".");
							}elseif ($mutu == "C") {
								echo number_format("2",2,".",".");
							}elseif ($mutu == "D") {
								echo number_format("1",2,".",".");
							}else{
								echo "0";
							}?>
						</td>  
	  					<td class="text-center">
	  						<?= $data['sks'] ?>
	  						<?php $total[$no] = $data['sks'] ?>		
	  					</td>
	  					<td class="text-center">
	  						<?php if ($mutu == "A") {
	  							echo $total_mutu = number_format("4"*($data['sks']),2,".",".");
	  						}elseif($mutu == "B"){
								echo $total_mutu = number_format("3"*($data['sks']),2,".",".");
	  						}elseif($mutu == "C"){
								echo $total_mutu = number_format("2"*($data['sks']),2,".",".");
	  						}elseif($mutu == "D"){
								echo $total_mutu = number_format("1"*($data['sks']),2,".",".");
	  						}else{
	  							echo $total_mutu = ($data['sks']);
	  						}
	  						?>
	  						<?php $jmlh_nilai[$no] = $total_mutu ?>	
	  					</td>
	  					<td class="text-center">
	  						<a href="<?= base_url()?>nilai/edit/<?= $data['id']?>" class="btn btn-warning btn-xs">Edit</a>
	  						<a href="<?= base_url()?>nilai/delete/<?= $data['id']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Mengapus Data?')">Delete</a>
	  					</td>
	  				</tr>
	  				<?php endforeach; ?>
	  			</tbody>
			</table>

			<table class="table table-bordered mt-5">
				<tr>
					<td width="250px">
						Jumlah SKS diambil<br>
						Jumlah Mutu<br>
						Indeks Prestasi Komulatif
					</td>
					<td>
						<?= array_sum($total);?><br>
						<?= number_format(array_sum($jmlh_nilai),2,".",".");?><br>
						<?= round((array_sum($jmlh_nilai))/(array_sum($total)),2) ?>
					</td>
					<td>
						HM : Huruf Mutu<br>
						AM : Angka Mutu<br>
						M : Mutu
					</td>
				</tr>
			</table>
			<?php }else{ ?>
			 <h3 class="text-center">Data Nilai Masih Kosong!!</h3>
		  <?php }?>
		</div>
	</div>
</div>