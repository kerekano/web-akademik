<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
if(isset($_POST['checked'])) {
    $checked = $_POST['checked'];
    $db = mysqli_select_db($mysql, DB_Table);
    $count = count($checked);
    $i =0;
    $tot = 0;
    while($i<$count) {
        $sql ="SELECT matakuliah.beban_sks FROM matakuliah WHERE matakuliah.kode_matkul='$checked[$i]'";
        $query = mysqli_query($mysql, $sql);
        while($row = mysqli_fetch_assoc($query)){
            $tot += $row['beban_sks'];
        }
        $i++;;
    }
    echo json_encode($tot);
} else echo json_encode(null);
?>