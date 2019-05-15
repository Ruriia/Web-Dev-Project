  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php?page=homeadmin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K</b>RS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Helpdesk</b>KRS</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
        <?php
        $searchnavbar = (isset($_GET['cari'])) ? $_GET['cari'] : "";

        if($searchnavbar == 1): ?>
      <form action="masteradmin.php?page=recentusers&authorize=1&halaman=1&cari=1" class="navbar-form navbar-left" method="post" role="search">
              <div class="form-group">
                <input type="text" name="search" class="form-control mr-sm-2" id="navbar-search-input" placeholder="Search" style="border-radius: 5px;">
                <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                <a class="btn btn-danger my-2 my-sm-0"><i class="fa fa-undo"></i></a>
              </div>
      </form>
      <?php elseif($searchnavbar == 2): ?>
        <form class="navbar-form navbar-left" role="search" method="post" action="masteradmin.php?page=recentadmin&authorize=2&halaman=1&cari=2">
              <div class="form-group">
                <input type="text" name="search" class="form-control mr-sm-2" id="navbar-search-input" placeholder="Search" style="border-radius: 5px;">
                <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                <a class="btn btn-danger my-2 my-sm-0"><i class="fa fa-undo"></i></a>

              </div>
      </form>
      
      <?php elseif ($searchnavbar == 3): ?>
      <form class="navbar-form navbar-left" role="search" method="post" action="masteradmin.php?page=admin_tickets&cari=3">
              <div class="form-group">
                <input type="text" name="search" class="form-control mr-sm-2" id="navbar-search-input" placeholder="Search" style="border-radius: 5px;">
                <button class="btn btn-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                <a class="btn btn-danger my-2 my-sm-0"><i class="fa fa-undo"></i></a>

              </div>
      </form>
      <?php endif; ?>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <!-- <span class="label label-success">4</span> -->
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <!-- <span class="label label-warning">10</span> -->
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?= $_SESSION['profile']?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?= $_SESSION['nama']; ?> </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?= $_SESSION['profile']?>" class="img-circle" alt="User Image">

                <p>
                  <?= $_SESSION['nama']; ?> - <?= $_SESSION['loginas']; ?>
                  <small>Member Since : <?= date('d-F-Y', strtotime($_SESSION['membersince']));?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="masteradmin.php?page=accountsettings&iderror=0" class="btn btn-default btn-flat">Account Settings</a>
                </div>
                <div class="pull-right">
                  <a data-target="#modalLogout" data-toggle="modal" class="btn btn-default btn-flat" id="navlogout" href="#modalLogout">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>

    </nav>
  </header>

  <div class="modal fade" id="modalLogout" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalLogoutLabel">Notice</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Are you sure you want to logout?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary">
                <a href="../logout.php" style="color:unset">Yes, Logout</a>
              </button>
            </div>
          </div>
        </div>
  </div>  

