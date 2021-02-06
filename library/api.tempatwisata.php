<?php

session_start();
include_once '../config/config.php';
$type = $_REQUEST['type'];

switch ($type) 
{
	case 1:
		$txtid      			= $_REQUEST['txtId'];
        $txttempatwisata 		= $_REQUEST['txttempatwisata'];
        $txtalamat   			= $_REQUEST['txtalamat'];
        $txtprovinsi 			= $_REQUEST['txtprovinsi'];
		$txtfasilitas  			= $_REQUEST['txtfasilitas'];
		$txtwaktu   			= $_REQUEST['txtwaktu'];
		
		$pesanError = array();
        if (empty($txtid)) {
			$pesanError[] = "maaf, <b>ID Tempat Wisata</b> tidak boleh kosong!";
		}
        if (empty($txttempatwisata)) {
			$pesanError[] = "maaf, <b>Tempatwisata</b> tidak boleh kosong!";
		}
		if (empty($txtalamat)) {
			$pesanError[] = "maaf, <b>Alamat</b> tidak boleh kosong!";
		}
		if (empty($txtprovinsi)) {
			$pesanError[] = "maaf, <b>Provinsi</b> tidak boleh kosong!";
		}
		if (empty($txtfasilitas)) {
			$pesanError[] = "maaf, <b>Fasilitas</b> tidak boleh kosong!";
        }
        if (empty($txtwaktu)) {
			$pesanError[] = "maaf, <b>Waktu</b> tidak boleh kosong!";
        }
        
		if (count($pesanError)>=1){
			$pesan="";
			foreach ($pesanError as $pesan_tampil) {
				$pesan.="$pesan_tampil<br>";
			}
			$data['msg'][0] = "error";
			$data['msg'][1] = $pesan ;
		} else {
			$mySql = "SELECT * FROM tempatwisata WHERE id_tempatwisata='$txtid'";
			$myQry = mysqli_query($con,$mySql);
			$jumlah = mysqli_num_rows($myQry);
			
			if ($jumlah==0){
				$mySql = "INSERT INTO tempatwisata (
				id_tempatwisata,tempat_wisata,alamat,provinsi,fasilitas,waktu) VALUES ('$txtid','$txttempatwisata','$txtalamat','$txtprovinsi','$txtfasilitas','$txtwaktu')";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil ditambahkan....";
				$myQry = mysqli_query($con,$mySql);
			}else {
				$mySql="UPDATE tempatwisata SET id_tempatwisata='$txtid', tempat_wisata='$txttempatwisata', alamat='$txtalamat', provinsi='$txtprovinsi', fasilitas ='$txtfasilitas', waktu ='$txtwaktu' WHERE id_tempatwisata ='$txtid'";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil diubah...";
			}
			$myQry = mysqli_query($con,$mySql);
		} 
		
	
		echo json_encode($data);
	 break;
	 
	 case 97:
 		$mySql = "SELECT * FROM tempatwisata ORDER BY id_tempatwisata DESC";
 		$myQry = mysqli_query($con, $mySql);
 		$i=0;
 		$data='';
 		while ($myData = mysqli_fetch_array($myQry)) {
 			$akses = "";
			 
			 $akses = "<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='Ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href ='#' class='tooltip-error' data-rel='tooltip' title='Hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";
			
				 $data.=sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
 						$i+1,$myData['id_tempatwisata'],$myData['tempat_wisata'],
 						$myData['alamat'],$myData['provinsi'],
 						$myData['fasilitas'],$myData['waktu'],
 						$akses
 					);
 			$i++;
 		}
 		echo'{"data":['.substr($data,0,-1).']}';
		break;

		case 2:
		$idtempatwisata = $_REQUEST['idtempatwisata'];
		$mySql		 = " DELETE FROM tempatwisata WHERE id_tempatwisata='".$idtempatwisata."'";
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