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
                    @if (isset($activity_data))
                        @foreach ($activity_data as $activity)
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" style="font-weight: bold">
                                        {{ $activity->title }}
                                        <span class="{{ @$activity->status == 'Completed' ? 'badge bg-success' : 'badge bg-warning' }}">{{ $activity->status }}</span>
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
                                            <p>{{Str::limit($activity->content, 20)}}</p>
                                            <li class="nav-item">
                                                <div class="progress progress-sm" style="width: 50%">
                                                    <div class="progress-bar bg-green" role="progressbar"
                                                        aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: {{$activity->progress}}%">
                                                    </div>
                                                </div>
                                                <small>
                                                    Progress {{$activity->progress}}% Complete
                                                </small>
                                                {{-- </td> --}}
                                            </li>
                                            <li class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-eye">
                                                    </i>
                                                    View
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

        </div><!-- /.container-fluid -->

        @include('inc.footer')
