<?php  
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='GET'){

    
	$sqlcountnotprocessed="SELECT COUNT(kode_keluhan) AS countnotproc FROM keluhan WHERE status IS NULL";
    $rescountnotprocessed=mysqli_query($con,$sqlcountnotprocessed);
    $resultcountnotprocessed=array();
    
	while($rowcountnotprocessed=mysqli_fetch_array($rescountnotprocessed)){
		array_push($resultcountnotprocessed,array('countnotproc'=>$rowcountnotprocessed[0]));
    }


	$sqlcountforwarded="SELECT COUNT(kode_keluhan) AS countforw FROM keluhan WHERE status = 'Diteruskan'";
    $rescountforwarded=mysqli_query($con,$sqlcountforwarded);
    $resultcountforwarded=array();
    
	while($rowcountforwarded=mysqli_fetch_array($rescountforwarded)){
		array_push($resultcountforwarded,array('countforw'=>$rowcountforwarded[0]));
    }

    $sqlcountprocessed="SELECT COUNT(kode_keluhan) AS countproc FROM keluhan WHERE status = 'Dikerjakan'";
    $rescountprocessed=mysqli_query($con,$sqlcountprocessed);
    $resultcountprocessed=array();
    
	while($rowcountprocessed=mysqli_fetch_array($rescountprocessed)){
		array_push($resultcountprocessed,array('countproc'=>$rowcountprocessed[0]));
    }

    $sqlcountfinished="SELECT COUNT(kode_keluhan) AS countfin FROM keluhan WHERE status = 'Selesai'";
    $rescountfinished=mysqli_query($con,$sqlcountfinished);
    $resultcountfinished=array();
    
	while($rowcountfinished=mysqli_fetch_array($rescountfinished)){
		array_push($resultcountfinished,array('countfin'=>$rowcountfinished[0]));
    }

    
    echo json_encode(array("value"=>1,"resultcountnotproc"=>$resultcountnotprocessed, "resultcountforwarded"=>$resultcountforwarded, "resultcountprocessed"=>$resultcountprocessed, "resultcountfinished"=>$resultcountfinished));
	mysqli_close($con);
}
?>