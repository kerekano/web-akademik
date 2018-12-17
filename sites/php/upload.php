<?php
session_start();
include('../config.php');
$nim = $_SESSION['login_user'];
$target_dir = "../img/";
$temp = explode(".", $_FILES["file"]["name"]);
$temp_name = $nim.'.' . end($temp);
$target_file = $target_dir .  $temp_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
// Check file size
if ($_FILES["file"]["size"] > 100000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
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
        if(strlen($nim)>5) {
            $sql = "UPDATE id_desc SET img = '$temp_name' WHERE nim = '$nim'";
        } else {
            $sql = "UPDATE dosen SET img = '$temp_name' WHERE id = '$nim'";
        }
        $query = mysqli_query($mysql, $sql);
        echo "";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
