<div class="container">

	<ol class="breadcrumb">
  		<li><a href="<?= base_url('mahasiswa')?>">Mahasiswa</a></li>
  		<li class="active"><?= $mahasiswa['nama']?></li>
	</ol>

	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
		      <img src="<?= base_url()?>assets/img/mahasiswa/<?= $mahasiswa['gambar']?>" class="img-thumbnail" width="150px">
		      <div class="caption text-center">
		        <h3><?= $mahasiswa['nama']?></h3>
		        <p>NIM: <?= $mahasiswa['nim']?></p>
		        <p><?= $mahasiswa['fakultas']?></p>
		        <p><?= $mahasiswa['prodi']?></p>
		      </div>
		    </div>
		</div>
		<div class="col-md-8">
			<a href="<?= base_url()?>nilai/tambah/<?= $mahasiswa['nim'] ?>" class="btn btn-primary pull-right">Tambah Nilai</a><br><br><br>

			<?= $this->session->flashdata('flash')?>

			<?php if(!empty($nilai)){?>
			<table class="table table-bordered table-hover table-striped" id="table">
	  			<thead>
	  				<tr>
	  					<th>No</th>
	  					<th>Mata Kuliah</th>
	  					<th>Huruf Mutu</th>
	  					<th>SKS</th>
	  					<th>Total Nilai Mutu</th>
	  					<th></th>
	  				</tr>
	  			</thead>
	  			<tbody>
	  				<?php $no = 1 ?>
	  				<?php foreach ($nilai as $data) :?>
	  					<?php $nilai[$no] = $data['nilai'] ?>
	  				<tr>
	  					<td><?= $no++ ?></td>
	  					<td><?= $data['nama_matkul']?></td>
	  					<td>
	  						<?php if($data['nilai'] >= 85 && $data['nilai'] <= 100) {
	  							$mutu = "A";
	  							echo $mutu;
	  						}elseif ($data['nilai'] >= 70 && $data['nilai'] <= 84) {
	  							$mutu = "B";
	  							echo $mutu;
	  						}elseif ($data['nilai'] >= 60 && $data['nilai'] <= 69) {
	  							$mutu = "C";
	  							echo $mutu;
	  						}elseif ($data['nilai'] >= 50 && $data['nilai'] <= 59) {
	  							$mutu = "D";
	  							echo $mutu;
	  						}else{
	  							$mutu = "E";
	  							echo $mutu;
	  						}
	  						?>
	  					</td>
	  					<td>
	  						<?= $data['sks'] ?>
	  						<?php $total[$no] = $data['sks'] ?>		
	  					</td>
	  					<td>
	  						<?php if ($mutu == "A") {
	  							$total_nilai = 4*($data['sks']);
	  							echo  $total_nilai;
	  						}elseif($mutu == "B"){
	  							$total_nilai = 3*($data['sks']);
	  							echo  $total_nilai;
	  						}elseif($mutu == "C"){
	  							$total_nilai = 2*($data['sks']);
	  							echo  $total_nilai;
	  						}elseif($mutu == "D"){
	  							$total_nilai = 1*($data['sks']);
	  							echo  $total_nilai;
	  						}else{
	  							$total_nilai = ($data['sks']);
	  							echo  $total_nilai;
	  						}
	  						?>
	  						<?php $jmlh_nilai[$no] = $total_nilai ?>	
	  					</td>
	  					<td class="text-center">
	  						<a href="<?= base_url()?>nilai/edit/<?= $data['id']?>" class="btn btn-warning btn-xs">Edit</a>
	  						<a href="<?= base_url()?>nilai/delete/<?= $data['id']?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Ingin Mengapus Data?')">Delete</a>
	  					</td>
	  				</tr>
	  				<?php endforeach; ?>
	  			</tbody>
	  			<tfoot>
	  				<tr>
	  					<th></th>
	  					<th colspan="2">Total</th>
	  					<th><?= array_sum($total);?></th>
	  					<th><?= array_sum($jmlh_nilai);?></th>
	  					<th></th>
	  				</tr>
	  			</tfoot>
			</table>
			<h3>IPK : <?= round((array_sum($jmlh_nilai))/(array_sum($total)),2) ?></h3>
			<?php }else{ ?>
			 <h3 class="text-center"> Data Nilai Masih Kosong !!</h3>
		  <?php }?>
		</div>
	</div>
</div>