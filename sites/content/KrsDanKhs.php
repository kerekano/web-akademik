<!-- Content Header (Page header) -->
<section class="content-header">
    <!-- <h1>
      KRS dan KHS
    </h1> -->
</section>

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
                      <td>Kevin Christian Chandra</td>
                    </tr>
                    <tr>
                      <td>NIM</td>
                      <td>:</td>
                      <td>311610010</td>
                    </tr>
                    <tr>
                      <td>Program Studi</td>
                      <td>:</td>
                      <td>Teknik Informatika</td>
                    </tr>
                    <tr>
                      <td>Dosen PA</td>
                      <td>:</td>
                      <td>Windra Swastika, S.Kom., M.T., Ph.D</td>
                    </tr>
                    <tr>
                      <td>IPK</td>
                      <td>:</td>
                      <td>3.61</td>
                    </tr>
                    <tr>
                      <td>SKS</td>
                      <td>:</td>
                      <td>24</td>
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
                    Total SKS : 2
                  </span>
                </h4>
                <hr style="margin:0;border-color:blue;width:10%;float:left;">
              </div>
              <!-- /.box-header -->

              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">No.</th>
                  <th>Kode Mata Kuliah</th>
                  <th>Nama Mata Kuliah</th>
                  <th>SKS</th>
                  <th><center>Option</center></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>MPK0125</td>
                  <td>Desain Komunikasi Grafik</td>
                  <td>2</td>
                  <td>
                    <center>
                      <button type="button" class="btn btn-danger btn-med" data-toggle="modal" data-target="#modalDeleteKHS">Delete</button>
                    </center>
                  </td>
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

                <table class="table table-bordered">
                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th><center>Option</center></th>
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>MPK0125</td>
                    <td>Desain Komunikasi Grafik</td>
                    <td>2</td>
                    <td>
                      <center>
                        <input type="checkbox" name="iCheck">
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>MPK0135</td>
                    <td>Matematika</td>
                    <td>3</td>
                    <td>
                      <center>
                        <input type="checkbox" name="iCheck">
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>MPK0135</td>
                    <td>Matematika</td>
                    <td>3</td>
                    <td>
                      <center>
                        <input type="checkbox" name="iCheck">
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>IF0135</td>
                    <td>Matematika</td>
                    <td>3</td>
                    <td>
                      <center>
                        <input type="checkbox" name="iCheck">
                      </center>
                    </td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>MPK0135</td>
                    <td>Matematika</td>
                    <td>3</td>
                    <td>
                      <center>
                        <input type="checkbox" name="iCheck">
                      </center>
                    </td>
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
                  <button type="button" data-toggle="modal" data-target="#modalCommitKHS" class="btn btn-warning btn-med pull-right" style="margin-right:20px;">Commit</button>
                </div>

              </div>
              <!-- ./ BOX -->
            </div>
          </div>
      <!-- ./PILIHAN MATA KULIAH -->

      <!-- Modal Commit KHS -->
      <div class="modal" id="modalCommitKHS" role="dialog">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-body">
                    Yakinkah anda memilih matakuliah tersebut?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-warning">Ya, saya yakin!</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- ./Modal Commit KHS -->

      <!-- Modal Delete KHS -->
      <div class="modal" id="modalDeleteKHS" role="dialog">
          <div class="modal-dialog modal-sm">
              <div class="modal-content">
                  <div class="modal-body">
                    Yakinkah anda membatalkan matakuliah ini?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Ya, saya yakin!</button>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancel</button>
                  </div>
              </div>
          </div>
      </div>
      <!-- ./Modal Delete KHS -->

  <!-- End of content -->

</section>
