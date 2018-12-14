<?php
include('session.php');
include('config.php');
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">    <!-- Theme style -->
    <link rel="stylesheet" href="./css/AdminLTE.min.css">
    <link rel="stylesheet" href="./css/_all-skins.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
                    }
                }
                xmlHttp.send(null);
            }
        }
        // END GET PAGE 1

    </script>
    <!-- END AJAX -->

</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php
include('header.php');
include('sidebar.php');
?>
<div class="wrapper" id="centercol">
    <?php
    include('content/content.php');
    ?>
</div>
    <!-- ./wrapper -->
</body>
</html>
