<?php  
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
	$sql="SELECT u.nomoridentitas, u.nama, u.password, p.nama_peran from user u join peran p on u.id_peran = p.id_peran order by u.nomoridentitas asc";
	$res=mysqli_query($con,$sql);
	$result=array();
	while($row=mysqli_fetch_array($res)){
		array_push($result,array('nomoridentitas'=>$row[0],'nama'=>$row[1],'password'=>$row[2],'nama_peran'=>$row[3]));
	}
	echo json_encode(array("value"=>1,"result"=>$result));
	mysqli_close($con);
}
?>