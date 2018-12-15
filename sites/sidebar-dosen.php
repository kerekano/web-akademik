
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <p style="color:white;">DASHBOARD</p> -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="img/dog.png" width="160px" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="font-size: 15px;">
                    <?php
                        $namaMhs = "Windra Swastika";
                        if (strlen($namaMhs) > 23){
                         $namaMhs = substr($namaMhs, 0, 23);
                        }
                        echo $namaMhs;
                    ?>
                </p>
                <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $nim ?></a>
            </div>
        </div>

        <hr style="background-color:white; width:80%;">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="treeview">
                <a onclick="javascript:getpages('./content/Main-dosen.php','centercol');">
                    <!-- icon -->
                    <img src="./img/dashboard.png" class="logo-sidebar">
                    <!-- name -->
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a onclick="javascript:getpages('./content/MataKuliah-dosen.php','centercol');">
                    <!-- icon -->
                    <img src="./img/matakuliah.png" class="logo-sidebar">
                    <!-- name -->
                    <span>Mata Kuliah</span>
                </a>
            </li>
            <li class="treeview">
                <a onclick="javascript:getpages('./content/KalenderAkademik.php','centercol');">
                    <!-- icon -->
                    <img src="./img/kalenderakademik.png" class="logo-sidebar">
                    <!-- name -->
                    <span>Kalender Akademik</span>
                </a>
            </li>
            <li class="treeview">
                <a onclick="javascript:getpages('./content/Pa.php','centercol');">
                    <!-- icon -->
                    <img src="./img/pa.png" class="logo-sidebar">
                    <!-- name -->
                    <span>P.A.</span>
                </a>
            </li>

            <hr style="background-color:white; width:80%;">

            <li class="treeview" style="margin-left:-10px;font-size:20px;text-align:center; ">
                <a onclick="window.location.href='logout.php'">
                    <!-- icon -->
                      <i class="fa fa-power-off"></i>
                </a>
            </li>
            <!-- END sidebar menu -->
        </ul>

    </section>
    <!-- /.sidebar -->
</aside>
