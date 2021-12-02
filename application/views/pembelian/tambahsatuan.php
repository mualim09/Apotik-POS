
<a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
<div class="row">
	<div class="col-lg-6">
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>No</td>
		<td>Satuan</td>
		<td>Jumlah</td>
		<td>Harga</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from satuanlain where idbarang='$nobil'");
	foreach($q->result() as $row){ ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->satuan; ?></td>
		<td align=right><?php echo uang($row->jumlah); ?></td>
		<td align=right><?php echo uang($row->hargadua); ?></td>
		<td><a class='batalbayar' href="pembelian/batalbayarsatuan/<?php echo $row->id; ?>">Hapus</a></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

	<script type="text/javascript">
			$('.dttable').DataTable();
	</script>
		</div>
<div class="col-lg-5">

<form method="post" id="simpanbayar" action="pembelian/simpansatuan/<?php echo $nobil; ?>/<?php echo $gudang; ?>">
<table class='table table-sm'>
    <tr>
		<td>Satuan</td>
		<td><input  required  autocomplete='off' type="text" class='form-control  form-control-sm  bersih' name="a" value="" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input  required  autocomplete='off' type="text" class='form-control  form-control-sm  bersih' name="b" value="" /></td>
	</tr>
    <tr>
		<td>Harga</td>
		<td><input  required  autocomplete='off' type="text" class='form-control  form-control-sm  bersih' name="c" value="" /></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" /></td>	
	</tr>
</table>
</form>
<script type="text/javascript">
	//<![CDATA[
			$('.uang').autoNumeric('init');
			$(".batalbayar").on('click',function(e){
				$('#proses').waiting();
				if(confirm('Hapus Data?..')){
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('href'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$('.bersih').val('');
							$('#proses').waiting('done');
							$("#psatu").load("pembelian/tambahsatuan/<?php echo $nobil; ?>/");
							$('#psatu').bPopup({
								fadeSpeed: 'slow',
								followSpeed: 300,
								modalClose: false,
								opacity: 0.6,
								positionStyle: 'fixed',
								onClose: function(){
									// window.location="panel/rekap"
								}
					});
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
					}else return false;
				}); 
				
	$("#simpanbayar").on('submit',function(e){
				$('#simpanbayar').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$('.bersih').val('');
							$('#simpanbayar').waiting('done');
							$("#psatu").load("pembelian/tambahsatuan/<?php echo $nobil; ?>/");
							$('#psatu').bPopup({
								fadeSpeed: 'slow',
								followSpeed: 300,
								modalClose: false,
								opacity: 0.6,
								positionStyle: 'fixed',
								onClose: function(){
									// window.location="panel/rekap"
								}
					});
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
</div>
</div>
