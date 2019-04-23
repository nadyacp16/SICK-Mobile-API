<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=array();
	//getData
	$nomoridentitas=$_POST['nomoridentitas'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
    $id_peran=$_POST['id_peran'];
    
    $hash=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
    var_dump($hash);
    require_once('config.php');
    
	$sql="SELECT * FROM user where nomoridentitas='$nomoridentitas';";
	$check=mysqli_fetch_array(mysqli_query($con,$sql));
	if(isset($check)){
		$response["value"]=0;
		$response["message"]='Username has been use with other registration';
		echo json_encode($response);
	}else{
		$sql="INSERT INTO user (nomoridentitas,nama,password,id_peran) VALUES ('$nomoridentitas','$nama','$hash','$id_peran')";
		if(mysqli_query($con,$sql)){
			$response["value"]=1;
			$response["message"]="User Created";
			echo json_encode($response);
		}else{
			$response["value"]=0;
			$response["message"]='Failed Create User';
			echo json_encode($response);
		}
	}
	mysqli_close($con);
}else{
	$response["value"]=0;
	$response["message"]='Failed Create';
	echo json_encode($response);
}
?>