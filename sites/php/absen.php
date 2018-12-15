<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
$matkul = $_POST['a'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT materi,kehadiran FROM absen_tif WHERE nim='$nim' AND kode_matkul='$matkul'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){

    $return[] = array(
        "Materi"=>$row['materi'],
        "Kehadiran"=>$row['kehadiran']
    );
}
echo json_encode($return);
?>