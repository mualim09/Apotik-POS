
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Data <?php if($jenis=='um') echo 'Pendapatan Lain-lain'; else echo 'Pengeluaran Lain-lain';  ?></h6>
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
<div class='table-responsive'>
	<table class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Jumlah</td>
			<td>Aksi</td>
		</tr>
			</thead>
<tbody>
	
	<?php $no=1; $ht=0;
	$toko=$this->session->userdata('idtoko');
if(isset($_POST['test'])){
		$q=$this->db->query("select * from pembayaran
		where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='$jenis' order by id desc");
}else{
		$q=$this->db->query("select * from pembayaran where tglbayar=date(now())  and gudang='$toko'  and jenis='$jenis' order by id desc");
}	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->ket; ?></td>
			<td align=right><?php echo $row->jml; ?></td>
			<td align=center>
				<a class='btn btn-sm btn-warning' onclick='return confirm("Hapus data?...");' href="pengeluaran/hapus/<?php echo $row->id; ?>/<?php echo $jenis; ?>"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
</div>
	<div class="alert alert-info">
		Total  Rp. <?php echo uang($byr); ?>
	</div>


		</div>
	</div>
</div>
