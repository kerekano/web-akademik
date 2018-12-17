<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
$matkul = $_POST['a'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "DELETE FROM krs_temp_tif WHERE nim = '$nim' AND kode_matkul='$matkul'";
$query = mysqli_query($mysql, $sql);
echo json_encode(null);
?>