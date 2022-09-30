@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Profile</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>

                                    <h3 class="profile-username text-center"></h3>

                                    <p class="text-muted text-center"></p>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Email</b><a class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Phone</b> <a class="float-right"></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Address</b> <a class="float-right"></a>
                                        </li>
                                    </ul>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#userDetail"
                                                data-toggle="tab">Edit User Detail</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#password"
                                                data-toggle="tab">Change Password</a></li>
                                    </ul>
                                </div><!-- /.card-header -->

                                <div class="card-body">
                                    @if (isset($user_data))
                                        <form action="{{ route('user.update', @$user_data->id) }}" method="post"
                                            class="form" enctype="multipart/form-data">
                                            @method('put')
                                            @csrf
                                    @endif
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="userDetail">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="full_name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="full_name"
                                                            name="full_name" placeholder="Name"
                                                            value="{{ @$user_data->full_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="Email"
                                                            value="{{ @$user_data->email }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="phone"
                                                            id="phone" placeholder="Phone"
                                                            value="{{ @$user_data->phone }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="address"
                                                        class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address"
                                                            id="address" placeholder="Address"
                                                            value="{{ @$user_data->address }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane" id="password">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <label for="currentPassword" class="col-sm-2 col-form-label">Current
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            name="currentPassword" id="currentPassword"
                                                            placeholder="Current Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="newPassword" class="col-sm-2 col-form-label">New
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            name="newPassword" id="newPassword"
                                                            placeholder="New Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="retypenewPassword"
                                                        class="col-sm-2 col-form-label">Retype New Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            name="retypenewPassword" id="retypenewPassword"
                                                            placeholder="Retype New Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->

                                    </div>
                                    </form>
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>

    @include('inc.footer')
</body>
