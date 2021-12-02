<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">
		<a href="penjualan/index" >Faktur Baru <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12"><?php //echo $nobil; ?>
<form method="post" id="xsimpan" action="penjualan/simpan/<?php echo $nobil; ?>" enctype="multipart/form-data" >
	<table class="table table-sm table-condensed">
	<?php if($info->stplg=='ya'){ ?>
		<tr>
			<td colspan=4>
				<div class="input-group">
					<select style='display:none;' name="gudang" class="form-control form-control-sm">
						<?php
							foreach($gudang as $row){ 
							if($row->status==2){
							?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->gudang; ?></option>
						<?php }} ?>  
					</select>
					<input  autofocus required class='form-control form-control-sm' placeholder='Pelanggan' type="text" name="supplier" id="j" value="" />
					<input class='form-control form-control-sm' placeholder="NOTA" required type="text"  name="nota" id="nota"  value="" />
					<select  name="metode" id="k" class="form-control form-control-sm">
						<option value="Cash">Cash</option>
						<option value="Hutang">Hutang</option>
					</select>
					<input  autocomplete='off' class='form-control form-control-sm ptgl' type="text" name="tbayar"  placeholder="Jatuh Tempo"  value="" />
					<input   class='form-control form-control-sm'  type="date" name="tgl"  value="<?php echo date('Y-m-d'); // H:i:s ?>" />


				</div>
			</td>
		</tr>
<?php }else{ ?>
	<tr>
			<td colspan=4 style='display:none;'>
				<div class="input-group">
					<select style='display:none;' name="gudang" class="form-control form-control-sm">
						<?php
							foreach($gudang as $row){ 
							if($row->status==2){
							?>
							<option value="<?php echo $row->id; ?>"><?php echo $row->gudang; ?></option>
						<?php }} ?>  
					</select>
					<input   required class='form-control form-control-sm' placeholder='Pelanggan' type="text" name="supplier" id="j" value="Umum" />
					<input class='form-control form-control-sm' placeholder="NOTA" type="text"  name="nota" id="nota"  value="" />
					<select  name="metode" id="k" class="form-control form-control-sm">
						<option value="Cash">Cash</option>
						<option value="Hutang">Hutang</option>
					</select>
					<input  autocomplete='off' class='form-control form-control-sm ptgl' type="text" name="tbayar"  placeholder="Jatuh Tempo"  value="" />
					<input   class='form-control form-control-sm'  type="date" name="tgl"  value="<?php echo date('Y-m-d'); // H:i:s ?>" />


				</div>
			</td>
		</tr>

<?php } ?>
		<tr>
			<td colspan=4>
				<div class="input-group">
				<input  hidden required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" name="pkali" id="pkali" value="" />
					<input  hidden class='form-control form-control-sm  b1' type="text" name="idbarang" id="idbarang" value="" />
					<input  autofocus required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" id="kta" value="" />
					<input  hidden required placeholder='Kode/Nama ' class='form-control b1 form-control-sm' type="text" name="kode" id="kode" value="" />
					<input  hidden required placeholder='Nama Barang  ' class='form-control b1 form-control-sm' type="text" name="nama" id="nama" value="" />
					<input hidden required class='form-control form-control-sm  b1' placeholder='Kategori' type="text" name="kategori" id="kategori" value="" />
					<input  required  class='form-control form-control-sm  col-sm-1  b1' placeholder="Jumlah" type="text" name="jml" id="jml" value="" />
					<input  required  class='form-control col-sm-1 form-control-sm  b1' placeholder="Stok" type="text" name="stok" id="stok" readonly value="" />
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
		<tr>
		<td colspan=4 class='collapse potongan'>
			<div class="input-group">
				<input  hidden  class='form-control form-control-sm uang  b1' placeholder='Modal' type="text" name="modal" id="modal" value="" />	
				<input  required  class='form-control form-control-sm uang  b1' placeholder='Harga Jual' type="text" name="jual" id="jual" value="" />
				<input    class='form-control form-control-sm col-sm-1 b1' placeholder='D1 %' type="text" name="d1" id="d1" value="" />	
				<input    class='form-control form-control-sm col-sm-1  b1' placeholder='D2  %' type="text" name="d2" id="d2"  value="" />
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
			//	,startDate: '+90d'

			});
	//]]>
</script>
<ul class="nav nav-tabs" role="tablist">
<!-- 	<li class="nav-item active"><a class="nav-link active" href="#masuk" role="tab" data-toggle="tab">History</a></li>
 -->	<li class="nav-item active"><a class="nav-link active"href="#keluar" role="tab" data-toggle="tab">Lainnya</a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
<!-- 	<div class="tab-pane " id="masuk">
		<div id="databeli"></div><br />
	</div>
 -->	<div class="tab-pane active" id="keluar">
		<div class="table-responsive" id="orderlama"></div>
	</div>
</div>

<script type="text/javascript">

			$("#kta").on('keypress',function(e){
						var plg=$('#j').val();
						$('#kta').autocomplete({
							serviceUrl: 'cari/barangjual/b/'+plg,
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
				
			$("#orderlama").load('penjualan/orderlama');
//			$("#databeli").load("penjualan/history/<?php echo $nobil; ?>");
			$("#databeli").load("penjualan/history/");
			$('#b').autocomplete({
				serviceUrl: 'cari/carikategori/',
				minChars:2,
				onSelect: function (s) {
				}
			});
		$("#j").on('keypress',function(e){
				$('#j').autocomplete({
					serviceUrl: 'cari/caripelanggan/',
					minChars:2,
					onSelect: function (s) {
						var nama=s.nama;
						$('#nota').val(s.nota);
					}
				});
		});
		
		$("#kode,#nama").focusout(function(e){
						e.preventDefault();
						var jj=$("#j").val();
						$("#databeli").load("penjualan/history/"+jj);
		}); 

			$("#kode").on('keypress',function(e){
						$('#kode').autocomplete({
							serviceUrl: 'cari/barang/b',
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
								$('#pkali').val(s.pkali);

								$("#jml").focus();
							}
						});
				});

		$("#nama").on('keypress',function(e){
				$('#nama').autocomplete({
					serviceUrl: 'cari/barang/a',
					minChars:2,
					onSelect: function (s) {
								$('#modal').val(s.modal);
								$('#jual').val(s.jual);
						//		$('#d1').val(s.d1);
						//		$('#d2').val(s.d2);
						//		$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$('#pkali').val(s.pkali);

								$("#jml").focus();

					}
				});
			});

			$("#xsimpan").on('submit',function(e){
				$('#proses').waiting();
				var kode=$("#nota").val();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							if(dt){
								window.location="penjualan/nota/"+dt;
							}else{
								$.notify("Stok Tidak Cukup","warning");
								$('#proses').waiting('done');
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
								$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");
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
