<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<p class="text-muted">Hasil backup akan disimpan di folder <strong>backupdb</strong> di root folder</p>
			<a href="javascript:void(0)" onclick="backupdb(this)" url="<?=base_url($setting['url'].'/backupdb')?>" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Backup</a>
			<div id="reloadtabel" url="<?= base_url($setting['url'].'/tabel')?>"></div>
		</div>
		<div class="form-group" >
			<iframe src="<?=base_url($setting['url'].'/filemanager')?>" width="100%" height="300" style="border:0px solid black;">
		</div>
	</div>

</iframe>
</div>
<script>
	function backupdb(btn){
		var url=$(btn).attr('url');
		var reloadurl=$('#reloadtabel').attr('url');
    $.ajax({
      type:'POST',
      url:url,
			dataType:'json',
      success:function(data){
				reload(reloadurl)
				toaster(data)
      }
    })
	}
	function popup(btn) {
		url =$(btn).attr('url')
    popupWindow = window.open(
        url,'popUpWindow','height=700,width=800,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
  }
</script>
