<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Nama</th>
						<th class="text-white">Status</th>
						<th class="text-white">Dashboard</th>
						<th class="text-white">Disimpan</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->level_nama)?></td>
							<td><?=ucwords($row->level_status ? 'aktif':'disable')?></td>
							<td><?=ucwords($row->level_dashboard)?></td>
							<td><?= date('d-m-Y',strtotime($row->created_at))?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->level_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
