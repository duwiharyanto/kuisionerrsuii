<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">User</th>
						<th class="text-white">Log</th>
						<th class="text-white">Tanggal</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->user_nama)?></td>
							<td><?=ucwords($row->log_aksi)?></td>
							<td><?= date('d-m-Y',strtotime($row->created_at))?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->log_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
