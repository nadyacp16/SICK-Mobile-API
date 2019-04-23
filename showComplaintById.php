<?php  
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

    $userfk=$_POST['userfk'];
    require_once('config.php');
    
	$sql="SELECT DATE_FORMAT(kel.tanggal_pengaduan, '%M %d, %Y') AS tanggal_pengaduan, ktg.nama_kategori, kel.isi_keluhan, kel.status, kel.feedback, kel.kode_keluhan FROM keluhan kel LEFT JOIN kategori_layanan ktg ON kel.id_kategori = ktg.id_kategori LEFT JOIN user ON kel.id_tpkpfk = user.nomoridentitas WHERE kel.userfk = '$userfk' ORDER BY tanggal_pengaduan DESC";
	$res=mysqli_query($con,$sql);
    $result=array();
    
	while($row=mysqli_fetch_array($res)){
		array_push($result,array('tanggal_pengaduan'=>$row[0],'nama_kategori'=>$row[1],'isi_keluhan'=>$row[2],'status'=>$row[3], 'feedback'=>$row[4], 'kode_keluhan'=>$row[5]));
	}
	echo json_encode(array("value"=>1,"result"=>$result));
	mysqli_close($con);
}
?>