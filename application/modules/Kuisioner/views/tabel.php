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
