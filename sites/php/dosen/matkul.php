<?php
session_start();
include('../../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT m.nama_matkul FROM matakuliah m JOIN ajar_tif a ON m.kode_matkul = a.matkul WHERE a.nip = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
    $return[] = array("Matkul"=>$row['nama_matkul']);
}
echo json_encode($return);
?>