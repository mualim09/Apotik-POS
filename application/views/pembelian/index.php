<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Data Stok <?php if($id<>'') {
$info=$this->crud->gettable($id,'gudang','id');
echo $info->gudang; 
	 } ?></h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
		<div class='table-responsive'>
		<div id="xdivpopup"></div>

	<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Nama</td>
		<td>Modal</td>
		<td>Jual</td>
		<td>Stok</td>
		<td>Satuan</td>
		<td>Total</td>
		<td>Fungsi</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php
	 $no=1; $jml=0;
if($id==''){
	$idtoko=$this->session->userdata('idtoko');
	$q=$this->db->query("select * from barang where toko='$idtoko' order by nama asc");
}else{
	$q=$this->db->query("select * from barang where gudang='$id' order by nama asc");	
}
	foreach($q->result() as $row){
	$jml+=buangkrt(',',$row->modal)*$row->stok;
	 ?>
	<tr >
		<td align=center>
		<?php echo $no; ?></td><td>
			<a class='tambahsatuan' href="pembelian/pindahstok/<?php echo $row->id; ?>">
				<?php if($id==''){ echo $row->gudang.')';  } ?><?php echo $row->kode; ?> / <?php echo $row->nama; ?> 
			</a>
		</td>
		<td align=right><?php echo (buangkrt(',',$row->modal)); ?></td>
		<td  align=right><?php echo (buangkrt(',',$row->jual)); ?></td>
		<td  align=center width='15%'>
		<form method="post" action="pembelian/simpanstok/<?php echo $row->id; ?>/" class='setnilai'>
		<div class="input-group flex-nowrap">
			<input type="number" name='stok' class="form-control" placeholder="Stok" value="<?php echo $row->stok; ?>">
			<div class="input-group-prepend">
				<input type="submit" class='btn btn-primary' value="OK" >
			</div>
		</div>
		</form>
		</td>
		<td><?php echo $row->satuan; ?></td>
		<td  align=right class="<?php if($row->stok<1) echo 'bg-warning'; ?>"><?php echo uang(buangkrt(',',$row->modal)*$row->stok); ?></td>
		<td ><?php echo $row->fungsi; ?> [<?php echo $row->id; ?>]</td>

		<td  align=center>
				<a class='tambahsatuan  btn btn-sm btn-success' href="pembelian/editbarang/<?php echo $row->id; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a class='tambahsatuan  btn btn-sm btn-warning' href="pembelian/tambahsatuan/<?php echo $row->id; ?>/<?php echo $row->gudang; ?>">
					<img src="node_modules/bootstrap-icons/icons/plus.svg" width="20" height="20">
				</a>
				
				</td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>
<script>
	$(".setnilai").submit(function(e){
		e.preventDefault();
		$.ajax({
			url:  $(this).attr('action'),
			type: 'post',
			data: $(this).serialize(),
			dataType: "html",
			success: function(dt){
							$.notify("Berhasil Simpan","success");
			},
			error: function(dt){
				alert("Ada kesalahan sistem");
			},
		});//end of ajax()
	}); 
</script>
</div>
<div class="alert alert-info">
	Nilai Asset Rp. <?php echo uang($jml); ?>
</div>
	<script type="text/javascript">
$(".tambahsatuan").click(function(e){
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

			$('.dttable').DataTable();
			$(".pindahstok").on('click',function(e){
				e.preventDefault();
				$("#xdivpopup").load($(this).attr('href'));
			}); 
	</script>
	
		</div>
	</div>
</div>
