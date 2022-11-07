@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="help">Home</li>
            </ol>
        </nav>
        @include('inc.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @if (isset($package_info))
                        <div class="row">
                            @foreach ($package_info as $package)
                                <div class="col-lg-12">
                                    <div class="content-header">
                                        <div class="container">
                                            <div class="row mb-2">
                                                <div class="col-sm-12">
                                                    {{-- @if(count($package->cat_info['title'])==0) --}}
                                                    <h1 class="m-0 text-center font-weight-bold">{{ $package->cat_info['title'] }}</small></h1>
                                                    {{-- @endif --}}
                                                </div><!-- /.col -->
                                            </div><!-- /.row -->
                                        </div><!-- /.container-fluid -->
                                    </div>
                                    <div class="row">
                                        @foreach ($package_info as $package)
                                            <div class="col-12 col-sm-6 col-md-4">
                                                <div class="info-box">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">{{ $package->name }}</span>
                                                        <span class="info-box-number">
                                                            NRs. {{ $package->price }} Monthly
                                                        </span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                        @endforeach
                                    </div>

                                    {{-- <div class="content-header">
                                    <div class="container">
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <h1 class="m-0 text-center font-weight-bold">Digital Marketing
                                                    Packages</small></h1>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div> --}}

                                    {{-- <div class="row">
                                    @foreach ($package_info as $package)
                                        @if (Str::upper(str_replace(' ', '', $package->cat_info['title'])) == 'DIGITALMARKETING')
                                            @if (ucfirst($package->name) != 'Basic')
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="info-box">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{ $package->name }}</span>
                                                            <span class="info-box-number">
                                                                NRs. {{ $package->price }} Monthly
                                                            </span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                </div> --}}

                                    {{-- <div class="content-header">
                                    <div class="container">
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <h1 class="m-0 text-center font-weight-bold">SEO Packages</small></h1>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div> --}}

                                    {{-- <div class="row">
                                    @foreach ($package_info as $package)
                                        @if (Str::upper($package->cat_info['title']) == 'SEO')
                                            @if (ucfirst($package->name) != 'Basic')
                                                <div class="col-12 col-sm-6 col-md-4">
                                                    <div class="info-box">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{ $package->name }}</span>
                                                            <span class="info-box-number">
                                                                NRs. {{ $package->price }} Monthly
                                                            </span>
                                                        </div>
                                                        <!-- /.info-box-content -->
                                                    </div>
                                                    <!-- /.info-box -->
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                </div> --}}

                                    {{-- <div class="content-header">
                                    <div class="container">
                                        <div class="row mb-2">
                                            <div class="col-sm-12">
                                                <h1 class="m-0 text-center font-weight-bold">Digital Marketing & SEO
                                                    Training</small></h1>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div> --}}

                                    {{-- <div class="row">
                                    @foreach ($package_info as $package)
                                        @if (Str::upper($package->cat_info['title']) == 'TRAINING')
                                            <div class="col-12 col-sm-6 col-md-6">
                                                <div class="info-box">
                                                    <div class="info-box-content">
                                                        <span class="info-box-text">{{ $package->name }}</span>
                                                        <span class="info-box-number">
                                                            NRs. {{ $package->price }} (2 Months Course + 3 Months
                                                            Internship)
                                                        </span>
                                                    </div>
                                                    <!-- /.info-box-content -->
                                                </div>
                                                <!-- /.info-box -->
                                            </div>
                                        @endif
                                    @endforeach
                                </div> --}}


                                </div>
                                <!-- /.col-md-6 -->
                            @endforeach
                        </div>
                        <!-- /.row -->
                    @endif
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>

        @include('inc.footer')
