<?php
session_start();
include('../../config.php');
$nim = $_SESSION['login_user'];
$judulFile = $_POST['jdlfile'];

$matkul = $_POST['a'];
$judul = $_POST['judul'];
$tipe = $_POST['tipe'];
$ket = $_POST['ket'];

if($tipe == "Materi"){
    $judul = "Materi ".$judul;
} else {
    $judul = "Tugas ".$judul;
}

$target_dir = "../../tugas/";
$temp = explode(".", $_FILES["file"]["name"]);
$temp_name = $judulFile.'.' . end($temp);
$target_file = $target_dir .  $temp_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
if ($_FILES["file"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "docx" && $imageFileType != "doc" ) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $db = mysqli_select_db($mysql,DB_Table);
        $sql = "INSERT INTO tugas(kode_matkul,judul,keterangan,nama_file) VALUES ('$matkul','$judul','$ket','$temp_name')";
        $query = mysqli_query($mysql, $sql);
        echo $target_file;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>