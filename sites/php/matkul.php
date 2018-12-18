<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT matakuliah.semester, matakuliah.nama_matkul, matakuliah.beban_sks, jk.ruangan,jk.jam_mulai,jk.jam_akhir,jk.hari,matakuliah.kode_matkul FROM (matakuliah JOIN jadwal_kuliah jk on matakuliah.kode_matkul = jk.kode_matkul) JOIN ikutmatkul on ikutmatkul.kode_matkul = matakuliah.kode_matkul WHERE nim = '$nim'";
$query = mysqli_query($mysql, $sql);
$return = array();
while($row = mysqli_fetch_assoc($query)){

    $return[] = array("Matkul"=>$row['nama_matkul'],
                        "SKS"=>$row['beban_sks'],
                        "Hari"=>$row['hari'],
                        "Kelas"=>$row['ruangan'],
                        "Mulai"=>$row['jam_mulai'],
                        "Selesai"=>$row['jam_akhir'],
                        "Kode"=>$row['kode_matkul'],
                        "Semester"=>$row['semester']);
}
echo json_encode($return);
?>