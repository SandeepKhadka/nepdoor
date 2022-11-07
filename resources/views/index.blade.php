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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content-header">
                                <div class="container">
                                    <div class="row mb-2">
                                        <div class="col-sm-12">
                                            <h1 class="m-0 text-center font-weight-bold"> Subscribe our basic package
                                                instantly !</small></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (isset($category_info))
                                @foreach ($category_info as $category)
                                    <div class="content-header">
                                        <div class="container">
                                            <div class="row mb-2">
                                                <div class="col-sm-12">
                                                    <h1 class="m-0 text-center font-weight-bold">
                                                        {{ $category->title }}</small></h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($package_info as $package)
                                            @if ($category->id == $package->cat_id)
                                                <div class="col-sm-4">
                                                    <div class="info-box">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text">{{ $package->name }}</span>
                                                            <span class="info-box-number">
                                                                NRs. {{ $package->price }} Monthly
                                                            </span>
                                                            <a href="{{ $package->link }}" class="card-link"><u>Learn
                                                                    More</u></a>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('inc.footer')
