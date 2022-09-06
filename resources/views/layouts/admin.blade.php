@include('admin.section.header')
<div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

    @include('admin.section.topnav')

    @include('admin.section.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper container">
        @yield('main-content')
    </div>

    <!-- /.content-wrapper -->

    @include('admin.section.footer')

    <!-- ./wrapper -->
    
    @include('admin.section.scripts')
  </div>
