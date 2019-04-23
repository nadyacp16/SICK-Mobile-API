<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=array();
	require_once('config.php');
	//getData
	$nomoridentitas=$_POST['nomoridentitas'];
	$password=$_POST['password'];
	$oldPassword=$_POST['oldPassword'];

	$sqlHash="SELECT password from user where nomoridentitas='$nomoridentitas';";
	$checkHash=mysqli_fetch_array(mysqli_query($con,$sqlHash));
	
	if(password_verify($oldPassword,$checkHash[0])){
		$hash=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
		$sql="UPDATE user SET password='$hash' where nomoridentitas='$nomoridentitas';";
		if(mysqli_query($con,$sql)){
			$response["value"]=1;
			$response["message"]="Update Success";
			echo json_encode($response);
		}else{
			$response["value"]=0;
			$response["message"]='Update Failed';
			echo json_encode($response);
		}
	}else{
		$response["value"]=0;
		$response["message"]='Old Password Not Correct';
		echo json_encode($response);
	}
	mysqli_close($con);
}else{
	$response["value"]=0;
	$response["message"]='Network Connection Error';
	echo json_encode($response);
}
?>