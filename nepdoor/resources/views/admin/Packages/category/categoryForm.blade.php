@extends('layouts.admin')
@section('main-content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="m-0 text-left font-weight-bold" style="padding: 10px">Category Form</small></h4>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Title</label>
                                    <input type="text" id="inputName" class="form-control">
                                </div>

                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="inputName">Key</label>
                                    <input type="number" id="inputName" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class=" form-group col-md-12">
                                    <label for="status ">Status</label>
                                    <select type="text" class="form-control form-control-sm" id="status"
                                        name="status" required>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success float-right" value="Sumbit">Submit</button>
                            <a href="{{ url('packageList') }}"><button type="submit" class="btn btn-primary float-right" style="margin-right: 10px" value="Back">Back</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
