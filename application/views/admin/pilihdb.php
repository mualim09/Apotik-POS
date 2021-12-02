
  <div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Import Database</h6>
	<div class="media text-muted pt-3">
	  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
	  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
		<strong class="d-block text-gray-dark">@importdatabase</strong>
		Pilih Database Yang Akan Di Restore Ulang, Kemudian Lanjutkan Untuk Proses.
	  </p>
	</div>
<?php
$idtoko=$this->session->userdata('idtoko');
if ($handle = opendir('./backup/')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			//echo "$entry\n";
			$kt=explode("_",$entry);
if($idtoko==$kt[0]){
?>

	<div class="media text-muted pt-3">
	  <svg class="bd-placeholder-img mr-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 32x32"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
	  <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
	  <a href="main/restoredb/<?php echo $entry; ?>" class='restoredb'>
		<strong class="d-block text-gray-dark"><?php echo $entry; ?></strong>
		Pilih Database.
		</a>
	  </p>
	</div>
<?php
		}}
	}
	closedir($handle);
}
?>
	<small class="d-block text-right mt-3">
	  <a href="#">Semua Database</a>
	</small>
	
  </div>
<script type="text/javascript">
	//<![CDATA[
	$(".restoredb").on('click',function(e){
		e.preventDefault();
		if(confirm('Restore Database?...')){
		$('#proses').waiting();
			$.ajax({
			  url:$(this).attr('href'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
				 success: function(dt){
					Swal.fire(
					  'Informasi',
					  'Berhasil Restore!',
					  'success'
					)
					$('#proses').waiting('done');
				 }
		}); }else
		return false;
	}); 
	//]]>
</script>