<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('welcome_message');
	}
	
		public function cekid()
	{
		$nmlogin=bersih($_POST['nmlogin']);
		$pslogin=bersih($_POST['pslogin']);
		$q=$this->db->query("select * from admin where  nmlogin='$nmlogin' and pslogin=md5(md5(md5('$pslogin')))");
		if($q->num_rows()>0){
			$row=$q->row();
			$data = array(
					'id'  => $row->id,
					'nmuser'     => $row->nmuser,
					'level' => $row->level,
					'idtoko' => $row->idtoko
			);
			$this->session->set_userdata($data);

			echo 'main/';
		}else{
			echo false;
		}

	}
	
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}
}
