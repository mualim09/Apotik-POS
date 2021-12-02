<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');
	}

	public function prosespindah($id,$stok)
	{
		$this->crud->pindahstok($id);
	}

	public function pindahstok($id='')
	{
	$info=$this->crud->getbyid('barang','id',$id);
	 ?>
		 <a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $info->kode; ?> - <?php echo $info->nama; ?> Stok <?php echo $info->stok; ?></h5>
					<form method="post" action="pembelian/prosespindah/<?php echo $info->id; ?>/<?php echo $info->stok; ?>" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Jumlah</td>
								<td>
								<input type="text" required autocomplete='off' min='1' max="<?php echo $info->stok; ?>" name="jml" value="" class='form-control bersih form-control-sm' />
								<input type="text" hidden readonly required autocomplete='off' name="sebelum" value="<?php echo $info->stok; ?>" class='form-control bersih form-control-sm' />
								<input type="text" hidden readonly required autocomplete='off' name="kode" value="<?php echo $info->kode; ?>" class='form-control bersih  form-control-sm' />
								<input type="text" hidden readonly required autocomplete='off' name="dari" value="<?php echo $info->gudang; ?>" class='form-control bersih  form-control-sm' />
							
								</td>
							</tr>
							<tr>
								<td>Lokasi Pindah</td>
								<td>
								<select required name="gudang" class="form-control form-control-sm">
						<option value="">Pilih</option>
						<?php
							$idtoko=$this->session->userdata('idtoko');
							$gudang=$this->crud->getallwhere('gudang','idtoko',$idtoko);
							foreach($gudang as $row){ ?>
							<?php if($info->gudang<>$row->id){ ?>
								<option value="<?php echo $row->id; ?>_<?php echo $row->idtoko; ?>"><?php echo $row->id; ?>) <?php echo $row->gudang; ?></option>
							<?php } ?>
						<?php } ?>  
					</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="SIMPAN" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
			<script type="text/javascript">
	$(document).ready(function()
	{
		//$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$("#saveakun").waiting();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan, Stok Tidak Cukup!',
					  'warning'
					)
				}
				else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					)
				}
				$("#saveakun").waiting('done');
				$(".bersih").val('');
			  }
			});
		});
		});
	</script>
