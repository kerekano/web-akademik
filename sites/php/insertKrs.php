<?php
session_start();
include('../config.php');

$nim = $_SESSION['login_user'];
if(isset($_POST['checked'])) {
    $checked = $_POST['checked'];
    $db = mysqli_select_db($mysql, DB_Table);
    $count = count($checked);
    $i =0;
    while($i<$count) {
        $sql ="SELECT * FROM krs_temp_tif WHERE nim='$nim' AND kode_matkul='$checked[$i]'";
        $query = mysqli_query($mysql, $sql);
        $row = mysqli_num_rows($query);
        if($row<1) {
            $sql = "INSERT INTO krs_temp_tif (nim,kode_matkul) values ('$nim','$checked[$i]')";
            mysqli_query($mysql, $sql);
        }
        $i++;;
    }echo json_encode(null);
} else echo json_encode(null);
?>