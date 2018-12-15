<header class="main-header">
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" style="background-color:white;">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#"class="dropdown-toggle" data-toggle="dropdown">
            <img src="./img/dog.png" class="user-image" alt="User Image">
            <span style="color:black;">Kevin Christian Chandra</span>
          </a>

          <ul class="dropdown-menu">
            <!-- Menu Body -->
            <li class="user-body">
              <form class="form-horizontal">
                <div class="col-sm-12">
                  <input type="password" class="form-control" placeholder="Old Password">
                </div>
                <div class="col-sm-12">
                  <input type="password" class="form-control" placeholder="New Password">
                </div>
                <div class="col-sm-12">
                  <input type="password" class="form-control" placeholder="Verify New Password">
                </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <center>
                <a href="#modalAgree" data-toggle="modal" data-target="#modalAgreePass" class="btn btn-default btn-flat">Change Password</a>
              </center>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>

<!-- Modal Agree-->
<div class="modal" id="modalAgreePass" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
              Yakinkah anda ingin merubah password?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /.Modal Agree -->
