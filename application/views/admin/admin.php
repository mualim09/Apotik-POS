
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Data Admin
	<a href="main/tambahadmin" class='pmodal'>Tambah Data <img src="node_modules/bootstrap-icons/icons/plus.svg" alt="" width="20" height="20" title="Bootstrap"></a>
	</h6>
	<div class="media text-muted pt-3 ">
	<div class="col-lg-12 table-responsive">
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Nm User</td>
		<td>Nm Login</td>
		<td>No Telp</td>
		<td>Level</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php $no=1;
	$idtoko=$this->session->userdata('idtoko');
	$q=$this->db->query("select * from admin where idtoko='$idtoko'");
	foreach($q->result() as $row){ ?>
	<tr >
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->nmuser; ?></td>
		<td><?php echo $row->nmlogin; ?></td>
		<td><?php echo $row->notelp; ?></td>
		<td><?php echo $row->level; ?></td>
		<td align=center>
		<a class='pmodal' href="main/editadmin/<?php echo $row->id; ?>/admin/id">
			<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
		</a>
			
			<a onclick='return confirm("Hapus Data?...");'href="main/hapusadmin/<?php echo $row->id; ?>/admin/id"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
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