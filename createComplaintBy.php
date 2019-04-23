<?php
// define('UPLOAD_PATH', '/uploads/');
// function getFileExtension($file)
// {
//     $path_parts = pathinfo($file);
//     return $path_parts['extension'];
// }
if($_SERVER['REQUEST_METHOD']=='POST'){
	$response=array();

//    $kode_keluhan = $_POST['kode_keluhan'];
    $id_kategori = $_POST['id_kategori'];
    $isi_keluhan=$_POST['isi_keluhan'];
//    $foto=$_POST['foto'];
    // $image = $_FILES['image']['tmp_name'];
    $userfk = $_POST['userfk'];
    require_once('config.php');

    // $name = round(microtime(true) * 1000) . '.' . getFileExtension($image = $_FILES['image']['name']);
    // $filedest = dirname(__FILE__) . UPLOAD_PATH . $name;
    // $getimage = move_uploaded_file($image, $filedest);

    $sql = $con->query("INSERT INTO keluhan (id_kategori,isi_keluhan,userfk) VALUES ('$id_kategori','$isi_keluhan','$userfk')");
    
    if($sql){
        $response["value"]=1;
        $response["message"]="Complaint Created";
        echo json_encode($response);
    }else{
        $response["value"]=0;
        $response["message"]='Failed Create Complaint';
        echo json_encode($response);
    }
}
mysqli_close($con);
?>