<?php
session_start();
include('../../config.php');

$nim = $_SESSION['login_user'];
$db = mysqli_select_db($mysql,DB_Table);
$sql = "SELECT nama_dosen,id,prodi.nama_prodi,ikatan_kerja,aktivitas,masuk,img FROM dosen JOIN prodi ON prodi.id_prodi = dosen.program_studi WHERE id ='$nim'";
$query = mysqli_query($mysql, $sql);
while($row = mysqli_fetch_assoc($query)){
    $return = array(
        "Nama"=>$row['nama_dosen'],
        "NIP"=>$row['id'],
        "Prodi"=>$row['nama_prodi'],
        "Kerja"=>$row['ikatan_kerja'],
        "Aktivitas"=>$row['aktivitas'],
        "Masuk"=>$row['masuk'],
        "pp"=>$row['img']
    );
}
echo json_encode($return);
?>