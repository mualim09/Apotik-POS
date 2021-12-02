
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Data Penjualan Sales</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
<form method="post" id="fsearch" action="">
	<div class="input-group">
        <input  class="form-control form-control-sm " id="sp" type="text" name="sp" value="<?php  if(isset($_POST['sp'])) echo $_POST['sp']; ?>" placeholder="Sales" />	
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
							serviceUrl: 'cari/carisales/',
							minChars:2,
							onSelect: function (s) {
				//				$('#harga').val(s.harga);
							}
						});
					});
	//]]>
</script>
<div class='table-responsive'>
<?php if(isset($_POST['test'])){ ?>
	<table class='mt-2 xdttable table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Sales</td>
			<td>Total</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
		$idtoko=$this->session->userdata('idtoko');
        if($_POST['sp']==''){
            $q=$this->db->query("select sales,sum(jml*total) as total from keluar_masuk
            where keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl>='$_POST[tgla]' and keluar_masuk.tgl<='$_POST[tglb]' and keluar_masuk.ket='K' 
            group by keluar_masuk.sales order by keluar_masuk.id desc");
        }else{
            $q=$this->db->query("select sales,sum(jml*total) as total from keluar_masuk
            where keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl>='$_POST[tgla]' and keluar_masuk.tgl<='$_POST[tglb]' and keluar_masuk.ket='K' 
            and keluar_masuk.sales='$_POST[sp]'
            group by keluar_masuk.sales order by keluar_masuk.id desc");
        }
		foreach($q->result() as $row){
		$ht+=$row->total; ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td align=center><?php echo $row->sales; ?> </td>
			<td  align=right><?php echo uang($row->total); ?></td>

			</tr>
		<?php $no++; } ?>
		</tbody>

	</table>
	<div class="alert alert-warning">
		Total Transaksi Rp. <?php echo uang($ht); ?>
	</div>
<?php } ?>
</div>
		</div>
	</div>
</div>