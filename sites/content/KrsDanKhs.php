<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
      KRS dan KHS
    </h1> -->
</section>
<script>
    getDashboard();
    getKrs();
</script>

<!-- Main content -->
<section class="content">
<!-- Content -->
  <!-- row -->
    <div class="row">
        <div class="col-md-5">

            <!-- INFO MAHASISWA -->
            <div class="box box-success direct-chat direct-chat-success">
              <div class="box-header with-border">
                <h3>
                  Informasi Mahasiswa
                </h3>
              </div>
              <!-- /.box-header -->

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
                      <td>SKS</td>
                      <td>:</td>
                      <td id="sks"></td>
                    </tr>
                    <tr>
                      <td>Validasi</td>
                      <td>:</td>
                      <td>Belum Tervalidasi</td>
                    </tr>
                    <tr>
                      <td>&nbsp</td>
                    </tr>
                  </table>
            </div>
          </div>
          <!-- /.col -->
      </div>
      <!-- /.row -->
    <!-- ./INFO MAHASISWA -->

  <!-- DAFTAR MATA KULIAH YANG DIAMBIL -->
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info direct-chat direct-chat-info">
              <div class="box-header with-border">
                <h4>
                  Daftar Mata Kuliah yang Diambil
                  <span style="font-size: 12pt;float:right;">
                    Total SKS : <span id="total-sks">null</span>
                  </span>
                </h4>
                <hr style="margin:0;border-color:blue;width:10%;float:left;">
              </div>
              <!-- /.box-header -->

              <table class="table table-bordered" id="table-temp">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS</th>
                  <th><center>Option</center></th>
                </tr>
              </table>
            </div>
          </div>
        </div>
    <!-- ./DAFTAR MATA KULIAH YANG DIAMBIL -->

    <!-- PILIHAN MATA KULIAH -->
      <div class="row">
          <div class="col-md-8">
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border"></div>
                <!-- /.box-header -->

                <table class="table table-bordered" id="table-krs">
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th><center>Option</center></th>
                  </tr>
                </table>

                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">&raquo;</a></li>
                  </ul>
                  <button onclick="submitKrs()" type="button" class="btn btn-warning btn-med pull-right" style="margin-right:20px;">Commit</button>
                </div>
              </div>
              <!-- ./ BOX -->
            </div>
          </div>
      <!-- ./PILIHAN MATA KULIAH -->



  <!-- End of content -->

</section>
