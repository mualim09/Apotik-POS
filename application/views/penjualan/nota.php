  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0"><?php echo $nota->supplier; ?> :: Nota <?php echo $nobil; ?> 
	<a href="penjualan/index" >Penjualan Baru <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
		<?php
		
		//	if(!isset($row->gudang)) redirect('penjualan/index');
		
		?>
<form method="post" id="xsimpan" action="penjualan/simpan/<?php echo $nobil; ?>" enctype="multipart/form-data" >
	<table class="table table-sm table-condensed">
		<tr style='display:none;'>
			<td colspan=4>
				<div class="input-group">
					<select style='display:none;' name="gudang" class="form-control form-control-sm">
						<?php
							foreach($gudang as $row){ 
							if($row->status==2){
							?>
								<option value="<?php echo $row->id; ?>"  <?php if($nota->gudang==$row->id) echo 'selected'; ?>><?php echo $row->gudang; ?></option>
						<?php }} ?>  
					</select>
					<input hidden readonly required class='form-control form-control-sm' placeholder='Pelanggan' type="text" name="supplier" id="j" value="<?php echo $nota->supplier; ?>" />
					<input hidden class='form-control form-control-sm' readonly  placeholder="NOTA" required type="text"  name="nota" id="nota"  value="<?php echo $nobil; ?>" />
					<select  name="metode" id="k" class="form-control form-control-sm">
						<option value="Hutang" <?php if($nota->stbayar=='Hutang') echo 'selected'; ?>>Hutang</option>
						<option value="Cash"  <?php if($nota->stbayar=='Cash') echo 'selected'; ?>>Cash</option>
					</select>
					
					<input  autocomplete='off' class='form-control form-control-sm ptgl' type="text" name="tbayar"  placeholder="Jatuh Tempo"  value="<?php echo $nota->tbayar; ?>" />
					<input   class='form-control form-control-sm'  type="date" name="tgl"  value="<?php echo $nota->tgl; ?>" />
				</div>
			</td>
		</tr>

		<tr>
			<td colspan=4>
				<div class="input-group">
				<input  hidden required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" name="pkali" id="pkali" value="" />
					<input  hidden class='form-control form-control-sm  b1' type="text" name="idbarang" id="idbarang" value="" />
					<input plg="<?php echo $nota->supplier; ?>" autofocus required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" id="kta" value="" />
					<input  hidden required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" name="kode" id="kode" value="" />
					<input  hidden required placeholder='Nama Barang  ' class='form-control b1 form-control-sm' type="text" name="nama" id="nama" value="" />
					<input hidden required class='form-control form-control-sm  b1' placeholder='Kategori' type="text" name="kategori" id="kategori" value="" />
					<input autocomplete='off' required  class='form-control form-control-sm  col-sm-1  b1' placeholder="Jumlah" type="text" name="jml" id="jml" value="" />
					<input hidden required  class='form-control col-sm-1 form-control-sm  b1' placeholder="Stok" type="text" name="stok" id="stok" readonly value="" />
					<input readonly placeholder='Satuan'  class='form-control col-sm-1  form-control-sm  b1' type="text" name="satuan" id="satuan" value="" />
				<div class="input-group-append">
					<a class='btn btn-success btn-sm' data-toggle="collapse" href=".potongan" role="button" aria-expanded="false" aria-controls="collapseExample">Diskon</a>
					<?php if($this->agent->is_mobile()){ ?>
						<input type="submit" class="btn btn-sm btn-primary"name="save" value="SIMPAN" />
					<?php } ?>
				</div>

				</div>
			</td>

		</tr>
		<tr  class='collapse potongan'>
		<td colspan=4>
			<div class="input-group">
				<input  hidden  class='form-control form-control-sm uang  b1' placeholder='Modal' type="text" name="modal" id="modal" value="" />	
				<input  required  class='form-control form-control-sm uang  b1' placeholder='Harga Jual' type="text" name="jual" id="jual" value="" />
				<input    class='form-control form-control-sm col-sm-1 b1' placeholder='D1 %' type="text" name="d1" id="d1" value="" />	
				<input    class='form-control form-control-sm col-sm-1  b1' placeholder='D2 %' type="text" name="d2" id="d2"  value="" />
				<input  placeholder='D3  %'  class='form-control form-control-sm col-sm-1   b1' type="text" name="d3" id="d3"  value="" />
				<select name="sales" class="form-control form-control-sm">
				<?php
							foreach($sales as $row){ 
							?>
								<option value="<?php echo $row->nama; ?>"><?php echo $row->nama; ?></option>
						<?php } ?>  
				</select>
				<div class="input-group-append">
					<input type="submit" class="btn btn-sm btn-primary"name="save" value="SIMPAN" />
				</div>
			</div>
		</td>
		</tr>


	</table>
</form>
<!-- <div  style="overflow-y:scroll; height: 350px;">
 -->	
 <script type="text/javascript">
	//<![CDATA[
	$('.ptgl').datepicker({
				format: 'yyyy-mm-dd',
				autoclose: true,
				//startView: 2,
				todayBtn: true,
				todayHighlight: true,
				clearBtn: true,
				language: 'id'
				,startDate: '+90d'

			});
	//]]>
