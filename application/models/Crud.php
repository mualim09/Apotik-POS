<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		function bersih($x=''){
			$con = new mysqli("localhost", "root", "", "apotik");
			$aman=mysqli_real_escape_string($con ,$x);
				return $aman;
		}
		
		function buangkrt($krt,$str)
		{
			return	str_replace($krt,'' ,$str); 
		}
		
		function diskon($xharga=0,$diskon=0)
		{
			$harga=floatval(buangkrt(',',$xharga));
			return	round($harga-((($harga*floatval($diskon))/100)));
		}
		
		function uang($nilaiUang=0)
		{
			$nilaiUang=buangkrt(',',$nilaiUang);
			return	number_format( $nilaiUang, 0 , '' , '.' ); 
		}

		function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
		}

		function tgl_indo($tanggal){
			$bulan = array (
				1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
			$pecahkan = explode('-', $tanggal);

			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}

	}

		public function getnobil() {
				function gabung($length = 4) {
					$characters = 'abcdefgrihjklmnoprstupwxyz';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < $length; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					return $randomString;
				}
				return gabung().time();	
		}

		public function mgetsaldo() {
			$id=$this->session->userdata('id');
			$pxquery = $this->db->query("select sum(jumlah) as jml from galeri_saldo where idmember='$id'");
			$ptrow=$pxquery->row();
			$kquery = $this->db->query("select sum(jmlbayar) as jmlbayar from galeri_transaksi where status<>'Gagal' and idmember='$id'");
			$krow=$kquery->row();
			return ($ptrow->jml-$krow->jmlbayar);
		}

		public function mgetsisa($kode='') {
			$id=$this->session->userdata('id');
			$decr=decrypt_url($kode);
			$krt = array (' ',',','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+','-','/','\\',',','.','#',':',';','\'','"','[',']');
			$pecah=str_replace($krt,'',$decr);
			if((int)$pecah){
				$pxquery = $this->db->query("select jumlah as jml from galeri_saldo where idmember='$id'");
				if($pxquery->num_rows()>0){
					$ptrow=$pxquery->row();

					$kquery = $this->db->query("select sum(jmlbayar) as jmlbayar from galeri_transaksi where status<>'Gagal' and idmember='$id'");
					$krow=$kquery->row();
					$sisa=$ptrow->jml-$krow->jmlbayar;
					if($pecah>$sisa)
							return false;
					else
							return true;
				}else 
					return false;
			}else
				return false;

		}

		public function cekpin($pin='') {
			$id=$this->session->userdata('id');
			$query = $this->db->query("select * from member where id='$id' and pin=md5(sha1(sha(password('$pin'))))");
			if($query->num_rows()>0)
				return true;
			else
				return false;
		}
		public function cekcash($id='') {
		$query = $this->db->query("select * from pembayaran where nobil='$id'");
		if($query->num_rows()>0)
			return true;
		else
			return false;
		}

		public function cekdatatrx($id='') {
			$query = $this->db->query("select * from galeri_transaksi where kodetrx='$id'");
			if($query->num_rows()>0)
				return true;
			else
				return false;
		}

		public function getuser() {
			$id=$this->session->userdata('id');
			$query = $this->db->query("select * from admin where id='$id'");
			return $query->row(); 
		}

		public function insertlog($pesan='') {
				$idm=$this->session->userdata('id');
				$ip= $this->input->ip_address();
				$this->db->query("insert into catatan values('','$idm',now(),'$pesan','$ip')");
		}
		
		public function gettoko() {
			$idtoko=$this->session->userdata('id');
			$query = $this->db->query("select pengaturan.*,admin.* from pengaturan 
			inner join admin on admin.idtoko=pengaturan.id where admin.id='$idtoko'");
			return $query->row(); 
		}
		
		public function toko() {
			$idtoko=$this->session->userdata('idtoko');
			if($idtoko==''){
				$query = $this->db->query("select * from pengaturan");
			}else{
				$query = $this->db->query("select * from pengaturan where id='$idtoko'");
			}
			return $query->row(); 
		}
		
		public function hapus($id='',$table='',$param='') {
			if($this->db->query("delete from $table where $param='$id'"))
				return true; 
			else
				return false; 
		}
//pembelian
		public function getbayar($id='') {
			$query = $this->db->query("select sum(jml) as total from pembayaran where nobil='$id'");
			 $row=$query->row(); 
			 return $row->total;
		}

		public function getdiskon($id='') {
			$query = $this->db->query("select sum(jml) as total from pembayaran where nobil='$id' and jenis='K'");
			 $row=$query->row(); 
			 return $row->total;
		}
		
		public function getnotabeli($id='') {
			
			$query = $this->db->query("select if(ket='K',sum(jml*total),sum(jml*replace(modal,',',''))) as nota from keluar_masuk where nofaktur='$id'");
			 $row=$query->row(); 
			 return $row->nota;
		}
		
		public function gettable($id='',$table='',$param='') {
			$query = $this->db->query("select * from $table where $param='$id'");
			return $query->row(); 
		}
		
		public function tambah($table='',$data='') {
			if($this->db->insert($table, $data))
				return true;
			else
				return false;
		}
		
		public function nobilmasuk($kd='') {
			$idtoko=$this->session->userdata('idtoko');

			if($kd=='um' or $kd=='uk'){
				$param=$kd.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nobil),-5) AS ID  FROM pembayaran where jenis='$kd' and gudang='$idtoko'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}elseif($kd=='mv'){
				$param='MV'.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='MV' and idtoko='$idtoko'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}elseif($kd=='rb'){
				$param='RB'.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='RB' and idtoko='$idtoko'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}elseif($kd=='rj'){
				$param='RJ'.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='RJ' and idtoko='$idtoko'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}elseif($kd=='k'){
				$param='K'.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='K' and idtoko='$idtoko' and sales<>'sales'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}else{
				$param='M'.date('ymd').$idtoko;
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='M' and idtoko='$idtoko'");
				$dataMax=$nbil->row_array();
				if($dataMax['ID']=='') { 
					$ID = $param."00001";
				}else {
					$MaksID = $dataMax['ID'];
					$MaksID++;
					if($MaksID < 10) $ID = $param."0000".$MaksID; // nilai kurang dari 10
					else if($MaksID < 100) $ID = $param."000".$MaksID; // nilai kurang dari 100
					else if($MaksID < 1000) $ID = $param."00".$MaksID; // nilai kurang dari 1000
					else if($MaksID < 10000) $ID = $param."0".$MaksID; // nilai kurang dari 10000
					else $ID = $param.$MaksID; // lebih dari 10000
				}
				return $ID;
			}
		}

		

		
		public function getall($table='')
		{
			return $this->db->get($table)->result();
		}
		
		public function getallwhere($table='',$param='',$id='')
		{
			return $this->db->get_where($table, [$param => $id])->result();
		}
		
		public function getbyid($table='',$param='',$id='')
		{
			return $this->db->get_where($table, [$param => $id])->row();
		}
		public function getstokakhir($kode='',$gudang='',$toko='')
		{
			$q=$this->db->query("select * from barang where kode='$kode' and gudang='$gudang' and toko='$toko'");
			if($q->num_rows()){
				$row=$q->row();
				return $row->stok;
			}else{
				return 0;

			}
		}
		public function barangmasuk($nobil='')
		{
		
			$gudang=bersih($_POST['gudang']);
			$nota=bersih($_POST['nota']);
			$supplier=bersih($_POST['supplier']);
			$metode=bersih($_POST['metode']);
			$tbayar=bersih($_POST['tbayar']);
			$tgl=bersih($_POST['tgl']);
			$idbarang=bersih($_POST['idbarang']);
			$kode=bersih($_POST['kode']);
			$nama=bersih($_POST['nama']);
			$kategori=bersih($_POST['kategori']);
			$jml=bersih($_POST['jml']);
			$modal=bersih(buangkrt(',',$_POST['modal']));
			$jual=bersih(buangkrt(',',$_POST['jual']));
			$satuan=bersih($_POST['satuan']);
			$d1=bersih($_POST['d1']);
			$d2=bersih($_POST['d2']);
			$d3=bersih($_POST['d3']);
			$fungsi=bersih($_POST['fungsi']);
			$toko=$this->session->userdata('idtoko');
			$admin=$this->session->userdata('id').'_'.$this->session->userdata('nmuser');
			$ds1=diskon($modal,$d1);
			$ds2=diskon($ds1,$d2);
			$ds3=diskon($ds2,$d3);
			$sebelum=$this->getstokakhir($kode,$gudang,$toko);
			$q = $this->db->query("select * from barang where kode='$kode' and gudang='$gudang'");
			if($q->num_rows()>0){
				$info=$q->row();
				$idb=$info->id;
				$this->db->query("update barang set modal='$modal',jual='$jual',stok=stok+$jml,
				d1='$d1',d2='$d2',d3='$d3',bersih='$ds3',fungsi='$fungsi' where kode='$kode' and gudang='$gudang'");
			}else{
				$this->db->query("insert into barang values('','$kode'
				,'$nama','$kategori','$modal','$jual','$jml','$gudang'
				,'','','$satuan','$d1','$d2','$d3','$jml',0,now(),'','$toko','$ds3','$fungsi')");
				$q = $this->db->query("select * from barang where kode='$kode' and gudang='$gudang'");
				$info=$q->row();
				$idb=$info->id;
			}
			
			$q = $this->db->query("select * from keluar_masuk where nofaktur='$nobil' and kode='$kode'");
			if($q->num_rows()>0){
				$this->db->query("update keluar_masuk set 
				jml=jml+$jml,modal='$modal',jual='$jual',
				d1='$d1',d2='$d2',d3='$d3',masuk=masuk+$jml,total=(jml+$jml)*$ds3 where nofaktur='$nobil' and kode='$kode'");
			}else{
				$this->db->query("insert into keluar_masuk values(null,'$nobil','$idb','$admin','$tgl',
				'$supplier','$metode','$jml','$modal','$jual','$nota','$tbayar','$toko'
				,'$d1','$d2','$d3','$gudang','M',0,'$kode','$nama',now(),'$jml','0',$jml*$ds3,'sales','$sebelum')");
			}
			
			for ( $i=0; $i <$jml ; $i++ )
			{ 
				$this->db->query("insert into info_barang values('','$nobil','$supplier','',now(),'$kode','$nama','M')");
			}
			return true;
		}

		public function barangkeluar($xbil)
		{		
			$ceknota=bersih($_POST['nota']);

			if($ceknota<>'')
				$nota=bersih($_POST['nota']);
			else{
				$info=$this->crud->gettoko();
				if($info->stplg=='ya')
					$nota=bersih($_POST['nota']);
				else
					$nota=$this->crud->nobilmasuk('k');
			}
				$pkali=bersih($_POST['pkali']);
				$gudang=bersih($_POST['gudang']);
			$nobil=$nota;
			$supplier=bersih($_POST['supplier']);
			$metode=bersih($_POST['metode']);
			$tbayar=bersih($_POST['tbayar']);
			$tgl=bersih($_POST['tgl']);
			$idbarang=bersih($_POST['idbarang']);
			$kode=bersih($_POST['kode']);
			$nama=bersih($_POST['nama']);
			$kategori=bersih($_POST['kategori']);
			$jml=bersih($_POST['jml'])*$pkali;
			$modal=bersih(buangkrt(',',$_POST['modal']));
			$jual=bersih(buangkrt(',',$_POST['jual']));
			$satuan=bersih($_POST['satuan']);
			$d1=bersih($_POST['d1']);
			$d2=bersih($_POST['d2']);
			$d3=bersih($_POST['d3']);
			$sales=bersih($_POST['sales']);
			$toko=$this->session->userdata('idtoko');
			$admin=$this->session->userdata('id').'_'.$this->session->userdata('nmuser');
			$ds1=0;
			$ds2=0;
			$ds3=0;
			$ds1=diskon($jual,$d1);
			$ds2=diskon($ds1,$d2);
			$ds3=diskon($ds2,$d3);
			$sebelum=$this->getstokakhir($kode,$gudang,$toko);

			$i=$this->db->query("select stok from barang where gudang='$gudang' and kode='$kode'");
			if($i->num_rows()){
			$row=$i->row();
			if($row->stok>=$jml){


			$this->db->query("update barang set stok=stok-$jml where kode='$kode' and gudang='$gudang'");

			$q = $this->db->query("select * from keluar_masuk where nofaktur='$nobil' and kode='$kode'");
			if($q->num_rows()>0){
				$this->db->query("update keluar_masuk set 
				jml=jml+$jml,modal='$modal',jual='$jual',
				d1='$d1',d2='$d2',d3='$d3',keluar=keluar+$jml,sales='$sales',total='$ds3' where nofaktur='$nobil' and kode='$kode'");

			}else{
				$this->db->query("insert into keluar_masuk values(null,'$nobil','$idbarang','$admin','$tgl',
				'$supplier','$metode','$jml','$modal','$jual','$satuan','$tbayar','$toko'
				,'$d1','$d2','$d3','$gudang','K',0,'$kode','$nama',now(),0,'$jml','$ds3','$sales','$sebelum')");
			}
			
			$this->db->query("update keluar_masuk set stbayar='$metode',tbayar='$tbayar' where nofaktur='$nobil'");

			for ( $i=0; $i <$jml ; $i++ )
			{ 
				$this->db->query("insert into info_barang values('','$nobil','$supplier','',now(),'$kode','$nama','M')");
			}
				return $nota;
		}else echo false;
			}else return false;
		}

		public function pindahstok($id)
		{			
			$sebelum=bersih($_POST['sebelum']);
			$pecah=explode('_',$_POST['gudang']);
			$gudang=$pecah[0];
			$dari=bersih($_POST['dari']);
			$jml=bersih($_POST['jml']);
			$nobil=$this->nobilmasuk('mv');
			$kode=bersih($_POST['kode']);
			$admin=$this->session->userdata('id').'_'.$this->session->userdata('nmuser');
			$i=$this->db->query("select * from barang where id='$id'");
			$row=$i->row();
			echo $row->stok;
			if($row->stok>=$jml){


			$this->db->query("update barang set stok=stok-$jml where id='$id'");

			$this->db->query("insert into keluar_masuk select null,'$nobil','$id','$admin',now(),
			gudang,'Cash','$jml',modal,jual,'move $dari Ke $gudang keluar','Cash',toko
			,d1,d2,d3,gudang,'K',0,kode,nama,now(),0,'$jml',bersih,'sales','$sebelum' from barang where id='$id'");
			$toko=$pecah[1];

			$q = $this->db->query("select * from barang where kode='$kode' and gudang='$gudang'");
			if($q->num_rows()>0){
			$sebelum=$this->getstokakhir($kode,$gudang,$toko);
			$this->db->query("update barang set stok=stok+$jml where kode='$kode' and gudang='$gudang'");
			}else{
				$sebelum=0;
				$this->db->query("insert into barang select null,kode
				,nama,kategori,modal,jual,'$jml','$gudang'
				,'','',satuan,d1,d2,d3,'$jml',0,now(),'','$toko',bersih,fungsi from barang where id='$id'");
			}
			$this->db->query("insert into keluar_masuk select null,'$nobil','$id','$admin',now(),
			'$gudang','Cash','$jml',modal,jual,'move  $dari Ke $gudang masuk','Cash',toko
			,d1,d2,d3,'$gudang','M',0,kode,nama,now(),$jml,0,bersih,'sales','$sebelum' from barang where id='$id'");

//			for ( $i=0; $i <$jml ; $i++ )
//			{ 
//				$this->db->query("insert into info_barang values('','$nobil','$supplier','',now(),'$kode','$nama','M')");
//			}
			
			return true;
			}else return false;
		}


		
}