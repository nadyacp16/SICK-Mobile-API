<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=array();
	$kode_keluhan=$_POST['kode_keluhan'];
	$feedback=$_POST['feedback'];
    require_once('config.php');
    
	$sql="SELECT * FROM keluhan where kode_keluhan='$kode_keluhan';";
    $check=mysqli_fetch_array(mysqli_query($con,$sql));
    
	if(isset($check)){

		$sql="UPDATE keluhan SET feedback='$feedback' where kode_keluhan='$kode_keluhan';";
		if(mysqli_query($con,$sql)){
			$response["value"]=1;
			$response["message"]="Success Update Password";
			echo json_encode($response);
		}else{
			$response["value"]=0;
			$response["message"]='Failed';
			echo json_encode($response);
		}
	}else{
		$response["value"]=0;
		$response["message"]='Network Connection Error';
		echo json_encode($response);
	}
	mysqli_close($con);
}
?>