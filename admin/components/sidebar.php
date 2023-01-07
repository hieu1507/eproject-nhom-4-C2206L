<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" style="background-color: white;" href="../index.php">
    <div class="sidebar-brand-icon">
        <img src="../assets/img/jenkinsons-logo.png" style="width: 150px;">
    </div>
    <div class="sidebar-brand-text mx-3" style="color: #154c79; font-size: 12px;"></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Manage Product
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-th"></i>
        <span>Products</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Events</h6>
          <a class="collapse-item" href="../events/add_events.php">Add Events</a>
          <a class="collapse-item" href="../events/list_events.php">List Events</a>
          <h6 class="collapse-header">Cartegory Animal</h6>
          <a class="collapse-item" href="../mn_animal/add_mn_animal.php">Add Cartegory Animal</a>
          <a class="collapse-item" href="../mn_animal/list_mn_animal.php">List Cartegory Animal</a> 
          <h6 class="collapse-header">Cartegory Product</h6>
          <a class="collapse-item" href="../mn_product/add_mn_product.php">Add Cartegory Product</a>
          <a class="collapse-item" href="../mn_product/list_mn_product.php">List Cartegory Product</a> 
          <h6 class="collapse-header">Animal</h6>
          <a class="collapse-item" href="../animal/add_animal.php">Add Animal</a>
          <a class="collapse-item" href="../animal/list_animal.php">List Animal</a> 
          <h6 class="collapse-header">Product</h6>
          <a class="collapse-item" href="../product/add_product.php">Add Product</a>
          <a class="collapse-item" href="../product/list_product.php">List Product</a>
          <h6 class="collapse-header">Booking</h6>
          <a class="collapse-item" href="../booking/list_booking.php">List Booking</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="../contact/list_contact.php" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-comments"></i>
        <span>Contact</span>
    </a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Manage System
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-cog"></i>
        <span>System</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Admin</h6> 
            <a class="collapse-item" href="../admincp/list_admin.php">List Admin</a>
            <h6 class="collapse-header">Users</h6>
            <a class="collapse-item" href="../users/add_users.php">Add Users</a>
            <a class="collapse-item" href="../users/list_users.php">List Users</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->