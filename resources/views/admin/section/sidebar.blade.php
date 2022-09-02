 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route(auth()->user()->role) }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt=""
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ ucfirst(auth()->user()->role) }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/myphoto.jpg') }}" class="img-circle elevation-2"
                    alt="">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ ucfirst(auth()->user()->full_name) }}</a>
            </div>
        </div>

         <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Digital Marketing
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../widgets.html" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  SEO
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Training
                </p>
              </a>
            </li>
            <li class="nav-header">System</li>
            <li class="nav-item">
              <a href="../gallery.html" class="nav-link">
                <i class="nav-icon far fa-image"></i>
                <p>
                  Projects
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                  Activity
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="assets/iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Billings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Support Tickets
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../mailbox/mailbox.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create New Ticket</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../mailbox/compose.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Tickets</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../kanban.html" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>
                  Help Center
                </p>
              </a>
            </li>
            <li class="nav-header">Other</li>
            <li class="nav-item">
              <a href="assets/iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Refer & Earn</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="assets/iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Regional Partners</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="assets/iframe.html" class="nav-link">
                <i class="nav-icon fas fa-ellipsis-h"></i>
                <p>Affiliate Marketers</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </div>
    <!-- /.sidebar -->
</aside>
