<?php

session_start();
include_once '../config/config.php';
$type = $_REQUEST['type'];

switch ($type) 
{
	case 1:
		$txtid      			= $_REQUEST['txtId'];
        $txtnamapelanggan 		= $_REQUEST['txtnamapelanggan'];
        $txttgl   			  	= $_REQUEST['txttgl'];
        $txtalamat 				= $_REQUEST['txtalamat'];
		$txtjeniskelamin  		= $_REQUEST['txtjeniskelamin'];
		$txtnotelpon   			= $_REQUEST['txtnotelpon'];
		$txtemail 				= $_REQUEST['txtemail'];
		
		$pesanError = array();
        if (empty($txtid)) {
			$pesanError[] = "maaf, <b>ID Pelanggan</b> tidak boleh kosong!";
		}
        if (empty($txtnamapelanggan)) {
			$pesanError[] = "maaf, <b>Nama Pelanggan</b> tidak boleh kosong!";
		}
		if (empty($txttgl)) {
			$pesanError[] = "maaf, <b>Tanggal Lahir</b> tidak boleh kosong!";
		}
		if (empty($txtalamat)) {
			$pesanError[] = "maaf, <b>Alamat</b> tidak boleh kosong!";
		}
		if (empty($txtjeniskelamin)) {
			$pesanError[] = "maaf, <b>Jenis Kelamin</b> tidak boleh kosong!";
        }
        if (empty($txtnotelpon)) {
			$pesanError[] = "maaf, <b>No Telpon</b> tidak boleh kosong!";
        }
        if (empty($txtemail)) {
			$pesanError[] = "maaf, <b>Email</b> tidak boleh kosong!";
		}
		if (count($pesanError)>=1){
			$pesan="";
			foreach ($pesanError as $pesan_tampil) {
				$pesan.="$pesan_tampil<br>";
			}
			$data['msg'][0] = "error";
			$data['msg'][1] = $pesan ;
		} else {
			$mySql = "SELECT * FROM pelanggan WHERE id_pelanggan='$txtid'";
			$myQry = mysqli_query($con,$mySql);
			$jumlah = mysqli_num_rows($myQry);
			
			if ($jumlah==0){
				$mySql = "INSERT INTO pelanggan (
				id_pelanggan,nama_pelanggan,tanggal_lahir,alamat_pelanggan,jenis_kelamin,no_telp,email) VALUES ('$txtid','$txtnamapelanggan','$txttgl','$txtalamat','$txtjeniskelamin','$txtnotelpon','$txtemail')";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil ditambahkan....";
				$myQry = mysqli_query($con,$mySql);
			}else {
				$mySql="UPDATE pelanggan SET id_pelanggan='$txtid', nama_pelanggan='$txtnamapelanggan', tanggal_lahir='$txttgl', alamat_pelanggan='$txtalamat', jenis_kelamin ='$txtjeniskelamin', no_telp ='$txtnotelpon', email = '$txtemail' WHERE id_pelanggan ='$txtid'";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil diubah...";
			}
			$myQry = mysqli_query($con,$mySql);
		} 
		
	
		echo json_encode($data);
 	break;

 	case 97:
 		$mySql = "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC";
 		$myQry = mysqli_query($con, $mySql);
 		$i=0;
 		$data='';
 		while ($myData = mysqli_fetch_array($myQry)) {
 			$akses = "";
			 
			 $akses = "<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='Ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href ='#' class='tooltip-error' data-rel='tooltip' title='Hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";
			
				 $data.=sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
 						$i+1,$myData['id_pelanggan'],$myData['nama_pelanggan'],
 						$myData['tanggal_lahir'],$myData['alamat_pelanggan'],
 						$myData['jenis_kelamin'],$myData['no_telp'],
 						$myData['email'],
 						$akses
 					);
 			$i++;
 		}
 		echo'{"data":['.substr($data,0,-1).']}';
		break;
	
	case 2:
		$idpelanggan = $_REQUEST['idpelanggan'];
		$mySql		 = " DELETE FROM pelanggan WHERE id_pelanggan='".$idpelanggan."'";
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