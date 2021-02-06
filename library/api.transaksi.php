<?php

session_start();
include_once '../config/config.php';
$type = $_REQUEST['type'];

switch ($type) 
{
	case 1:
		$txtidtransaksi      	= $_REQUEST['txtId'];
        $txtnamapelanggan 		= $_REQUEST['txtnamapelanggan'];
        $txtidtiket    	        = $_REQUEST['txtidtiket'];
        $txtjumlahtiket 		= $_REQUEST['txtjumlahtiket'];
		$txtnamapenginapan  	= $_REQUEST['txtnamapenginapan'];
		$txtlamamenginap   		= $_REQUEST['txtlamamenginap'];
		
		$pesanError = array();
        if (empty($txtidtransaksi)) {
			$pesanError[] = "maaf, <b>ID Transaksi</b> tidak boleh kosong!";
		}
        if (empty($txtnamapelanggan)) {
			$pesanError[] = "maaf, <b>Nama Pelanggan</b> tidak boleh kosong!";
		}
		if (empty($txtidtiket)) {
			$pesanError[] = "maaf, <b>ID Tiket</b> tidak boleh kosong!";
		}
		if (empty($txtjumlahtiket)) {
			$pesanError[] = "maaf, <b>Jumlah Tiket</b> tidak boleh kosong!";
		}
		if (empty($txtnamapenginapan)) {
			$pesanError[] = "maaf, <b>Nama Penginapan</b> tidak boleh kosong!";
        }
        if (empty($txtlamamenginap)) {
			$pesanError[] = "maaf, <b>Lama Menginap</b> tidak boleh kosong!";
        }
        if (count($pesanError)>=1){
			$pesan="";
			foreach ($pesanError as $pesan_tampil) {
				$pesan.="$pesan_tampil<br>";
			}
			$data['msg'][0] = "error";
			$data['msg'][1] = $pesan ;
		} else {
			$mySql = "SELECT * FROM transaksi WHERE id_transaksi='$txtidtransaksi'";
			$myQry = mysqli_query($con,$mySql);
			$jumlah = mysqli_num_rows($myQry);
			
			if ($jumlah==0){
				$mySql = "INSERT INTO transaksi (
				id_transaksi,id_pelanggan,id_tiket,jumlah_tiket,id_penginapan,lama_menginap) VALUES ('$txtidtransaksi','$txtnamapelanggan','$txtidtiket','$txtjumlahtiket','$txtnamapenginapan','$txtlamamenginap')";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil ditambahkan....";
				// $myQry = mysqli_query($con,$mySql);
			}else {
				$mySql="UPDATE transaksi SET id_transaksi='$txtidtransaksi', id_pelanggan='$txtnamapelanggan',id_tiket='$txtidtiket', jumlah_tiket='$txtjumlahtiket', id_penginapan ='$txtnamapenginapan', lama_menginap ='$txtlamamenginap' WHERE id_transaksi ='$txtidtransaksi'";
				$data['msg'][0] = "ok";
				$data['msg'][1] = "data berhasil diubah...";
			}
			$myQry = mysqli_query($con,$mySql);
		} 
		
	
		echo json_encode($data);
     break;

     case 97:
 		$mySql = "SELECT a.*,b.*,c.*,d.*, (harga_tiket * jumlah_tiket + harga * lama_menginap) as total from transaksi a left join pelanggan b on a.id_pelanggan=b.id_pelanggan LEFT JOIN penginapan c ON a.id_penginapan= c.id_penginapan LEFT JOIN tiket d ON a.id_tiket=d.id_tiket";
 		$myQry = mysqli_query($con, $mySql);
 		$i=0;
		$data='';
 		while ($myData = mysqli_fetch_array($myQry)) {
 		$akses = "";
			 
			 $akses = "<center> <a href='#' class='tooltip-success' data-rel='tooltip' title='Ubah'> <span class='green'><i class='ace-icon fa fa-pencil-square-o bigger-120'></i></span></a> <a href ='#' class='tooltip-error' data-rel='tooltip' title='Hapus'><span class='red'><i class='ace-icon fa fa-trash-o bigger-120'></i></span></a></center>";
			
				 $data.=sprintf("[\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\",\"%s\"],",
 						$i+1,$myData['id_transaksi'],$myData['nama_pelanggan'],
 						$myData['id_tiket'],$myData['jumlah_tiket'],
                        $myData['nama_penginapan'],$myData['lama_menginap'],($myData['total']), 
 						$akses
 					);
 			$i++;
 		}
 		echo'{"data":['.substr($data,0,-1).']}';
		break;
    
        case 2:
			$idtransaksi 	=	$_REQUEST['idtransaksi'];
			$mySql 	=	"DELETE FROM transaksi WHERE id_transaksi='".$idtransaksi."'";
			$myQry 	=	mysqli_query($con, $mySql);

			if(!$myQry){
				$data['msg'][0] = "hapus";
				$data['msg'][1] = "<b>Error:</b>".mysqli_error($con);
			} 
			else{
				$data['msg'][0] = "hapus";
				$data['msg'][1] = "Hapus data berhasil dilakukan!";
			}
			echo json_encode($data);
		break;
		default:
 
        
}
?>