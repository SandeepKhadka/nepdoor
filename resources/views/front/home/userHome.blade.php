@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <div class="container-fluid">
            <!-- Content Wrapper. Contains page content -->
            <div class="row">
                <div class="col-md-12">
                    {{-- <div class="content-wrapper"> --}}
                    <div class="card"
                        style="width: 1100px; margin-left:200px;margin-top:20px; background-color:rgb(240, 241, 244)">
                        <!-- Content Header (Page header) -->
                        <div class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <h1 class="m-0">User Home </h1>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                        </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                        <section class="content">
                            <div class="container-fluid">
                                <!-- Small boxes (Stat box) -->

                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info elevation-1"><i
                                                    class="fas fa-shopping-bag"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Number of Packages</span>
                                                <span class="info-box-number">
                                                    10
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-6 col-md-6">
                                        <div class="info-box mb-3">
                                            <span class="info-box-icon bg-danger elevation-1"><i
                                                    class="fas fa-money-bill-alt"></i></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Total Amount</span>
                                                <span class="info-box-number">41,410</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                </div>
                                <!-- /.col -->

                                <!-- fix for small devices only -->
                                {{-- <div class="clearfix hidden-md-up"></div> --}}
                                <!-- /.col -->

                                <!-- /.col -->

                                @if (isset($package_info))
                                    <div class="row">
                                        {{-- @if ($digitalMarketingNum !== 0) --}}
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    Basic
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($package_info as $package)
                                                            @if ($package->name == 'Basic')
                                                                <div class="col-lg-6 col-6">
                                                                    <!-- small box -->
                                                                    <div class="small-box bg-info">
                                                                        <div class="inner">
                                                                            <h3>2</h3>
                                                                            <p>{{ $package->name }}</p>
                                                                        </div>
                                                                        <div class="icon">
                                                                            <i class="ion ion-bag"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    {{-- bodyRow --}}
                                                </div>
                                            </div>
                                            {{-- card --}}
                                        </div>
                                        <!-- /.row -->
                                        {{-- @endif --}}



                                        {{-- @if ($digitalMarketingNum !== 0) --}}
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    Digital Marketing
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($package_info as $package)
                                                            @if ($package->cat_info['title'] == 'Digital Marketing')
                                                                @if (ucfirst($package->name) != 'Basic')
                                                                    <div class="col-lg-4 col-6">
                                                                        <!-- small box -->
                                                                        <div class="small-box bg-success">
                                                                            <div class="inner">
                                                                                <h3>2</h3>
                                                                                <p>{{ $package->name }}</p>
                                                                            </div>
                                                                            <div class="icon">
                                                                                <i class="ion ion-bag"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    {{-- bodyRow --}}
                                                </div>
                                            </div>
                                            {{-- card --}}
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    {{-- @endif --}}

                                    <div class="row">
                                        {{-- @if ($seoNum !== 0) --}}
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    SEO
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($package_info as $package)
                                                            @if ($package->cat_info['title'] == 'SEO')
                                                                @if (ucfirst($package->name) != 'Basic')
                                                                    <div class="col-lg-4 col-6">
                                                                        <!-- small box -->
                                                                        <div class="small-box bg-danger">
                                                                            <div class="inner">
                                                                                <h3>2</h3>
                                                                                <p>{{ $package->name }}</p>
                                                                            </div>
                                                                            <div class="icon">
                                                                                <i class="ion ion-stats-bars"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach

                                                    </div>
                                                    {{-- bodyRow --}}
                                                </div>
                                            </div>
                                            {{-- card --}}
                                        </div>
                                        <!-- /.row -->
                                        {{-- @endif --}}



                                        {{-- @if ($trainingNum !== 0) --}}
                                        <div class="col-12 col-sm-6 col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    Training
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @foreach ($package_info as $package)
                                                            @if ($package->cat_info['title'] == 'Training')
                                                                <div class="col-lg-6 col-6">
                                                                    <!-- small box -->
                                                                    <div class="small-box bg-warning">
                                                                        <div class="inner">
                                                                            <h3>0</h3>
                                                                            <p>{{ $package->name }}</p>
                                                                        </div>
                                                                        <div class="icon">
                                                                            <i class="ion ion-pie-graph"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    {{-- bodyRow --}}
                                                </div>
                                            </div>
                                            {{-- card --}}
                                        </div>
                                        <!-- /.row -->
                                        {{-- @endif --}}
                                    </div>
                                @endif
                            </div>
                    </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                    {{-- </div> --}}
                    <!-- /.content-wrapper -->
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
