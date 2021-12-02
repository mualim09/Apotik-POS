<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $info->nmtoko; ?>">
	<meta name="author" content="<?php echo $info->nmtoko; ?>">
	<meta name="generator" content="<?php echo $info->nmtoko; ?>">
	<title><?php echo $info->nmuser; ?> :: <?php echo $info->nmtoko; ?></title>
	<base href="<?php echo base_url(); ?>" />
	<link href="plugin/b4/css/bootstrap.min.css" rel="stylesheet">
	<!-- Favicons -->
	<link rel="apple-touch-icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="180x180">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="32x32" type="image/png">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>" sizes="16x16" type="image/png">
	<link rel="mask-icon" href="plugin/gambar/<?php echo $info->logo; ?>" color="#563d7c">
	<link rel="icon" href="plugin/gambar/<?php echo $info->logo; ?>">
	<meta name="theme-color" content="#563d7c">
	<!-- Custom styles for this template -->
	<link href="plugin/style.css" rel="stylesheet">
	<script src="plugin/jq.js"></script>
	<script src="plugin/b4/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="plugin/angka.js"></script>
	<script type="text/javascript" src="plugin/notify.js"></script>
	<link rel="stylesheet" type="text/css" href="plugin/waiting/waiting.css">
	<link rel="stylesheet" type="text/css" href="plugin/bpopup/formuser.css">
	<script src="plugin/waiting/waiting.min.js"></script>
	<script src="plugin/bpopup/jquery.bpopup.min.js"></script>
	<script src="plugin/ajaxautocomplete/jquery.autocomplete.min.js"></script>
	<script src="plugin/bootstrapdatepicker/bootstrap-datepicker.js"></script>
	<script src="plugin/sweetalert/sweetalert2.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="plugin/bootstrapdatepicker/bootstrap-datepicker.css">
	<link rel="stylesheet" type="text/css" href="plugin/ajaxautocomplete/autocomplete.css">

	<link rel="stylesheet" type="text/css" href="plugin/sweetalert/sweetalert2.css">
	<link rel="stylesheet" href="plugin/dttable/css/dataTables.bootstrap4.min.css" type="text/css" media="" />
	<script type="text/javascript" language="javascript" src="plugin/dttable/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="plugin/dttable/js/dataTables.bootstrap4.min.js"></script>
	<?php if($this->agent->is_mobile()){  ?>
	<style type="text/css" media="screen" id="test">
		.dropdown-toggle,
	  .dropdown-menu {
		border-radius: 0px !important;
	  }
	  .dropdown-item:hover {
		color: white;
		background-color: #dc3545;
	  }
	  .btn-danger {
		width: 55%;
	  }
	  .dropdown:hover>.dropdown-menu {
		display: block;
	  }
	
	</style>
<?php } ?>
<style>
  .kanan{
	 	text-align:right;
	  }
	  </style>
  </head>
  <body class="bg-light" id="proses">
<div class="row">
	<div id="psatu" class="col-lg-11" style="display: none"></div>
	<div id="divpopup"></div>
