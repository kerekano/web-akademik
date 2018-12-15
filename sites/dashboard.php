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
                      // obj.innerHTML = '<div class="content-wrapper"><section class="content"><div class="row"><div class="col-md-12" style=";height:100vh;background-image: url(\'./img/loader.gif\');background-attachment:fixed;background-position:center;background-repeat: no-repeat;"></div></div></section></div>';
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
     <div class="control-sidebar-bg"></div>
  </div>
<!-- ./wrapper -->
</div>

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
</body>
</html>
