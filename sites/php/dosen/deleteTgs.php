<?php
session_start();
include('../../config.php');

$matkul = $_POST['a'];
$judul = $_POST['b'];
$ket = $_POST['c'];

$db = mysqli_select_db($mysql,DB_Table);
$sql = "DELETE FROM tugas WHERE judul = '$judul' AND kode_matkul = '$matkul' and keterangan = '$ket'";
$query = mysqli_query($mysql, $sql);
?>