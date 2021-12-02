<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');


	}
	public function kosong()
	{
		$this->db->query("delete from  barang");
		$this->db->query("delete from  info_barang");
		$this->db->query("delete from  keluar_masuk");
		$this->db->query("delete from  pembayaran");
		redirect('main/');
	}

	public function index()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}


	//backup
	public function backup()
	{ 
		$idtoko=$this->session->userdata('idtoko');
		$nama=$idtoko.'_'.date('Y-m-d_H-i').'.sql';
		$prefs = array(
			'ignore'     => array(),
			'format'     => 'txt',
			'filename'   => "$nama",
			'add_drop'   => TRUE, 
			'add_insert' => TRUE,
			'newline'    => "\n"
		);
		$this->load->dbutil();
		$backup =$this->dbutil->backup($prefs); 
		$this->load->helper('file');
		write_file("backup/$nama", $backup);
		//$this->load->helper('download');
		//force_download("$nama", $backup);
		echo true;
		}
	//
	
	public function pilihdb()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/pilihdb',$data);
		$this->load->view('admin/footer');
	}
	
	public function restoredb($data='')
	{
	  $isi_file = file_get_contents("./backup/$data");
	  $string_query = rtrim( $isi_file, "\n;" );
	  $array_query = explode(";", $string_query);
	  foreach($array_query as $query)
	  {
		$this->db->query($query);
	  }
	  echo true;

	}
	
	public function caridata()
	{ ?>
<a class="b-close"><img src="plugin/bpopup/close.jpg" alt="close" /></a>
<table width='100%' class='table table-sm table-hover table-bordered dttable'>
<thead>
	<tr align=center>
		<td>NO</td>
		<td>Gudang</td>
		<td>Nama</td>
		<td>Modal</td>
		<td>Jual</td>
		<td>Stok</td>
		<td>Fungsi</td>
	</tr>
</thead>
<tbody>
<?php
	$kata=bersih($_POST['kata']); $no=1;
	$idtoko=$this->session->userdata('idtoko');
	$q=$this->db->query("select barang.*,gudang.gudang as xgudang from  barang 
	inner join gudang on gudang.id=barang.gudang  where barang.toko='$idtoko' and barang.kode like '%$kata%'  or barang.nama like '%$kata%' or barang.fungsi like '%$kata%'");
	foreach($q->result() as $row){ 
		if($idtoko==$row->toko){
		?>
	<tr class="<?php if($row->stok<1) echo 'table-warning'; ?>">
		<td align=center><?php echo $no; ?></td>
		<td><?php echo $row->gudang; ?>) <?php echo $row->xgudang; ?></td>
		<td><?php echo $row->kode; ?>/<?php echo $row->nama; ?></td>
		<td align=right><?php echo uang($row->modal); ?></td><td  align=right><?php echo uang($row->jual); ?></td>
		<td  align=center><?php echo $row->stok; ?> <?php echo $row->satuan; ?></td>
		<td><?php echo $row->fungsi; ?></td>
	</tr>
<?php $no++; }} ?>
</tbody>
</table>

	<script type="text/javascript">
			$('.dttable').DataTable();
	</script>
	<?php } 
	
	public function akun()
	{
	$akun=$this->crud->getuser();
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveakun" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama Lengkap</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $akun->nmuser; ?>" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
								<td>Nama Login</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="<?php echo $akun->nmlogin; ?>" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td><input type="text" required   autocomplete='off' name="c" value="<?php echo $akun->notelp; ?>" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input placeholde='Kosongkan Jika Tidak Di Ganti'type="password" autocomplete='off'  name="d" value="" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT AKUN" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Edit!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}
	
	public function saveakun()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$id=$this->session->userdata('id');
		if($d==''){
			$this->db->query("update admin set nmuser='$a',nmlogin='$b',notelp='$c' where id='$id'");
		}else{
			$this->db->query("update admin set nmuser='$a',nmlogin='$b',notelp='$c',pslogin=md5(md5(md5('$d'))) where id='$id'");
		}
		echo true;
	}
	
	public function toko()
	{
	$row=$this->crud->toko();
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Info Toko</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savetoko" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama Toko</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="a"><?php echo $row->nmtoko; ?></textarea></td>
							</tr>
							<tr>
								<td>Atas</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="b"><?php echo $row->atas; ?></textarea></td>
							</tr>
							<tr>
								<td>Bawah</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="c"><?php echo $row->bawah; ?></textarea></td>
							</tr>
							<tr>
								<td>Faktur</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="d"><?php echo $row->faktur; ?></textarea></td>
							</tr>
							<tr>
								<td>Promo</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="e"><?php echo $row->promo; ?></textarea></td>
							</tr>
							<tr>
								<td>ALamat</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="f"><?php echo $row->alamat; ?></textarea></td>
							</tr>
							<tr>
								<td>NO Telepon</td>
								<td><textarea  required   autocomplete='off' class='form-control' name="g"><?php echo $row->notelp; ?></textarea></td>
							</tr>

							<tr>
								<td>Logo</td>
								<td><img src="plugin/gambar/<?php echo $row->logo; ?>" width="100" height="100" alt="" /></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Edit!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function savetoko()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		$g=bersih($_POST['g']);
			$idtoko=$this->session->userdata('idtoko');
		if($this->db->query("update pengaturan set nmtoko='$a',atas='$b',bawah='$c',faktur='$d'
			,promo='$e',alamat='$f',notelp='$g' where id='$idtoko'"))
			echo true;
		else
			echo false;
	}
//gudang

	public function gudang()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/gudang',$data);
		$this->load->view('admin/footer');
	}

	public function tambahgudang()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Gudang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savegudang" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Gudang</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Ket</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
							<td>Jenis</td>
							<td><select name="c" class='form-control form-control-sm'  >
							<option value="1" >Gudang</option>
							<option value="2">Toko</option>
							</select></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
					
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editgudang($id,$tabel,$param)
	{
		$info=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Gudang</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savegudangedit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Gudang</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $info->gudang; ?>" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
								<td>Ket</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="<?php echo $info->ket; ?>" class='form-control form-control-sm' /></td>
							</tr>
							<tr>
							<td>Jenis</td>
							<td><select name="c"class='form-control form-control-sm'  >
							<option value="1" <?php if($info->status==1) echo 'seleceted'; ?>>Gudang</option>
							<option value="2" <?php if($info->status==2) echo 'seleceted'; ?>>Toko</option>
							</select></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}
	
	public function savegudangedit($id='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		if($this->db->query("update gudang set gudang='$a',ket='$b',status='$c' where id='$id'"))
			echo true;
		else
			echo false;
	}

	public function savegudang()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$toko=$this->session->userdata('idtoko');
		if($this->db->query("insert into gudang values('','$a','$b','$toko','$c')"))
			echo true;
		else
			echo false;
	}
	
	public function hapusgudang($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/gudang");
	}
	
	//admin
		public function admin()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/admin',$data);
		$this->load->view('admin/footer');
	}
	
	public function hapusadmin($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/admin");
	}
	
	public function tambahadmin()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveadmin" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama User</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Nama Login</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password"  required  autocomplete='off' name="c" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Level</td>
								<td>
								<select name="e" class='form-control bersih form-control-sm' >
									<option value="1">1. Admin Utama</option>
									<option value="2">2. Kasir</option>
									<option value="3">3. Gudang / Stok</option>
								</select>
								</td>
							</tr>
							<tr style='display:none;'>
								<td>Toko</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="<?php echo $this->session->userdata('idtoko'); ?>" class='form-control bersih form-control-sm' /></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)

				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editadmin($id,$tabel,$param)
	{
		$row=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Admin</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveadminedit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama User</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $row->nmuser; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Nama Login</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="<?php echo $row->nmlogin; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" placeholder="Kosongkan Jika Tidak Di Ganti"  autocomplete='off' name="c" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="<?php echo $row->notelp; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Level</td>
								<td>
								<select name="e" class='form-control bersih form-control-sm' >
									<option value="1" <?php if($row->level==1) echo 'selected'; ?>>1. Admin</option>
									<option value="2" <?php if($row->level==2) echo 'selected'; ?>>2. Gudang</option>
									<option value="3" <?php if($row->level==3) echo 'selected'; ?>>3. Stok</option>
								</select>
								</td>
							</tr>
							<tr style='display:none;'>
								<td>Toko</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="<?php echo $row->idtoko; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function saveadminedit($id='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		if($c==''){
			if($this->db->query("update admin set nmuser='$a',nmlogin='$b'
			,notelp='$d',level='$e','1',idtoko='$f'
			where id='$id'"))
				echo true;
			else
				echo false;
		}else{
			if($this->db->query("update admin set nmuser='$a',nmlogin='$b',
			pslogin=md5(md5(md5('$c'))),notelp='$d',level='$e','1',idtoko='$f'
			where id='$id'"))
				echo true;
			else
				echo false;
		}
	}

	public function saveadmin()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		if($this->db->query("insert into admin values('','$a','$b',md5(md5(md5('$c'))),'$d','$e','1','$f')"))
			echo true;
		else
			echo false;
	}
	//pelanggan
	
	public function pelanggan()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/pelanggan',$data);
		$this->load->view('admin/footer');
	}

	public function hapuspelanggan($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/pelanggan");
	}

	public function tambahpelanggan()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savepelanggan" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kota</td>
								<td><input type="text"  required  autocomplete='off' name="c" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Limit Hutang</td>
								<td><input type="text"  required  autocomplete='off' name="e" value="" class='form-control bersih form-control-sm' /></td>

							</tr>
							<tr>
								<td>Lama (hari)</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kode Pelanggan</td>
								<td><input type="text"  required  autocomplete='off' name="g" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)

				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editpelanggan($id,$tabel,$param)
	{
		$row=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveapelangganedit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
														<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $row->nama; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="<?php echo $row->alamat; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kota</td>
								<td><input type="text"  required  autocomplete='off' name="c" value="<?php echo $row->kota; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>No Telepon</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="<?php echo $row->telp; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Limit Hutang</td>
								<td><input type="text"  required  autocomplete='off' name="e" value="<?php echo $row->batas; ?>" class='form-control bersih form-control-sm' /></td>

							</tr>
							<tr>
								<td>Lama (hari)</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="<?php echo $row->lama; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kode Pelanggan</td>
								<td><input type="text"  required  autocomplete='off' name="g" value="<?php echo $row->kode; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function saveapelangganedit($id='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		$g=bersih($_POST['g']);

			if($this->db->query("update pelanggan set nama='$a',alamat='$b',
			kota='$c',telp='$d',batas='$e',lama='$f',kode='$g'
			where id='$id'"))
				echo true;
			else
				echo false;

	}

	public function savepelanggan()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		$g=bersih($_POST['g']);
		$idtoko=$this->session->userdata('idtoko');
	
		if($this->db->query("insert into pelanggan values('','$a','$b','$c','$d','$e','$f','$g','$idtoko')"))
			echo true;
		else
			echo false;
	}
	//supplier


	public function supplier()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/supplier',$data);
		$this->load->view('admin/footer');
	}

	public function hapussupplier($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/supplier");
	}

	public function tambahsupplier()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Supplier</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savesupplier" id="saveakun">
						<table class='table table-sm'>
														<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Telp</td>
								<td><input type="text"  required  autocomplete='off' name="c" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Ket</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Tempo (hari)</td>
								<td><input type="text"  required  autocomplete='off' name="e" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kode</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)

				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editsupplier($id,$tabel,$param)
	{
		$row=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveasupplieredit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
														<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $row->nmsup; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text"  required  autocomplete='off' name="b" value="<?php echo $row->alamat; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Telp</td>
								<td><input type="text"  required  autocomplete='off' name="c" value="<?php echo $row->notelp; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Ket</td>
								<td><input type="text"  required  autocomplete='off' name="d" value="<?php echo $row->ket; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Tempo (hari)</td>
								<td><input type="text"  required  autocomplete='off' name="e" value="<?php echo $row->tempo; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td>Kode</td>
								<td><input type="text"  required  autocomplete='off' name="f" value="<?php echo $row->kode; ?>" class='form-control bersih form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function saveasupplieredit($id='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);

			if($this->db->query("update supplier set nmsup='$a',alamat='$b',
			notelp='$c',ket='$d',tempo='$e',kode='$f'
			where id='$id'"))
				echo true;
			else
				echo false;

	}

	public function savesupplier()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$d=bersih($_POST['d']);
		$e=bersih($_POST['e']);
		$f=bersih($_POST['f']);
		$idtoko=$this->session->userdata('idtoko');

		if($this->db->query("insert into supplier values('','$a','$b','$c','$d','$e','$f','$idtoko')"))
			echo true;
		else
			echo false;
	}

