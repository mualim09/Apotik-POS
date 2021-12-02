<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cari extends CI_Controller {


	public function index()
	{
		//show_404();
		//$string = word_limiter($string, 4);  ambil perkata
		$string = "Here is a simple string of text that will help us demonstrate this function.";
//		echo word_wrap($string, 25);
		$title = "What's wrong with CSS? tidak ada yang 'salah semua terlihat bagis dan baik";
		 $url_title = url_title($title, 'underscore', TRUE);
	//	echo $str = do_hash($title, 'md5'); 
	//	echo encode_php_tags($str);
	echo highlight_code($title);
	
	$disallowed = array('darn', 'shucks', 'golly', 'phooey');
	$string = word_censor($string, $disallowed, 'Beep!');
	
	}
	

	public function barangjual($jenis='',$plg='')
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		if($plg<>''){
			$data = $this->db->query("select * from keluar_masuk where  kode like '$kata%' or nama like '$kata%' and supplier='$plg' order by id desc limit 1 ");
			foreach($data->result() as $row)
			{
				$replay['suggestions'][] = array(
					'value'	=>'Sebelumnya'.' '.$row->kode.' '.$row->nama.' Rp.'. $row->jual,
					'kode'	=>$row->kode,
					'gudang'	=>$row->gudang,
					'nama'	=>$row->nama,
					'kategori'	=>'',
					'modal'	=>$row->modal,
					'jual'	=>$row->jual,
					'stok'	=>99,
					'satuan'	=>$row->nota,
					'd1'	=>$row->d1,
					'd2'	=>$row->d2,
					'd3'	=>$row->d3,
					'id'	=>$row->idbarang
				);
			}
			//echo json_encode($replay);
		}
		//		if($jenis=='a'){
//			$data = $this->db->query("select * from  barang where nama like '$kata%'");
//		}else{
//		}


			$idtoko=$this->session->userdata('idtoko');
			$data = $this->db->query("select barang.*,gudang.gudang as xgudang,status from  barang 
			inner join gudang on gudang.id=barang.gudang where barang.kode like '$kata%' or barang.nama like '$kata%' and barang.toko='$idtoko' and gudang.status=2");
		foreach($data->result() as $row)
		{
			//$row->gudang.')'.$row->xgudang.' '.
			if($row->status==2){
				$replay['suggestions'][] = array(
					'value'	=>$row->kode.' '.$row->nama.' Rp.'. $row->jual.' Stok '.$row->stok.' '.$row->satuan,
					'kode'	=>$row->kode,
					'gudang'	=>$row->gudang,
					'nama'	=>$row->nama,
					'kategori'	=>$row->kategori,
					'modal'	=>$row->modal,
					'jual'	=>$row->jual,
					'stok'	=>$row->stok,
					'satuan'	=>$row->satuan,
					'd1'	=>$row->d1,
					'd2'	=>$row->d2,
					'd3'	=>$row->d3,
					'id'	=>$row->id,
					'pkali'	=>1
				);
			}
		}
		$data = $this->db->query("select barang.*,gudang.gudang as xgudang,status,satuanlain.satuan as xst,jumlah as pkali,hargadua from  barang 
		inner join gudang on gudang.id=barang.gudang 
		inner join satuanlain on satuanlain.idbarang=barang.id 
		where barang.kode like '$kata%' or barang.nama like '$kata%' and barang.toko='$idtoko' and gudang.status=2");
	foreach($data->result() as $row)
	{
		//$row->gudang.')'.$row->xgudang.' '.
		if($row->status==2){
			$replay['suggestions'][] = array(
				'value'	=>$row->kode.' '.$row->nama.' Rp.'. $row->hargadua.' Stok '.round($row->stok/$row->pkali).' '.$row->xst,
				'kode'	=>$row->kode,
				'gudang'	=>$row->gudang,
				'nama'	=>$row->nama,
				'kategori'	=>$row->kategori,
				'modal'	=>$row->modal,
				'jual'	=>$row->hargadua,
				'stok'	=>$row->stok,
				'satuan'	=>$row->xst,
				'd1'	=>$row->d1,
				'd2'	=>$row->d2,
				'd3'	=>$row->d3,
				'id'	=>$row->id,
				'pkali'	=>$row->pkali
			);
		}
	}

		echo json_encode($replay);
	}

	public function barang($jenis='')
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
//		if($jenis=='a'){
//			$data = $this->db->query("select * from  barang where nama like '$kata%'");
//		}else{//		}

			$idtoko=$this->session->userdata('idtoko');
			$data = $this->db->query("select barang.*,gudang.gudang as xgudang from  barang 
			inner join gudang on gudang.id=barang.gudang where  barang.kode like '$kata%' or barang.nama like '$kata%'  and barang.toko='$idtoko'");
		foreach($data->result() as $row)
		{
				$replay['suggestions'][] = array(
					'value'	=>$row->gudang.')'.$row->xgudang.' '.$row->kode.' '.$row->nama.' Rp.'. $row->jual.' Stok '.$row->stok,
					'kode'	=>$row->kode,
					'gudang'	=>$row->gudang,
					'nama'	=>$row->nama,
					'kategori'	=>$row->kategori,
					'modal'	=>$row->modal,
					'jual'	=>$row->jual,
					'stok'	=>$row->stok,
					'satuan'	=>$row->satuan,
					'd1'	=>$row->d1,
					'd2'	=>$row->d2,
					'd3'	=>$row->d3,
					'id'	=>$row->id,
					'fungsi'	=>$row->fungsi
					
				);
		}

		echo json_encode($replay);
	}
	
	public function carikategori()
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		$idtoko=$this->session->userdata('idtoko');
		$data = $this->db->query("select * from 
		kategori where    nmkat like '%$kata%' and idtoko='$idtoko'");
		foreach($data->result() as $row)
		{
			$replay['suggestions'][] = array(
				'value'	=>$row->nmkat,
				'xid'	=>$row->id,
			);
		}
		echo json_encode($replay);
	}
	
	public function carisupplier()
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		$idtoko=$this->session->userdata('idtoko');
		$data = $this->db->query("select * from 
		supplier where  nmsup like '%$kata%' and idtoko='$idtoko' ");
		foreach($data->result() as $row)
		{
			$replay['suggestions'][] = array(
				'value'	=>$row->nmsup,
				'xid'	=>$row->id,
				'alamat'	=>$row->alamat,
				'notelp'	=>$row->notelp,
				'ket'	=>$row->ket
			);
		}
		echo json_encode($replay);
	}

	public function carisales()
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		$idtoko=$this->session->userdata('idtoko');
		$data = $this->db->query("select * from 
		sales where  nama like '%$kata%' and idtoko='$idtoko' ");
		foreach($data->result() as $row)
		{
			$replay['suggestions'][] = array(
				'value'	=>$row->nama,
				'xid'	=>$row->id,
				'alamat'	=>$row->alamat,
				'notelp'	=>$row->nohp
			);
		}
		echo json_encode($replay);
	}

	public function caripelanggan()
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		$idtoko=$this->session->userdata('idtoko');
		$data = $this->db->query("select * from  pelanggan where nama like '%$kata%' and idtoko='$idtoko'");
		foreach($data->result() as $row)
		{
			if($row->kode==''){
				$param=$row->id;
			}else{
				$param=$row->kode;
			}
				$nbil = $this->db->query("SELECT SUBSTR(MAX(nofaktur),-5) AS ID  FROM keluar_masuk where ket='K' and supplier='$row->nama'");
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
					else $ID = $MaksID; // lebih dari 10000
				}
				
			$replay['suggestions'][] = array(
				'value'	=>$row->nama,
				'nama'	=>$row->nama,
				'xid'	=>$row->id,
				'alamat'	=>$row->alamat,
				'notelp'	=>$row->telp,
				'ket'	=>$row->batas,
				'nota'	=>$ID
			);
		}
		echo json_encode($replay);
	}

	public function carikeluar($faktur='')
	{
		$kata=$_GET['query'];
		$replay=array();
		$replay['query']=$kata;
		$replay['suggestions']=array();
		$idtoko=$this->session->userdata('idtoko');
		$data = $this->db->query("select * from 
		keluar_masuk where    nofaktur='$faktur' and nama like '$kata%' and idtoko='$idtoko'");
		foreach($data->result() as $row)
		{
			$replay['suggestions'][] = array(
				'value'	=>$row->kode.' '.$row->nama.' '.$row->jml,
				'kode'	=>$row->kode,
				'jml'	=>$row->jml
			);
		}
		echo json_encode($replay);
	}

}
