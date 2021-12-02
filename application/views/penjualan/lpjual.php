
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Laporan Data Penjualan</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
 <form method="post" id="fsearch" action="">
	<div class="input-group">
		<input  class="form-control form-control-sm " id="sp" type="text" name="sp" value="<?php  if(isset($_POST['sp'])) echo $_POST['sp']; ?>" placeholder="Pelanggan" />	
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
			<td>Kasir</td>
			<td>Faktur</td>
			<td>Pembayaran</td>
			<td>Jumlah</td>
			<td>Total</td>
			<td>Sisa</td>
			<td>Aksi</td>
		</tr>
			</thead>
<tbody>
	
	<?php $no=1; $ht=0;
		$idtoko=$this->session->userdata('idtoko');
		$id=$this->session->userdata('id');
		$nama=$this->session->userdata('nmuser');
		$level=$this->session->userdata('level');
		$admin=$id.'_'.$nama;

if(isset($_POST['test'])){
if($_POST['sp']<>''){
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where keluar_masuk.idtoko='$idtoko' and keluar_masuk.supplier='$_POST[sp]'  and  keluar_masuk.ket='K' and keluar_masuk.idadmin='$admin' group by nofaktur  order by keluar_masuk.id desc");
}elseif($_POST['te']<>''){
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where keluar_masuk.idtoko='$idtoko' and keluar_masuk.nofaktur='$_POST[te]' and  keluar_masuk.ket='K' and keluar_masuk.idadmin='$admin' group by nofaktur  order by keluar_masuk.id desc");
}else{
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang
		where keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl>='$_POST[tgla]' and keluar_masuk.tgl<='$_POST[tglb]' and keluar_masuk.ket='K' and keluar_masuk.idadmin='$admin'  group by nofaktur  order by keluar_masuk.id desc");
}
}else{
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where    keluar_masuk.tgl=date(now()) and keluar_masuk.idtoko='$idtoko' and keluar_masuk.ket='K' and keluar_masuk.idadmin='$admin' group by nofaktur  order by keluar_masuk.id desc");

}
		foreach($q->result() as $row){ 
			if(substr($row->nofaktur,0,2)<>'MV'){
				?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?>
			<!-- <br />
			<?php echo $row->gudang; ?>--></a></td>
			<td><?php $kt=explode("_",$row->idadmin); echo $kt[1]; ?></td>
			<td><?php echo $row->nofaktur; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php if($row->stbayar=='Hutang'){ ?>
			<?php if($row->nota-$this->crud->getbayar($row->nofaktur)>0){ ?>
				<a class='inputbayar' href="penjualan/inputbayar/<?php echo $row->nofaktur; ?>">
					<?php echo $row->stbayar; ?>
					<?php if('0000-00-00'<>$row->tbayar){ ?>
						<br />
						<?php echo tgl_indo(substr($row->tbayar,0,10)); ?>
					<?php } ?>
				</a>
				<?php }else{ ?>
				<a class='inputbayar' href="penjualan/inputbayar/<?php echo $row->nofaktur; ?>">
				Lunas</a>
				<?php } ?>
			<?php }else{ ?>
							<a class='inputbayar' href="penjualan/inputbayar/<?php echo $row->nofaktur; ?>">

				<?php echo $row->stbayar; ?></a>
			<?php } ?>
			</td>
			<td align=center><?php echo $row->jumlah; ?></td>
			<td  align=right><?php echo uang($row->nota); ?></td>
			<td align=right>
			<?php //if($row->stbayar=='Hutang'){} ?>
				<?php echo uang($row->nota-$this->crud->getbayar($row->nofaktur));
				$ht+=$row->nota-$this->crud->getbayar($row->nofaktur);  ?>
		
<?php
			if(!$this->crud->cekcash($row->nofaktur)){ ?> <a class='inputbayar' href="penjualan/inputbayar/<?php echo $row->nofaktur; ?>"><b>Blm Input Pembayaran</b> </a><?php  }; 
			?>
		
			
			</td>
			<td align=center>
				<a class='pmodal  btn btn-sm btn-success' href="penjualan/nota/<?php echo $row->nofaktur; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a nobil="<?php echo $row->nofaktur; ?>" class='xhapusnota btn btn-sm btn-warning' href="penjualan/batalmasukall/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
				<a class='tambahreturn btn btn-sm btn-info' href="pembelian/inputreturn/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/upload.svg"  width="20" height="20"></a>
				<a class=' btn cetak btn-sm btn-success' href="<?php echo $row->nofaktur; ?>"><img src="node_modules/bootstrap-icons/icons/cart-plus.svg"  width="20" height="20"></a>

			</td>
		</tr>
		<?php $no++; }} ?>
		</tbody>

	</table>
	</div>
	<div class="alert alert-warning">
		Total Nota Belum Lunas Rp. <?php echo uang($ht); ?>
	</div>
	<script type="text/javascript">
		//<![CDATA[
			$(".cetak").click(function(e){
				e.preventDefault();
				var nobil=$(this).attr('href');
				window.open("penjualan/cetak/"+nobil, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=300,left=500,width=600,height=400");
			}); 
		$(".tambahreturn").click(function(e){
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
		$(".xhapusnota").click(function(e){
						e.preventDefault();
						if(confirm('Hapus Semua Data Nota?...')){
						var nobil= $(this).attr('nobil');
						$.ajax({
							url:  $(this).attr('href'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								$.notify("Berhasil hapus","success");
								window.location="penjualan/index"
							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
						}else return false;
			}); 
		//]]>
	</script>

		</div>
	</div>
</div>
