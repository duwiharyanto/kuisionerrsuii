<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped datatables" width="100%">
				<thead>
					<tr class="color bg-primary">
						<th class="text-white">#</th>
						<th class="text-white text-center" >Nama</th>
						<th class="text-white">Unit Keja</th>
						<th class="text-white" width="30%">Kuisioner</th>
						<th class="text-white">Nilai</th>
						<th class="text-white">Status</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1;?>
					<?php foreach($data AS $row):?>
						<tr >
							<td><?=$i?></td>
							<td class="<?=$row->warna?> text-left" style="color:white"><strong><?=ucwords($row->kuisioner_nama)?></strong><br>Pengisian :<?= date('d-m-Y H:i:s',strtotime($row->created_at))?></td>
							<td><?= ucwords($row->kuisioner_unitkerja)?><br>Departemen :<?= ucwords($row->kuisioner_departemen)?></td>
							<td><?= ucwords($row->kategori_kategori)?><br><?= ucwords($row->kategori_periode)?></td>
							<td><?= $row->nilai?></td>
							<td><?= $row->status?></td>
						</tr>
					<?php $i++;?>
					<?php endforeach;?>
				</tbody>
			</table>		
		</div>
	</div>
</div>