<?php 
	}
	

	public function index($id='')
	{
		$data['info']=$this->crud->gettoko();
		$data['id']=$id;
		$this->load->view('admin/header',$data);
		$this->load->view('pembelian/index',$data);
		$this->load->view('admin/footer');
	}
	
	public function lpbelanja()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('pembelian/lpbelanja',$data);
		$this->load->view('admin/footer');
	}

	public function xreturn()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('pembelian/return',$data);
		$this->load->view('admin/footer');
	}
	
	public function hutangbayar()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('pembelian/hutangbayar',$data);
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

	public function tambahsatuan($nobil='',$gudang='')
	{
		$data['nobil']=$nobil;
		$data['gudang']=$gudang;
		$this->load->view('pembelian/tambahsatuan',$data);
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
					$("#xjml").val($(this).attr('jml'));
					$("#max").val($(this).attr('jml'));
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
		<td><input readonly required id="nmbrg"  autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="c" value="" /></td>
	</tr>
	<tr>
		<td>Jumlah</td>
		<td><input  required  id='xjml' autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="d" value="" />
		<input  required  id='max'   hidden readonly autocomplete='off' type="text" class='form-control form-control-sm  bersih' name="max" value="" />

		</td>
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
							$('#xjml').val(s.jml);
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
		$data['nobil']=$nobil;
		$data['nota']=$this->crud->getbyid('keluar_masuk','nofaktur',$nobil);
		
		$this->load->view('admin/header',$data);
		$this->load->view('pembelian/nota',$data);
		$this->load->view('admin/footer');
	}

	public function editbarang($id='')
	{
		$info=$this->crud->getbyid('barang','id',$id);
		 ?>
		 <a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
						<h5 ><?php echo $info->kode; ?> - <?php echo $info->nama; ?> Stok <?php echo $info->stok; ?></h5>
						<form method="post" action="pembelian/proseseditbarang/<?php echo $info->kode; ?>" id="saveakun">
							<table class='table table-sm'>
								<tr>
									<td>Kode </td>
									<td><input type="text" required autocomplete='off' name="a" value="<?php echo $info->kode; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Nama Barang</td>
									<td><input type="text" required autocomplete='off' name="b" value="<?php echo $info->nama; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Kategori </td>
									<td><input type="text" required autocomplete='off' name="c" value="<?php echo $info->kategori; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Modal</td>
									<td><input type="text" required autocomplete='off'  name="d" value="<?php echo $info->modal; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Jual</td>
									<td><input type="text" required autocomplete='off' name="e" value="<?php echo $info->jual; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Satuan</td>
									<td><input type="text" required autocomplete='off' name="f" value="<?php echo $info->satuan; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>
								<tr>
									<td>Fungsi</td>
									<td><input type="text" required autocomplete='off' name="g" value="<?php echo $info->fungsi; ?>" class='form-control bersih form-control-sm' />
									</td>
								</tr>

								<tr>
									<td></td>
									<td><input type="submit" name="test" value="SIMPAN" class='btn btn-sm btn-primary' /></td>
								</tr>
							</table>
						</form>
						<div id="pesanok"></div>
				<script type="text/javascript">
		$(document).ready(function()
		{
			$("#saveakun").on('submit',function(e){
				e.preventDefault();
				$("#saveakun").waiting();
				$.ajax({
				  url:$(this).attr('action'),
				  type: 'post',
				  data: $(this).serialize(),
				  dataType: "html",
				  success: function(dt){
					if(dt==0){
						$("#pesanok").html("Gagal Simpan");
					}else{
						$("#pesanok").html("Berhasil Simpan");
					}
					$("#saveakun").waiting('done');
				//	$(".bersih").val('');
				  }
				});
			});
			});
		</script>
	<?php 
		}
	public function simpan($nobil)
	{
		if($this->crud->barangmasuk($nobil))
			echo true;
		else
			echo false;
	}

	
	public function orderlama()
	{ ?>
	<table class='mt-2 table table-hover table-sm table-condensed table-bordered'>
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
	<?php $no=1;
		$idtoko=$this->session->userdata('idtoko');

		$q=$this->db->query("select keluar_masuk.*,sum(jml) as jumlah,sum(jml*modal) as xnota,gudang.gudang from keluar_masuk  
		inner join gudang on gudang.id=keluar_masuk.gudang where  keluar_masuk.ket='M' and keluar_masuk.idtoko='$idtoko' group by keluar_masuk.nofaktur  order by keluar_masuk.id desc limit 10");
		foreach($q->result() as $row){ 
			if(substr($row->nofaktur,0,2)<>'MV'){
				?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><a href="pembelian/nota/<?php echo $row->nofaktur; ?>"><?php echo tgl_indo(substr($row->tgl,0,10)); ?><br />
			<?php echo $row->gudang; ?></a></td>
			<td><?php echo $row->nofaktur; ?>/<?php echo $row->nota; ?><br /><?php echo $row->supplier; ?></td>
			<td>
			<?php if($row->stbayar=='Hutang'){ ?>
			<?php if($row->xnota-$this->crud->getbayar($row->nofaktur)>0){ ?>
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
			<td  align=right><?php echo uang($row->xnota); ?></td>
			<td align=right>
			<?php if($row->stbayar=='Hutang'){ ?>
				<?php echo uang($row->xnota-$this->crud->getbayar($row->nofaktur)); ?>
			<?php } ?>
			</td>
			<td align=center>
				<a class='pmodal  btn btn-sm btn-success' href="pembelian/nota/<?php echo $row->nofaktur; ?>/">
					<img src="node_modules/bootstrap-icons/icons/pencil-square.svg" width="20" height="20">
				</a>
				<a nobil="<?php echo $row->nofaktur; ?>" class='xhapusnota btn btn-sm btn-warning' href="pembelian/batalmasukall/<?php echo $row->nofaktur; ?>/"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>

			</td>
		</tr>
		<?php $no++; }} ?>
	</table>
	<script type="text/javascript">
		//<![CDATA[
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
								$("#databeli").load("pembelian/databeli/"+nobil);
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

	public function databeli($nobil='')
	{ ?>
		<table class='mt-2 table table-sm table-condensed table-bordered'>
		<tr align=center>
			<td>No</td>
			<td>Kode</td>
			<td>Nama</td>
			<td>Jml</td>
			<td>Aksi</td>
		</tr>
<?php 		$no=1; $list=$this->crud->getallwhere('keluar_masuk','nofaktur',$nobil);
			$jual=0;
			foreach($list as $row){ 
			$jual+=buangkrt(',',$row->modal)*$row->jml;
			?>
		<tr>
			<td align=center><?php echo $no; ?></td>
			<td><a href="pembelian/sn/<?php echo $nobil; ?>/<?php echo $row->kode; ?>" class='setsn'><?php echo $row->kode; ?></a></td>
			<td><?php echo $row->nama; ?></td>
			<td  align=center>
				<form method="post" action="pembelian/editjumlah/<?php echo $row->id; ?>/<?php echo $row->nofaktur; ?>/<?php echo $row->kode; ?>/<?php echo $row->gudang; ?>/<?php echo $row->jml; ?>" class='savejumlah'>

					<div class="input-group accordion input-group-sm">
					  <div class="input-group-prepend"  data-toggle="collapse" data-target=".collapseOne" aria-expanded="true" aria-controls="collapseOne">
						<span class="input-group-text text-danger">ALL</span>
					  </div>
					  <input type="text" required name='modal' class="form-control col-lg-2 form-control-sm" placeholder="modal" value="<?php echo buangkrt(',',$row->modal); ?>" >
					  <input type="text" required name='jml' class="form-control  col-lg-2 form-control-sm" placeholder="Jumlah" value="<?php echo $row->jml; ?>">
					  <input type="text" required name='d1' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d1" value="<?php echo $row->d1; ?>" >
					  <input type="text" required name='d2' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d2" value="<?php echo $row->d2; ?>"  >
					  <input type="text" required name='d3' class="form-control collapseOne collapse col-lg-2 form-control-sm" placeholder="d3" value="<?php echo $row->d3; ?>" >
					  <div class="input-group-prepend">
						<span class="input-group-text"><?php echo uang(buangkrt(',',$row->modal)*$row->jml); ?></span>
					  </div>
					  <input type="submit" name="test" value="" hidden />
					</div>

				</form>
			</td>
			<td  align=center>
				<a class='btn btn-warning batal btn-sm text-white' href="pembelian/batalmasuk/<?php echo $row->nofaktur; ?>/<?php echo $row->kode; ?>/<?php echo $row->gudang; ?>/<?php echo $row->jml; ?>/<?php echo $row->id; ?>"><img src="node_modules/bootstrap-icons/icons/trash.svg"  width="20" height="20"></a>
			</td>
		</tr>
			<?php $no++;  } ?>
			<tr class='bg-info'>
				<td colspan=4>Total</td>
				<td align=right><?php echo uang($jual); ?></td>
			</tr>
	</table>
	<table class='mt-2  table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center class='bg-warning'>
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
		$byr+=$row->jml;
		 ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td><?php echo tgl_indo(substr($row->tglbayar,0,10)); ?></td>
			<td>
			<?php echo $row->ket; ?>
			</td>
			<td align=right><?php echo $row->st; ?></td>
			<td align=right><?php echo uang($row->jml); ?></td>
			<td align=right><?php echo uang($row->st-$row->jml); ?></td>
		</tr>
		<?php $no++; } ?>
		</tbody>
	</table>
	<div class="alert alert-info">
		Total bayar Rp. <?php echo uang($byr); ?> <?php if(($jual-$byr)>0) echo  'Sisa Rp.'.uang($jual-$byr); ?>
	</div>
	
	<script type="text/javascript">
		//<![CDATA[
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
								$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");
								$("#orderlama").load('pembelian/orderlama');

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
								$.notify("Gagal Simpan","danger");

								$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");

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
								$.notify("Gagal Simpan","danger");

								$("#databeli").load("pembelian/databeli/<?php echo $nobil; ?>");

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

	public function simpansatuan($bil='',$gudang)
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$idtoko=$this->session->userdata('idtoko');
		if($this->db->query("insert into  satuanlain values(null,'$bil','$idtoko','$gudang','','$a','$b','$c')")){
			echo true;
		}else
			echo false;

	}
	
	public function simpanstok($bil='')
	{
		$a=bersih($_POST['stok']);
		if($this->db->query("update barang set stok='$a' where  id='$bil'")){
			echo true;
		}else
			echo false;
	}
	public function proseseditbarang($bil='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		$g=bersih($_POST['g']);
		$idtoko=$this->session->userdata('idtoko');
		if($this->db->query("update barang set kode='$a',nama='$b',kategori='$c',modal='$d',jual='$e',satuan='$f',fungsi='$g'
		where kode='$bil' and toko='$idtoko'")){
			$this->db->query("update info_barang set kode='$a',nama='$b' where kode='$bil'");
			$this->db->query("update keluar_masuk set kode='$a',nama='$b' where kode='$bil' and idtoko='$idtoko'");
			echo true;
		}else
			echo false;

	}
	
	public function simpanreturn($bil='',$ket='',$gudang='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$toko=bersih($_POST['idtoko']);
		$gudang=bersih($_POST['gudang']);
		$e=bersih($_POST['e']);
		$max=bersih($_POST['max']);
		$sebelum=$this->crud->getstokakhir($c,$gudang,$toko);

		$admin=$this->session->userdata('id').'_'.$this->session->userdata('nmuser');
		if($d>$max){ echo false; }else{
		if($ket=='M'){
			if($this->db->query("insert into keluar_masuk select '','$a',idbarang,'$admin','$b',supplier,'$e','$d',modal,jual,'$bil','',idtoko,d1,d2,d3,gudang,'RB',0,kode,nama,now(),0,'$d',total,sales,'$sebelum' 
			from keluar_masuk where nofaktur='$bil' and kode='$c'")){
					$this->db->query("update barang set stok=stok-$d where kode='$c' and gudang='$gudang'");
				echo true;
			}else
				echo false;
		}else{
			if($this->db->query("insert into keluar_masuk select '','$a',idbarang,'$admin','$b',supplier,'$e','$d',modal,jual,'$bil','',idtoko,d1,d2,d3,gudang,'RJ',0,kode,nama,now(),'$d',0,total,sales,'$sebelum' 
			from keluar_masuk where nofaktur='$bil' and kode='$c'")){
					$this->db->query("update barang set stok=stok+$d where kode='$c' and gudang='$gudang'");
				echo true;
			}else
				echo false;
		}
	}
	}

	public function simpanbayar($id='',$sisa='',$jn='')
	{
		$a=bersih($_POST['a']);
		$b=bersih(buangkrt(',',$_POST['b']));
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
			$this->db->query("update barang set stok=stok-$jml where gudang='$gudang' and kode='$kode'");
			$this->db->query("delete from keluar_masuk where id='$id'");
			//redirect('pembelian/lpbelanja');
			echo true;
		
		}
	}
	public function batalbayarsatuan($id='')
	{
		$this->db->query("delete from satuanlain where id='$id'");
		echo true;
	}

	public function batalbayar($id='')
	{
		$this->db->query("delete from pembayaran where id='$id'");
		echo true;
	}
	public function batalmasuk($faktur='',$kode='',$gudang='',$jml='',$id='')
	{
		$this->db->query("update barang set stok=stok-$jml where gudang='$gudang' and kode='$kode'");
		$this->db->query("delete from keluar_masuk where id='$id'");
		$this->db->query("delete from info_barang where faktur='$faktur'");
		echo true;
	}


	public function batalmasukall($faktur='')
	{
		$x=$this->db->query("select * from keluar_masuk where nofaktur='$faktur'");
		foreach($x->result() as $row){
		$this->db->query("update barang set stok=stok-$row->jml where gudang='$row->gudang' and kode='$row->kode'");
		$this->db->query("delete from keluar_masuk where id='$row->id'");
		}
		$this->db->query("delete from pembayaran where nobil='$faktur'");
		$this->db->query("delete from info_barang where faktur='$faktur'");
		echo true;
	}
	public function editjumlah($id,$faktur='',$kode='',$gudang='',$jml='')
	{
		$xjml=bersih($_POST['jml']);

		if($xjml<>$jml){
		$modal=bersih(buangkrt(',',$_POST['modal']));
		$d1=bersih($_POST['d1']);
		$d2=bersih($_POST['d2']);
		$d3=bersih($_POST['d3']);
		
		if($xjml>$jml){
		//tambah
			$new=$xjml-$jml;
			for ( $i=0; $i <$new ; $i++ )
			{ 
				$this->db->query("insert into info_barang values('','$faktur','','',now(),'$kode','','M')");
			}

			$this->db->query("update barang set stok=stok+$new where gudang='$gudang' and kode='$kode'");
			if($this->db->query("update keluar_masuk set d1='$d1',d2='$d2',d3='$d3',modal='$modal',jml=jml+$new,masuk=masuk+$new where id='$id'"))
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
			$this->db->query("update barang set stok=stok-$new where gudang='$gudang' and kode='$kode'");
			if($this->db->query("update keluar_masuk set d1='$d1',d2='$d2',d3='$d3',jml=jml-$new,masuk=masuk-$new where id='$id'"))
				echo true;
			else
				echo false;
		
		}
		}
	}
	
}
