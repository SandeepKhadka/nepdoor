  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
          <a href="{{ url('/') }}" class="navbar-brand">
              <img src="{{ asset('uploads/initial/logo.png') }}" alt="Nepdoor Logo" class="brand-image elevation-3 p-2"
                  style="height:40px;width:110px;">
          </a>

          {{-- Mobile Toggle --}}
          <button class="navbar-toggler order-1" type="button" data-widget="pushmenu">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                              class="fas fa-bars"></i></a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ url('/') }}" class="nav-link">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('digitalMarketing')}}" class="nav-link">Digital Marketing</a>
                  </li>
                  <li class="nav-item">
                      <a href="{{url('seo')}}" class="nav-link">SEO</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('basic')}}" class="nav-link">Basic</a>
                </li>
                  <li class="nav-item dropdown">
                      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false" class="nav-link dropdown-toggle">Training</a>
                      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                          <li><a href="{{url('digital_marketing_training')}}" class="dropdown-item">Certified Digital Marketing Professional
                                  Course</a></li>
                          <li class="dropdown-divider"></li>
                          <li><a href="{{url('seo_training')}}" class="dropdown-item">Certified SEO Professional Course</a></li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">Blogs</a>
                  </li>
              </ul>

              <ul class="navbar-nav ml-3">
                  <li class="nav-item">
                      <a name="" id="" class="btn btn-primary" href="{{ url('subscribe') }}"
                          role="button">Subscribe Now</a>
                  </li>
              </ul>
          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <!-- Notifications Dropdown Menu -->
              <li class="nav-item dropdown">
                  <a class="nav-link" data-toggle="dropdown" href="#">
                      <i class="far fa-bell"></i>
                      <span class="badge badge-warning navbar-badge">15</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-header">15 Notifications</span>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                          <i class="fas fa-envelope mr-2"></i> 4 new messages
                          <span class="float-right text-muted text-sm">3 mins</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                          <i class="fas fa-users mr-2"></i> 8 friend requests
                          <span class="float-right text-muted text-sm">12 hours</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">
                          <i class="fas fa-file mr-2"></i> 3 new reports
                          <span class="float-right text-muted text-sm">2 days</span>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                  </div>
              </li>
              <li class="nav-item dropdown user-menu">
                  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                      <img src="assets/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2"
                          alt="User Image">
                      <span class="d-none d-md-inline">Alexander Pierce</span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <!-- User image -->
                      <li class="user-header bg-primary">
                          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                          <p>
                              Alexander Pierce - Web Developer
                              <small>Member since Nov. 2012</small>
                          </p>
                      </li>
                      <!-- Menu Body -->
                      <li class="user-body">
                          <div class="row">
                              <div class="col-4 text-center">
                                  <a href="#">Projects</a>
                              </div>
                              <div class="col-4 text-center">
                                  <a href="#">Activity</a>
                              </div>
                              <div class="col-4 text-center">
                                  <a href="#">Billings</a>
                              </div>
                          </div>
                          <!-- /.row -->
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                          <a href="#" class="btn btn-default btn-flat">Profile</a>
                          {{-- <a href="logout" class="btn btn-default btn-flat float-right">Sign out</a> --}}
                          <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right"
                              onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                      </li>
                  </ul>
              </li>
              {{-- <li class="nav-item">
            <a name="" id="" class="btn btn-primary" href="#" role="button">Log In</a>
        </li>
        <li class="nav-item ml-1">
            <a name="" id="" class="btn btn-primary" href="#" role="button">Sign Up</a>
        </li> --}}
          </ul>
      </div>
  </nav>
  <!-- /.navbar -->
