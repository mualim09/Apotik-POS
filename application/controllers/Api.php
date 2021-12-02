<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function index($fak='')
	{
        $result = array(); $semua=0;
            $data = $this->db->query("select * from  keluar_masuk where ket='K' and nofaktur='$fak'");
                foreach($data->result() as $row)
                {
                    $semua+=$row->jual*$row->keluar;
                    array_push($result, array('title'=>"$row->nama",'price'=>uang($row->jual),'qty'=>uang($row->keluar),'total_price'=>uang($row->jual*$row->keluar)));

                }
                echo json_encode(array("hasil"=>$result,"semua"=>uang($semua)));
    }
    

	public function gettrx()
	{
        $result = array();
            $data = $this->db->query("select *,count(*) as jml from  keluar_masuk where ket='K' and date(waktu)=date(now()) group by nofaktur order by id desc");
                foreach($data->result() as $row)
                {
                    array_push($result, array('jml'=>"$row->jml",'faktur'=>"$row->nofaktur",'tgl'=>$row->waktu,'qty'=>(int)$row->keluar,'total'=>uang($row->jual*$row->keluar)));

                }
                echo json_encode(array("hasil"=>$result));
    }
    
	public function obat()
	{
        $db_data=array();
        $no=100000;
        $data = $this->db->query("select * from  obat");
            foreach($data->result() as $row)
            {
                $dt=explode("obat",$row->Nama_barang_);
                if(count($dt)>1){
                    $nama=bersih($dt[0]);
                    $fungsi=$dt[1];
                }else{
                    $nama=bersih($row->Nama_barang_);
                    $fungsi='';
                }
                $this->db->query("insert into barang values(null,$no
				,'$nama','Umum','1','1','0','5'
				,'','','',d1,d2,d3,0,0,now(),'','1','','$fungsi')");
                //$db_data=$row;
          $no++;  }
//            echo json_encode($db_data);

    }
}
