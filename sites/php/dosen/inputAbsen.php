<?php
session_start();
include('../../config.php');

$nim = $_POST['a'];
$matkul = $_POST['b'];
$tipe = $_POST['tipe'];
$tgl = $_POST['tgl'];
$materi = $_POST['materi'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "INSERT INTO absen_tif(kode_matkul,nim,materi,kehadiran,tgl) VALUES ('$matkul','$nim','$materi','$tipe','$tgl')";
$query = mysqli_query($mysql, $sql);
?>