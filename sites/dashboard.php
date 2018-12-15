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
                      // obj.innerHTML = '<div class="content-wrapper"><section class="content"><div class="row"><div class="col-md-12" style=";height:100vh;background-image: url(\'./img/loader.gif\');background-attachment:fixed;background-position:center;background-repeat: no-repeat;"></div></div></section></div>';
                      obj.innerHTML = xmlHttp.responseText;
                      $(obj).find("script").each(function(i) {
                          eval($(this).text());
                      });
                  }
              }
              xmlHttp.send(null);
          }
      }
      // END GET PAGE 1

  </script>
    <script>
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
            });}
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
        }
    </script>
  <!-- END AJAX -->

</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <?php
    include('header.php');
    include('sidebar.php');
   ?>

  <!-- Wrapper. Contains page content -->
  <div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  id="centercol">
      <!-- content -->
      <?php
      include('content/Main.php');
      ?>
      <!-- /.content -->
  </div>
    <?php
      include('./footer.php');
     ?>
  </div>
<!-- ./wrapper -->
</div>

</body>
</html>
