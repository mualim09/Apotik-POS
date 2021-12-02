
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Data Praktek</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
 <form method="post" id="fsearch" action="">
	<div class="input-group">
		<input class="form-control form-control-sm tgl" type="text" id="data_search" name="tgla" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tgla']; else echo date('Y-m-d'); ?>" placeholder="" />
		<input class="form-control form-control-sm tgl" type="text" name="tglb" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tglb']; else echo date('Y-m-d'); ?>" placeholder="" />
	  <div class="input-group-append">
		 <input class="btn  btn-primary btn-sm" type="submit" name="test" value="TAMPIL" />
	  </div>
	</div>
</form>
<hr />
<script type="text/javascript">
	//<![CDATA[
	$("#sp").on('keypress',function(e){
						$('#sp').autocomplete({
							serviceUrl: 'cari/caripelanggan/',
							minChars:2,
							onSelect: function (s) {
				//				$('#harga').val(s.harga);
							}
						});
					});
	//]]>
</script>
<div class='table-responsive'>
	<table class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Faktur</td>
			<td>Barang</td>
			<td>Jumlah</td>
			<td>Diskon</td>
			<td>Harga</td>
			<td>Total</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
		$idtoko=$this->session->userdata('idtoko');

if(isset($_POST['test'])){
		$q=$this->db->query("select keluar_masuk.*,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang
		where keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl>='$_POST[tgla]' and keluar_masuk.tgl<='$_POST[tglb]' and keluar_masuk.ket='K' and keluar_masuk.nota='Pasien'  order by keluar_masuk.id desc");
}else{
		$q=$this->db->query("select keluar_masuk.*,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where   keluar_masuk.tgl=date(now()) and keluar_masuk.idtoko='$idtoko' and keluar_masuk.ket='K' and keluar_masuk.nota='Pasien' order by keluar_masuk.id desc");
}
		foreach($q->result() as $row){ 
			if(substr($row->nofaktur,0,2)<>'MV'){

		$ht+=$row->total*$row->jml;
		?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?><br />
			<?php echo $row->gudang; ?></a></td>
			<td><?php echo $row->nofaktur; ?><br /><?php echo $row->supplier; ?></td>
			<td><?php echo $row->kode; ?> <?php echo $row->nama; ?></td>
			<td align=center><?php echo $row->jml; ?> </td>
			<td align=center><?php echo $row->d1; ?>/<?php echo $row->d2; ?>/<?php echo $row->d3; ?></td>
			<td  align=right><?php echo uang(buangkrt(',',$row->jual)); ?></td>
			<td  align=right><?php echo uang($row->total*$row->jml); ?></td>

			</tr>
		<?php $no++; }} ?>
		</tbody>

	</table>
	</div>
	<div class="alert alert-warning">
		Total Transaksi Rp. <?php echo uang($ht); ?>
	</div>


		</div>
	</div>
</div>

