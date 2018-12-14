<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT id_desc.nama,id_desc.nama_depan,id_desc.img,id_desc.ipk, dosen.nama_dosen,prodi.nama_prodi FROM (id_desc JOIN dosen ON id_desc.id_pa = dosen.id) JOIN prodi ON dosen.program_studi = prodi.id_prodi WHERE nim = '$nim'";
$query = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($query)){
    $namaMhs = $row['nama'];
    $img = $row['img'];
    $ipk = $row['ipk'];
    $panggilan = $row['nama_depan'];
    $namaDsn = $row['nama_dosen'];
    $prodi = $row['nama_prodi'];
    $return = array("Nama"=>$namaMhs,"Nama_Depan"=>$panggilan,"NIM"=>$nim,"Prodi"=>$prodi,"IPK"=>$ipk,"PA"=>$namaDsn,"pp"=>$img);
    echo json_encode($return);
}
?>