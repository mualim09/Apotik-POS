<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Informasi <?php echo $op; ?></h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
<?php 
	$toko=$this->session->userdata('idtoko');

if($param=='a' or $param=='b'){ ?>
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Nama</td>
		<td>Modal</td>
		<td>Jual</td>
		<td>Stok</td>
	</tr>
</thead>
<tbody>
<?php
	 $no=1;
	 if($param=='a')
	$q=$this->db->query("select * from barang where stok<1 and toko='$toko'");
	else
	$q=$this->db->query("select * from barang  where stok<5  and toko='$toko'");
	foreach($q->result() as $row){ ?>
	<tr class="<?php if($row->stok<1) echo 'table-warning'; ?>">
		<td align=center><?php echo $no; ?></td><td><?php echo $row->nama; ?></td>
		<td align=right><?php echo uang(buangkrt(',',$row->modal)); ?></td><td  align=right><?php echo uang(buangkrt(',',$row->jual)); ?></td>
		<td  align=center><?php echo $row->stok; ?> <?php echo $row->satuan; ?></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>
<?php }else{ ?>
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Gudang</td>
		<td>Nama</td>
		<td>Jumlah</td>
	</tr>
</thead>
<tbody>
<?php
	 $no=1;
	$q=$this->db->query("select gudang,kode,nama,sum(jml) as jml from keluar_masuk  where idtoko='$toko' and  ket='K' group by gudang,kode order by jml desc limit 20");
	foreach($q->result() as $row){ ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td align=center><?php echo $row->gudang; ?></td>
		<td><?php echo $row->kode; ?> <?php echo $row->nama; ?></td>
		<td align=center><?php echo uang($row->jml); ?></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>
<?php } ?>
	<script type="text/javascript">
			$('.dttable').DataTable();
	</script>
		</div>
	</div>
</div>
