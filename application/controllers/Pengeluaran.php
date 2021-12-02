<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');
	}
	
	public function index($jenis='')
	{
		$data['jenis']=$jenis;
		$data['info']=$this->crud->gettoko();
		$this->load->view('admin/header',$data);
		$this->load->view('pengeluaran/index',$data);
		$this->load->view('admin/footer');
	}

	public function input($jenis='')
	{
		$data['jenis']=$jenis;
		$this->load->view('pengeluaran/input',$data);
	}
	
	public function simpaninput($jenis)
	{
		$nobil=$this->crud->nobilmasuk($jenis);
		$a=bersih($_POST['a']);
		$b=bersih($_POST['b']);
		$c=bersih($_POST['c']);
		$toko=$this->session->userdata('idtoko');
		if($this->db->query("insert into pembayaran values('','$nobil','$a','$b','$c','0','','$jenis','$toko')"))
			echo true;
		else
			echo false;
	}

	public function hapus($id='',$jenis)
	{
		$this->db->query("delete from pembayaran where id='$id'");
		redirect("pengeluaran/index/$jenis");
	}

}
