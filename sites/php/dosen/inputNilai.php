<?php
session_start();
include('../../config.php');

$nim = $_POST['a'];
$matkul = $_POST['b'];
$nilai = $_POST['nilai'];
$tipe = $_POST['tipe'];
$tgl = $_POST['tgl'];
$ket = $_POST['ket'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "INSERT INTO nilai_tif(kode_matkul,nim,jenis,nilai,keterangan) VALUES ('$matkul','$nim','$tipe','$nilai','$ket')";
$query = mysqli_query($mysql, $sql);
echo $matkul;
?>