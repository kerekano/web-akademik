<?php
session_start();
include('../../config.php');

$materi = $_POST['a'];
$kehadiran = $_POST['b'];
$tgl = $_POST['c'];

$db = mysqli_select_db($mysql,DB_Table);
$sql = "DELETE FROM absen_tif WHERE materi = '$materi' AND kehadiran='$kehadiran' and tgl = '$tgl'";
$query = mysqli_query($mysql, $sql);
?>