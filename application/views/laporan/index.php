
<div class="my-3 p-3 bg-white rounded shadow-sm">
	<h6 class="border-bottom border-gray pb-2 mb-0">Kartu Stok</h6>
	<div class="media text-muted pt-3 ">
		<div class="col-lg-12">
<form method="post" id="fsearch" action="">
	<div class="input-group">
        <input autocomplete='off' required class="form-control form-control-sm " id="sp" type="text" name="sp" value="<?php  if(isset($_POST['sp'])) echo $_POST['sp']; ?>" placeholder="Nama Barang" />	
        <input class="form-control form-control-sm tgl" type="text" id="data_search" name="tgla" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tgla']; else echo date('Y-m-d'); ?>" placeholder="" />
        <input class="form-control form-control-sm tgl" type="text" name="tglb" value="<?php  if(isset($_POST['tgla'])) echo $_POST['tglb']; else echo date('Y-m-d'); ?>" placeholder="" />
        <input hidden class="form-control form-control-sm tgl" type="text" name="gudang" id="gudang" required value="" placeholder="" />
	  <div class="input-group-append">
		 <input class="btn  btn-primary btn-sm" type="submit" name="test" value="TAMPIL" />
	  </div>
	</div>
</form>
<hr />
<script type="text/javascript">
	//<![CDATA[
	$("#sp").on('keypress',function(e){
						$('#sp').autocomplete({
							serviceUrl: 'cari/barang/',
							minChars:2,
							onSelect: function (s) {
								$('#sp').val(s.kode);
								$('#gudang').val(s.gudang);
							}
						});
					});
	//]]>
</script>
<div class='table-responsive'>
<?php if(isset($_POST['test'])){ ?>
	<table class='mt-2 table table-hover table-sm table-condensed table-bordered'>
	<thead>
		<tr align=center>
			<td>No</td>
			<td>Tanggal</td>
			<td>Ket</td>
			<td>Masuk</td>
			<td>Keluar</td>
            <td>Stok</td>
		</tr>
			</thead>
<tbody>
<?php $no=1; $m=0; $k=0; $t=0; $debit=0;  $saldo=0; $sebelum=0; $sk=0;
		$idtoko=$this->session->userdata('idtoko');
        $q=$this->db->query("select sum(masuk) as masuk,sum(keluar) as keluar from keluar_masuk
        where keluar_masuk.gudang='$_POST[gudang]' and keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl<'$_POST[tgla]'  and kode='$_POST[sp]' order by keluar_masuk.id asc");
        if($q->num_rows()){
        foreach($q->result() as $xrow){ 
            $sebelum=$xrow->masuk;
            $sk=$xrow->keluar;
            ?>
        <tr class='bg-info'><td colspan=3>Stok Sebelumnya</td>
            <td  align=center><?php echo ($debit=$xrow->masuk); ?></td>
            <td  align=center><?php echo ($xrow->keluar);  ?></td>
            <td  align=center><?php echo ($saldo=$xrow->masuk-$xrow->keluar);  ?></td>
        </tr>
        <?php }} ?>
	<?php $no=1;
        $q=$this->db->query("select tgl,masuk,keluar,ket from keluar_masuk
        where  keluar_masuk.gudang='$_POST[gudang]' and keluar_masuk.idtoko='$idtoko' and keluar_masuk.tgl>='$_POST[tgla]' and keluar_masuk.tgl<='$_POST[tglb]' 
        and kode='$_POST[sp]' order by keluar_masuk.id asc");
		foreach($q->result() as $row){
            $m+=$row->masuk;
            $k+=$row->keluar;
            ?>
		<tr>
			<td  align=center><?php echo $no; ?></td>
			<td align=><?php echo $row->tgl; ?> </td>
			<td align=center><?php echo $row->ket; ?> </td>
			<td  align=center><?php echo uang($row->masuk); ?></td>
            <td  align=center><?php echo uang($row->keluar);
            ?>
            
            </td>
            <td  align=center><?php 
             if($row->masuk!=0){   
                $debit=$debit+$row->masuk;
                $saldo=$saldo+$row->masuk;
                echo uang($saldo);    
               }else{
                $debit=$debit-$row->keluar;
                $saldo=$saldo-$row->keluar;
                echo uang($saldo);    
               }
            
            ?></td>
        </tr>
		<?php $no++; } ?>
        <tr>
            <td colspan=3>Total</td>
            <td  align=center><?php echo uang($aa=$m+$sebelum); ?></td>
            <td  align=center><?php echo uang($ab=$k+$sk); ?></td>
            <td  align=center><?php echo uang($all=$aa-$ab); ?></td>
        </tr>
		</tbody>

	</table>
    <?php 
        $q=$this->db->query("select kode,nama,stok,toko,gudang from barang where  gudang='$_POST[gudang]' and toko='$idtoko' and kode='$_POST[sp]'");
		$info=$q->row();
            ?>
            <div class='alert alert-info'>
            <?php if($all<>$info->stok){ ?> 
                Stok Barang  <?php echo $info->kode; ?>-<?php echo $info->nama; ?>,Aplikasi  <?php echo $info->nama; ?> Tidak Sesuai, Transaksi Keluar Masuk <?php echo $all; ?> Stok Aktual <?php echo $info->stok; ?><br>
                  <a onclick='return confirm("Set Penyesuaian Stok ?...");'class='btn btn-sm btn-warning' href="laporan/penyesuaian/<?php echo $info->kode; ?>/<?php echo $info->toko; ?>/<?php echo $all; ?>/<?php echo $info->gudang; ?>">Sesuaikan Stok</a>
            <?php }else{ ?>	
        Stok Barang  <?php echo $info->kode; ?> <?php echo $info->nama; ?> Sesuai
            <?php } ?>
            </div>
<?php } ?>
</div>
		</>
	</div>
</div>