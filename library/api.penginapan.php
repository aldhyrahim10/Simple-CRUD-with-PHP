<?php

session_start();
include_once '../config/config.php';
$type = $_REQUEST['type'];

switch ($type) 
{
	case 1:
		$txtidpenginapan      	= $_REQUEST['txtId'];
        $txtnamapenginapan 		= $_REQUEST['txtnamapenginapan'];
        $txtjenispenginapan    	= $_REQUEST['txtjenispenginapan'];
        $txtalamat 				= $_REQUEST['txtalamat'];
		$txtprovinsi  		    = $_REQUEST['txtprovinsi'];
		$txtfasilitas   		= $_REQUEST['txtfasilitas'];
		$txtharga 				= $_REQUEST['txtharga'];
		
		$pesanError = array();
        if (empty($txtidpenginapan)) {
			$pesanError[] = "maaf, <b>ID Penginapan</b> tidak boleh kosong!";
		}
        if (empty($txtnamapenginapan)) {
			$pesanError[] = "maaf, <b>Nama Penginapan</b> tidak boleh kosong!";
		}
		if (empty($txtjenispenginapan)) {
			$pesanError[] = "maaf, <b>Jenis Penginapan</b> tidak boleh kosong!";
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
        if (empty($txtharga)) {
			$pesanError[] = "maaf, <b>Harga</b> tidak boleh kosong!";
		}
		if (count($pesanError)>=1){
			$pesan="";
			foreach ($pesanError as $pesan_tampil) {
				$pesan.="$pesan_tampil<br>";
			}
			$data['msg'][0] = "error";
			$data['msg'][1] = $pesan ;
		} else {
			$mySql = "SELECT * FROM penginapan WHERE id_penginapan='$txtidpenginapan'";
			$myQry = mysqli_query($con,$mySql);
			$jumlah = mysqli_num_rows($myQry);
			
			if ($jumlah==0){
				$mySql = "INSERT INTO penginapan (
				id_penginapan,nama_penginapan,jenis_penginapan,alamat,provinsi,fasilitas,harga) VALUES ('$txtidpenginapan','$txtnamapenginapan','$txtjenispenginapan','$txtalamat','$txtprovinsi','$txtfasilitas','$txtharga')";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil ditambahkan....";
				// $myQry = mysqli_query($con,$mySql);
			}else {
				$mySql="UPDATE penginapan SET id_penginapan='$txtidpenginapan', nama_penginapan='$txtnamapenginapan', jenis_penginapan='$txtjenispenginapan', alamat='$txtalamat', provinsi ='$txtprovinsi', fasilitas ='$txtfasilitas', harga = '$txtharga' WHERE id_penginapan ='$txtidpenginapan'";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil diubah...";
			}
			$myQry = mysqli_query($con,$mySql);
		} 
		
	
		echo json_encode($data);
     break;
     
     case 97:
 		$mySql = "SELECT * FROM penginapan ORDER BY id_penginapan DESC";
 		$myQry = mysqli_query($con, $mySql);
 		$i=0;
 		$data='';
 		while ($myData = mysqli_fetch_array($myQry)) {
 			$akses = "";
			 
			 $akses = "<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='Ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href ='#' class='tooltip-error' data-rel='tooltip' title='Hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";
			
				 $data.=sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
 						$i+1,$myData['id_penginapan'],$myData['nama_penginapan'],
 						$myData['jenis_penginapan'],$myData['alamat'],
 						$myData['provinsi'],$myData['fasilitas'],
 						$myData['harga'],
 						$akses
 					);
 			$i++;
 		}
 		echo'{"data":['.substr($data,0,-1).']}';
		break;
    
    case 2:
		$idpenginapan = $_REQUEST['idpenginapan'];
		$mySql		  = " DELETE FROM penginapan WHERE id_penginapan='".$idpenginapan."'";
		$myQry		  = mysqli_query($con,$mySql);

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