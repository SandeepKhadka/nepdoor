@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="help">Help</li>
            </ol>
        </nav>
        @include('inc.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 style="color:rgb(8, 66, 160); text-align:center;"> How can we help you? </h1>
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="input-group">
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>

            <div class="content">
<<<<<<< HEAD
                <form action="">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="form-group">
                            <input type="search" placeholder="Search" name="search" class="form-control"
                                value="{{ $search }}" style="width: 600px; height: 50px; margin-left:450px;" />
                        </div>
                        <button class="btn btn-primary" style="width: 60px; height:50px;">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card" style="margin-top:50px;">
                                <div class="card-header" style="text-align:left">
                                    <a href="{{ url('helpCenter') }}" style="color: black;font-size:20px;">Help
                                        Topics</a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach ($helpCenter_info as $helpCenter)
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a href="{{ $helpCenter->link }}" class="card-link"
                                                            target="new"
                                                            style=" font-size:17px ">{{ $helpCenter->title }}</a>
                                                    </div>
                                                </div>
                                            </div>
=======
                <div class="container justify-content-sm-center">
                    <form action="">
                        {{-- @csrf --}}
                        <div class="row d-flex justify-content-center">
                            <div class="form-group w-50 ">
                                <input type="search" placeholder="Search" name="search" class="form-control"
                                    value="{{ $search }}" />
                            </div>
                            <button class="btn btn-primary" style="width: 50px; height:40px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="margin-top:50px;">
                                    <div class="card-header" style="text-align:left">
                                        <a href="{{ url('helpCenter') }}" style="color: black;font-size:20px;">Help
                                            Topics</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($helpCenter_info as $helpCenter)
                                                <div class="col-lg-6">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <a href="{{ $helpCenter->link }}" class="card-link"
                                                                target="new"
                                                                style=" font-size:17px ">{{ $helpCenter->title }}</a>
                                                        </div>
                                                    </div>
                                                </div>
>>>>>>> 80955518ca8f3c81ad21b42da4fb0b5aa1edeed5

                                                {{-- <div class="card-body">
                                            <div class="col-lg-6"></div>
                                            <div class="col-lg-6">
                                                <div class="card" style="height: 50px">
                                                    <a href="https://www.youtube.com/"
                                                        style="margin-left:20px; font-size:17px; margin-top:12px; ">How
                                                        to Buy package</a>
                                                </div>
                                            </div>
                                        </div> --}}
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('inc.footer')
</body>
