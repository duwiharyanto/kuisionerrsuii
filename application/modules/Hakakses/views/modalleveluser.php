<div class="modal-dialog" role="document" >
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title">Level User</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div id="modallevel">
        <table class="table table-striped " width="100%">
          <thead>
            <tr class="color bg-primary">
              <th class="text-white">#</th>
              <th class="text-white">Level Id</th>
              <th class="text-white">Level</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1;?>
            <?php foreach($level AS $row):?>
              <tr>
                <td><?=$i?></td>
                <td><?=ucwords($row->level_id)?></td>
                <td><?=ucwords($row->level_nama)?></td>
              </tr>
              <?php $i++;?>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    </div>
  </div>
