<?php
session_start();
include('../../config.php');

$nim = $_POST['b'];

$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT jenis,nilai,tanggal,keterangan from nilai_tif WHERe nim = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
    $return[] = array(
        "Jenis"=>$row['jenis'],
        "Nilai"=>$row['nilai'],
        "tgl"=>$row['tanggal'],
        "ket"=>$row['keterangan']
    );
}
echo json_encode($return);
?>