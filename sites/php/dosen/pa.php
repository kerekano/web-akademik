<?php
session_start();
include('../../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT DISTINCT ktt.nim,i.ipk,i.nama,i.sks,i.status FROM krs_temp_tif ktt JOIN id_desc i on ktt.nim = i.nim WHERE i.id_pa = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){

    $return[] = array(
        "nim"=>$row['nim'],
        "ipk"=>$row['ipk'],
        "nama"=>$row['nama'],
        "sks"=>$row['sks'],
        "status"=>$row['status']);
}
echo json_encode($return);
?>