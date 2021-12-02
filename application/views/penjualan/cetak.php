<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Faktur Transaksi Baru</title>
	<base href="<?php echo base_url(); ?>" />
	<link href="plugin/b4/css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css" media="print">
		body{
			font-style:Consolas;
		}
	</style>
		<script src="plugin/jq.js"></script>

</head>
<body >
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container">
	<div class="row">
		<div class="col-lg-12">

<table width="100%" cellspacing="0" cellpadding="0">
<tr>
<td colspan=3><h4><i><?php echo $info->nmtoko; ?>  <!-- FAKTUR TITIPAN BARANG--></i></h4></td>
	<td colspan=3 align=right>
			<?php echo tgl_indo($nota->tgl); ?> 
</td>
</tr>
		<tr class="tengah">
			<td colspan=3 align=left><?php echo $info->notelp; ?></td>
			<td colspan=3 align='right'>Kepada</td>
		</tr>
		<tr class="tengah"  >
			<td colspan=3 align=left><?php echo $info->alamat; ?>
			</td>
			<td colspan=3 align='right'>
			<?php echo $nota->supplier;  ?></td>
		</tr>
		<tr class="tengah"  >
			<td colspan=3 align=left><?php if($nota->tbayar<>'0000-00-00') echo 'Jatuh Tempo '.tgl_indo($nota->tbayar);  ?></td>
			<td colspan=3 align='right'><?php echo $nota->stbayar; ?></td>
		</tr>
</table>
<table  width="100%" cellspacing="0" cellpadding="0" >
		<tr class="tengah"  style="border-top:1px solid black;border-top:1px solid black;">
			<td colspan=3><?php echo $nota->nofaktur;  ?></td>
			<td colspan=4 align=right><?php  $kt=explode("_",$nota->idadmin); echo $kt[1];  ?><!--  Salesmen <?php echo $nota->sales;  ?> --></td>
		</tr>
		<tr class="tengah" style="border-bottom:1px solid black;border-top:1px solid black;margin-bottom:10px;">
			<td align="center" width="3%">No.</td>
			<td>Nama</td>
			<td align="center">Unit</td>
			<td align="center">Qty</td>
			<td  align="center">Harga</td>
			<td  align="center">Disk</td>
			<td  align="center">Total</td>
		</tr>
	<tbody>
<?php 
		$no=1; $tall=0;
		foreach($data as $row){
		$tall+=$row->total*$row->jml;
		  ?>
		<tr>
			<td  align="center"><?php echo $no; ?></td>
			<td  align=""> <?php echo $row->kode; ?> <?php echo $row->nama; ?></td>
			<td  align="center"><?php echo $row->nota; ?></td>
			<td  align="center"><?php echo $row->jml; ?></td>
			<td align="right"><?php echo uang(buangkrt(',',$row->jual)); ?></td>
			<td align="center"><?php if($row->d1>0) echo $row->d1; if($row->d2>0) echo $row->d2; if($row->d3>0) echo $row->d3; ?></td>
			<td align="right"><?php echo uang($row->total*$row->jml); ?></td>
		</tr>
<?php $no++; } ?>
		<tr style="border-bottom:1px solid black;border-top:1px solid black;">
			<td colspan="2">( <!-- <?php echo date('d/m/Y'); ?> &nbsp;&nbsp; --><?php echo date('H:i:s'); ?> &nbsp;&nbsp;<?php echo $this->session->userdata('nama'); ?> )</td>
			<td>&nbsp;</td>
			<td class="tengah" >Sub Total</td>
		<td></td>
		<td></td>
			<td align="right"><?php echo uang($tall); ?></td>
		</tr>
<?php 		
$pot=0;
$query = $this->db->query("select * from pembayaran where nobil='$nota->nofaktur' and ket like 'Diskon_%'");
			if($query->num_rows()>0){ $d=$query->row(); ?>
		<tr>
			<td colspan=3></td>
			<td class="tengah"  style="border-bottom:1px solid black;">Diskon</td>
<td  style="border-bottom:1px solid black;"></td>			
<td align="center" style="border-bottom:1px solid black;"></td>
<td  style="border-bottom:1px solid black;" align=right><?php $pc=explode('_',$d->ket);
echo $pc[1];
$pot=$d->jml;
 ?></td>
		</tr>
		<?php } ?>
		<tr>
			<td colspan=></td>
			<td colspan=2></td>
			<td class="tengah">Total</td>
			<td ></td>
			<td ></td>
			<td align="right"><?php echo uang($tall-$pot); ?></td>
		</tr>
		
</table>
<table width='100%'>
		<tr>
			<td width='30%' align=center>Hormat Kami<br /><br /><br /><br /><br />
			(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
			<td  width='30%'  align=center>Penerima<br /><br /><br /><br /><br />
			(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
			<td width='40%'>				<button name="" id="" class='cetak'>CETAK</button>
</td>
		</tr>
</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(".cetak").click(function(){
		$(this).hide();
		window.print();
		return false;
});
</script>
<script type="text/javascript">
	//<![CDATA[

//	window.print();
	//window.close();
	//]]>
</script>
</body>
</html>
