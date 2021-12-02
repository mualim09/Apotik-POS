<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		if(!$this->session->userdata('id')) redirect('welcome/index');
	}
	
	public function index($param='',$op='')
	{
		$data['info']=$this->crud->gettoko();
		$data['param']=$param;
		$data['op']=$op;
		$this->load->view('admin/header',$data);
		$this->load->view('info/info',$data);
		$this->load->view('admin/footer');
	}


}
