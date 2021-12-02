
<a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
<?php if($nobil<>''){ ?>
<b>Faktur <?php echo $nobil; ?> </b>
<div class="row">
<div class="col-lg-6">
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Kode</td>
		<td>Nama</td>
		<td>Jml</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from keluar_masuk where nofaktur='$nobil'");
	foreach($q->result() as $row){ 	$ket=$row->ket;
	$gudang=$row->gudang;
 ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td><a href="<?php echo $row->kode; ?>" idtoko="<?php echo $row->idtoko; ?>" gudang="<?php echo $row->gudang; ?>" jml="<?php echo $row->jml; ?>" class='pilih'><?php echo $row->kode; ?></a></td>
		<td><a href="<?php echo $row->kode; ?>" idtoko="<?php echo $row->idtoko; ?>" gudang="<?php echo $row->gudang; ?>" jml="<?php echo $row->jml; ?>" class='pilih'><?php echo $row->nama; ?></a></td>
		<td  align=center><?php echo $row->jml; ?></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

<table width='100%' class='table table-sm table-hover table-bordered'>
<thead>
	<tr class='bg-info'>
		<td colspan=5>Data Return</td>
	</tr>
	<tr align=center>
		<td>NO</td>
		<td>Tgl</td>
		<td>Barang</td>
		<td>Jml</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from keluar_masuk where nota='$nobil' ");
	foreach($q->result() as $row){ 	
	$ket=$row->ket;
	$gudang=$row->gudang;

 ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td  align=center><?php echo $row->tgl; ?></td>
		<td  align=center><?php echo $row->kode; ?> <?php echo $row->nama; ?></td>
		<td  align=center><?php echo $row->jml; ?></td>
		<td><a class='hapusdt' href="pembelian/batalreturn/<?php echo $row->id; ?>/<?php echo $row->jml; ?>/<?php echo $row->gudang; ?>/<?php echo $row->kode; ?>/<?php echo $row->ket; ?>">Hapus</a></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

	<script type="text/javascript">
	$(".hapusdt").on('click',function(e){
				$('.hapusdt').waiting();
				e.preventDefault();
				if(confirm('Hapus Data?')){
					$.ajax({
						url:  $(this).attr('href'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$('.bersih').val('');
							$("#orderlama").load('pembelian/orderlama');
							$('#simpanbayar').waiting('done');
							$("#psatu").load("pembelian/inputreturn/<?php echo $nobil; ?>/");
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
			$(".pilih").on('click',function(e){
				e.preventDefault();
					$("#nmbrg").val($(this).attr('href'));
					$("#xjml").val($(this).attr('jml'));
					$("#max").val($(this).attr('jml'));
					$("#idtoko").val($(this).attr('idtoko'));
					$("#gudang").val($(this).attr('gudang'));
				}); 
			$('.dttable').DataTable();
	</script>
		</div>
<div class="col-lg-5">
<form method="post" id="simpanbayar" action="pembelian/simpanreturn/<?php echo $nobil; ?>/<?php echo $ket; ?>/<?php echo $gudang; ?>/">
<table class='table table-sm'>
	<tr>
		<td>Faktur Return</td>
		<td><input  readonly required  autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="a" value="<?php echo $this->crud->nobilmasuk('rb'); ?>" /></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td><input required autocomplete='off' type="date" class='form-control form-control-sm bersih'  name="b" value="<?php echo date('Y-m-d'); ?>" /></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td><input  readonly required id="nmbrg"  autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="c" value="" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td>
		<input  required  id='max'   hidden readonly autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="max" value="" />
		<input  required  id='idtoko'   hidden readonly autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="idtoko" value="" />
		<input  required  id='gudang'   hidden readonly autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="gudang" value="" />
		<input  required  id='xjml' autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="d" value="" />
		</td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea name="e"  autocomplete='off'  class='form-control form-control-sm  bersih'></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" />
		<input type="reset"  class='btn btn-warning' name="test" value="BATAL" /></td>	
	</tr>
</table>
</form>
<script type="text/javascript">
	//<![CDATA[
					$("#nmbrg").on('keypress',function(e){
						$('#nmbrg').autocomplete({
							serviceUrl: "cari/carikeluar/<?php echo $nobil; ?>",
							minChars:2,
							onSelect: function (s) {
							$('#nmbrg').val(s.kode);
							$('#xjml').val(s.jml);
							}
						});
					});
	//]]>
</script>
<script type="text/javascript">
	//<![CDATA[

	$("#simpanbayar").on('submit',function(e){
				$('#simpanbayar').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							if(dt){
							$('.bersih').val('');
							$("#orderlama").load('pembelian/orderlama');
							$("#psatu").load("pembelian/inputreturn/<?php echo $nobil; ?>/");
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

							}else{
								$.notify("Gagal Simpan, Jumlah Lebih Besar Dari Pembelian/Penjualan","warning");

							}
							$('#simpanbayar').waiting('done');

						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
<?php }else{ ?>
<div class="col-lg-4">
<form method="post" id="getfaktur" action="pembelian/getfaktur/">
	<div class="input-group">
		<input  class="form-control form-control-sm " id="sp" type="text" name="sp" value="" placeholder="No Faktur" />	
	  <div class="input-group-append">
		 <input class="btn  btn-primary btn-sm" type="submit" name="test" value="CARI" />
	  </div>
	</div>
</form>
</div>
<div class="datacari"></div>

<script type="text/javascript">
	//<![CDATA[

	$("#getfaktur").on('submit',function(e){
				$('#getfaktur').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$(".datacari").html(dt);
							$('#getfaktur').waiting('done');
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
<?php  } ?>

</div>
</div>
