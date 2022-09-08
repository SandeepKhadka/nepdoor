@extends('layouts.admin')

@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">User Add</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Full Name</label>
                                    <input type="text" id="full_name" name="full_name" class="form-control"
                                        value="{{ @$user_data->full_name }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Username</label>
                                    <input type="text" id="username" name="username" class="form-control"
                                        value="{{ @$user_data->username }}" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        value="{{ @$user_data->username }}" required placeholder="Password">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    value="{{ @$user_data->email }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="role">Role</label>
                                <select type="text" class="form-control form-control-sm" id="role" name="role"
                                    disabled>
                                    <option {{ @$user_data->role == 'admin' ? 'selected' : '' }}>admin
                                    </option>
                                    <option {{ @$user_data->role == 'customer' ? 'selected' : '' }}>customer
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ @$user_data->address }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="phone">Phone</label>
                                <input type="number" id="phone" name="phone" class="form-control"
                                    value="{{ @$user_data->phone }}" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="col-md-3" for="photo">Profile:</label>
                                <div class="col-md-4">
                                    <input type="file" name="photo" id="photo"
                                        {{ isset($user_data) ? '' : 'disabled' }}>
                                </div>
                                <div class="col-md-4">
                                    <img src={{ asset('uploads/user/Thumb-' . @$user_data->photo) }} alt=""
                                        class="img img-fluid img-responsive" style="max-width: 10rem; margin-top: 10px;">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class=" form-group col-md-12">
                                <label for="status ">Status</label>
                                <select type="text" class="form-control form-control-sm" id="status" name="status"
                                    disabled>
                                    <option {{ @$user_data->status == 'Active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option {{ @$user_data->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                        <a href="{{ route('user.index') }}" class="btn btn-primary float-right" style="margin-right: 10px"
                            value="Back">Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
