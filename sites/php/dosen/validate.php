<?php
session_start();
include('../../config.php');

$mhs = $_POST['a'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "DELETE FROM absen_tif WHERE nim = '$mhs';
        DELETE FROM nilai_tif WHERE nim = '$mhs';
        DELETE FROM ikutmatkul WHERE nim = '$mhs'";
$query = mysqli_query($mysql, $sql);
$sql = "INSERT INTO ikutmatkul(nim,kode_matkul) (SELECT nim,kode_matkul FROM krs_temp_tif WHERE nim = '$mhs')";
$query = mysqli_query($mysql, $sql);
$sql = "DELETE FROM krs_temp_tif WHERE nim = '$mhs'";
$query = mysqli_query($mysql, $sql);
?>