<?php
include('session.php');
include('config.php');
$nim = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Academic System | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <link rel="stylesheet" href="./css/_all-skins.min.css">

    <link href="./css/icheck/blue.css" rel="stylesheet">
    <!-- jQuery 2.2.3 -->
    <script src="./js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="./js/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="./js/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="./js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="./js/demo.js"></script>
    <!-- <Icheck js -->
    <script src="./js/icheck.js"></script>

    <!-- AJAX -->
    <script type="text/javascript">

        // GET HTML OBJECT
        function GetXmlHttpObject(){
            var xmlHttp=null;
            try {
                //Untuk Browser Firefox, Opera 8.0+, Safari
                xmlHttp=new XMLHttpRequest();
            }
            catch (e){
                //Untuk Browser Internet Explorer
                try {
                    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch (e){
                    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
            }
            return xmlHttp;
        }
        // END GET HTML OBJECT

        // GET PAGE 1
        function getpages(url,centercol) {
            xmlHttp=GetXmlHttpObject();
            if (xmlHttp) {
                var obj = document.getElementById(centercol);
                xmlHttp.open("GET", url);
                xmlHttp.onreadystatechange = function() {
                    if (xmlHttp.readyState == 1) {
                        obj.innerHTML = '<div class="content-wrapper"><section class="content"><div class="row"><div class="col-md-12" style=";height:100vh;background-image: url(./img/loader.gif);background-attachment:fixed;background-position:center;background-repeat: no-repeat;"></div></div></section></div>';
                    }
                    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                        obj.innerHTML = xmlHttp.responseText;
                        $(obj).find("script").each(function(i) {
                            eval($(this).text());
                        });
                        // icheck checking
                        $(document).ready(function(){
                            $('input').iCheck({
                                checkboxClass: 'icheckbox_flat-blue'
                            });
                        });
                    }
                }
                xmlHttp.send(null);
            }
        }
        // END GET PAGE 1

    </script>
    <script>
        var totalKrs = 0;
        var krsGet = 0;

        function getTugas(){
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/tugas.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var length = myObj['Matkul'].length;
                        console.log(myObj);
                        var tugas = document.getElementById("tugas-kuliah");
                        var i=0;
                        while(i<length){
                            var node = document.createElement("div");                 // Create a <li> node
                            node.id = 'data-tugas';
                            node.innerHTML = "<div class=\"col-md-12\">\n" +
                                "<div class=\"box box-default collapsed-box box-solid\">\n" +
                                "<div class=\"box-header with-border\">\n" +
                                "<h3 class=\"box-title tugas-title\">null</h3>\n" +
                                "\n" +
                                "<div class=\"box-tools pull-right\">\n" +
                                "<button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>\n" +
                                "</div>\n" +
                                "<!-- /.box-tools -->\n" +
                                "</div>\n" +
                                "<!-- /.box-header -->\n" +
                                "\<div class=\"box-body\">\n" +
                                " <table class=\"table content-tugas\" >\n" +
                                "\n" +
                                " </table>\n" +
                                " </div>\n" +
                                " <!-- /.box-body -->\n" +
                                "</div>\n" +
                                "<!-- /.box -->\n" +
                                "</div>";
                            tugas.appendChild(node);
                            document.getElementsByClassName("tugas-title")[i].innerHTML = myObj["Matkul"][i]["Matkul"];
                            var table = document.getElementsByClassName("content-tugas")[i];
                            var lengthCell = myObj["Content"].length;
                            var j=0;
                            var count = 0;
                            while(j<lengthCell) {
                                if(myObj["Content"][j]["Kode"] == myObj["Matkul"][i]["Kode"]) {
                                    var row = table.insertRow(count * 2);
                                    var cell1 = row.insertCell(0);
                                    var cell2 = row.insertCell(1);
                                    var row1 = table.insertRow(count * 2 + 1);
                                    var cell3 = row1.insertCell(0);
                                    var cell4 = row1.insertCell(1);
                                    cell2.innerHTML = "<h3>" + myObj["Content"][j]["Judul"] + "<h3>";
                                    cell3.style.width = "20%";
                                    cell3.style.textAlign = "center";
                                    cell3.innerHTML = "<button type=\"button\" class=\"btn btn-success btn-lg\">Download</button>";
                                    cell4.innerHTML = myObj["Content"][j]['Keterangan'];
                                    count++;
                                }
                                j++;
                            }
                            i++;
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        };
        function getNilai(a){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a},
                    url: 'php/nilai.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("table-nilai").getElementsByTagName('tbody')[0];
                        $('#table-nilai tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            cell1.innerHTML = i;
                            if( myObj[i - 1]['Jenis'] == 0){
                                cell2.innerHTML = "Kuis Kecil";
                            } else if (myObj[i - 1]['Jenis'] == 1){
                                cell2.innerHTML = "Kuis Besar";
                            } else if(myObj[i - 1]['Jenis'] == 2){
                                cell2.innerHTML = "UAS";
                            }
                            cell3.innerHTML = myObj[i - 1]['Nilai'];
                            cell4.innerHTML = "";
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function getAbsen(a){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a},
                    url: 'php/absen.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("table-absen").getElementsByTagName('tbody')[0];
                        $('#table-nilai tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            cell1.innerHTML = i;
                            cell2.innerHTML = "";
                            cell3.innerHTML = myObj[i - 1]['Materi'];
                            if( myObj[i - 1]['Kehadiran'] == 0){
                                cell4.innerHTML = "Hadir";
                            } else if (myObj[i - 1]['Kehadiran'] == 1){
                                cell4.innerHTML = "Alpha";
                            } else if(myObj[i - 1]['Kehadiran'] == 2){
                                cell4.innerHTML = "Izin";
                            }
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });}
        function getDashboard(){
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/main.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var nim1 = myObj['NIM'];
                        var angkatan = nim1.substr(2,2);
                        $(".profil-ms").text(myObj['Nama']);
                        $(".panggilan").text(myObj['Nama_Depan']);
                        $("#nim").text(nim1);
                        $("#ipk").text(myObj['IPK']);
                        $(".pp").attr('src',"img/" + myObj['pp']);
                        $("#pa").text(myObj['PA']);
                        $("#prodi").text(myObj['Prodi']);
                        $("#angkatan").text('20'+angkatan);
                        $("#sks").text(myObj['SKS']);
                        krsGet = parseInt(myObj['SKS']);
                    },
                    error: function(error) {
                    }
                });
            });}
        function getMatkul(){
            var myObj;var table;
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/matkul.php',
                    success: function(response) {
                        myObj = JSON.parse(response);
                        table = document.getElementById("tabel-matkul");
                        var length = myObj.length;
                        var i=1;
                        while(i<=length){
                            var row = table.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            var cell7 = row.insertCell(6);
                            var cell8 = row.insertCell(7);
                            var matkul = myObj[i-1]['Kode'];
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i-1]['Matkul'];
                            cell3.innerHTML = myObj[i-1]['SKS'];
                            cell4.innerHTML = myObj[i-1]['Kelas'];
                            cell5.innerHTML = myObj[i-1]['Hari'];
                            cell6.innerHTML = myObj[i-1]['Mulai'];
                            cell7.innerHTML = myObj[i-1]['Selesai'];
                            cell8.innerHTML = "<center>\n" +
                                "                        <button type=\"button\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" onclick=\"getNilai(\'"+matkul+"\')\"  data-target=\"#modalNilai\">Nilai</button>\n" +
                                "                        <button type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" onclick=\"getAbsen(\'"+matkul+"\')\" data-target=\"#modalAbsen\">Absen</button>\n" +
                                "                      </center>";
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        };
        var sksCheck = 0
        function checkSKS(a){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {checked:a},
                    url: 'php/cekSks.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        if(myObj<krsGet){
                            sksCheck =1;
                        } else
                            sksCheck =0;
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function submitKrs(){
            var value =[];
            $("input:checkbox[name=iCheck]:checked").each(function(){
                value.push($(this).val());
            });
            checkSKS(value);
            if(sksCheck ==1){
                console.log('aa');
                $(function() {
                    $.ajax({
                        type: 'POST',
                        data: {checked:value},
                        url: 'php/insertKrs.php',
                        success: function(response) {
                            var myObj = JSON.parse(response);
                            javascript:getpages('./content/KrsDanKhs.php','centercol');
                        },
                        error: function(error) {
                        }
                    });
                });
            }
        };
        function getKrs() {
            totalKrs=0;
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/krs.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var krs = document.getElementById("total-sks");
                        var table = document.getElementById("table-krs");
                        var length = myObj['Available'].length;
                        var i=1;
                        while(i<=length){
                            var row = table.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.innerHTML = i + ".";
                            cell2.innerHTML = myObj['Available'][i-1]['Kode'];
                            cell3.innerHTML = myObj['Available'][i-1]['Nama'];
                            cell4.innerHTML = myObj['Available'][i-1]['SKS'];
                            cell5.innerHTML = "<center>\n" +
                                "                        <input type=\"checkbox\" name=\"iCheck\" value=\""+ myObj['Available'][i-1]['Kode'] +"\">\n" +
                                "                      </center>";
                            i++;
                        }
                        //chosen
                        table = document.getElementById("table-temp");
                        length = myObj['Chosen'].length;
                        i = 1;
                        while (i <= length) {
                            var row = table.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.innerHTML = i + ".";
                            cell2.innerHTML = myObj['Chosen'][i - 1]['Kode'];
                            cell3.innerHTML = myObj['Chosen'][i - 1]['Nama'];
                            cell4.innerHTML = myObj['Chosen'][i - 1]['SKS'];
                            totalKrs+=parseInt(myObj['Chosen'][i - 1]['SKS']);
                            cell5.innerHTML = "<center>\n" +
                                "<button type=\"button\" onclick=\"deleteKrs('"+myObj['Chosen'][i - 1]['Kode']+"')\"  class=\"btn btn-danger btn-med\">Delete</button>\n" +
                                "</center>";
                            i++;
                        }
                        krs.innerHTML = totalKrs;
                        $('input').iCheck({
                            checkboxClass: 'icheckbox_flat-blue'
                        });
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function deleteKrs(a){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a},
                    url: 'php/deleteKrs.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        javascript:getpages('./content/KrsDanKhs.php','centercol');
                    },
                    error: function(error) {
                    }
                });
            });
        }
    </script>
    <!-- END AJAX -->

    <!--DOSEN-->
    <script>
        function getDosenDashboard(){
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/dosen/main.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        $(".profil-ms").text(myObj['Nama']);
                        $("#nim").text(myObj['NIP']);
                        $("#prodi").text(myObj['Prodi']);
                        $(".kerja").text(myObj['Kerja']);
                        $(".aktivitas").text(myObj['Aktivitas']);
                        $(".masuk").text(myObj['Masuk']);
                        $(".pp").attr('src',"img/" + myObj['pp']);
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function getPA(){
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/dosen/pa.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        table = document.getElementById("table-pa");
                        var length = myObj.length;
                        var i=1;
                        while(i<=length){
                            var row = table.insertRow(i);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            var cell6 = row.insertCell(5);
                            var cell7 = row.insertCell(6);
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i-1]['nama'];
                            cell3.innerHTML = myObj[i-1]['nim'];
                            cell4.innerHTML = myObj[i-1]['status'];
                            cell5.innerHTML = myObj[i-1]['ipk'];
                            cell6.innerHTML = myObj[i-1]['sks'];
                            cell7.innerHTML = "<center>\n" +
                                "                        <button type=\"button\" onclick=\"validate('"+ myObj[i-1]['nim'] +"')\" class=\"btn btn-warning btn-sm\">Validasi</button>\n" +
                                "                      </center>"
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function validate(a){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data:{a:a},
                    url: 'php/dosen/validate.php',
                    success: function(response) {
                        javascript:getpages('./content/Pa.php','centercol');
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function getMatkulDosen(){
            var myObj;
            $(function() {
                $.ajax({
                    type: 'POST',
                    url: 'php/dosen/matkul.php',
                    success: function(response) {
                        myObj = JSON.parse(response);
                        var length = myObj.length;
                        var i =0;
                        matkul = document.getElementById("matkul-dsn");
                        while (i<length){
                            var node = document.createElement("div");
                            node.id = "matkul";
                            node.innerHTML ="<!-- MATAKULIAH_1 -->\n" +
                                "                <div class=\"col-md-4\">\n" +
                                "                  <div class=\"box box-default collapsed-box box-solid\">\n" +
                                "                    <div class=\"box-header with-border\">\n" +
                                "                        <h3 class=\"box-title matkul-judul\"></h3>\n" +
                                "\n" +
                                "                      <div class=\"box-tools pull-right\">\n" +
                                "                        <button type=\"button\" class=\"btn btn-box-tool\" data-widget=\"collapse\"><i class=\"fa fa-plus\"></i></button>\n" +
                                "                      </div>\n" +
                                "                      <!-- /.box-tools -->\n" +
                                "                    </div>\n" +
                                "                    <!-- /.box-header -->\n" +
                                "                    <div class=\"box-body\">\n" +
                                "                      <ul class=\"products-list product-list-in-box\">\n" +
                                "                        <!-- NILAI DAN ABSEN -->\n" +
                                "                        <a href=\"#modalMurid\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modalMurid\">\n" +
                                "                          <li class=\"item\">\n" +
                                "                            <div class=\"product-img\">\n" +
                                "                              <img src=\"./img/profile.png\">\n" +
                                "                            </div>\n" +
                                "                            <div class=\"product-info\">\n" +
                                "                              <a class=\"product-title\" onclick=\"getMhs('"+ myObj[i]["Matkul"]+"','"+ myObj[i]["kode"]+"')\"href=\"#modalMurid\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modalMurid\">\n" +
                                "                                Murid di dalam kelas\n" +
                                "                              </a>\n" +
                                "                                  <span class=\"product-description\">\n" +
                                "                                    Absensi dan penilaian mahasiswa\n" +
                                "                                  </span>\n" +
                                "                            </div>\n" +
                                "                          </li>\n" +
                                "                        </a>\n" +
                                "                        <!-- TUGAS DAN MATERI -->\n" +
                                "                        <a href=\"#modalMateri\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modalMateri\">\n" +
                                "                          <li class=\"item\">\n" +
                                "                            <div class=\"product-img\">\n" +
                                "                              <img src=\"./img/tugasdanmateri.png\">\n" +
                                "                            </div>\n" +
                                "                            <div class=\"product-info\">\n" +
                                "                              <a class=\"product-title\" onclick=\"getDsnMateri('"+ myObj[i]["Matkul"]+"','"+ myObj[i]["kode"]+"')\" href=\"#modalMateri\" data-toggle=\"modal\" data-toggle=\"modal\" data-target=\"#modalMateri\">\n" +
                                "                                Tugas Dan Materi\n" +
                                "                              </a>\n" +
                                "                                  <span class=\"product-description\">\n" +
                                "                                    Materi Setiap Pertemuan.\n" +
                                "                                  </span>\n" +
                                "                            </div>\n" +
                                "                          </li>\n" +
                                "                        </a>\n" +
                                "                      </ul>\n" +
                                "                    </div>\n" +
                                "                    <!-- /.box-body -->\n" +
                                "                  </div>\n" +
                                "                  <!-- /.box -->\n" +
                                "                </div>\n" +
                                "                <!-- /.MATAKULIAH_1 -->"
                            matkul.appendChild(node);
                            document.getElementsByClassName("matkul-judul")[i].innerHTML = myObj[i]["Matkul"];
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        };
        function getMhs(a,b){
            document.getElementById("nm-modal").innerText = a;
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a},
                    url: 'php/dosen/mhs.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("table-mhs").getElementsByTagName('tbody')[0];
                        $('#table-mhs tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i - 1]['Nama'];
                            cell3.innerHTML = myObj[i - 1]['nim'];
                            cell4.innerHTML =  myObj[i - 1]['Prodi'];
                            cell5.innerHTML =  "<center>\n" +
                                "<button type=\"button\" onclick=\"nilaiDsn('"+myObj[i - 1]['Nama']+"','"+myObj[i - 1]['nim']+"','"+myObj[i - 1]['Prodi']+"','"+a+"','"+b+"')\" class=\"btn btn-success btn-sm\" data-toggle=\"modal\" data-target=\"#modalInputNilai\">Nilai</button>\n" +
                                "<button type=\"button\" onclick=\"absenDsn('"+myObj[i - 1]['Nama']+"','"+myObj[i - 1]['nim']+"','"+myObj[i - 1]['Prodi']+"','"+a+"','"+b+"')\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#modalInputAbsen\">Absen</button>\n" +
                                "</center>";
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            })
        }
        function nilaiDsn(a,b,c,d,e){
            document.getElementById("nm-mhs").innerText=a;
            document.getElementById("nim-mhs").innerText=b;
            document.getElementById("prodi-mhs").innerText=c;
            document.getElementById("sbt-nilai").setAttribute( "onClick", "javascript: inputNilai('"+b+"','"+e+"');" );
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {b:b},
                    url: 'php/dosen/nilaiMhs.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("dsn-nilai").getElementsByTagName('tbody')[0];
                        $('#dsn-nilai tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i - 1]['Jenis'];
                            cell3.innerHTML = myObj[i - 1]['Nilai'];
                            cell4.innerHTML = myObj[i - 1]['tgl'];
                            cell5.innerHTML = myObj[i - 1]['ket'];
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function inputNilai(a,b){
            var nilai = document.getElementById("input-nilai").value;
            var tipe = document.getElementById("input-tipe").value;
            var tgl = document.getElementById("input-tgl").value;
            var ket = document.getElementById("input-ket").value;
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a,b:b,nilai:nilai,tipe:tipe,tgl:tgl,ket:ket},
                    url: 'php/dosen/inputNilai.php',
                    success: function(response) {
                    },
                });
            });
        }
        function absenDsn(a,b,c,d,e){
            document.getElementById("nm_mhs").innerText=a;
            document.getElementById("nim_mhs").innerText=b;
            document.getElementById("prodi_mhs").innerText=c;
            document.getElementById("sbt_absen").setAttribute( "onClick", "javascript: inputAbsen('"+b+"','"+e+"');" );
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {b:b},
                    url: 'php/dosen/absenMhs.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("dsn-absen").getElementsByTagName('tbody')[0];
                        $('#dsn-absen tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i - 1]['Materi'];
                            cell3.innerHTML = myObj[i - 1]['Kehadiran'];
                            cell4.innerHTML = myObj[i - 1]['tgl'];
                            i++;
                        }
                    },
                    error: function(error) {
                    }
                });
            });
        }
        function inputAbsen(a,b){
            var tipe = document.getElementById("input_tipe").value;
            var tgl = document.getElementById("input_tgl").value;
            var materi = document.getElementById("input_materi").value;
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a,b:b,tipe:tipe,tgl:tgl,materi:materi},
                    url: 'php/dosen/inputAbsen.php',
                    success: function(response) {
                    },
                });
            });
        }
        function getDsnMateri(a,b){
            document.getElementById("materi-title").innerText = a;
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {b:b},
                    url: 'php/dosen/materi.php',
                    success: function(response) {
                        var myObj = JSON.parse(response);
                        var table = document.getElementById("table-materi").getElementsByTagName('tbody')[0];
                        $('#table-materi tbody').empty();
                        var length = myObj.length;
                        var i=1;
                        while(i<=length) {
                            var row = table.insertRow(i-1);
                            var cell1 = row.insertCell(0);
                            var cell2 = row.insertCell(1);
                            var cell3 = row.insertCell(2);
                            var cell4 = row.insertCell(3);
                            var cell5 = row.insertCell(4);
                            cell1.innerHTML = i;
                            cell2.innerHTML = myObj[i - 1]['judul'];
                            cell3.innerHTML = myObj[i - 1]['tgl'];
                            cell4.innerHTML =  myObj[i - 1]['ket'];
                            cell5.innerHTML =  "<center>\n" +
                                "<button type=\"button\" class=\"btn btn-success btn-med\">Download</button>\n" +
                                "<button type=\"button\" class=\"btn btn-danger btn-med\" onclick=\"deleteTgs('"+b+"','"+myObj[i - 1]['judul']+"','"+ myObj[i - 1]['ket']+"')\">Delete</button>\n" +
                                "</center>";
                            i++;
                        }
                        table.insertRow(length).insertCell(0).innerHTML = "" +
                            "                                          <td colspan=\"5\">\n" +
                            "                                            <button type=\"button\" style=\"width:100%;\" value=\""+b+"\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#modalInputMateri\">\n" +
                            "                                              Tambah Materi/Tugas\n" +
                            "                                            </button>\n" +
                            "                                          </td>\n";
                        document.getElementById("commit-tgs").setAttribute('onclick',"inputTugas(\""+b+"\")")
                    },
                    error: function(error) {
                    }
                });
            })
        }
        function inputTugas(a){
            var judul = document.getElementById("jdl-tgs").value;
            var tipe = document.getElementById("tp-tgs").value;
            var ket = document.getElementById("ket-tgs").value;
            var jdlFile = document.getElementById("jdl-file").value;

            var file_data = $("#tgsUp").prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('a', a);
            form_data.append('tipe', tipe);
            form_data.append('judul', judul);
            form_data.append('ket', ket);
            form_data.append('jdlfile', jdlFile);
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData:false,
                    url: 'php/dosen/inputTgs.php',
                    success: function(response) {
                        document.getElementById('tugas-close').click()
                    },
                });
            });
        }
        function uploadTugas(){
            document.getElementById("tgsUp").click();
        }
        function getFileName(a){
            var file = a.files[0];
            var filename = file.name;
            var arr = filename.split(".");
            document.getElementById("jdl-file").value = arr[0];
        }
        function deleteTgs(a,b,c){
            $(function() {
                $.ajax({
                    type: 'POST',
                    data: {a:a,b:b,c:c},
                    url: 'php/dosen/deleteTgs.php',
                    success: function(response) {
                    },
                });
            });
        }
    </script>

</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <?php
    include('header.php');
    if($_SESSION['login_auth']==0) {
        include('sidebar.php');
    }  else if($_SESSION['login_auth']==1){
        include('sidebar-dosen.php');
    }
    ?>

    <!-- Wrapper. Contains page content -->
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"  id="centercol">
            <!-- content -->
            <?php
            if($_SESSION['login_auth']==0){
                include('content/Main.php');
            } else if($_SESSION['login_auth']==1){
                include('content/Main-dosen.php');
            }
            ?>
            <!-- /.content -->
        </div>
        <?php
        include('./footer.php');
        ?>
    </div>
    <div class="control-sidebar-bg"></div>

    <!-- ./wrapper -->
</div>

</body>
</html>
