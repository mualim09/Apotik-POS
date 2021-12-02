
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Data Gudang
	<a href="main/tambahgudang" class='pmodal'>Tambah Data <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
	<div class="col-lg-12 table-responsive">
		
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Gudang</td>
		<td>Ket</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php $no=1;
	$idtoko=$this->session->userdata('idtoko');

	$q=$this->db->query("select * from gudang where idtoko='$idtoko'");
	foreach($q->result() as $row){ ?>
	<tr >
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->gudang; ?></td>
		<td><?php echo $row->ket; ?></td>
		<td align=center>
		<a class='pmodal' href="main/editgudang/<?php echo $row->id; ?>/gudang/id">
			<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
		</a>
			
			<a onclick='return confirm("Hapus Data?...");'href="main/hapusgudang/<?php echo $row->id; ?>/gudang/id"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
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