</div>
	<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand mr-auto mr-lg-0" href="main/">	<img class="mr-3" src="plugin/gambar/<?php echo $info->logo; ?>" alt="" width="30" height="30">
  <?php echo $info->nmtoko; ?></a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
	<ul class="navbar-nav mr-auto">
	<?php if($this->session->userdata('level')==2){ ?>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Penjualan</a>
		<div class="dropdown-menu" aria-labelledby="p1">
		<a class="dropdown-item" href="penjualan/index">Transaksi Baru</a>
		<a  class="dropdown-item" href="penjualan/lpjual">Laporan Penjualan</a>
		<a  class="dropdown-item tambahreturnal" href="penjualan/inputreturn/">Return Penjualan</a>
		<a  class="dropdown-item" href="penjualan/xreturn">Laporan Return Penjualan</a>
		<a class="dropdown-item" href="penjualan/hutangbayar">Laporan Pembayaran Piutang</a>
	<?php if($this->session->userdata('id')==44){ ?>
                        <a class="dropdown-item" href="laporan/kasir">Penjualan Perkasir</a>
<?php } ?>

		</div>
		</li>
		<li class="nav-item"><a class="nav-link xpmodal"  href="main/akun">Akun</a></li>
	<?php } ?>
	<?php if($this->session->userdata('level')==3){ ?>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pembelian</a>
		<div class="dropdown-menu" aria-labelledby="p2">
		<a  class="dropdown-item" href="pembelian/index" target="_blank">Stok Gudang</a>
		<a class="dropdown-item" href="pembelian/pembelian">Barang Masuk</a>
		<a  class="dropdown-item" href="pembelian/lpbelanja">Laporan Pembelian</a>
		<a  class="dropdown-item tambahreturnal" href="pembelian/inputreturn/">Return Pembelian</a>
		<a  class="dropdown-item" href="pembelian/xreturn">Laporan Return Beli</a>
		<a class="dropdown-item" href="pembelian/hutangbayar">Laporan Pembayaran Hutang</a>
		</div>
	  </li>

		<li class="nav-item"><a class="nav-link xpmodal"  href="main/akun">Akun</a></li>
	<?php } ?>
	<?php if($this->session->userdata('level')==1){ ?>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Penjualan</a>
		<div class="dropdown-menu" aria-labelledby="p1">
		<a class="dropdown-item" href="penjualan/index">Transaksi Baru</a>
		<a  class="dropdown-item" href="penjualan/lpjual">Laporan Penjualan</a>
		<a  class="dropdown-item tambahreturnal" href="penjualan/inputreturn/">Return Penjualan</a>
		<a  class="dropdown-item" href="penjualan/xreturn">Laporan Return Penjualan</a>
		<a class="dropdown-item" href="penjualan/hutangbayar">Laporan Pembayaran Piutang</a>
		</div>
		</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pembelian</a>
		<div class="dropdown-menu" aria-labelledby="p2">
		<a  class="dropdown-item" href="pembelian/index"  target="_blank">Stok Gudang</a>
		<a class="dropdown-item" href="pembelian/pembelian">Barang Masuk</a>
		<a  class="dropdown-item" href="pembelian/lpbelanja">Laporan Pembelian</a>
		<a  class="dropdown-item tambahreturnal" href="pembelian/inputreturn/">Return Pembelian</a>
		<a  class="dropdown-item" href="pembelian/xreturn">Laporan Return Beli</a>
		<a class="dropdown-item" href="pembelian/hutangbayar">Laporan Pembayaran Hutang</a>
		</div>
	  </li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p9" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Informasi</a>
		<div class="dropdown-menu" aria-labelledby="p9">
		<a class="dropdown-item" href="info/index/a/<?php echo  url_title("Stok Habis", 'underscore', TRUE); ?>">Stok Habis</a>
		<a class="dropdown-item" href="info/index/b/<?php echo  url_title("Kurang Dari 5", 'underscore', TRUE); ?>">Kurang Dari 5</a>
		<a class="dropdown-item" href="info/index/c/<?php echo  url_title("Terlaris", 'underscore', TRUE); ?>">Terlaris</a>
<!-- 		<a class="dropdown-item" href="info/index/d/<?php echo  url_title("Stok Diam", 'underscore', TRUE); ?>">Stok Diam</a>
 -->		</div>
	  </li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">IN OUT</a>
		<div class="dropdown-menu" aria-labelledby="p4">
		<a class="dropdown-item" href="pengeluaran/index/um">Pendapatan</a>
		<a class="dropdown-item tambahreturnal" href="pengeluaran/input/um">Entri Pendapatan</a>
		<a class="dropdown-item" href="pengeluaran/index/uk">Pengeluaran</a>
		<a class="dropdown-item tambahreturnal" href="pengeluaran/input/uk">Entri Pengeluaran</a>
		</div>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="stokp" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stok</a>
		<div class="dropdown-menu" aria-labelledby="stokp">
		<?php
	$idtoko=$this->session->userdata('idtoko');
	$q=$this->db->query("select * from gudang where idtoko='$idtoko'");
	foreach($q->result() as $row){ ?>
		<a class="dropdown-item" href="pembelian/index/<?php echo $row->id; ?>"  <?php if($row->id==5){ ?>target="_blank" <?php } ?>><?php echo $row->gudang; ?></a>
	<?php } ?>
		</div>
	  </li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="p5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
		<div class="dropdown-menu" aria-labelledby="p5">
				<a class="dropdown-item"  href="laporan/masuk">Barang Masuk</a>
				<a class="dropdown-item" href="laporan/keluar">Penjualan</a>
				<a class="dropdown-item" href="laporan/kasir">Penjualan Perkasir</a>
				<a class="dropdown-item" href="laporan/sales">Penjualan Sales</a>
				<a class="dropdown-item" href="pengeluaran/index/um">Pendapatan Lain</a>
				<a class="dropdown-item" href="pengeluaran/index/uk">Pengeluaran Umum</a>
				<a class="dropdown-item" href="laporan/praktek">Praktek</a>
				<a class="dropdown-item" href="laporan/lplaba">Laba Rugi</a>
				<a class="dropdown-item" href="laporan/index">Kartu Stok</a>
<!-- 				<a class="dropdown-item" href="laporan/habis">Stok Habis</a>
				<a class="dropdown-item" href="laporan/history">History</a>
				<a class="dropdown-item" href="laporan/stokoff" target="_blank">Stok Off Name</a>
				<a class="dropdown-item" href="laporan/selisih" target="_blank">Daftar Selisih</a>
 -->		</div>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
		  <a class="dropdown-item xpmodal" href="main/akun">Akun</a>
		  <a class="dropdown-item xpmodal" href="main/toko">Toko</a>
		  <a class="dropdown-item" href="main/gudang">Gudang</a>
		  <a class="dropdown-item" href="main/admin">Admin</a>
		  <a class="dropdown-item" href="main/pelanggan">Pelanggan</a>
		  <a class="dropdown-item" href="main/supplier">Supplier</a>
		  <a class="dropdown-item" href="main/kategori">Kategori</a>
		  <a class="dropdown-item" href="main/sales">Sales</a>
		  <a class="dropdown-item backup" href="main/backup">Backup Database</a>
		  <a class="dropdown-item" href="main/pilihdb">Import Database</a>
		</div>
	  </li>
	  <li></li>
	  <?php } ?>
	   <li class="nav-item"><a class="nav-link"  onclick='return confirm("Keluar Akun ?...");'href="welcome/keluar">Keluar</a></li>
	</ul>
	<form action="main/caridata/" method='post' class="form-inline my-2 my-lg-0" id="caridata">
	  <input required class="form-control mr-sm-2" id='katacari' autocomplete='off' name='kata' type="text" placeholder="Ketikan Kata..." aria-label="Ketikan Kata...">
	  <input class="btn btn-warning my-2 my-sm-0" type="submit" name="test" value="CARI" />
	</form>
  </div>
