@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center font-weight-bold">Activity</small></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            <div class="content">
                <div class="container" style="width: 50%">
                    <div class="card">
                        <div class="card-header">
                            {{-- <table class="table table-striped projects"> --}}
                            <h3 class="card-title" style="font-weight: bold">
                                SEO
                                <span class="badge badge-success">Completed</span>
                                {{-- <span class="badge badge-warning">Pending</span>
                                <span class="badge badge-primary">In-progress</span> --}}
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            {{-- </table> --}}
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <h6>Package
                                        </h6>
                                    </li>
                                    <p>Description....</p>
                                    {{-- <p>Progress</p> --}}
                                    {{-- <td class="project_progress"> --}}
                                    <li class="nav-item">
                                        <div class="progress progress-sm" style="width: 50%">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                            </div>
                                        </div>
                                        <small>
                                            Progress 57% Complete
                                        </small>
                                        {{-- </td> --}}
                                    </li>
                                    <li class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{-- <table class="table table-striped projects"> --}}
                            <h3 class="card-title" style="font-weight: bold">
                                SEO
                                {{-- <span class="badge badge-success">Completed</span> --}}
                                <span class="badge badge-warning">Pending</span>
                                {{-- <span class="badge badge-primary">In-progress</span> --}}
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            {{-- </table> --}}
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <h6>Package
                                        </h6>
                                    </li>
                                    <p>Description....</p>
                                    {{-- <p>Progress</p> --}}
                                    {{-- <td class="project_progress"> --}}
                                    <li class="nav-item">
                                        <div class="progress progress-sm" style="width: 50%">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57"
                                                aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                                            </div>
                                        </div>
                                        <small>
                                            Progress 57% Complete
                                        </small>
                                        {{-- </td> --}}
                                    </li>
                                    <li class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a>
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->

        @include('inc.footer')
