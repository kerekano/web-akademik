<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
      DASHBOARD
    </h1> -->
</section>
<script>
    getDosenDashboard();
</script>
<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">
        <div class="col-md-9">
            <!-- Content -->

            <div class="box box-success direct-chat direct-chat-success" style="padding: 0 0 45% 0;">
              <div class="box-header with-border">
                <h3>
                  Informasi Dosen
                </h3>
              </div>
              <!-- /.box-header -->

              <div class="box-body col-md-6">
                  <table class="table">
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td class="profil-ms"></td>
                    </tr>
                    <tr>
                      <td>NIP</td>
                      <td>:</td>
                      <td id="nim"></td>
                    </tr>
                    <tr>
                      <td>Pengampu Program Studi</td>
                      <td>:</td>
                      <td id="prodi"></td>
                    </tr>
                    <tr>
                      <td>Status Ikatan Kerja</td>
                      <td>:</td>
                      <td class="kerja"></td>
                    </tr>
                    <tr>
                      <td>Status Aktivitas</td>
                      <td>:</td>
                      <td class="aktivitas"></td>
                    </tr>
                    <tr>
                      <td>Bergabung Sejak</td>
                      <td>:</td>
                      <td class="masuk"></td>
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
