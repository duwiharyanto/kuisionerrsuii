<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white">Menu</th>
						<th class="text-white">Path</th>
						<th class="text-white">Level Akses</th>
						<th class="text-white">Parent</th>
						<th class="text-white">Status</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr>
							<td><?=$i?></td>
							<td><?=ucwords($row->menu_label)?><br/><small>Icon :<?= $row->menu_ikon?></small></td>
							<td><?=ucwords($row->menu_link)?></td>
							<td><?=ucwords($row->menu_akses_level)?></td>
							<td><?=$row->menu_is_mainmenu==0 ? '<span class="badge badge-primary">Parent</span>':'<span class="badge badge-secondary">Child</span>'?></td>
							<td><?= $row->menu_status ? 'Aktif':'Disable'?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->menu_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
