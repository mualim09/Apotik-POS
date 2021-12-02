
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Laba Rugi </h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
 <form method="post" id="fsearch" action="">
	<div class="input-group">
		<input hidden class="form-control form-control-sm " id="sp" type="text" name="sp" value="<?php  if(isset($_POST['sp'])) echo $_POST['sp']; ?>" placeholder="Pelanggan" />	
		<input class="form-control form-control-sm tgl" type="text" id="data_search" name="tgla" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tgla']; else echo date('Y-m-d'); ?>" placeholder="" />
		<input class="form-control form-control-sm tgl" type="text" name="tglb" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tglb']; else echo date('Y-m-d'); ?>" placeholder="" />
	<input hidden class="form-control form-control-sm " type="text" name="te" value="<?php  if(isset($_POST['te'])) echo $_POST['te']; ?>" placeholder="NOTA" />	
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
<?php
$idtoko=$this->session->userdata('idtoko');
if(isset($_POST['test'])){ ?>
<ul class="nav nav-tabs" role="tablist">
 	<li class="nav-item active"><a class="nav-link active" href="#penjualan" role="tab" data-toggle="tab">Uang Masuk</a></li>
 	<li class="nav-item "><a class="nav-link "href="#laba" role="tab" data-toggle="tab">Laba Penjualan</a></li>
 	<li class="nav-item "><a class="nav-link "href="#pembelian" role="tab" data-toggle="tab">Uang Keluar</a></li>
	<li class="nav-item "><a class="nav-link "href="#pa" role="tab" data-toggle="tab">Pendapatan Lain</a></li>
	<li class="nav-item "><a class="nav-link "href="#pb" role="tab" data-toggle="tab">Pengeluaran Lain</a></li>
	<li class="nav-item "><a class="nav-link "href="#bersih" role="tab" data-toggle="tab">Bersih</a></li>
	<li class="nav-item "><a class="nav-link "href="#asset" role="tab" data-toggle="tab">Asset</a></li>
</ul>
<div class="tab-content">
	<div class="tab-pane " id="asset">
	<table width='100%' class='mt-2  table table-hover table-sm table-condensed table-bordered'>
		<tr>
			<td>NO</td>
			<td>Ket</td>
			<td>Jumlah</td>
		</tr>
	<?php $no=1; $all=0;
	$toko=$this->session->userdata('idtoko');
	$q=$this->db->query("select sum(stok*bersih)  as nilai,gudang from barang where toko='$toko' group by gudang");
		foreach($q->result() as $row){
		$all+=$row->nilai; ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td>Gudang <?php echo $row->gudang; ?></td>
			<td align=right><?php echo uang($row->nilai); ?></td>
		</tr>
		<?php $no++; } ?>
		<tr>
			<td colspan=2>Total Asset</td>
			<td align=right><?php echo uang($all); ?></td>
		</tr>
	</table>
	</div>
	<div class="tab-pane" id="laba">
	<table width='100%' class='mt-2 table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Faktur</td>
			<td>Jual</td>
			<td>Modal</td>
			<td>Laba</td>
	
		</tr>
			</thead>
<tbody>

	<?php $no=1;  $tlaba=0;
	$q=$this->db->query("select tgl,nofaktur,sum(jml*replace(modal,',','')) as modal,sum(jml*total) as nota from keluar_masuk  
	where keluar_masuk.idtoko='$toko' and keluar_masuk.tgl>='$_POST[tgla]' 
	and keluar_masuk.tgl<='$_POST[tglb]' and keluar_masuk.ket='K' group by nofaktur 
	order by keluar_masuk.id desc");
	$byr=0;
		foreach($q->result() as $row){
			$tlaba+=$row->nota-$row->modal;
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tgl,0,10)); ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo $row->nofaktur; ?></a></td>
			<td align=right><?php echo uang($row->nota); ?></td>
			<td align=right><?php echo uang($row->modal); ?></td>
			<td align=right><?php echo uang($row->nota-$row->modal); ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total Laba Rp. <?php echo uang($tlaba); ?>
	</div>
	
	</div>
	<div class="tab-pane active" id="penjualan">
	<table width='100%' class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Faktur</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Jumlah</td>
	
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
	$toko=$this->session->userdata('idtoko');
	$q=$this->db->query("select * from pembayaran where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='M' order by id desc");
	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo $row->nobil; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->ket; ?></td>
			<td align=right><?php echo uang($row->jml); ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total  Rp. <?php echo uang($a=$byr); ?>
	</div>
	
	</div>
	<div class="tab-pane " id="pembelian">
	<table width='100%' class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Jumlah</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
	$q=$this->db->query("select * from pembayaran where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='K' order by id desc");
	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->nobil; ?> <?php echo $row->ket; ?></td>
			<td align=right><?php echo uang($row->jml); ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total  Rp. <?php echo uang($b=$byr); ?>
	</div>
	</div>
	<div class="tab-pane " id="pa">
	<table width='100%' class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Jumlah</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
	$q=$this->db->query("select * from pembayaran where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='um' order by id desc");
	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->ket; ?></td>
			<td align=right><?php echo $row->jml; ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total  Rp. <?php echo uang($c=$byr); ?>
	</div>
	</div>
	<div class="tab-pane " id="pb">
	<table width='100%' class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Jumlah</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
	$q=$this->db->query("select * from pembayaran where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='uk' order by id desc");
	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->ket; ?></td>
			<td align=right><?php echo $row->jml; ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total  Rp. <?php echo uang($d=$byr); ?>
	</div>
	</div>
		<div class="tab-pane " id="bersih">
	<table width='100%' class='mt-2 table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Ket</td>
			<td>Jumlah</td>
		</tr>
			</thead>
		<tbody>
		<tr>
			<td  align=center>1</td>
			<td>Laba Penjualan +</td>
			<td align=right><?php echo uang($tlaba); ?></td>
		</tr>
		<tr>
			<td  align=center>2</td>
			<td>Pembelian -</td>
			<td align=right><?php echo uang($b); ?></td>
		</tr>
		<tr>
			<td  align=center>3</td>
			<td>Pendapatan Lain  +</td>
			<td align=right><?php echo uang($c); ?></td>
		</tr>
		<tr>
			<td  align=center>4</td>
			<td>Pengeluaran Lain -</td>
			<td align=right><?php echo uang($d); ?></td>
		</tr>
		<tr>
			<td  align=center>5</td>
			<td>Total Uang Masuk</td>
			<td align=right><?php echo uang($aa=$tlaba+$c); ?></td>
		</tr>
		<tr>
			<td  align=center>6</td>
			<td>Total Uang Keluar</td>
			<td align=right><?php echo uang($ab=$b+$d); ?></td>
		</tr>
		<tr>
			<td  align=center>7</td>
			<td>Pendapatan Bersih</td>
			<td align=right><?php echo uang($aa-$ab); ?></td>
		</tr>
		
		</tbody>
	</table>
	</div>
	
</div>

<?php } ?>
</div>

		</div>
	</div>
</div>

