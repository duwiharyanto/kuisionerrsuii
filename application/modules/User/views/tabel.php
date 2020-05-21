<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Username</th>
						<th class="text-white">Nama</th>
						<th class="text-white">Level</th>
						<th class="text-white">Email</th>
						<th class="text-white">Dashboard</th>
						<th class="text-white">Status</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->user_username)?></td>
							<td><?=ucwords($row->user_nama)?></td>
							<td> <a href="<?=site_url('Level')?>" class="badge badge-secondary"><?=ucwords($row->level_nama)?></a></td>
							<td><?=$row->user_email?></td>
							<td><?=$row->user_dashboard?></td>
							<td><?=ucwords($row->user_status==1 ? 'aktif':'inaktif')?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->user_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
