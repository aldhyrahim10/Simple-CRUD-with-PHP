<?php

session_start();
include_once '../config/config.php';
$type = $_REQUEST['type'];

switch ($type) 
{
	case 1:
		$txtidtiket      		= $_REQUEST['txtId'];
        $txtnamakendaraan 		= $_REQUEST['txtnamakendaraan'];
        $txtkategorikendaraan   = $_REQUEST['txtkategorikendaraan'];
        $txthargatiket 			= $_REQUEST['txthargatiket'];
		
		$pesanError = array();
        if (empty($txtidtiket)) {
			$pesanError[] = "maaf, <b>ID Tiket</b> tidak boleh kosong!";
		}
        if (empty($txtnamakendaraan)) {
			$pesanError[] = "maaf, <b>Nama kendaraan</b> tidak boleh kosong!";
		}
		if (empty($txtkategorikendaraan)) {
			$pesanError[] = "maaf, <b>Kategori kendaraaan</b> tidak boleh kosong!";
		}
		if (empty($txthargatiket)) {
			$pesanError[] = "maaf, <b>Harga tiket</b> tidak boleh kosong!";
		}
		
		if (count($pesanError)>=1){
			$pesan="";
			foreach ($pesanError as $pesan_tampil) {
				$pesan.="$pesan_tampil<br>";
			}
			$data['msg'][0] = "error";
			$data['msg'][1] = $pesan ;
		} else {
			$mySql = "SELECT * FROM tiket WHERE id_tiket='$txtidtiket'";
			$myQry = mysqli_query($con,$mySql);
			$jumlah = mysqli_num_rows($myQry);
				
			if ($jumlah==0){
				$mySqlW = "INSERT INTO tiket (
				id_tiket, nama_kendaraan, kategori_kendaraan, harga_tiket) VALUES ('$txtidtiket','$txtnamakendaraan','$txtkategorikendaraan','$txthargatiket')";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil ditambahkan....";
				$myQry = mysqli_query($con,$mySql);
				
			}else {
				$mySqlW="UPDATE tiket SET id_tiket='$txtidtiket', nama_kendaraan='$txtnamakendaraan', kategori_kendaraan='$txtkategorikendaraan', harga_tiket='$txthargatiket' WHERE id_tiket ='$txtidtiket'";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil diubah...";
			}
			
			mysqli_query($con,$mySqlW);
		} 
		
	
		echo json_encode($data);
 	break;

	 case 97:
	 $mySql = "SELECT * FROM tiket ORDER BY id_tiket DESC";
	 $myQry = mysqli_query($con, $mySql);
	 $i=0;
	 $data='';
	 while ($myData = mysqli_fetch_array($myQry)) {
		 $akses = "";
		 
		 $akses = "<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='Ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href ='#' class='tooltip-error' data-rel='tooltip' title='Hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";
		
			 $data.=sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
					 $i+1,$myData['id_tiket'],$myData['nama_kendaraan'],
					 $myData['kategori_kendaraan'],$myData['harga_tiket'],
					 $akses
				 );
		 $i++;
	 }
	 echo'{"data":['.substr($data,0,-1).']}';
	break;

	case 2:
		$idtiket = $_REQUEST['idtiket'];
		$mySql		 = " DELETE FROM tiket WHERE id_tiket='".$idtiket."'";
		$myQry		 = mysqli_query($con,$mySql);

		if(!$myQry){
			$data['msg'][0] = "hapus";
			$data['msg'][1] = "<b>Error:</b>".mysqli_error($con);
		} else {
			$data['msg'][0] = "hapus";
			$data['msg'][1] = " Hapus data Berhasil";
		}

		echo json_encode($data);
		break;
  		default:
}
?>