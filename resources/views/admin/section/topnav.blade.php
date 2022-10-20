<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="z-index: 1">
    <div style="z-index: 2">
        <x:notify-messages />
    </div>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>


        @if (isset(auth()->user()->id) && auth()->user()->id != null)

            <li class="nav-item dropdown user-menu w-100">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                    <div class="image float-left">

                        @if (isset(auth()->user()->photo) &&
                            auth()->user()->photo != null &&
                            file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                            <img src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}"
                                class="user-image img-circle elevation-1" alt="">
                        @else
                            <img src="{{ asset('dist/img/defaultUser.png') }}" class="user-image img-circle elevation-1"
                                alt="User Image">
                        @endif
                    </div>
                    <span class="d-none d-md-inline">{{ @Auth::user()->username }}</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <li class="user-header bg-primary d-flex justify-content-center h-50">
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
                <li class="user-footer">
                    <a href="{{ url('admin/profile') }}" class="btn btn-default btn-flat">Profile</a>
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
        @else
            <a href="{{ route('login') }}" class="btn btn-default btn-flat float-right elevation-3"
                onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('login') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endif



    </ul>
</nav>
<!-- /.navbar -->
