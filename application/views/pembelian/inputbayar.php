
<a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
<div class="row">
	<div class="col-lg-6">
		<?php
		
			$sisa=$this->crud->getnotabeli($nobil)-$this->crud->getbayar($nobil);
		
		?>
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Tgl</td>
		<td>Jml</td>
		<td>Ket</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from pembayaran where nobil='$nobil'");
	foreach($q->result() as $row){ ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->tglbayar; ?></td>
		<td align=right><?php echo uang($row->jml); ?></td>
		<td  align=center><?php echo $row->ket; ?></td>
		<td><a class='batalbayar' href="pembelian/batalbayar/<?php echo $row->id; ?>">Hapus</a></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

	<script type="text/javascript">
			$('.dttable').DataTable();
	</script>
		</div>
<div class="col-lg-5">
<?php

	if($sisa>0){
	$q=$this->db->query("select ket,supplier from keluar_masuk where nofaktur='$nobil'");
	$sup=$q->row();
	if($sup->ket=='K')
		$k='M';
	else
		$k='K';
	
?>
<form method="post" id="simpanbayar" action="pembelian/simpanbayar/<?php echo $nobil; ?>/<?php echo $sisa; ?>/<?php echo $k; ?>">
<table class='table table-sm'>
	<tr>
		<td>Tanggal</td>
		<td><input required autocomplete='off' type="date" class='form-control form-control-sm  bersih'  name="a" value="<?php echo date('Y-m-d'); ?>" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input  required  autocomplete='off' type="text" class='form-control uang form-control-sm  bersih' name="b" value="<?php echo $sisa; ?>" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea name="c"  autocomplete='off'  class='form-control form-control-sm  bersih'></textarea></td>
	</tr>
	<tr style='display:none;'>
		<td>Supplier</td>
		<td><textarea name="supplier"  autocomplete='off'  class='form-control form-control-sm  bersih'><?php echo $sup->supplier; ?></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" /></td>	
	</tr>
</table>
</form>
<?php }else{ ?>
<div class="alert alert-success">
	Tagihan Sudah Lunas!
</div>
<?php } ?>
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
							$("#orderlama").load('pembelian/orderlama');
							$('#proses').waiting('done');
							$("#psatu").load("pembelian/inputbayar/<?php echo $nobil; ?>/");
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
							$("#orderlama").load('pembelian/orderlama');
							$('#simpanbayar').waiting('done');
							$("#psatu").load("pembelian/inputbayar/<?php echo $nobil; ?>/");
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
