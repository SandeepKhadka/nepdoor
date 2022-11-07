  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">

      <div class="container">
          <a href="{{ url('/customer') }}" class="navbar-brand">
              <img src="{{ asset('uploads/initial/logo.png') }}" alt="Nepdoor Logo" class="brand-image elevation-3 p-2"
                  style="height:40px;width:110px;">
          </a>

          {{-- Mobile Toggle --}}
          <button class="navbar-toggler order-1" type="button" data-widget="pushmenu">
              <span class="navbar-toggler-icon"></span>
          </button>

          @if (isset(auth()->user()->id) && auth()->user()->id != null)
              <div class="collapse navbar-collapse order-2" id="navbarCollapse">
                  <!-- Left navbar links -->
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                  class="fas fa-bars"></i></a>
                      </li>

                  </ul>

              </div>
              <div class="order-2 mr-3">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a href="https://nepdoor.com/blogs/" class="btn btn-primary" target="new"
                              role="button">Blogs</a>
                      </li>
                  </ul>
              </div>

              <!-- Right navbar links -->
              <ul class="order-2 order-md-3 navbar-nav navbar-no-expand ml-auto">
                  <!-- Notifications Dropdown Menu -->
                  <li class="nav-item dropdown user-menu w-100">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                          <div class="image float-left">

                              @if (isset(auth()->user()->photo) &&
                                  auth()->user()->photo != null &&
                                  file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                  <img src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}"
                                      class="user-image img-circle elevation-1" alt="">
                              @else
                                  <img src="{{ asset('dist/img/defaultUser.png') }}"
                                      class="user-image img-circle elevation-1" alt="User Image">
                              @endif
                          </div>
                          <span class="d-none d-md-inline">{{ @Auth::user()->username }}</span>
                      </a>
                      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                          <!-- User image -->
                          <li class="user-header bg-primary d-flex justify-content-center h-50">
                              {{-- <div class="image"> --}}
                              @if (isset(auth()->user()->photo) &&
                                  auth()->user()->photo != null &&
                                  file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                  <img src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}"
                                      class="img-circle elevation-2" alt="">
                              @else
                                  <img src="{{ asset('dist/img/defaultUser.png') }}" class="img-circle elevation-2"
                                      alt="User Image">
                              @endif
                          </li>
                          <p class="bg-primary text-center">
                              {{ @Auth::user()->full_name }}
                          </p>
                          <!-- Menu Footer-->
                          <li class="user-footer">
                              <a href="{{ url('customer/profile') }}" class="btn btn-default btn-flat elevation-2">Profile</a>
                              <a href="{{ route('logout') }}" class="btn btn-default btn-flat float-right elevation-2"
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
              </ul>
          @else
              <div class="navbar-collapse order-2">
              </div>
              <div class="order-2 mr-3">
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a href="https://nepdoor.com/blogs/" class="btn btn-primary" target="new"
                              role="button">Blogs</a>
                      </li>
                  </ul>
              </div>

              <ul class="order-2 order-md-3 navbar-nav navbar-no-expand ml-auto">

                  <a href="{{ route('login') }}" class="btn btn-default btn-flat float-right elevation-3"
                      onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                      {{ __('login') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </ul>
          @endif
      </div>
      <x:notify-messages />

  </nav>
  <!-- /.navbar -->
