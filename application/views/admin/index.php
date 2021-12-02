
  <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded shadow-sm">
	<img class="mr-3" src="plugin/gambar/<?php echo $info->logo; ?>" alt="" width="48" height="48">
	<div class="lh-100">
	  <h6 class="mb-0 text-white lh-100">Hallo <?php echo $info->nmuser; ?></h6>
	  <small>Selamat Datang Di Halaman Utama Administrator!</small>
	</div>
  </div>
  <?php
  
  			$idtoko=$this->session->userdata('idtoko');
		//	echo diskon(10000,0);

  
  ?>
  <?php if($this->session->userdata('level')==1){ ?>
<div class="row">
<div class="col-lg-6">
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Transaksi Terbaru</h6>
<?php

		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where   keluar_masuk.idtoko='$idtoko' and keluar_masuk.ket='K' group by nofaktur  order by keluar_masuk.id desc limit 7");
		foreach($q->result() as $row){ 
			if(substr($row->nofaktur,0,2)<>'MV'){
?>
	<div class="media text-muted pt-3">
	  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
	  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		<strong class="d-block text-gray-dark">@<?php echo $row->nofaktur; ?> <?php echo $row->supplier; ?> / <a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?></a></strong>
		Item <?php echo $row->jumlah; ?> Total Rp. <?php echo uang($row->nota); ?> Pembayaran <b class='bagge badge-warning m-1'><?php echo $row->stbayar; ?></b>
	  </p>
	</div>
<?php }} ?>

	<small class="d-block text-right mt-3">
	  <a href="penjualan/lpjual">Semua Transaksi</a>
	</small>
  </div>
</div>
<div class="col-lg-6">
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Barang Masuk</h6>
<?php

		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*modal) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where   keluar_masuk.idtoko='$idtoko' and keluar_masuk.ket='M' group by nofaktur  order by keluar_masuk.id desc limit 7");
		foreach($q->result() as $row){ 
			if(substr($row->nofaktur,0,2)<>'MV'){
?>
	<div class="media text-muted pt-3">
	  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
	  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		<strong class="d-block text-gray-dark">@<?php echo $row->supplier; ?> / <a href="pembelian/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?></a></strong>
		Item <?php echo $row->jumlah; ?> Total Rp. <?php echo uang($row->nota); ?> Pembayaran <b class='bagge badge-warning m-1'><?php echo $row->stbayar; ?></b>
	  </p>
	</div>
<?php }} ?>
	<small class="d-block text-right mt-3">
	  <a href="pembelian/lpbelanja">Semua Transaksi</a>
	</small>
  </div>
</div>

</div>

<?php } ?>