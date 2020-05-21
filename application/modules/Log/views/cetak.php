<table width="100%" border="0" cellpadding="5" cellspacing="0">
  <thead>
    <tr >
      <th>No</th>
      <th>User</th>
      <th>Log</th>
      <th>Tanggal</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1;?>
    <?php foreach($data AS $row):?>
      <tr>
        <td align='center'><?=$i?></td>
        <td><?=ucwords($row->user_username)?></td>
        <td class="<?=$row->log_level==3 ? 'text-danger':'text-success'?>"><?= $row->log_aksi?></td>
        <td align='center'><?=date('d-m-Y h:i:s',strtotime($row->created_at))?></td>
      </tr>
      <?php $i++;?>
    <?php endforeach;?>
  </tbody>
</table>