//kategori


	public function kategori()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/kategori',$data);
		$this->load->view('admin/footer');
	}

	public function hapuskategori($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/kategori");
	}

	public function tambahkategori()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savekategori" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama Kategori</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)

				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editkategori($id,$tabel,$param)
	{
		$row=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveakategoriedit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama Kategori</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $row->nmkat; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function saveakategoriedit($id='')
	{
		$a=bersih($_POST['a']);
		if($this->db->query("update kategori set nmkat='$a' where id='$id'"))
			echo true;
		else
			echo false;
	}

	public function savekategori()
	{
		$a=bersih($_POST['a']);
		$idtoko=$this->session->userdata('idtoko');

		if($this->db->query("insert into kategori values('','$a','$idtoko')"))
			echo true;
		else
			echo false;
	}


//sales
	public function sales()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sales',$data);
		$this->load->view('admin/footer');
	}

	public function hapussales($id='',$table='',$param='')
	{
		echo $this->crud->hapus($id,$table,$param);
		redirect("main/sales");
	}

	public function tambahsales()
	{
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Sales</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/savekasales" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text" required autocomplete='off' name="b" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>No HP</td>
								<td><input type="text" required autocomplete='off' name="c" value="" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="test" value="TAMBAH DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)

				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Simpan!',
					  'success'
					);
					$(".bersih").val('');
				}
			  }
			});
		});
		});
	</script>
