
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Nota <?php echo $nobil; ?> 
	<a href="pembelian/pembelian" >Pembelian Baru <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
<form method="post" id="xsimpan" action="pembelian/simpan/<?php echo $nobil; ?>" enctype="multipart/form-data" >
	<table class="table table-sm table-condensed">
		<tr>
			<td colspan=4>
				<div class="input-group">
					<select readonly required name="gudang" class="form-control form-control-sm">
						<?php
							foreach($gudang as $row){ ?>
							<option value="<?php echo $row->id; ?>"  <?php if($nota->gudang==$row->id) echo 'selected'; ?>><?php echo $row->gudang; ?></option>
						<?php } ?>  
					</select>
					<input readonly class='form-control form-control-sm' placeholder="NOTA" required type="text"  name="nota" value="<?php echo $nota->nota; ?>" />
					<input readonly required class='form-control form-control-sm' placeholder='Supplier' type="text" name="supplier" id="j" value="<?php echo $nota->supplier; ?>" />
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
					<input  hidden class='form-control form-control-sm  b1' type="text" name="idbarang" id="idbarang" value="" />
					<input  autofocus required placeholder='Kode Barang  ' class='form-control b1 form-control-sm' type="text" name="kode" id="kode" value="" />
					<input  autofocus required placeholder='Nama Barang  ' class='form-control b1 form-control-sm' type="text" name="nama" id="nama" value="" />
					<input required class='form-control form-control-sm  b1' placeholder='Kategori' type="text" name="kategori" id="kategori" value="" />
					<input  required  class='form-control form-control-sm  b1' placeholder="Jumlah" type="text" name="jml" id="jml" value="" />
					<div class="input-group-append">
						<a class='btn btn-success btn-sm' data-toggle="collapse" href=".potongan" role="button" aria-expanded="false" aria-controls="collapseExample">Diskon</a>
					</div>

				</div>
			</td>

		</tr>
		<tr>
		<td colspan=4>
			<div class="input-group">
				<input    class='form-control form-control-sm uang  b1' placeholder='Modal' type="text" name="modal" id="modal" value="" />	
				<input  required  class='form-control form-control-sm uang  b1' placeholder='Harga Jual' type="text" name="jual" id="jual" value="" />
				<input  placeholder='Satuan'  class='form-control form-control-sm  b1' type="text" name="satuan" id="satuan" value="" />
			</div>
		</td>
		</tr>
		<tr>
		<td colspan=4   class='collapse potongan'>
			<div class="input-group">
				<input   class='form-control form-control-sm b1' placeholder='D1  %' type="text" name="d1" id="d1" value="" />	
				<input   class='form-control form-control-sm  b1' placeholder='D2  %' type="text" name="d2" id="d2"  value="" />
				<input  placeholder='D3  %'  class='form-control form-control-sm  b1' type="text" name="d3" id="d3"  value="" />
				<div class="input-group-append">
					<input type="submit" class="btn btn-sm btn-primary"name="save" value="SIMPAN" />
				</div>
			</div>
		</td>
		</tr>
		<tr>
		<td colspan=4>
			<div class="input-group">
				<input    class='form-control form-control-sm   b1' placeholder='Fungsi' id="fungsi" type="text" name="fungsi" value="" />	
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
</ul>
<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="masuk">
		<div id="databeli"></div>
	</div>
	<div class="tab-pane" id="keluar">
		<div class="table-responsive" id="orderlama"></div>
	</div>
</div>

<script type="text/javascript">
			$("#orderlama").load('pembelian/orderlama');
			$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");

			$('#kategori').autocomplete({
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
			
			$("#kode").on('keypress',function(e){
						$('#kode').autocomplete({
							serviceUrl: 'cari/barang/b',
							minChars:2,
							onSelect: function (s) {
								$('#modal').val(s.modal);
								$('#jual').val(s.jual);
								$('#d1').val(s.d1);
								$('#d2').val(s.d2);
								$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$("#jml").focus();
								$('#fungsi').val(s.fungsi);

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
								$('#d1').val(s.d1);
								$('#d2').val(s.d2);
								$('#d3').val(s.d3);
								$('#idbarang').val(s.id);
								$('#kode').val(s.kode);
								$('#nama').val(s.nama);
								$('#kategori').val(s.kategori);
								$('#satuan').val(s.satuan);
								$("#jml").focus();
								$('#fungsi').val(s.fungsi);


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
							$('.b1').val('');
							$('#kode').focus();
							$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");
							$("#orderlama").load('pembelian/orderlama');
							$('#proses').waiting('done');
						//	$.notify("berhasil simpan","success");
							$("#divpopup").load("pembelian/sn/<?php echo $nobil; ?>");
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
