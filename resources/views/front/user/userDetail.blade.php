@include('inc.toppart')

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        @include('inc.navbar')

        @include('inc.sidebar')


        <div class="content-wrapper">
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0 text-center font-weight-bold">Profile</small></h1>
                        </div>
                    </div>
                </div>
            </div>

            <form action="">
                <div class="card p-2 ">
                    <div class="content">
                        <div class="container justify-content-sm-center">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-circle elevation-2"
                                                    src="{{ asset('dist/img/defaultUser.png') }}"
                                                    alt="User profile picture">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="content">
                        <div class="container justify-content-sm-center">
                            <div class="d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header p-2">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item"><a class="nav-link active" href="#userDetail"
                                                        data-toggle="tab">Edit User Detail</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#password"
                                                        data-toggle="tab">Change Password</a></li>
                                            </ul>
                                        </div>
                                        <div class="card-body">

                                            <div class="tab-content">
                                                <div class="active tab-pane" id="userDetail">
                                                    <form class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label for="full_name"
                                                                class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="full_name" name="full_name" placeholder="Name"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="email"
                                                                class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control"
                                                                    name="email" id="email" placeholder="Email"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="phone"
                                                                class="col-sm-2 col-form-label">Phone</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control"
                                                                    name="phone" id="phone" placeholder="Phone"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="address"
                                                                class="col-sm-2 col-form-label">Address</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    name="address" id="address" placeholder="Address"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                                <div class="tab-pane" id="password">
                                                    <div class="form-group row">
                                                        <label for="currentPassword"
                                                            class="col-sm-2 col-form-label">Current
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-11 ">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


       
        @include('inc.footer')
