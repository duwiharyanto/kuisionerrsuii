<?php if($this->session->userdata('user_level')==1):?>
<div class="row">
	<div class="col-sm-3">
		<div class="card card-statistic-1">
			<div class="card-icon bg-primary">
				<i class="far fa-file"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Total Responden</h4>
				</div>
				<div class="card-body">
					<span id="jumlahuser"><?=count($data)?></span>
				</div>
			</div>
		</div>	 
	</div>
	<div class="col-sm-3">
		<div class="card card-statistic-1">
			<div class="card-icon bg-success">
				<i class="fas fa-grin-beam"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Resiko Rendah</h4>
				</div>
				<div class="card-body">
					<span id=""><?=$kluster['rendah']?></span>
				</div>
			</div>
		</div>	 
	</div>
	<div class="col-sm-3">
		<div class="card card-statistic-1">
			<div class="card-icon bg-warning">
				<i class="fas fa-grin-tears"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Resiko Sedang</h4>
				</div>
				<div class="card-body">
					<span id=""><?=$kluster['sedang']?></span>
				</div>
			</div>
		</div>	 
	</div>	<div class="col-sm-3">
		<div class="card card-statistic-1">
			<div class="card-icon bg-danger">
				<i class="fas fa-dizzy"></i>
			</div>
			<div class="card-wrap">
				<div class="card-header">
					<h4>Resiko Tinggi</h4>
				</div>
				<div class="card-body">
					<span id=""><?=$kluster['tinggi']?></span>
				</div>
			</div>
		</div>	 
	</div>	
</div>
<?php endif;?>
<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white text-center" >Nama</th>
						<th class="text-white">Unit Keja</th>
						<th class="text-white">Departemen</th>
						<th class="text-white">Nilai</th>
						<th class="text-white">Status</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr >
							<td><?=$i?></td>
							<td class="<?=$row->warna?> text-left" style="color:white"><strong><?=ucwords(strtoupper($row->kuisioner_nama))?></strong><br>Pengisian :<?= date('d-m-Y H:i:s',strtotime($row->created_at))?></td>
							<td><?= ucwords(strtoupper($row->kuisioner_unitkerja))?></td>
							<td><?= strtoupper($row->departemen_nama)?></td>
							<td><?= $row->nilai?></td>
							<td><?= $row->status?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->kuisioner_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
