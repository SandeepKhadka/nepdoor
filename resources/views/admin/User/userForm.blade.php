@extends('layouts.admin')
@section('title', 'Nepdoor | User Form')
@section('main-content')
    {{-- BreadCrumb  --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
            <li class="breadcrumb-item active" aria-current="reply">{{ isset($user_data) ? 'Edit' : 'Form' }}</li>
        </ol>
    </nav>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">User {{ isset($user_data) ? 'Update' : 'Add' }}</h4>
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                {{ implode('', $errors->all('<div>:message</div>')) }}
                            @endif

                            @if (isset($user_data))
                                <form action="{{ route('user.update', @$user_data->id) }}" method="post" class="form"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                @else
                                    <form action="{{ route('user.store') }}" method="post" class="form"
                                        enctype="multipart/form-data">
                                        @csrf
                            @endif

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control"
                                        value="{{ @$user_data->full_name }}" required>
                                    @error('full_name')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ @$user_data->username }}" required>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ @$user_data->password }}" required placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        value="{{ @$user_data->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role</label>
                                    <select type="text" class="form-control form-control-sm" id="role"
                                        name="role" required>
                                        <option {{ @$user_data->role == 'admin' ? 'selected' : '' }}>admin
                                        </option>
                                        <option {{ @$user_data->role == 'customer' ? 'selected' : '' }}>customer
                                        </option>
                                    </select>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        value="{{ @$user_data->address }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" name="phone" class="form-control"
                                        value="{{ @$user_data->phone }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-md-3" for="photo">Profile:</label>
                                    <div class="col-md-4">
                                        <input type="file" name="photo" id="photo">
                                    </div>
                                    <div class="col-md-4">
                                        <img src={{ asset('uploads/user/Thumb-' . @$user_data->photo) }} alt=""
                                            class="img img-fluid img-responsive" style="max-width: 10rem">
                                    </div>
                                    @error('photo')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            @if (isset($user_data))
                                <div class="row">
                                    <div class=" form-group col-md-12">
                                        <label for="status ">Status</label>
                                        <select type="text" class="form-control form-control-sm" id="status"
                                            name="status" required>
                                            <option {{ @$user_data->status == 'Active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option {{ @$user_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ route('user.index') }}" class="btn btn-primary float-right"
                                style="margin-right: 10px" value="Back">Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