<?php 
	}



	public function editsales($id,$tabel,$param)
	{
		$row=$this->crud->gettable($id,$tabel,$param);
	 ?>
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Edit Sales</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<form method="post" action="main/saveasalesedit/<?php echo $id; ?>" id="saveakun">
						<table class='table table-sm'>
							<tr>
								<td>Nama</td>
								<td><input type="text" required autocomplete='off' name="a" value="<?php echo $row->nama; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><input type="text" required autocomplete='off' name="b" value="<?php echo $row->alamat; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>
							<tr>
								<td>No HP</td>
								<td><input type="text" required autocomplete='off' name="c" value="<?php echo $row->nohp; ?>" class='form-control bersih  form-control-sm' /></td>
							</tr>

							<tr>
								<td></td>
								<td><input type="submit" name="test" value="EDIT DATA" class='btn btn-sm btn-primary' /></td>
							</tr>
						</table>
					</form>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
			<script type="text/javascript">
	$(document).ready(function()
	{
		$('.modal').modal('show');
		$("#saveakun").on('submit',function(e){
			e.preventDefault();
			$.ajax({
			  url:$(this).attr('action'),
			  type: 'post',
			  data: $(this).serialize(),
			  dataType: "html",
			  success: function(dt){
				if(dt==0){
					Swal.fire(
					  'Informasi',
					  'Gagal Simpan!',
					  'warning'
					)
				}else{
					Swal.fire(
					  'Informasi',
					  'Berhasil Edit!',
					  'success'
					)
				}
			  }
			});
		});
		});
	</script>
<?php 
	}

	public function saveasalesedit($id='')
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		if($this->db->query("update sales set nama='$a',
		alamat='$b',nohp='$c' where id='$id'"))
			echo true;
		else
			echo false;
	}

	public function savekasales()
	{
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$idtoko=$this->session->userdata('idtoko');

		if($this->db->query("insert into sales values('','$a','$b','$c','$idtoko')"))
			echo true;
		else
			echo false;
	}
}
