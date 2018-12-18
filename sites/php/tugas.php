<?php
    session_start();
    include('../config.php');

    $nim = $_SESSION['login_user'];
    $db = mysqli_select_db($mysql,DB_Table);
    $sql = "SELECT tugas.tanggal,tugas.kode_matkul, tugas.judul, tugas.keterangan, tugas.nama_file FROM tugas  ORDER BY tugas.tanggal DESC";
    $query = mysqli_query($mysql, $sql);
    $return = array();
    while($row = mysqli_fetch_assoc($query)){
        $return[] = array(
                "Judul"=>$row['judul'],
                "Keterangan"=>$row['keterangan'],
                "File"=>$row['nama_file'],
                "Kode"=>$row['kode_matkul'],
                "tanggal"=>$row['tanggal']
        );
    }
    $sql = "SELECT DISTINCT tugas.kode_matkul,m.nama_matkul FROM (tugas JOIN matakuliah m on tugas.kode_matkul = m.kode_matkul)JOIN ikutmatkul on tugas.kode_matkul = ikutmatkul.kode_matkul WHERE nim ='$nim' ";
    $query = mysqli_query($mysql, $sql);
    $return1 = array();
    while($row = mysqli_fetch_assoc($query)){
        $return1[] =array("Matkul"=>$row['nama_matkul'],
                            "Kode"=>$row['kode_matkul']);
    }
    $finish = array("Matkul"=>$return1,"Content"=>$return);
    echo json_encode($finish);
?>