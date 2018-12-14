<?php
  include('../config.php');
 ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            [Nama Mata Kuliah]
            <small>[Tahun]</small>
        </h1>
        <br><br>
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalForm">New Post</button>
        <button type="button" class="btn btn-info btn-sm" onclick="window.location.href='logout.php'">Logout</button>
        <br>
    </section>

    <!-- Modal New Post -->
    <div class="modal fade" id="modalForm" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">New Post</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" name="posting_form" action="submit.php">
                        Judul Artikel<br>
                        <input type="text" name="judul_artikel" size="30"><br>
                        Isi Artikel<br>
                        <textarea name="isi_artikel" cols="60" rows="10"></textarea><br>
                        <p style="color:#ff0000;">
                            <span>*gunakan <</span><span>br> </span><span>untuk enter</span>
                        </p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->

                <ul class="timeline">
                    <?php
                    // define the pagination
                    if (isset($_GET['pageno'])) {
                        $pageno = $_GET['pageno'];
                    } else {
                        $pageno = 1;
                    }
                    $no_of_records_per_page = 5;
                    $offset = ($pageno-1) * $no_of_records_per_page;

                    //buat dulu koneksi kedatabase
                    // $db = mysqli_select_db($mysql,DB_Table);

                    // make a contraint of pagination
                    $total_pages_sql = "SELECT COUNT(*) FROM tabeltugas";
                    $result = mysqli_query($mysql,$total_pages_sql);
                    $total_rows = mysqli_fetch_array($result,MYSQLI_NUM)[0];
                    $total_pages = ceil($total_rows / $no_of_records_per_page);

                    //buat query terlebih dahulu
                    // $sql ="SELECT * FROM tabeltugas";
                    $sql ="SELECT * FROM tabeltugas LIMIT $offset, $no_of_records_per_page";


                    $query = mysqli_query($mysql, $sql);
                    $row = mysqli_num_rows($query);

                    //cek apakah kita sudah memposting artikel atau belum
                    if ($row == 0) {

                        //tampilkan pesan kalau artikel belum ada
                        echo 'Belum ada tugas';
                    }

                    else{
                        //buat pengulangan untuk menampilkan data artikel dengan
                        //menggunakan while dan definisikan kedalam variabel data

                        // while($row = mysqli_fetch_assoc($result))
                        while ($data = mysqli_fetch_array($query)){

                            // echo $data['id_artikel'] ;

                            //tampilkan tanggal pembuatan artikel
                            //gunakan fungsi strtotime untuk merubah bentuk date
                            //kedalam bentuk string
                            echo '<li><div class="timeline-item"><span class="time"><i class="far fa-calendar-alt"></i>'.'&nbsp&nbsp'.date('j, F Y',strtotime($data['tgl_artikel'])).'</span>';

                            //kita akan menampilkan judul artikel
                            echo '<h3 class="timeline-header">'.$data['judul_artikel'].'</h3>';

                            //menampilkan isi artikel yang sudah kita buat
                            echo '<div class="timeline-body">'.$data['isi_artikel'].'</div>';

                            // button list
                            // echo '<div class="timeline-footer"><a class="btn btn-primary btn-xs" href="form_update_tugas.php?id_tugas='.$data['id_artikel'].'&judul_tugas='.$data['judul_artikel'].'&isi_tugas='.$data['isi_artikel'].'">Update</a><a class="btn btn-danger btn-xs" href="delete.php?id_tugas='.$data['id_artikel'].'">Delete</a></div></div></li>';
                            echo '<div class="timeline-footer"><button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalUpdate">Update</button><button type="button" class="btn btn-danger btn-sm" onclick="window.location.href=\'delete.php?id_tugas='.$data['id_artikel'].'\'">Delete</button></div></div></li>';

                            // MODAL UPDATE
                            echo'
                     <div class="modal fade" id="modalUpdate" role="dialog">
                       <div class="modal-dialog modal-lg">
                         <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Update Post</h4>
                           </div>
                           <div class="modal-body">
                             <form method="POST" name="posting_form" action="update.php?id_tugas='.$data['id_artikel'].'">
                               Judul Artikel<br>
                               <input type="text" name="judul_artikel" size="30" value="'.$data['judul_artikel'].'"><br>
                               Isi Artikel<br>
                               <textarea name="isi_artikel" cols="60" rows="10">'.$data['isi_artikel'].'</textarea><br>
                               <p style="color:#ff0000;">
                                 <span>*gunakan <</span><span>br> </span><span>untuk enter</span>
                               </p>
                           </div>
                           <div class="modal-footer">
                             <button type="submit" class="btn btn-default">Update</button>
                             </form>
                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                         </div>
                       </div>
                     </div>';
                        }
                    }
                    //tutup koneksi database
                    mysqli_close($mysql);
                    ?>

                    <!-- END timeline item -->
                </ul>

                <!-- PAGINATION -->
                <ul class="pagination">
                    <li><a href="?pageno=1">First</a></li>
                    <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                    </li>
                    <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                    </li>
                    <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
                </ul>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
  </div>


  <?php
    include('../footer.php');
   ?>