</nav>
<script type="text/javascript">
	//<![CDATA[
			$("#katacari").on('keypress',function(e){
				$('#katacari').autocomplete({
					serviceUrl: 'cari/barang/a',
					minChars:2,
					onSelect: function (s) {
						$('#katacari').val(s.nama);
					}
				});
			});
$(".tambahreturnal").click(function(e){
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
$(".backup").on('click',function(e){
		e.preventDefault();
		if(confirm('Bakcup Database?...')){
		$('#proses').waiting();
			$.ajax({
			  url:$(this).attr('href'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
				beforeSend:function()
				{
				 $('#xuploaded_images').html("<label class='text-success'><i class='fa fa-circle-o-notch fa-spin'></i> Proses, Silahkan tunggu...</label>");
				},
				 success: function(dt){
					 if(dt){
					Swal.fire(
					  'Informasi',
					  'Berhasil Backup!',
					  'success'
					);
					 }else{

						Swal.fire(
					  'Informasi',
					  'Gagal Backup!',
					  'warning'
					);

					 }
					 
					 $('#proses').waiting('done');

				 }
		}); }else
		return false;
	}); 
	$("#caridata").on('submit',function(e){
		e.preventDefault();
			$('#proses').waiting();
			$.ajax({
			  url:$(this).attr('action'),
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

	//]]>
</script>
<div class="nav-scroller bg-white shadow-sm">
  <nav class="nav nav-underline">
	<a class="nav-link active" href="main/">Dashboard</a>
	<?php if($this->session->userdata('level')==2){ ?>
		<a class="nav-link" href="penjualan/index">Transaksi baru</a>
	<?php } ?>
	<?php if($this->session->userdata('level')==3){ ?>
		<a class="nav-link" href="pembelian/pembelian">Pembelian</a>
	<?php } ?>
	<?php if($this->session->userdata('level')==1){ ?>
	<a class="nav-link" href="penjualan/index">Transaksi baru</a>
	<a class="nav-link" href="pembelian/pembelian">Pembelian</a>
	<a class="nav-link" href="penjualan/lpjual">Piutang</a>
	<a class="nav-link" href="pembelian/lpbelanja">Hutang</a>
	<a class="nav-link xpmodal" href="main/tambahpelanggan">+ Pelanggan</a>
	<a class="nav-link xpmodal" href="main/tambahsupplier">+ Supplier</a>
	<a class="nav-link" href="pembelian/index">Stok Gudang</a> 
	<?php } ?>
 </nav>
</div>
<script type="text/javascript">  
        function PrintDiv() {  
            var divContents = document.getElementById("printdivcontent").innerHTML;  
            var printWindow = window.open('', '', 'height=200,width=400');  
            printWindow.document.write('<html><head><title>Print DIV Content</title>');  
            printWindow.document.write('</head><body >');  
            printWindow.document.write(divContents);  
            printWindow.document.write('</body></html>');  
            printWindow.document.close();  
            printWindow.print();  
        }  
    </script>  
<main role="main" class="container">