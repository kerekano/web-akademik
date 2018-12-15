<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      <!-- Jadwal Mata kuliah -->
    </h1>
</section>
<script>
    getMatkul();
</script>
<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <!-- write content code -->

            <div class="box">
              <div class="box-header with-border">
                <h3>Jadwal Mata kuliah</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table class="table table-bordered" id="tabel-matkul">
<!--                  <ul class="pagination pagination-sm pull-right">-->
<!--                    <li><a href="#">&laquo;</a></li>-->
<!--                    <li><a href="#">1</a></li>-->
<!--                    <li><a href="#">2</a></li>-->
<!--                    <li><a href="#">3</a></li>-->
<!--                    <li><a href="#">&raquo;</a></li>-->
<!--                  </ul>-->

                  <tr>
                    <th style="width: 10px">No.</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Ruangan Kelas</th>
                    <th>Hari</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th><center>Option</center></th>
                  </tr>

                </table>
              </div>
              <!-- /.box-body -->

              <!-- Modal Nilai -->
              <div class="modal fade" id="modalNilai" role="dialog">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Detail Nilai</h4>
                              <hr>
                          </div>
                          <div class="modal-body">
                              <table class="table table-bordered" id="table-nilai">
                                  <thead>
                                    <tr>
                                      <th style="width:10px">No.</th>
                                      <th>Jenis Kuis</th>
                                      <th>Score</th>
                                      <th>Tanggal</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.Modal Nilai -->

              <!-- Modal Hadir -->
              <div class="modal fade" id="modalAbsen" role="dialog">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Daftar Absensi</h4>
                              <hr>
                          </div>
                          <div class="modal-body">
                              <table class="table table-bordered" id="table-absen">
                                  <thead>
                                    <tr>
                                      <th style="width:10px">No.</th>
                                      <th>Tanggal</th>
                                      <th>Materi</th>
                                      <th>Kehadiran</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.Modal Hadir -->

            </div>
            <!-- /.box -->

            <!-- /end of content code -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
