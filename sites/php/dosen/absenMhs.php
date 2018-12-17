<?php
session_start();
include('../../config.php');

$nim = $_POST['b'];

$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT materi,kehadiran,tgl from absen_tif WHERe nim = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
    $return[] = array(
        "Materi"=>$row['materi'],
        "Kehadiran"=>$row['kehadiran'],
        "tgl"=>$row['tgl']
    );
}
echo json_encode($return);
?>