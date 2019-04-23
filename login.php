<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//getData
	$nomoridentitas=$_POST['nomoridentitas'];
	$password=$_POST['password'];
	require_once('config.php');
    
	$sql_getpass="SELECT password from user where nomoridentitas='$nomoridentitas'";
	$my_res=mysqli_query($con,$sql_getpass);
    $my_row=mysqli_fetch_row($my_res);
    
	if(password_verify($password,$my_row[0])){
		$sql="SELECT * from user where nomoridentitas='$nomoridentitas'";
		$res=mysqli_query($con,$sql);
		$row=mysqli_fetch_row($res);
		$response["value"]=1;
		$response["message"]='Login Successfully';
		$response["nomoridentitas"] = $nomoridentitas;
		$result=array();

		array_push($result,array('nomoridentitas'=>$row[0],'nama'=>$row[1],'password'=>$row[2],'id_peran'=>$row[3]));

		echo json_encode(array("value"=>1,"result"=>$result));
//		echo json_encode($response["nomoridentitas"]);
	}else{
		$response["value"]=0;
		$response["message"]='Login Failed Username or Password is not correct';
		echo json_encode($response);
	}
	mysqli_close($con);
}else{
	$response["value"]=0;
	$response["message"]='Network Connection Failed';
	echo json_encode($response);
}
?>