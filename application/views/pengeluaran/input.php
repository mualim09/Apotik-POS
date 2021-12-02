<a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
Input <?php if($jenis=='um') echo 'Pendapatan Lain-lain'; else echo 'Pengeluaran Lain-lain';  ?>
<form method="post" id="simpanbayar" action="pengeluaran/simpaninput/<?php echo $jenis; ?>">
<table class='table table-sm'>
	<tr>
		<td>Tanggal </td>
		<td><input required autocomplete='off' type="date" class='form-control form-control-sm'  name="a" value="<?php echo date('Y-m-d'); ?>" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input  required  autocomplete='off' type="text" class='form-control uang form-control-sm  bersih' name="b" value="" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea name="c"  autocomplete='off'  class='form-control form-control-sm  bersih'></textarea></td>
	</tr>
	<tr style='display:none;'>
		<td>Supplier</td>
		<td><textarea name="supplier"  autocomplete='off'  class='form-control form-control-sm  bersih'></textarea></td>
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

	$("#simpanbayar").on('submit',function(e){
				$('#simpanbayar').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){	
							$.notify("berhasil simpan","success");
							$(".bersih").val('');
							$('#simpanbayar').waiting('done');
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
