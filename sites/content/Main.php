<!-- Content Header (Page header) -->
<script>
    getDashboard();
</script>
<section class="content-header">
    <h1>
        DASHBOARD
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">
        <div class="col-md-9">
            <!-- Content -->

            <div class="box box-success direct-chat direct-chat-success" style="padding: 0 0 45% 0;">
                <div class="box-header with-border">
                    <h3>
                        Informasi Mahasiswa
                    </h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body col-md-6">
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td class="profil-ms">null</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>:</td>
                            <td id="nim">null</td>
                        </tr>
                        <tr>
                            <td>Program Studi</td>
                            <td>:</td>
                            <td id="prodi">null</td>
                        </tr>
                        <tr>
                            <td>Dosen PA</td>
                            <td>:</td>
                            <td id="pa">null</td>
                        </tr>
                        <tr>
                            <td>IPK</td>
                            <td>:</td>
                            <td id="ipk">null</td>
                        </tr>
                        <tr>
                            <td>Angkatan</td>
                            <td>:</td>
                            <td id="angkatan">
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <center>
                        <img class="main-img-profile pp" alt="User Avatar"><br>
                        <button type="button" class="btn btn-info btn-med" style="margin-top:20px;" onclick="uploadImage()">Ubah Gambar</button>
                        <input type="file" id="fileInput" style="overflow: hidden;height:0px;">
                        <script>
                            function uploadImage(){
                                document.getElementById("fileInput").click();
                            }
                            $('#fileInput').change(function(){
                                var file_data = $('#fileInput').prop('files')[0];
                                var form_data = new FormData();
                                form_data.append('file', file_data);
                                $.ajax({
                                    url: "./php/upload.php",
                                    type: "POST",
                                    data: form_data,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    success: function(data){
                                        location.reload();                                }
                                });
                            });
                        </script>
                    </center>
                </div>

            </div>

            <!-- End of content -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
