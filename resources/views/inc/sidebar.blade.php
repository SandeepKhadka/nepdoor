  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="{{ url('customer/') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              Home
                          </p>
                      </a>
                  </li>
                  @foreach ($category_info as $category)
                      <li class="nav-item">
                          <a href="{{ route('package', ['package' => $category->title, 'id' => $category->id]) }}" class="nav-link">
                              <i class="nav-icon far fa-circle"></i>
                              <p>
                                  {{ $category->title }}
                              </p>
                          </a>
                      </li>
                  @endforeach
                  {{-- <li class="nav-item">
                      <a href="{{ url('customer/seo') }}" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              SEO
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('customer/training') }}" class="nav-link">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                              Training
                          </p>
                      </a>
                  </li> --}}
                  <li class="nav-header">System</li>
                  <li class="nav-item">
                      <a href="{{ url('customer/subscription') }}" class="nav-link">
                          <i class="nav-icon far fa-image"></i>
                          <p>
                              Subscriptions
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('customer/activity') }}" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                              Activity
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('customer/billing') }}" class="nav-link">
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
                              <a href="{{ url('customer/createTicket') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create New Ticket</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ url('customer/allTicket') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All Tickets</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('customer/helpCenter') }}" class="nav-link">
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
  </aside>
