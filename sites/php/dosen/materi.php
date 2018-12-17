<?php
session_start();
include('../../config.php');

$nim = $_SESSION['login_user'];
$matkul = $_POST['b'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT judul,keterangan,file FROM tugas WHERE kode_matkul = '$matkul'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
    $return[] = array(
        "judul"=>$row['judul'],
        "tgl"=>"",
        "ket"=>$row['keterangan'],
        "file"=>$row['file']);
}
echo json_encode($return);
?>