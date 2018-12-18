<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
      <!-- Jadwal Mata kuliah -->
    </h1>
</section>
<script>
    getMatkulDosen()
</script>
<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">

            <div class="box">
              <div class="box-header with-border">
                <h3>Mata Kuliah Yang Diampu</h3>
                <hr style="margin:0;border:3px solid green;width:5%;float:left;">
              </div>

              <div class="box-body" id="matkul-dsn">

          <!-- _______________________________________________________________________________________________ -->
                      <!-- MODAL UNTUK Murid di dalam KELAS -->

                      <!-- Modal Murid-->
                      <div class="modal fade" id="modalMurid" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title" id="nm-modal">Algoritma</h3>
                                      <h5>Daftar Mahasiswa</h5>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered" id="table-mhs">
                                          <thead>
                                              <tr>
                                                  <th style="width: 10px">No.</th>
                                                  <th>Nama</th>
                                                  <th>NIM</th>
                                                  <th>Program Studi</th>
                                                  <th><center>Option</center></th>
                                              </tr>
                                          </thead>
                                          <tbody></tbody>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.Modal Murid -->

                      <!-- Modal Daftar Nilai -->
                      <div class="modal fade" id="modalNilai" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">Input Nilai</h3>
                                      <table class="table" style="width:50%;">
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
                                      </table>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered">
                                        <tr>
                                          <th style="width:10px">No.</th>
                                          <th>Jenis Kuis</th>
                                          <th>Score</th>
                                          <th>Tanggal</th>
                                        </tr>
                                        <tr>
                                          <td>1.</td>
                                          <td>Kuis Kecil 1</td>
                                          <td>85</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                        <tr>
                                          <td>2.</td>
                                          <td>Kuis Kecil 2</td>
                                          <td>85</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalInputNilai">Tambah Nilai</button>
                                  </div>
                              </div>
                              <!-- ./Modal content -->
                          </div>
                      </div>
                      <!-- /.Modal Daftar Nilai -->

                      <!-- Modal Input Nilai -->
                      <div class="modal fade" id="modalInputNilai" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">Input Nilai</h3>
                                      <table class="table" style="width:50%;">
                                        <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td id="nm-mhs"></td>
                                        </tr>
                                        <tr>
                                          <td>NIM</td>
                                          <td>:</td>
                                          <td id="nim-mhs">311610010</td>
                                        </tr>
                                        <tr>
                                          <td>Program Studi</td>
                                          <td>:</td>
                                          <td id="prodi-mhs">Teknik Informatika</td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered" id="dsn-nilai">
                                          <thead>
                                              <tr>
                                                  <th style="width:10px">No.</th>
                                                  <th>Jenis Kuis</th>
                                                  <th>Score</th>
                                                  <th>Tanggal</th>
                                                  <th>Keterangan</th>
                                              </tr>
                                          </thead>
                                          <tbody></tbody>
                                      </table>
                                  </div>
                                  <div class="modal-footer">
                                    <form>
                                      <div class="box-body" style="float:left;">

                                        <div class="row">
                                          <div class="form-group col-md-6" style="text-align:left;">
                                            <label>Nilai</label>
                                            <input type="number" class="form-control" id="input-nilai" placeholder="example. 90,72" min="0" max="100">
                                          </div>
                                          <div class="form-group col-md-6" style="text-align:left;">
                                            <label>Tipe</label>
                                            <select class="form-control" style="width: 100%;" id="input-tipe">
                                              <option selected="selected" name="jns-matkul" value="Kuis Kecil 1">Kuis Kecil 1</option>
                                              <option name="jns-matkul" value="Kuis Kecil 2">Kuis Kecil 2</option>
                                              <option name="jns-matkul" value="Kuis Kecil 3">Kuis Kecil 3</option>
                                              <option name="jns-matkul" value="Kuis Kecil 4">Kuis Kecil 4</option>
                                              <option name="jns-matkul" value="Kuis Kecil 5">Kuis Kecil 5</option>
                                              <option name="jns-matkul" value="Kuis Kecil 6">Kuis Kecil 6</option>
                                              <option name="jns-matkul" value="Kuis Kecil 7">Kuis Kecil 7</option>
                                              <option name="jns-matkul" value="Kuis Kecil 8">Kuis Kecil 8</option>
                                              <option name="jns-matkul" value="Kuis Kecil 9">Kuis Kecil 9</option>
                                              <option name="jns-matkul" value="Kuis Kecil 10">Kuis Kecil 10</option>
                                              <option name="jns-matkul" value="Kuis Besar 1">Kuis Besar 1</option>
                                              <option name="jns-matkul" value="Kuis Besar 2">Kuis Besar 2</option>
                                              <option name="jns-matkul" value="Kuis Besar 3">Kuis Besar 3</option>
                                              <option name="jns-matkul" value="Kuis Besar 4">Kuis Besar 4</option>
                                              <option name="jns-matkul" value="UAS">UAS</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="form-group col-md-6" style="text-align:left;">
                                            <label>Tanggal</label>
                                            <input type="date" class="form-control" id="input-tgl">
                                          </div>
                                          <div class="form-group col-md-6" style="text-align:left;">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control" id="input-ket">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="box-footer" style>
                                        <button type="button" class="btn btn-info btn-lg" id="sbt-nilai" style="padding: 100px 25px;">Tambah Nilai</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                              <!-- ./Modal content -->
                          </div>
                      </div>
                      <!-- /.Modal Input Nilai -->

                      <!-- Modal Daftar Absensi -->
                      <div class="modal fade" id="modalAbsen" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">Input Nilai</h3>
                                      <table class="table" style="width:50%;">
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
                                      </table>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered">
                                        <tr>
                                          <th style="width:10px">No.</th>
                                          <th>Materi</th>
                                          <th>Absen</th>
                                          <th>Tanggal</th>
                                        </tr>
                                        <tr>
                                          <td>1.</td>
                                          <td>Menggambar</td>
                                          <td>Hadir</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                        <tr>
                                          <td>2.</td>
                                          <td>Menulis</td>
                                          <td>Izin</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalInputAbsen">Tambah Absen</button>
                                  </div>
                              </div>
                              <!-- ./Modal content -->
                          </div>
                      </div>
                      <!-- /.Modal Daftar Absensi -->

                      <!-- Modal Input Absen -->
                      <div class="modal fade" id="modalInputAbsen" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title">Input Nilai</h3>
                                      <table class="table" style="width:50%;">
                                        <tr>
                                          <td>Nama</td>
                                          <td>:</td>
                                          <td id="nm_mhs"></td>
                                        </tr>
                                        <tr>
                                          <td>NIM</td>
                                          <td>:</td>
                                          <td id="nim_mhs"></td>
                                        </tr>
                                        <tr>
                                          <td>Program Studi</td>
                                          <td>:</td>
                                          <td id="prodi_mhs">Teknik Informatika</td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered" id="dsn-absen">
                                          <thead>
                                            <tr>
                                              <th style="width:10px">No.</th>
                                              <th>Materi</th>
                                              <th>Absen</th>
                                              <th>Tanggal</th>
                                            </tr>
                                          </thead>
                                          <tbody></tbody>
                                        <tr>
                                          <td>1.</td>
                                          <td>Menggambar</td>
                                          <td>Absen</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                        <tr>
                                          <td>2.</td>
                                          <td>Kuis Kecil 2</td>
                                          <td>Izin</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                        <tr>
                                          <td>3.</td>
                                          <td>Melukis</td>
                                          <td>Alpha</td>
                                          <td>25 Agustus 2018</td>
                                        </tr>
                                      </table>
                                  </div>
                                  <div class="modal-footer">
                                    <form>
                                      <div class="box-body col-md-12" style="float:left;">
                                        <div class="form-group col-md-3" style="text-align:left;">
                                          <label>Tanggal</label>
                                          <input type="date" class="form-control" id="input_tgl">
                                        </div>
                                          <div class="form-group col-md-4" style="text-align:left;">
                                              <label>Materi</label>
                                              <input type="text" class="form-control" id="input_materi">
                                          </div>
                                        <div class="form-group col-md-3" style="text-align:left;">
                                          <label>Tipe</label>
                                          <select class="form-control" style="width: 100%;" id="input_tipe">
                                            <option selected="selected">Hadir</option>
                                            <option>Izin</option>
                                            <option>Alpha</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="box-body col-md-2 pull-right">
                                        <br>
                                        <button type="button" id="sbt_absen" class="btn btn-info btn-lg">Commit</button>
                                      </div>
                                    </form>
                                  </div>
                              </div>
                              <!-- ./Modal content -->
                          </div>
                      </div>
                      <!-- /.Modal Input Absen -->

          <!-- _______________________________________________________________________________________________ -->
                      <!-- MODAL UNTUK TUGAS DAN MATERI -->

                      <!-- Modal Daftar Materi-->
                      <div class="modal fade" id="modalMateri" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h3 class="modal-title" id="materi-title"></h3>
                                      <h5>Daftar Mahasiswa</h5>
                                  </div>
                                  <div class="modal-body">
                                      <table class="table table-bordered" id="table-materi">
                                          <thead>
                                            <tr>
                                              <th style="width: 10px">No.</th>
                                              <th>Materi</th>
                                              <th>Tanggal</th>
                                              <th>Keterangan</th>
                                              <th><center>Option</center></th>
                                            </tr>
                                          </thead>
                                          <tbody></tbody>
                                        <tr>
                                          <td colspan="5">
                                            <button type="button" style="width:100%;" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalInputMateri">
                                              Tambah Materi/Tugas
                                            </button>
                                          </td>
                                        </tr>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- /.Modal Daftar Materi -->

                      <!-- Modal input Materi -->
                      <div class="modal fade" id="modalInputMateri" role="dialog">
                          <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <button type="button" class="close" id='tugas-close' data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Input Tugas dan Materi</h4>
                                  </div>
                                  <div class="modal-body col-md-12">
                                    <form>
                                      <div class="row">
                                        <div class="form-group col-md-4" style="text-align:left;">
                                          <label>Judul</label>
                                          <input type="text" class="form-control" id="jdl-tgs" required>
                                        </div>
                                        <div class="form-group col-md-4" style="text-align:left;">
                                          <label>Tipe</label>
                                          <select class="form-control" style="width: 100%;" id="tp-tgs" required>
                                            <option selected="selected" value="materi">Materi</option>
                                            <option value="tugas">Tugas</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-md-5" style="text-align:left;">
                                          <input type="text" class="form-control" id="jdl-file" readonly required>
                                        </div>
                                        <div class="form-group col-md-3" style="text-align:left;">
                                          <button type="button" class="btn btn-default btn-med" onclick="uploadTugas()">Upload</button>
                                            <input type="file" id="tgsUp" onchange="getFileName(this)" style="overflow: hidden;height:0px;">
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="form-group col-md-12" style="text-align:left;">
                                          Keterangan<br>
                                          <textarea name="isi_artikel" cols="60" rows="10" id="ket-tgs" required></textarea><br>
                                          <p style="color:#ff0000;">
                                              <span>*gunakan <</span><span>br> </span><span>untuk enter</span>
                                          </p>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-info btn-lg" id="commit-tgs">Commit</button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- ./Modal input Materi -->

            <!-- ___________________________________________________________________________________________________________________________________________________ -->


              </div>

            </div>
            <!-- /.box -->

            <!-- /end of content code -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
