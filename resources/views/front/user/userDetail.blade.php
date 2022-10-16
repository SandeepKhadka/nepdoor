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

            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            @if (isset($user_data))
                @foreach ($user_data as $user_id)
                    <form action="{{ route('profile.update', @$user_id->id) }}" method="post" class="form"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                @endforeach
            @else
                <form action="{{ route('profile.store') }}" method="post" class="form" enctype="multipart/form-data">
                    @csrf
            @endif
            <div class="card p-2 ">
                <div class="content">
                    <div class="container justify-content-sm-center">
                        <div class="d-flex justify-content-center">
                            <div class="col-lg-5">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <div class="d-flex justify-content-center">
                                                
                                                @if (isset(auth()->user()->photo) &&
                                                    auth()->user()->photo != null &&
                                                    file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                                                    <img class="img-circle elevation-3"
                                                        src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}"
                                                        alt="User profile picture">
                                                    @error('photo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                @else
                                                    <img class="profile-user-img img-circle elevation-3"
                                                        src="{{ asset('dist/img/defaultUser.png') }}"
                                                        alt="User profile picture">
                                                @endif
                                            </div>

                                            {{-- <div class="row"> --}}
                                            {{-- <div class="form-group col-md-12"> --}}
                                            {{-- <div class="col-md-4"> --}}
                                            <input id="file" style="visibility:hidden;" name="photo"
                                                type="file" {{ isset($user_id) ? '' : 'required' }}>
                                            {{-- </div> --}}
                                            {{-- </div> --}}
                                            {{-- </div> --}}

                                            {{-- <h6>Change profile</small></h6> --}}
                                            
                                        </div>
                                        <label for="file" class="btn d-flex justify-content-center" style="font-weight: lighter">Change
                                            profile</label>

                                        <h3 class="profile-username text-center">{{ @$user_id->username }}
                                        </h3>

                                        {{-- <p class="text-muted text-center"></p> --}}

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email:</b> {{ @$user_id->email }}<a class="float-right"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Phone:</b> {{ @$user_id->phone }}<a class="float-right"></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address:</b> {{ @$user_id->address }}<a class="float-right"></a>
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
                                                    data-toggle="tab">Edit User
                                                    Detail</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#passwords"
                                                    data-toggle="tab">Change Password</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">

                                        <div class="tab-content">
                                            <div class="active tab-pane" id="userDetail">
                                                {{-- <form class="form-horizontal"> --}}
                                                <div class="form-group row">
                                                    <label for="full_name" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="full_name"
                                                            name="full_name" placeholder="Name"
                                                            value="{{ @$user_id->full_name }}">
                                                        @error('full_name')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="username"
                                                        class="col-sm-2 col-form-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input type="username" class="form-control" name="username"
                                                            id="username" placeholder="username"
                                                            value="{{ @$user_id->username }}">
                                                        @error('username')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" name="email"
                                                            id="email" placeholder="Email"
                                                            value="{{ @$user_id->email }}">
                                                        @error('email')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="phone"
                                                        class="col-sm-2 col-form-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <input type="number" class="form-control" name="phone"
                                                            id="phone" placeholder="Phone"
                                                            value="{{ @$user_id->phone }}">
                                                        @error('phone')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="address"
                                                        class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="address"
                                                            id="address" placeholder="Address"
                                                            value="{{ @$user_id->address }}">
                                                        @error('address')
                                                            <span class="invalid-feedback"
                                                                role="alert">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                {{-- </form> --}}
                                            </div>

                                            <div class="form-group row" hidden>
                                                <label for="password" class="col-sm-2 col-form-label">New
                                                    Password</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" readonly value="{{ $user_id->password }}">
                                            </div>

                                            <div class="tab-pane" id="passwords">
                                                <div class="form-group row">
                                                    <label for="oldPassword" class="col-sm-2 col-form-label">Old
                                                        Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="oldPassword" class="form-control"
                                                            name="oldPassword" id="oldPassword"
                                                            placeholder="Old Password">
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
                                                    <label for="retypeNewPassword"
                                                        class="col-sm-2 col-form-label">Retype New Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" class="form-control"
                                                            name="retypeNewPassword" id="retypeNewPassword"
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
            {{-- @endforeach
                @endif --}}
            {{-- </form> --}}



            @include('inc.footer')
