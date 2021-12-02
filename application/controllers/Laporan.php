<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');
	}
	
	public function penyesuaian($kode,$toko,$stok,$gudang)
	{
		$this->db->query("update barang set stok='$stok' where gudang='$gudang' and kode='$kode' and toko='$toko'");
		redirect('pembelian/index');
	}

	public function index()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/index',$data);
		$this->load->view('admin/footer');
	}

	public function praktek()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/praktek',$data);
		$this->load->view('admin/footer');
	}
	public function masuk()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/masuk',$data);
		$this->load->view('admin/footer');
	}

	public function keluar()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/keluar',$data);
		$this->load->view('admin/footer');
	}

	public function kasir()
	{
		$data['info']=$this->crud->gettoko();
		$idtoko=$this->session->userdata('idtoko');
		$data['gudang']=$this->crud->getallwhere('admin','idtoko',$idtoko);
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/kasir',$data);
		$this->load->view('admin/footer');
	}

	public function sales()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/sales',$data);
		$this->load->view('admin/footer');
	}
	
	public function lplaba()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('laporan/lplaba',$data);
		$this->load->view('admin/footer');
	}
	public function history()
	{
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('admin/footer');
	}
}
