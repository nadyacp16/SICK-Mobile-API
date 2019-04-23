<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=array();

    $kode_keluhan = $_POST['kode_keluhan'];
    $feedback = $_POST['feedback'];
    require_once('config.php');

    $sql = $con->query("UPDATE keluhan SET feedback = '$feedback' WHERE kode_keluhan = '$kode_keluhan'");
    
    if($sql){
        $response["value"]=1;
        $response["message"]="Feedback Created";
        echo json_encode($response);
    }else{
        $response["value"]=0;
        $response["message"]='Failed';
        echo json_encode($response);
    }
}
mysqli_close($con);
?>