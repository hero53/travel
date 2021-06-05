
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
         <i class="fab fa-fly"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Baby Travel <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
       <li class="nav-item active">
        <a class="nav-link" href="{{route('reservation.index')}}">
          <i class="fas fa-file-upload"></i>
          <span>Liste des demandes</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="{{route('destination.index')}}">
          <i class="fas fa-route"></i>
          <span>Destination</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    
