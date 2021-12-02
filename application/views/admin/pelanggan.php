
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Data Pelanggan
	<a href="main/tambahpelanggan" class='pmodal'>Tambah Pelanggan <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
	<div class="col-lg-12 table-responsive">
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Nama</td>
		<td>Alamat</td>
		<td>Kota</td>
		<td>Telp</td>
		<td>Batas</td>
		<td>Lama</td>
		<td>Kode</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php $no=1;
	$idtoko=$this->session->userdata('idtoko');
	$q=$this->db->query("select * from pelanggan where idtoko='$idtoko'");
	foreach($q->result() as $row){ ?>
	<tr >
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->nama; ?></td>
		<td><?php echo $row->alamat; ?></td>
		<td><?php echo $row->kota; ?></td>
		<td  align=center><?php echo $row->telp; ?></td>
		<td  align=right><?php echo $row->batas; ?></td>
		<td align=center><?php echo $row->lama; ?></td>
		<td  align=center><?php echo $row->kode; ?></td>
		<td align=center>
		<a class='pmodal' href="main/editpelanggan/<?php echo $row->id; ?>/pelanggan/id">
			<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
		</a>
			
			<a onclick='return confirm("Hapus Data?...");'href="main/hapuspelanggan/<?php echo $row->id; ?>/pelanggan/id"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
		</td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>
	</div>


	</div>
<script type="text/javascript">
	//<![CDATA[
		$(".pmodal").on('click',function(e){
			e.preventDefault();
			$("#divpopup").load($(this).attr('href'));
		}); 
	//]]>
</script>