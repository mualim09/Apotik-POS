
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Data Pembayaran Hutang</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
 <form method="post" id="fsearch" action="">
	<div class="input-group">
		<input  class="form-control form-control-sm " id="sp" type="text" name="sp" value="<?php  if(isset($_POST['sp'])) echo $_POST['sp']; ?>" placeholder="Supplier" />	
		<input class="form-control form-control-sm tgl" type="text" id="data_search" name="tgla" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tgla']; else echo date('Y-m-d'); ?>" placeholder="" />
		<input class="form-control form-control-sm tgl" type="text" name="tglb" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tglb']; else echo date('Y-m-d'); ?>" placeholder="" />
		<input  class="form-control form-control-sm " type="text" name="te" value="<?php  if(isset($_POST['te'])) echo $_POST['te']; ?>" placeholder="NOTA" />	
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
							serviceUrl: 'cari/carisupplier/',
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
			<td>Ket</td>
			<td>Hutang</td>
			<td>Jumlah Bayar</td>
			<td>Sisa</td>
			<td>Aksi</td>
		</tr>
			</thead>
<tbody>
	
	<?php $no=1; $ht=0;
	$toko=$this->session->userdata('idtoko');
if(isset($_POST['test'])){
	if($_POST['sp']<>''){
			$q=$this->db->query("select * from pembayaran where supplier='$_POST[sp]'  and gudang='$toko' and jenis='K' order by id desc");
	}elseif($_POST['te']<>''){
			$q=$this->db->query("select * from pembayaran where nobil='$_POST[te]'  and gudang='$toko'  and jenis='K'");
	}else{
			$q=$this->db->query("select * from pembayaran
			where tglbayar>='$_POST[tgla]' and tglbayar<='$_POST[tglb]'  and gudang='$toko'  and jenis='K' order by id desc");
	}
}else{
		$q=$this->db->query("select * from pembayaran where tglbayar=date(now())  and gudang='$toko'  and jenis='K' order by id desc");
}	$byr=0;
		foreach($q->result() as $row){
		if(substr($row->ket,0,6)<>'Diskon'){
		$byr+=$row->jml;
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td><?php echo $row->nobil; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php echo $row->ket; ?>
			</td>
			<td align=right><?php echo $row->st; ?></td>
			<td align=right><?php echo $row->jml; ?></td>
			<td align=right><?php echo $row->st-$row->jml; ?></td>
			<td align=center>
				<a class='inputbayar btn btn-sm btn-warning' href="pembelian/inputbayar/<?php echo $row->nobil; ?>"><img src="node_modules/bootstrap-icons/icons/eye.svg"  width="20" height="20"></a>
			</td>
		</tr>
		<?php $no++; }} ?>
		</tbody>
	</table>
	</div>
	<div class="alert alert-info">
		Total bayar Rp. <?php echo uang($byr); ?>
	</div>
<script type="text/javascript">
	//<![CDATA[
		$(".inputbayar").click(function(e){
		e.preventDefault();
			$('#proses').waiting();
			$.ajax({
			  url:$(this).attr('href'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
				 success: function(dt){
					$('#proses').waiting('done');
					$("#psatu").html(dt);
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

				 }
		}); 
			}); 
	//]]>
</script>


		</div>
	</div>
</div>
