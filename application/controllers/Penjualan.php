<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');
	}

	public function index()
	{
		$data['info']=$this->crud->gettoko();
		$idtoko=$this->session->userdata('idtoko');
		$data['gudang']=$this->crud->getallwhere('gudang','idtoko',$idtoko);
		$data['sales']=$this->crud->getallwhere('sales','idtoko',$idtoko);
		$data['nobil']=$this->crud->nobilmasuk('k');
		$this->load->view('admin/header',$data);
		$this->load->view('penjualan/index',$data);
		$this->load->view('admin/footer');

	}

	public function lpjual()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('penjualan/lpjual',$data);
		$this->load->view('admin/footer');
	}

	public function xreturn()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('penjualan/return',$data);
		$this->load->view('admin/footer');
	}

	public function hutangbayar()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('penjualan/hutangbayar',$data);
		$this->load->view('admin/footer');
	}

	public function pembelian()
	{
		$data['info']=$this->crud->gettoko();
		$idtoko=$this->session->userdata('idtoko');
		$data['gudang']=$this->crud->getallwhere('gudang','idtoko',$idtoko);
		$data['nobil']=$this->crud->nobilmasuk();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/pembelian',$data);
		$this->load->view('admin/footer');
	}

	public function inputbayar($nobil='')
	{
		$data['nobil']=$nobil;
		$this->load->view('pembelian/inputbayar',$data);
	}

	public function inputreturn($nobil='')
	{
		$data['nobil']=$nobil;
		$this->load->view('pembelian/inputreturn',$data);
	}
	public function getfaktur()
	{
		$nobil=bersih($_POST['sp']);
		$q=$this->db->query("select * from keluar_masuk where nofaktur='$nobil'");
		if($q->num_rows()>0){
	 ?>
<b>Faktur <?php echo $nobil; ?> </b>
<div class="row">
<div class="col-lg-6">
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Kode</td>
		<td>Nama</td>
		<td>Jml</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from keluar_masuk where nofaktur='$nobil'");
	foreach($q->result() as $row){ 	$ket=$row->ket;
	$gudang=$row->gudang;
 ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td><a href="<?php echo $row->kode; ?>" jml="<?php echo $row->jml; ?>" class='pilih'><?php echo $row->kode; ?></a></td>
		<td><a href="<?php echo $row->kode; ?>" jml="<?php echo $row->jml; ?>" class='pilih'><?php echo $row->nama; ?></a></td>
		<td  align=center><?php echo $row->jml; ?></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

<table width='100%' class='table table-sm table-hover table-bordered'>
<thead>
	<tr class='bg-info'>
		<td colspan=5>Data Return</td>
	</tr>
	<tr align=center>
		<td>NO</td>
		<td>Tgl</td>
		<td>Barang</td>
		<td>Jml</td>
		<td>Aksi</td>
	</tr>
</thead>
<tbody>
<?php
	$no=1;
	$q=$this->db->query("select * from keluar_masuk where nota='$nobil'");
	foreach($q->result() as $row){ 	$ket=$row->ket;
	$gudang=$row->gudang;
 ?>
	<tr>
		<td align=center><?php echo $no; ?></td>
		<td  align=center><?php echo $row->tgl; ?></td>
		<td  align=center><?php echo $row->kode; ?> <?php echo $row->nama; ?></td>
		<td  align=center><?php echo $row->jml; ?></td>
		<td><a class='hapusdt' href="pembelian/batalreturn/<?php echo $row->id; ?>/<?php echo $row->jml; ?>/<?php echo $row->gudang; ?>/<?php echo $row->kode; ?>/<?php echo $row->ket; ?>">Hapus</a></td>
	</tr>
<?php $no++; } ?>
</tbody>
</table>

	<script type="text/javascript">
	$(".hapusdt").on('click',function(e){
				$('.hapusdt').waiting();
				e.preventDefault();
				if(confirm('Hapus Data?')){
					$.ajax({
						url:  $(this).attr('href'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$('.bersih').val('');
							$("#orderlama").load('pembelian/orderlama');
							$('#simpanbayar').waiting('done');
							$("#psatu").load("pembelian/inputreturn/<?php echo $nobil; ?>/");
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
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
					}else return false;
				}); 
			$(".pilih").on('click',function(e){
				e.preventDefault();
					$("#nmbrg").val($(this).attr('href'));
					$("#jml").val($(this).attr('jml'));
				}); 
			$('.dttable').DataTable();
	</script>
		</div>
<div class="col-lg-5">

<form method="post" id="simpanbayar" action="pembelian/simpanreturn/<?php echo $nobil; ?>/<?php echo $ket; ?>/<?php echo $gudang; ?>/">
<table class='table table-sm'>
	<tr>
		<td>Faktur Return</td>
		<td><input  readonly required  autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="a" value="<?php echo $this->crud->nobilmasuk('rb'); ?>" /></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td><input required autocomplete='off' type="date" class='form-control form-control-sm bersih'  name="b" value="<?php echo date('Y-m-d'); ?>" /></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td><input  required id="nmbrg"  autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="c" value="" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input  required  id='jml' autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="d" value="" /></td>
	</tr>
	<tr>
		<td>Keterangan</td>
		<td><textarea name="e"  autocomplete='off'  class='form-control form-control-sm  bersih'></textarea></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" class='btn btn-primary' name="save" value="SIMPAN" />
		<input type="reset"  class='btn btn-warning' name="test" value="BATAL" /></td>	
	</tr>
</table>
</form>
<script type="text/javascript">
	//<![CDATA[
					$("#nmbrg").on('keypress',function(e){
						$('#nmbrg').autocomplete({
							serviceUrl: "cari/carikeluar/<?php echo $nobil; ?>",
							minChars:2,
							onSelect: function (s) {
							$('#nmbrg').val(s.kode);
							$('#jml').val(s.jml);
							}
						});
					});
	//]]>
</script>
<script type="text/javascript">
	//<![CDATA[

	$("#simpanbayar").on('submit',function(e){
				$('#simpanbayar').waiting();
				e.preventDefault();
					$.ajax({
						url:  $(this).attr('action'),
						type: 'post',
						data: $(this).serialize(),
						dataType: "html",
						success: function(dt){
							$('.bersih').val('');
							$("#orderlama").load('pembelian/orderlama');
							$('#simpanbayar').waiting('done');
							$("#psatu").load("pembelian/inputreturn/<?php echo $nobil; ?>/");
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
						},
						error: function(dt){
							alert("Ada kesalahan sistem");
						},
					});//end of ajax()
				}); 
	//]]>
</script>
<?php }else{ echo '<br /><br /><div id="" class="alert alert-danger">
	Faktur Tidak Di Temukan!
</div>';
}
	}
	public function nota($nobil='')
	{
		$data['info']=$this->crud->gettoko();
		$idtoko=$this->session->userdata('idtoko');
		$data['gudang']=$this->crud->getallwhere('gudang','idtoko',$idtoko);
		$data['sales']=$this->crud->getallwhere('sales','idtoko',$idtoko);
		$data['nobil']=$nobil;
		$data['nota']=$this->crud->getbyid('keluar_masuk','nofaktur',$nobil);

		$this->load->view('admin/header',$data);
		$this->load->view('penjualan/nota',$data);
		$this->load->view('admin/footer');
	}

	public function simpan($nobil)
	{
		echo $this->crud->barangkeluar($nobil);
	}

	public function orderlama()
	{
		$id=$this->session->userdata('id');
		$nama=$this->session->userdata('nmuser');
		$level=$this->session->userdata('level');
		?>

	<table class='mt-2  table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Kasir</td>
			<td>Faktur</td>
			<td>Pembayaran</td>
			<td>Jumlah</td>
			<td>Total</td>
			<td>Sisa</td>
			<td>Aksi</td>
		</tr>
	</thead>
	<tbody>
	<?php $no=1;
			$idtoko=$this->session->userdata('idtoko');
			$admin=$id.'_'.$nama;
		if($level==2){
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where  keluar_masuk.ket='K'  and keluar_masuk.idtoko='$idtoko'
		and keluar_masuk.tgl=date(now())  and idadmin='$admin' group by keluar_masuk.nofaktur  order by keluar_masuk.id desc");
		}else{
			$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*total) as nota,gudang.gudang from keluar_masuk  
			inner join gudang on gudang.id=keluar_masuk.gudang where  keluar_masuk.ket='K'  and keluar_masuk.idtoko='$idtoko' 
			and keluar_masuk.tgl=date(now()) group by keluar_masuk.nofaktur  order by keluar_masuk.id desc");
		}
		foreach($q->result() as $row){
			if(substr($row->nofaktur,0,2)<>'MV'){
			?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?><br />
			<?php echo $row->gudang; ?></a></td>
			<td><?php echo $row->idadmin; ?></td>
			<td><?php echo $row->nofaktur; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php if($row->stbayar=='Hutang'){ ?>
			<?php if($row->nota-$this->crud->getbayar($row->nofaktur)>0){ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
					<?php echo $row->stbayar; ?>
					<?php if('0000-00-00'<>$row->tbayar){ ?>
						<br />
						<?php echo tgl_indo(substr($row->tbayar,0,10)); ?>
					<?php } ?>				</a>
				<?php }else{ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
				Lunas</a>
				<?php } ?>
			<?php }else{ ?>
							<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">

				<?php echo $row->stbayar; ?></a>
			<?php } ?>
			</td>
			<td align=center><?php echo $row->jumlah; ?></td>
			<td  align=right><?php echo uang($row->nota); ?></td>
			<td align=right>
			<?php //if($row->stbayar=='Hutang'){ ?>
				<?php echo uang($row->nota-$this->crud->getbayar($row->nofaktur)); ?>
			<?php //} ?>
			</td>
			<td align=center>
				<a class='pmodal  btn btn-sm btn-success' href="penjualan/nota/<?php echo $row->nofaktur; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a nobil="<?php echo $row->nofaktur; ?>" class='xhapusnota btn btn-sm btn-warning' href="penjualan/batalmasukall/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
				<a class='tambahreturn btn btn-sm btn-info' href="pembelian/inputreturn/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/upload.svg"  width="20" height="20"></a>
				<a class=' btn cetak btn-sm btn-success' href="<?php echo $row->nofaktur; ?>"><img src="node_modules/bootstrap-icons/icons/cart-plus.svg"  width="20" height="20"></a>

			</td>
		</tr>
		<?php $no++; }} ?>
	</tbody>

	</table>
	<script type="text/javascript">
		//<![CDATA[
			$(".cetak").click(function(e){
				e.preventDefault();
				var nobil=$(this).attr('href');
				window.open("penjualan/cetak/"+nobil, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=300,left=500,width=600,height=400");
			}); 
	$(".tambahreturn").click(function(e){
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
		$(".inputbayar").click(function(e){
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
		$(".xhapusnota").click(function(e){
						e.preventDefault();
						if(confirm('Hapus Semua Data Nota?...')){
						var nobil= $(this).attr('nobil');
						$.ajax({
							url:  $(this).attr('href'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								$.notify("Berhasil hapus","success");
								$("#databeli").load("penjualan/databeli/"+nobil);
							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
						}else return false;
			}); 
		//]]>
	</script>
<?php 	}

	public function history($nama='')
	{ ?><br />
	<table class='mt-2 table pdttable table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tgl</td>
			<td>Faktur</td>
			<td>Pembayaran</td>
			<td>Jumlah</td>
			<td>Total</td>
			<td>Sisa</td>
			<td>Aksi</td>
		</tr>
	</thead>
<tbody>
	<?php $no=1; $ht=0;
			$idtoko=$this->session->userdata('idtoko');
		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*jual) as nota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where  keluar_masuk.ket='K'  and keluar_masuk.idtoko='$idtoko' group by keluar_masuk.nofaktur  order by keluar_masuk.id desc");
		foreach($q->result() as $row){ ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="penjualan/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?><br />
			<?php echo $row->gudang; ?></a></td>
			<td><?php echo $row->nofaktur; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php if($row->stbayar=='Hutang'){ ?>
			<?php if($row->nota-$this->crud->getbayar($row->nofaktur)>0){ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
					<?php echo $row->stbayar; ?><br />
					<?php if('0000-00-00'<>$row->tbayar){ ?>
						<br />
						<?php echo tgl_indo(substr($row->tbayar,0,10)); ?>
					<?php } ?>				</a>
				<?php }else{ ?>
				<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">
				Lunas</a>
				<?php } ?>
			<?php }else{ ?>
							<a class='inputbayar' href="pembelian/inputbayar/<?php echo $row->nofaktur; ?>">

				<?php echo $row->stbayar; ?></a>
			<?php } ?>
			</td>
			<td align=center><?php echo $row->jumlah; ?></td>
			<td  align=right><?php echo uang($row->nota); ?></td>
			<td align=right>
			<?php if($row->stbayar=='Hutang'){ ?>
				<?php echo uang($row->nota-$this->crud->getbayar($row->nofaktur)); 
				$ht+=$row->nota-$this->crud->getbayar($row->nofaktur);
				?>
			<?php } ?>
			</td>
			<td align=center>
				<a class='pmodal  btn btn-sm btn-success' href="penjualan/nota/<?php echo $row->nofaktur; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a nobil="<?php echo $row->nofaktur; ?>" class='xhapusnota btn btn-sm btn-warning' href="penjualan/batalmasukall/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>

			</td>
		</tr>
		<?php $no++; } ?>
		</tbody>

	</table>
		<div class="alert alert-warning">
		Total Nota Belum Lunas Rp. <?php echo uang($ht); ?>
	</div>
	<script type="text/javascript">
		//<![CDATA[
		//	$('.pdttable').DataTable();
		$(".inputbayar").click(function(e){
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
		$(".xhapusnota").click(function(e){
						e.preventDefault();
						if(confirm('Hapus Semua Data Nota?...')){
						var nobil= $(this).attr('nobil');
						$.ajax({
							url:  $(this).attr('href'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								$.notify("Berhasil hapus","success");
								$("#databeli").load("penjualan/databeli/"+nobil);
							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
						}else return false;
			}); 
		//]]>
	</script>
<?php 	}
	
	public function proses($id='',$sisa='',$jn='')
	{
		$total=bersih(buangkrt(',',$_POST['total']));
		$bayar=bersih(buangkrt(',',$_POST['bayar']));

		$disk=bersih($_POST['disk']);
		$ket=bersih($_POST['ket']);
		$metode=bersih($_POST['metode']);
		$tbayar=bersih($_POST['tbayar']);
		$sales=bersih($_POST['sales']);
		$supplier=bersih($_POST['supplier']);
		$toko=$this->session->userdata('idtoko');
		$this->db->query("update keluar_masuk set stbayar='$metode',tbayar='$tbayar',sales='$sales' where nofaktur='$id'");

		if(($sisa-$this->crud->getbayar($id)>0)){
			if($disk>0){
				$byr=$sisa-diskon($sisa,$disk);
				$xsisa=diskon($sisa,$disk);
				$this->db->query("insert into pembayaran values('','$id',now(),'$byr','Diskon_$disk % ','$xsisa','$supplier','K','$toko')");
				if($bayar>$xsisa)
					$sisa=$xsisa;
				else
					$sisa=$bayar;
			}else $xsisa=$sisa;
			if($bayar>$sisa){
				if($this->db->query("insert into pembayaran values('','$id',now(),'$sisa','$ket','$xsisa','$supplier','$jn','$toko')")){
					echo true;
				}else
					echo false;
			}else{
				if($this->db->query("insert into pembayaran values('','$id',now(),'$bayar','$ket','$xsisa','$supplier','$jn','$toko')")){
					echo true;
				}else
					echo false;

			}
		}else echo 'lunas';
	}
	
	public function cetak($nobil='')
	{ 
		$data['info']=$this->crud->gettoko();
		$data['nota']=$this->crud->getbyid('keluar_masuk','nofaktur',$nobil);
		$data['data']=$this->crud->getallwhere('keluar_masuk','nofaktur',$nobil);
		$this->load->view('penjualan/cetak',$data);
	}	
	
	public function databeli($nobil='')
	{ 
			$nota=$this->crud->getbyid('keluar_masuk','nofaktur',$nobil);
			$idtoko=$this->session->userdata('idtoko');
			$sales=$this->crud->getallwhere('sales','idtoko',$idtoko);
	?>
		<table class='mt-2 table table-sm table-condensed table-bordered'>
		<tr align=center>
			<td>No</td>
			<td>Kode</td>
			<td>Nama</td>
			<td>Jml</td>
			<td>Aksi</td>
		</tr>
<?php 		$no=1; $total=0;
			$list=$this->crud->getallwhere('keluar_masuk','nofaktur',$nobil);
			foreach($list as $row){
			$total+=buangkrt(',',$row->total)*$row->jml;
			 ?>
		<tr>
			<td align=center><?php echo $no; ?></td>
			<td><?php echo $row->kode; ?></td>
<!-- 			<td><a href="pembelian/sn/<?php echo $nobil; ?>/<?php echo $row->kode; ?>" class='setsn'><?php echo $row->kode; ?></a></td>
 -->			<td><?php echo $row->nama; ?></td>
			<td  align=center>
				<form method="post" action="penjualan/editjumlah/<?php echo $row->id; ?>/<?php echo $row->nofaktur; ?>/<?php echo $row->kode; ?>/<?php echo $row->gudang; ?>/<?php echo $row->jml; ?>" class='savejumlah'>

					<div class="input-group accordion input-group-sm">
					  <div class="input-group-prepend"  data-toggle="collapse" data-target=".collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span class="input-group-text text-danger">ALL</span>
					  </div>
					  <input type="text" required name='modal' class="form-control col-lg-2 form-control-sm" placeholder="Harga" value="<?php echo buangkrt(',',$row->jual); ?>" >
					  <input type="text" required name='jml' class="form-control  col-lg-2 form-control-sm" placeholder="Jumlah" value="<?php echo $row->jml; ?>">
					  <input type="text" required name='d1' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d1" value="<?php echo $row->d1; ?>" >
					  <input type="text" required name='d2' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d2" value="<?php echo $row->d2; ?>"  >
					  <input type="text" required name='d3' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d3" value="<?php echo $row->d3; ?>" >
					  <div class="input-group-prepend">
						<span class="input-group-text"><?php echo uang(buangkrt(',',$row->total)*$row->jml); ?></span>
					  </div>
					  <input type="submit" name="test" value="" hidden />
					</div>

				</form>
			</td>
			<td  align=center>
				<a class='btn btn-warning batal btn-sm text-white' href="penjualan/batalmasuk/<?php echo $row->nofaktur; ?>/<?php echo $row->kode; ?>/<?php echo $row->gudang; ?>/<?php echo $row->jml; ?>/<?php echo $row->id; ?>"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
			</td>
		</tr>
			<?php $no++;  } ?>
			<tr>
				<td colspan=5>
				<?php  if(($total-$this->crud->getbayar($nobil))==$total){ ?>
				<form method="post" id="prosesbayar" action="penjualan/proses/<?php echo $nobil; ?>/<?php echo $total; ?>/M">
			<table class='table'>
			<tr>
				<td colspan=4>Total Rp. </td>
				<td align=right><input readonly type="text" name="total" value="<?php echo $total; ?>" class='form-control  kanan uang form-control-sm' /></td>
			</tr>
			<tr>
				<td colspan=4>Jumlah Bayar Rp. </td>
				<td align=right><input type="text" name="bayar" value="<?php  echo ($total-$this->crud->getbayar($nobil)); ?>" class='form-control  kanan uang form-control-sm' /></td>

			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Potongan % . </td>
				<td align=right><input type="text" name="disk" value="" class='form-control kanan   form-control-sm' /></td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Keterangan. </td>
				<td align=right><input type="text" name="ket" value="" class='form-control form-control-sm' /></td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Pembayaran. </td>
				<td align=right>
					<select  name="metode" class="form-control form-control-sm">
						<option value="Hutang" <?php if($nota->stbayar=='Hutang') echo 'selected'; ?>>Hutang</option>
						<option value="Cash"  <?php if($nota->stbayar=='Cash') echo 'selected'; ?>>Cash</option>
					</select>
				</td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Tgl Bayar. </td>
				<td align=right><input  autocomplete='off' class='form-control form-control-sm' type="date" name="tbayar"  placeholder="Jatuh Tempo"  value="<?php echo $nota->tbayar; ?>" />
				<input type="text" name="supplier" hidden readonly value="<?php echo $nota->supplier; ?>" />
				</td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Sales. </td>
				<td align=right>
					<select name="sales" class="form-control form-control-sm">
				<?php
							foreach($sales as $row){ 
							?>
								<option value="<?php echo $row->nama; ?>"  <?php if($nota->sales==$row->nama) echo 'selected'; ?>><?php echo $row->nama; ?></option>
						<?php } ?>  
						</select>
				</td>
			</tr>
			<tr>
				<td colspan=4>
<a class='btn btn-primary btn-sm' data-toggle="collapse" href=".detail" role="button" aria-expanded="false" aria-controls="collapseExample">Detail</a>
				</td>
				<td align=right>
					<input type="submit" class='btn btn-sm  btn-info' name="test" value="LANJUTKAN" />
				</td>
</tr>							
				</table>
</form>
<script type="text/javascript">
	//<![CDATA[
				$("#prosesbayar").on('submit',function(e){
						e.preventDefault();
								$.ajax({
									url:  $(this).attr('action'),
									type: 'post',
									data: $(this).serialize(),
									dataType: "html",
									success: function(dt){
									if(confirm('Cetak Faktur?...')){
//										window.location="penjualan/cetak/<?php echo $nobil; ?>"
										 window.open("penjualan/cetak/<?php echo $nobil; ?>", "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=300,left=500,width=600,height=400");
										 window.location="penjualan/index/"
									}else
										window.location="penjualan/index/"
									},
									error: function(dt){
										alert("Ada kesalahan sistem");
									},
								});//end of ajax()

				}); 

	//]]>
</script>
<?php }else{ ?>
	<tr>
				<td colspan=4>Total Rp. </td>
				<td align=right><input readonly type="text" name="total" value="<?php echo $total; ?>" class='form-control  kanan uang form-control-sm' /></td>
			</tr>
			<tr>
				<td colspan=4>Jumlah Bayar Rp. </td>
				<td align=right><input readonly type="text" name="bayar" value="<?php  echo ($total-$this->crud->getbayar($nobil)); ?>" class='form-control  kanan uang form-control-sm' /></td>

			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Potongan % . </td>
				<td align=right><input type="text" readonly name="disk" value="<?php  echo ($this->crud->getdiskon($nobil)/$total)*100; ?>" class='form-control kanan   form-control-sm' /></td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Keterangan. </td>
				<td align=right><input type="text" readonly name="ket" value="" class='form-control form-control-sm' /></td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Pembayaran. </td>
				<td align=right>
					<select  name="metode" class="form-control form-control-sm">
						<option value="Hutang" <?php if($nota->stbayar=='Hutang') echo 'selected'; ?>>Hutang</option>
						<option value="Cash"  <?php if($nota->stbayar=='Cash') echo 'selected'; ?>>Cash</option>
					</select>
				</td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Tgl Bayar. </td>
				<td align=right><input  readonly autocomplete='off' class='form-control form-control-sm' type="date" name="tbayar"  placeholder="Jatuh Tempo"  value="<?php echo $nota->tbayar; ?>" />
				<input type="text" name="supplier" hidden readonly value="<?php echo $nota->supplier; ?>" />
				</td>
			</tr>
			<tr class='collapse detail'>
				<td colspan=4>Sales. </td>
				<td align=right>
					<select name="sales" class="form-control form-control-sm">
				<?php
							foreach($sales as $row){ 
							?>
								<option value="<?php echo $row->nama; ?>"  <?php if($nota->sales==$row->nama) echo 'selected'; ?>><?php echo $row->nama; ?></option>
						<?php } ?>  
						</select>
				</td>
			</tr>
			<tr>
				<td colspan=4>
					<a class='btn btn-primary btn-sm' data-toggle="collapse" href=".detail" role="button" aria-expanded="false" aria-controls="collapseExample">Detail</a>
				</td>
				<td align=right>
				</td>
</tr>			
<?php } ?>
</td>
			</tr>
			
	</table>

	<table class='mt-2 collapse detail table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center class='bg-info'>
			<td>No</td>
			<td>Tgl</td>
			<td>Ket</td>
			<td>Hutang</td>
			<td>Jumlah Bayar</td>
			<td>Sisa</td>
		</tr>
			</thead>
<tbody>

	<?php $no=1; $ht=0;
		$toko=$this->session->userdata('idtoko');
		$q=$this->db->query("select * from pembayaran where nobil='$nobil' order by id asc");
	$byr=0;
		foreach($q->result() as $row){
		$byr+=buangkrt(',',$row->jml);
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td>
			<?php echo $row->ket; ?>
			</td>
			<td align=right><?php echo uang($row->st); ?></td>
			<td align=right><?php echo uang($row->jml); ?></td>
			<td align=right><?php echo uang(buangkrt(',',$row->st)-buangkrt(',',$row->jml)); ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert collapse detail alert-info">
		Total bayar Rp. <?php echo uang($byr); ?> <?php if(($total-$byr)>0) echo  'Sisa Rp.'.uang($total-$byr); ?>
	</div>

	<script type="text/javascript">
		//<![CDATA[
			$('.uang').autoNumeric('init');

			$(".setsn").on('click',function(e){
						$('#proses').waiting();
						e.preventDefault();
						$("#divpopup").load($(this).attr('href'));
						$('#proses').waiting('done');
			}); 

			$(".batal").click(function(e){
						e.preventDefault();
						if(confirm('Hapus Data?...')){
						$.ajax({
							url:  $(this).attr('href'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								$.notify("Berhasil hapus","success");
								$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");
								$("#orderlama").load('penjualan/orderlama');

							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
						}else return false;
			}); 
			$(".savejumlah").submit(function(e){
						e.preventDefault();
						$.ajax({
							url:  $(this).attr('action'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								if(dt)
								$.notify("Berhasil Simpan","success");
								else
								$.notify("Stok Tidak Cukup","danger");

								$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");

							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
			}); 
		$(".savejumlah").focusout(function(e){
						e.preventDefault();
						$.ajax({
							url:  $(this).attr('action'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								if(dt)
								$.notify("Berhasil Simpan","success");
								else
								$.notify("Stok Tidak Cukup","danger");

								$("#databeli").load("penjualan/databeli/<?php echo $nobil; ?>");

							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
			}); 
		//]]>
	</script>

<?php 	 }

	public function sn($nobil,$kode)
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Set Sn</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
<?php $no=1;
	$q=$this->db->query("select * from info_barang where faktur='$nobil' and kode='$kode'");
	foreach($q->result() as $row){ ?>
					<form method="post" action="pembelian/savesn/<?php echo $row->id; ?>/nomor" class='savesn'>
						<div class="input-group input-group-sm mb-2">
						  <div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon<?php echo $no; ?>"><?php echo $no; ?>. SN</span>
						  </div>
						  <input type="text" autocomplete='off'  name='xsn' class="form-control form-control-sm" placeholder="Masukan SN" value="<?php echo $row->nomor; ?>" aria-label="Masukan SN" aria-describedby="basic-addon<?php echo $no; ?>">
						</div>
					</form>
<?php $no++; } ?>
				  </div>
				<div class="modal-footer">
						<button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
					  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$(".savesn").focusout(function(e){
						e.preventDefault();
						$.ajax({
							url:  $(this).attr('action'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								if(dt)
								$.notify("Berhasil Simpan","success");
								else
								$.notify("Gagal Simpan","danger");
							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
			}); 

			$(".savesn").submit(function(e){
						e.preventDefault();
						$.ajax({
							url:  $(this).attr('action'),
							type: 'post',
							data: $(this).serialize(),
							dataType: "html",
							success: function(dt){
								if(dt)
								$.notify("Berhasil Simpan","success");
								else
								$.notify("Gagal Simpan","danger");
							},
							error: function(dt){
								$.notify("Ada Kesalahan Sistem","warning");
							},
						});
			}); 
	});
	</script>
<?php 
	}

	public function simpanreturn($bil='',$ket='',$gudang='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$toko=$this->session->userdata('idtoko');
		$admin=$this->session->userdata('id').'_'.$this->session->userdata('nmuser');
		$sebelum=$this->crud->getstokakhir($kode,$gudang,$toko);

		if($this->db->query("insert into keluar_masuk select '','$a',idbarang,'$admin','$b',supplier,'$e','$d',modal,jual,'$bil','',idtoko,d1,d2,d3,gudang,'RB',0,kode,nama,now(),0,'$d',total,sales,'$sebelum'
		from keluar_masuk where nofaktur='$bil' and kode='$c'")){
			$this->db->query("update barang set stok=stok-$d where kode='$c' and gudang='$gudang'");
			echo true;
		}else
			echo false;
	}

	public function simpanbayar($id='',$sisa='',$jn='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$supplier=bersih($_POST['supplier']);
		$toko=$this->session->userdata('idtoko');
		if($this->db->query("insert into pembayaran values('','$id','$a','$b','$c','$sisa','$supplier','$jn','$toko')"))
			echo true;
		else
			echo false;
	}

	public function savesn($id,$param='')
	{
		$xsn=bersih($_POST['xsn']);
		if($this->db->query("update info_barang set $param='$xsn' where id='$id'"))
			echo true;
		else
			echo false;
	}

	public function batalreturn($id='',$jml,$gudang,$kode,$ket)
	{
		if($ket=='RB'){
			$this->db->query("update barang set stok=stok+$jml where gudang='$gudang' and kode='$kode'");
			$this->db->query("delete from keluar_masuk where id='$id'");
			//redirect('pembelian/lpbelanja');
			echo true;
		}else{

		}
	}

	public function batalbayar($id='')
	{
		$this->db->query("delete from pembayaran where id='$id'");
		echo true;
	}
	public function batalmasuk($faktur='',$kode='',$gudang='',$jml='',$id='')
	{
		$i=$this->db->query("select count(*) as jml from keluar_masuk where nofaktur='$faktur'");
		$row=$i->row();
		
		if($row->jml==1){
			$this->db->query("delete from pembayaran where nobil='$faktur'");
		}
		
		$this->db->query("update barang set stok=stok+$jml where gudang='$gudang' and kode='$kode'");
		$this->db->query("delete from keluar_masuk where id='$id'");
		$this->db->query("delete from info_barang where faktur='$faktur'");
		echo true;

	}


	public function batalmasukall($faktur='')
	{
		$x=$this->db->query("select * from keluar_masuk where nofaktur='$faktur'");
		foreach($x->result() as $row){
		$this->db->query("update barang set stok=stok+$row->jml where gudang='$row->gudang' and kode='$row->kode'");
		$this->db->query("delete from keluar_masuk where id='$row->id'");
		}
		$this->db->query("delete from pembayaran where nobil='$faktur'");
		$this->db->query("delete from info_barang where faktur='$faktur'");
		echo true;
	}
	
	public function editjumlah($id,$faktur='',$kode='',$gudang='',$jml='')
	{
		$xjml=bersih($_POST['jml']);
		$i=$this->db->query("select stok from barang where gudang='$gudang' and kode='$kode'");
		$row=$i->row();
		if($xjml>$jml){
			$new=$xjml-$jml;

		}else{
			$new=$jml-$xjml;

		}

		if($row->stok>=$new){
		if($xjml<>$jml){
		$modal=bersih($_POST['modal']);
		$d1=bersih($_POST['d1']);
		$d2=bersih($_POST['d2']);
		$d3=bersih($_POST['d3']);

		if($xjml>$jml){
		//tambah
			$new=$xjml-$jml;
//			for ( $i=0; $i <$new ; $i++ )
//			{ 
//				$this->db->query("insert into info_barang values('','$faktur','','',now(),'$kode','','M')");
//			}

			$this->db->query("update barang set stok=stok-$new where gudang='$gudang' and kode='$kode'");
			if($this->db->query("update keluar_masuk set d1='$d1',d2='$d2',d3='$d3',jual='$modal',jml=jml+$new,masuk=masuk+$new where id='$id'"))
				echo true;
			else
				echo false;
		}else{
		//kurang
			$new=$jml-$xjml; $no=1;
			$q=$this->db->query("select * from info_barang where faktur='$faktur' and kode='$kode'");
			foreach($q->result() as $row){
				if($no>$xjml){
					$this->db->query("delete from info_barang where id='$row->id'");
				}
			$no++; }
			$this->db->query("update barang set stok=stok+$new where gudang='$gudang' and kode='$kode'");
			if($this->db->query("update keluar_masuk set d1='$d1',d2='$d2',d3='$d3',jml=jml-$new,masuk=masuk-$new where id='$id'"))
				echo true;
			else
				echo false;
		}
		}else echo false;
		}
	}

}
