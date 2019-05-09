<aside class="main-sidebar">

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

<!-- Sidebar user panel (optional) -->
<div class="user-panel">
  <div class="pull-left image">
    <img src="<?= $_SESSION['profile']?>" class="img-circle" alt="User Image" style="width: 45px; height: 45px;">
  </div>
  <div class="pull-left info">
    <p><?= $_SESSION['nama']; ?></p>
    <!-- Status -->
    <a href="#"><i class="fa fa-circle text-success"></i> <?= $_SESSION['loginas']; ?></a>
  </div>
</div>

<!-- search form (Optional) -->
<form action="#" method="get" class="sidebar-form">
  <div class="input-group">
    <input type="text" name="q" class="form-control" placeholder="Search...">
    <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
      </span>
  </div>
</form>
<!-- /.search form -->

<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
  <!-- Optionally, you can add icons to the links -->
  <li class="treeview">
    <a href="#"><i class="fa fa-users"></i> <span>Users</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="masteradmin.php?page=createstudent"><span>Create new user</span></a></li>
      <li><a href="masteradmin.php?page=recentusers&authorize=1&halaman=1&cari=1">All Users</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-users"></i><span> Admin</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="masteradmin.php?page=createadmin "><span>Create new admin</span></a></li>
      <li><a href="masteradmin.php?page=recentadmin&authorize=2&halaman=1&cari=2">All Admins</a></li>
    </ul>
  </li>

  <li><a href="masteradmin.php?page=admin_tickets&cari=3"><i class="fa fa-ticket"></i> <span>Tickets</span></a></li>

</ul>
<!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->

</aside>