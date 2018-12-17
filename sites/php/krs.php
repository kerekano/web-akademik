<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT matakuliah.kode_matkul,matakuliah.nama_matkul,matakuliah.beban_sks FROM matakuliah JOIN id_desc ON matakuliah.program_studi = id_desc.prodi WHERE nim = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){
        $return[] = array(
            "Kode"=>$row['kode_matkul'],
            "Nama"=>$row['nama_matkul'],
            "SKS"=>$row['beban_sks']
        );
}
$sql = "SELECT k.kode_matkul,m.nama_matkul,m.beban_sks FROM krs_temp_tif AS k JOIN matakuliah AS m ON k.kode_matkul = m.kode_matkul WHERE k.nim = '$nim'";
$query = mysqli_query($mysql,$sql);
$return1 = array();
while($row = mysqli_fetch_assoc($query)){
    $return1[] = array(
        "Kode"=>$row['kode_matkul'],
        "Nama"=>$row['nama_matkul'],
        "SKS"=>$row['beban_sks']
    );
}
$finish = array("Available"=>$return,"Chosen"=>$return1);
echo json_encode($finish);
?>