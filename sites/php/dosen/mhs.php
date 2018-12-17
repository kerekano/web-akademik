<?php
session_start();
include('../../config.php');

$nim = $_SESSION['login_user'];
$matkul = $_POST['a'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT d.nama,d.nim,prodi.nama_prodi FROM ((ikutmatkul i JOIN matakuliah m on i.kode_matkul = m.kode_matkul) JOIN id_desc d on i.nim = d.nim) JOIN prodi ON d.prodi = prodi.id_prodi WHERE m.nama_matkul = '$matkul'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
    $return[] = array(
        "Nama"=>$row['nama'],
        "nim"=>$row['nim'],
        "Prodi"=>$row['nama_prodi']);
}
echo json_encode($return);
?>