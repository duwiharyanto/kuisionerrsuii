<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white text-center" >Headline</th>
						<th class="text-white">Periode</th>
						<th class="text-white">Status</th>
						<th class="text-center text-white">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr >
							<td><?=$i?></td>
							<td><?= ucwords($row->kategori_kategori)?></td>
							<td><?= ucwords($row->kategori_periode)?></td>
							<td><?= $row->kategori_status?></td>
							<td class="text-center">
								<?php buttonaksi($setting['aksi'],$row->kategori_id,$this->uri->segment(1))?>
							</td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>