</script>
<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item active"><a class="nav-link active" href="#masuk" role="tab" data-toggle="tab">Faktur Sekarang</a></li>
	<li class="nav-item "><a class="nav-link"href="#keluar" role="tab" data-toggle="tab">Lainnya</a></li>
	<li class="nav-item "><a class="nav-link"href="#thistory" role="tab" data-toggle="tab">History</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="masuk">
		<div id="databeli"></div>
	</div>
	<div class="tab-pane" id="keluar">
		<div class="table-responsive" id="orderlama"></div>
	</div>
	<div class="tab-pane" id="thistory">
	<table width='100%' class='mt-2 table pdttable table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
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
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where keluar_masuk.supplier='$nota->supplier' and keluar_masuk.ket='K'  and keluar_masuk.idtoko='$idtoko'
		and  keluar_masuk.nofaktur<>'$nobil'  group by keluar_masuk.nofaktur  order by keluar_masuk.id desc limit 10");
		foreach($q->result() as $row){ ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?><br />
			<?php echo $row->gudang; ?></a></td>
			<td><?php echo $row->nofaktur; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php if($row->stbayar=='Hutang'){ ?>
			<?php if($row->nota-$this->crud->getbayar($row->nofaktur)>0){ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
					<?php echo $row->stbayar; ?><br />
					<?php if('0000-00-00'<>$row->tbayar){ ?>
						<br />
						<?php echo tgl_indo(substr($row->tbayar,0,10)); ?>
					<?php } ?>				</a>
				<?php }else{ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
				Lunas</a>
				<?php } ?>
			<?php }else{ ?>
							<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">

				<?php echo $row->stbayar; ?></a>
			<?php } ?>
			</td>
			<td align=center><?php echo $row->jumlah; ?></td>
			<td  align=right><?php echo uang($row->nota); ?></td>
			<td align=right>
			<?php if($row->stbayar=='Hutang'){ ?>
				<?php echo uang($row->nota-$this->crud->getbayar($row->nofaktur)); 
				$ht+=$row->nota-$this->crud->getbayar($row->nofaktur);
				?>
			<?php } ?>
			</td>
			<td align=center>
				<a class='pmodal  btn btn-sm btn-success' href="penjualan/nota/<?php echo $row->nofaktur; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a nobil="<?php echo $row->nofaktur; ?>" class='xhapusnota btn btn-sm btn-warning' href="penjualan/batalmasukall/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>

			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>

	</table>
		<div class="alert alert-warning">
		Total Nota Belum Lunas Rp. <?php echo uang($ht); ?>
	</div>
	</div>
</div>

<script type="text/javascript">
			$("#orderlama").load('penjualan/orderlama');
			$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");
			$('#b').autocomplete({
				serviceUrl: 'cari/carikategori/',
				minChars:2,
				onSelect: function (s) {
				
				}
			});

			$('#j').autocomplete({
				serviceUrl: 'cari/carisupplier/',
				minChars:2,
				onSelect: function (s) {
				}
			});

			$("#kta").on('keypress',function(e){
						$('#kta').autocomplete({
							serviceUrl: "cari/barangjual/b/<?php echo $nota->supplier; ?>",
							minChars:2,
							onSelect: function (s) {
								$('#modal').val(s.modal);
								$('#jual').val(s.jual);
							//	$('#d1').val(s.d1);
							//	$('#d2').val(s.d2);
							//	$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$('#stok').val(s.stok);
								$('#pkali').val(s.pkali);
								$("#jml").focus();
							}
						});
				});


			$("#kode").on('keypress',function(e){
						$('#kode').autocomplete({
							serviceUrl: 'cari/barangjual/b',
							minChars:2,
							onSelect: function (s) {
								$('#modal').val(s.modal);
								$('#jual').val(s.jual);
							//	$('#d1').val(s.d1);
							//	$('#d2').val(s.d2);
							//	$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$('#stok').val(s.stok);
								$('#pkali').val(s.pkali);

								$("#jml").focus();
							}
						});
				});

		$("#nama").on('keypress',function(e){
				$('#nama').autocomplete({
					serviceUrl: 'cari/barangjual/a',
					minChars:2,
					onSelect: function (s) {
								$('#modal').val(s.modal);
								$('#jual').val(s.jual);
							//	$('#d1').val(s.d1);
							//	$('#d2').val(s.d2);
							//	$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$('#stok').val(s.stok);
								$('#pkali').val(s.pkali);

								$("#jml").focus();
					}
				});
			});

			$("#xsimpan").on('submit',function(e){
				$('#proses').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
						if(dt){
							$('.b1').val('');
							$('#kta').focus();
							$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");
							$("#orderlama").load('penjualan/orderlama');
							$('#proses').waiting('done');
						//	$.notify("berhasil simpan","success");
						//	$("#divpopup").load("penjualan/sn/<?php echo $nobil; ?>");
							}else{
								$('#proses').waiting('done');
								$.notify("Gagal","warning");
							}
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 

			$("#databeli").on('click','.batalstok',function(e){
				e.preventDefault();
				if(confirm('Hapus Data?...')){
						$.ajax({
							url:  $(this).attr('href'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");
								if(dt)
									$.notify(dt,"success");
								else
									$.notify("Gagal","warning");
							},
							error: function(dt){
									$.notify("Ada Kesalahan Sistem","warning");
							},
						});//end of ajax()
				}else
					return false;
			}); 

</script>

	</div>
		</div>
	</div>
