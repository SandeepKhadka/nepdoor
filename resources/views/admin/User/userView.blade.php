@extends('layouts.admin')

@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">User View</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="role">Role</label>
                                    <input type="text" id="role" name="role" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="address">Address</label>
                                    <input type="text" id="address" name="address" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone" name="phone" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="profile">Profile(Image)</label>
                                    <input type="text" id="profile" name="profile" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status" disabled
                                        name="status" ; required>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Submit">Submit</button>
                            <a href="{{ url('userList') }}"><button type="submit" class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</button></a>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
