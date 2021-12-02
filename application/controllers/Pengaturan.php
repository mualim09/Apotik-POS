<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function index()
	{
echo $this->benchmark->elapsed_time();

	}
	
	public function csv()
	{
		$delimiter = ",";
		$newline = "\r\n";
		$enclosure = '"';
		$this->load->dbutil();
		$query = $this->db->query("SELECT * FROM barang");
		echo $this->dbutil->csv_from_result($query, $delimiter, $newline, $enclosure);
	}
	
	public function xml()
	{
		$config = array (
				'root'          => 'root',
				'element'       => 'element',
				'newline'       => "\n",
				'tab'           => "\t"
		);
		$this->load->dbutil();
		$query = $this->db->query("SELECT * FROM barang");
		echo $this->dbutil->xml_from_result($query, $config);
	}
	
}
