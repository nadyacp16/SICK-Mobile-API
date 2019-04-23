<?php  
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){

    $kodekeluhan=$_POST['kode_keluhan'];
    require_once('config.php');
    
	$sql="SELECT DATE_FORMAT(kel.tanggal_pengaduan, '%M %d, %Y') AS tanggal_pengaduan, ktg.nama_kategori, kel.isi_keluhan, kel.status, kel.feedback, kel.kode_keluhan, kel.komentar_keluhan, kel.userfk, user.nama, kel.keterangan_keluhan, kel.last_update FROM keluhan kel LEFT JOIN kategori_layanan ktg ON kel.id_kategori = ktg.id_kategori LEFT JOIN user ON kel.id_tpkpfk = user.nomoridentitas WHERE kel.kode_keluhan = '$kodekeluhan'";
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    
	if(isset($row)){
        $result=array();
        array_push($result,array('tanggal_pengaduan'=>$row[0],'nama_kategori'=>$row[1],'isi_keluhan'=>$row[2],'status'=>$row[3], 'feedback'=>$row[4], 'kode_keluhan'=>$row[5], 'komentar_keluhan'=>$row[6], 'userfk'=>$row[7], 'nama'=>$row[8], 'keterangan_keluhan'=>$row[9], 'last_update'=>$row[10]));
        echo json_encode(array("value"=>1,"result"=>$result));
	}
	mysqli_close($con);
}
?>